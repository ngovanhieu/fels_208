<?php

namespace App\Http\Controllers\User;

use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\CheckPassword;
use Illuminate\Support\Facades\Input;

class ProfilesController extends BaseController
{
     public function __construct()
    {
        parent::__construct();
        $this->viewData['title'] = trans('users.user-profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->viewData['user'] = User::find($id);
        return view('frontend.users.profile', ['title' => trans('users.show-profile')], $this->viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::find($id);
        if (!$user) {
            return view('errors.404');
        }
        if ($user->isCurrent()) {
            $this->viewData['user'] = $user;
            return view('frontend.users.update', ['title' => trans('users.update-profile')], $this->viewData);
        }
        return redirect()->action('User\ProfilesController@show', ['id' => $id])->withErrors(trans('users.permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfile $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->avatar = uploadPhoto($request, $user, 'avatar');
        $user->save();
        return redirect()->back()->with('status', trans('users.profile-updated'));
    }

    public function editPassword()
    {
        return view('frontend.users.edit-password');
    }

    public function updatePassword(CheckPassword $request)
    {
        if (Hash::check($request->input("old_password"), Auth::user()->password)) {
            $user = Auth::user();
            $user->password = $request->new_password;
            $user->save();
            return redirect('change-password')->with('status', trans('users.password-updated'));
        } else {
            return redirect('change-password')->withErrors(trans('users.wrong-old-password'))->withInput();
        }
    }
}
