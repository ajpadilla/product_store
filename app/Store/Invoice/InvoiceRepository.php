<?php  
	namespace App\Store\Invoice;

	use App\Store\Base\BaseRepository;
	use App\Store\Invoice\Invoice;
	use Yajra\Datatables\Datatables;

	/**
	* 
	*/
	class InvoiceRepository extends BaseRepository
	{
		
		public function __construct()
		{
			$this->setModel(new Invoice);
		}

		public function create($data= array())
		{
			$invoice = $this->model->create($data);
			return $invoice;
		}

		public function table()
		{
			$invoices = $this->getModel()->select(['id','date','client_id','address', 'total']);
			return Datatables::of($invoices)
			->addColumn('client_id', function($invoice){
				return $invoice->client->name;
			})
			->addColumn('address', function($invoice){
				return $invoice->client->address;
			})
			->make(true);
		}

	}

?>