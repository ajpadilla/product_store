<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store\Product\ProductRepository;

class WishlistController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
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
    public function store(Request $request, $productId)
    {
        if($request->ajax())
        {
            if($this->productRepository->addToUserWishlist($productId, \Auth::user()))
            {
                $product = $this->productRepository->getArrayForTopWishlist($productId);
                $this->setSuccess(true);
                $this->addToResponseArray('product', $product);
                return $this->getResponseArrayJson();
            }
        }
        return $this->getResponseArrayJson();
    } 
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $wishlist = \Auth::user()->wishlist;
        return view('wishlist.show', compact('wishlist'));
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

    public function deleteAjax(Request $request, $id)
    {
        if($request->ajax())
        {
            $this->setSuccess($this->productRepository->deleteFromWishlistUser($id, \Auth::user()));
            return $this->getResponseArrayJson();
        }   
        return $this->getResponseArrayJson();
    }
}
