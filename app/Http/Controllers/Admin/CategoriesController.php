<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Visibility;


class CategoriesController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    public function getData(){
        $dataPost = DB::table('categories')
                ->select('categories.*', 'c.category_name as parent_category_name')
                ->leftJoin('categories as c', 'c.id', '=', 'categories.parent_id')
                ->orderBy('categories.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'category_name' => $items->category_name,
                'parent_category_name' => $items->parent_category_name,
                'created_at' => date("d-m-Y", strtotime($items->created_at)),
            ];
            $response[] = $data;
        }

        return $this->success($response, __('admin_messages.get_data_successfully'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = DB::table('categories')->get();
        return view('admin.categories.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();

        $insertable = [
            "category_name" => $inputs['category_name'],
            "description" => $inputs['description'],
            "parent_id" => $inputs['parent_category_id'],
        ];
        DB::table("categories")->insert($insertable);

        return redirect()->route('admin.categories.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->whereNotIn('id', [$id])->get();

        $data['edit_record'] = DB::table('categories')->where('id',$id)->first();
        return view('admin.categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();

        $insertable = [
            "category_name" => $inputs['category_name'],
            "description" => $inputs['description'],
            "parent_id" => $inputs['parent_category_id'],
        ];
        DB::table("categories")->where('id',$inputs['hidden_record_id'])->update($insertable);
        return redirect()->route('admin.categories.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('admin.categories.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }
}
