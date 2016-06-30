<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Store\Product\ProductRepository;
use App\Store\Upload\ProductPhotoRepository;
use App\Store\Classification\ClassificationRepository;

class ProductController extends Controller
{
    protected $repository;
    protected $productPhotoRepository;
    protected $classificationRepository;

    public function __construct(ProductRepository $productRepository, ProductPhotoRepository $productPhotoRepository, ClassificationRepository $classificationRepository)
    {
        $this->repository = $productRepository;
        $this->productPhotoRepository = $productPhotoRepository;
        $this->classificationRepository = $classificationRepository;
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

    public function showApi(Request $request, $id)
    {
        $urlPhotos = [];
        $urlFirtsPhoto = null;
        $photosSlice = null;
        $classification = null;
        if($request->ajax())
        {
            $product = $this->repository->get($id);
            $photos = $product->photos->toArray();
            $classification = $product->classification->name;
            if($product->hasPhotos())
            {
                $urlFirtsPhoto = $product->first_photo->complete_path;
            }
            if($product->hasPhotos() > 1)
            {
                $photosSlice = array_slice($photos, 1);
            }
            $this->setSuccess($product ? true : false);
            $this->addToResponseArray('product', $product);
            $this->addToResponseArray('urlFirtsPhoto', $urlFirtsPhoto);
            $this->addToResponseArray('photos', $photosSlice);
            $this->addToResponseArray('classification', $classification);
            return $this->getResponseArrayJson();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->get($id);
        $classifications = $this->classificationRepository->getAllForSelect();
        return view('products.edit', compact('product', 'classifications'));
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
        $input = $request->all();
        $input['product_id'] = $id;
        $input['user_id'] = \Auth::user()->id;
        $product = $this->repository->update($input);
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

    public function destroyApi(Request $request, $id)
    {
        if($request->ajax())
        {
            $product = $this->repository->get($id);

            if ($product->hasPhotos()) 
            {
                foreach ($product->photos as $photo) 
                {
                    $this->productPhotoRepository->remove(
                        $photo->complete_path, 
                        $photo->complete_thumbnail_path, 
                        $photo->id
                    );
                }
            }
            $this->setSuccess($this->repository->delete($id));
            return $this->getResponseArrayJson();
        }
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
