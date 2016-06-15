<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store\User\UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Store\Upload\UserPhotoRepository;
use Mail;

class UserController extends Controller
{
    protected $repository;
    protected $userPhotoRepository;

    public function __construct(UserRepository $repository, UserPhotoRepository $userPhotoRepository)
    {
        $this->repository = $repository;
        $this->userPhotoRepository = $userPhotoRepository;
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $formData = $request->all();
        $formData['role'] = $this->repository->rol();
        $formData['active'] = ($formData['role'] == 'admin' ? '1' : '0');
        $user = $this->repository->create($formData);
        if($request->file('photo'))
            $this->userPhotoRepository->register($request->file('photo'), $user->id);

        if($formData['active'] != 1)
            Mail::send('users.email.active-user', array('user' => $user), function($message) use ($user) {
                $message->to(env('MAIL_USERNAME'), env('MAIL_USERNAME'))
                        ->from($user->email, $user->name)
                        ->subject('A new user is registered!');
            });
        \Alert::message('¡Usuario agregado con exito al sistema!', 'success');
        return redirect('auth/register');
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
}
