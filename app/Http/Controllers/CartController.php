<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store\Cart\CartRepository;
use App\Store\Product\ProductRepository;

class CartController extends Controller
{
    protected $repository;
    protected $productRepository;

    public function __construct(CartRepository $repository, ProductRepository $productRepository)
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId, $quantity = 1)
    {
        if ($request->ajax()) 
        {
            if (!$this->repository->getActiveCartForUser(\Auth::user())) 
            {
                $input['active'] = TRUE;
                $this->repository->create($input);
            }

            if ($this->productRepository->addToUserCart($productId, $quantity, \Auth::user())) {
                $product = $this->productRepository->getArrayForTopCart(\Auth::user(), $productId);
                $this->setSuccess(true);
                $this->addToResponseArray('product', $product);
            }
            return $this->getResponseArrayJson();
       }
        return $this->getResponseArrayJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = $this->repository->getActiveCartForUser(\Auth::user());
        return view('carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteAjax($id)
    {
        $this->setSuccess($this->productRepository->deleteFromUserCart($id, \Auth::user()));
        $total = $this->repository->getActiveCartForUser(\Auth::user())->total;
        $this->addToResponseArray('total', $total);
        return $this->getResponseArrayJson();
    }

    public function changeQuantity(Request $request, $productId, $quantity)
    {
        if($request->ajax()) 
        {
            $this->setSuccess($this->repository->changeQuantity(\Auth::user(), $productId, $quantity));
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

}
