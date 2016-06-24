<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Store\Product\ProductRepository;
use App\Store\Upload\ProductPhotoRepository;

class ProductController extends Controller
{
    protected $repository;
    protected $productPhotoRepository;

    public function __construct(ProductRepository $productRepository, ProductPhotoRepository $productPhotoRepository)
    {
        $this->repository = $productRepository;
        $this->productPhotoRepository = $productPhotoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::user()->id;
        $product = $this->repository->create($input);
        return redirect()->route('photoProduct.create', ['productId' => $product->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function createPhoto($productId)
    {
        $product = $this->repository->get($productId);
        return view('products.photo', compact('product'));
    }

    public function storePhoto(Request $request)
    {
        $this->productPhotoRepository->register($request->file('file'), $request->input('productId'), 
            \Auth::user()->id);
        return response()->json(['status' => 'success', 'file' => $request->file('file')], 200);
    }

    public function dataTable()
    {
        return $this->repository->table();
    }

}
