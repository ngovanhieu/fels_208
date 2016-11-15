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
use App\Http\Requests\StoreUser;

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
    public function store(StoreUser $request)
    {
        if ($request->role == 1 || $request->role == 2) {
            DB::beginTransaction();

            try {
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->role = $request->input('role');
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

        return back()->withErrors(trans('users.create.failed'));
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
