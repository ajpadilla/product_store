<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paypalpayment;
use Illuminate\Http\RedirectResponse;
use App\Store\Cart\CartRepository;
use App\Store\Invoice\InvoiceRepository;
use App\Store\Order\OrderRepository;


class PaypalController extends Controller
{
	private $_apiContext;
    private $cartRepository;
    private $invoiceRepository;
    private $orderRepository;

	function __construct(CartRepository $cartRepository, InvoiceRepository $invoiceRepository,
    OrderRepository $orderRepository)
	{
		 $this->_apiContext = Paypalpayment::apiContext(
		 	config('paypal_payment.Account.ClientId'),
		 	config('paypal_payment.Account.ClientSecret')
		 );
          $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'log.LogEnabled' => true,
            'log.FileName' =>  storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'FINE'
        ));

         $this->cartRepository = $cartRepository;
         $this->invoiceRepository = $invoiceRepository;
         $this->orderRepository = $orderRepository;
	}


	 /*
        Use this call to get a list of payments. 
        url:payment/
    */
    public function index()
    {
        echo "<pre>";

        $payments = Paypalpayment::getAll(array('count' => 1, 'start_index' => 0), $this->_apiContext);

        dd($payments);
    }


	 /*
    * Process payment using credit card
    */
    public function store()
    {
        $items = array();
        $subtotal = 0;
        $total = 0;
        $cart = $this->cartRepository->getActiveCartForUser(\Auth::user());
        $currency = 'USD';
      
        $addr= Paypalpayment::address();
        $addr->setLine1("3909 Witmer Road");
        $addr->setLine2("Niagara Falls");
        $addr->setCity("Niagara Falls");
        $addr->setState("NY");
        $addr->setPostalCode("14305");
        $addr->setCountryCode("US");
        $addr->setPhone("716-298-1822");

        $card = Paypalpayment::creditCard();
        $card->setType("visa")
            ->setNumber("4758411877817150")
            ->setExpireMonth("05")
            ->setExpireYear("2019")
            ->setCvv2("456")
            ->setFirstName("Joe")
            ->setLastName("Shopper");

        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($fi));

        foreach ($cart->products as $product) 
        {
            $item = Paypalpayment::item();
            $item->setName($product->name)
                ->setDescription($product->description)
                ->setCurrency('USD')
                ->setQuantity($product->pivot->quantity)
                ->setPrice($product->price);
            $items[] = $item;
            $subtotal += $product->price * $product->pivot->quantity;
        }

        $subtotal = number_format($subtotal, 2, '.', '');
        $total = ($subtotal + 0);
        echo $total;

        $itemList = Paypalpayment::itemList();
        $itemList->setItems($items);

        $details = Paypalpayment::details();
        $details->setShipping(0)
                ->setSubtotal($subtotal);

        $amount = Paypalpayment::amount();
        $amount->setCurrency($currency)
                ->setTotal($total)
                ->setDetails($details);

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment for purchases")
            ->setInvoiceNumber(uniqid());

        $payment = Paypalpayment::payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            return  "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }

        if ($payment->state == "approved") 
        {
            foreach ($cart->products as $product) 
            {
                $quantity = ($product->quantity - $product->pivot->quantity); 
                $product->quantity = $quantity;
                $product->save();
            }
            $cart->active = false;
            $cart->save();
            \Alert::message('¡Purchase completed successfully', 'success');
            return redirect('/');        
        }
    } 
}
