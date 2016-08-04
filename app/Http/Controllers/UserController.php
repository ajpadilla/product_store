<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store\User\UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Store\Upload\UserPhotoRepository;
use App\Store\Country\CountryRepository;
use Mail;

class UserController extends Controller
{
    protected $repository;
    protected $userPhotoRepository;
    protected $countryRepository;

    public function __construct(UserRepository $repository, UserPhotoRepository $userPhotoRepository, CountryRepository $countryRepository)
    {
        $this->repository = $repository;
        $this->userPhotoRepository = $userPhotoRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
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
            Mail::send('users.email.activate-user', array('user' => $user), function($message) use ($user) {
                $message->to(env('MAIL_USERNAME'), env('MAIL_USERNAME'))
                        ->from($user->email, $user->name)
                        ->subject('A new user is registered!');
            });
        \Alert::message('¡User successfully added to the system!', 'success');
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

    public function editProfile()
    {
        $user = \Auth::user();
        $countries = $this->countryRepository->getAllForSelect();
        return view('users.edit', compact('user', 'countries'));
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

    public function updateProfile(EditUserRequest $request)
    {
         $user = \Auth::user();
         $formData = $request->all();
         $formData['user_id'] = $user->id;
         $userUpdate = $this->repository->update($formData);
        
         if($request->file('photo'))
         {
            if ($user->hasPhotos()) 
            {
                $this->userPhotoRepository->remove(
                    $user->first_photo->complete_path, 
                    $user->first_photo->complete_thumbnail_path, 
                    $user->first_photo->id
                );  
            }
            $this->userPhotoRepository->register($request->file('photo'), $user->id);
         }
        \Alert::message('¡User updated successfully!', 'success');
        return redirect('user/edit-profile');
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

    public function activateUser($id)
    {
        $user = $this->repository->get($id);
        if(!$this->repository->hasActive($user)){
            $user->active = 1;
            $user->save();
            Mail::send('users.email.user-activate', array('user' => $user), function($message) use ($user) {
                $message->to($user->email, $user->username)
                        ->from(env('MAIL_USERNAME'), env('MAIL_USERNAME'))
                        ->subject('Congratulations: We have admitted your income!');
            });
        }
        return view('users.email.user-activate', compact('user'));
    }

    public function dataTable()
    {
        return $this->repository->table();
    }
}
