<?php

namespace App\Http\Controllers\Admin;

use Exception;
use DB;
use Log;
use Storage;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManage;

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewData['title'] = trans('users.user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->viewData['users'] = User::paginate(config('user.limit.list_in_admin'));
        
        return view('admin.user.index', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserManage $request)
    {
        DB::beginTransaction(); 
         
        try {
            $input = $request->all();
            $user = new User;
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->role = $input['role'];
            $user->password = config('user.password_default');
            $user->save();
            
            DB::commit();

            return redirect('admin/user')->with('status', trans('users.create.success'));
        } catch (Exception $e) {
            DB::rollback();
            Log::debug($e);
 
             return back()->withErrors(trans('users.create.failed'));
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->viewData['user'] = User::findOrFail($id);

        return view('admin.user.detail', $this->viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if (!($user->isSuperAdmin() || $user->isAdmin() && Auth::user()->isAdmin())) {
            $this->viewData['user'] = $user;

            return view('admin.user.edit', $this->viewData);
        }

        return redirect()->action('Admin\UsersController@show', ['id' => $id])
            ->withErrors(trans('users.update.permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserManage $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();

        if (!($user->isSuperAdmin() || $user->isAdmin() &&  Auth::user()->isAdmin())) {
            $user->name = $input['name'];
            $user->email = $input['email'];

            if (!(Auth::user()->isAdmin())) {
                $user->role = $input['role'];
            }
            $path = config('user.avatar.upload_path') . $user->id . '/';

            if (isset($input['avatar'])) {
                $user->avatar = uploadImage($input['avatar'], $path, true) ?: $user->avatar;
            }

            if ($user->save()) {
                return redirect()->back()->with('status', trans('fels.status.profile-updated'));
            }
        }

        return redirect()->action('Admin\UsersController@show', ['id' => $id])
            ->withErrors(trans('users.update.permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (!($user->isSuperAdmin() || ($user->isAdmin() && Auth::user()->isAdmin()))) {
            $user->delete();

            return redirect()->action('Admin\UsersController@index')
                ->withSuccess(trans('users.delete.success'));
        }

        return back()->withErrors(trans('users.delete.permission'));
    }
}
