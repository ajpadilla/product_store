<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassificationRequest;
use App\Store\Classification\ClassificationRepository;
use App\Http\Requests\EditClassificationRequest;

class ClassificationController extends Controller
{

    protected $repository;

    public function __construct(ClassificationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classifications.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassificationRequest $request)
    {
        $this->repository->create($request->all());
        \Alert::message('¡Classification successfully added to the system!', 'success');
        return redirect('classification/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return vie();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classification = $this->repository->get($id);
        return view('classifications.edit', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClassificationRequest $request, $id)
    {
        $input = $request->all();
        $input['classification_id'] = $id;
        $classification = $this->repository->update($input);
        \Alert::message('¡Classification successfully update to the system!', 'success');
        return view('classifications.edit', compact('classification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax())
        {
            $this->setSuccess($this->repository->delete($id));
            return $this->getResponseArrayJson();
        }
   }

    public function dataTable()
    {
        return $this->repository->table();
    }
}
