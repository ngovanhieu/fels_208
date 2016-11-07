<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreCategory;
use App\Models\Category;
use Exception;
use DB;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->viewData['title'] = trans('category.category');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->viewData['categories'] = Category::paginate(config('category.limit.list_in_admin'));
        return view('admin.category.index', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create', $this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {   
        DB::beginTransaction();
        try {
            //Retrieve photo URL
            $photoUrl = $request->file('photo')->store(config('fels.upload-path'));

            //Assign Model
            $category = new Category;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->photo = $photoUrl;
            $category->save();

            //Commit to DB
            DB::commit();

            return redirect('admin/category')->with('status', trans('fels.success'));
        } catch (Exception $e) {
            DB::rollback();
            Log::debug($e);
            
            return back()->withErrors(trans('category.create-failed'));
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
