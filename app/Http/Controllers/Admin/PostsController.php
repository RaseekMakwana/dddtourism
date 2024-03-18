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


class PostsController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    public function getData(Request $request){

        $inputs = $request->input();

        $dataPost = DB::table('posts')
                ->select('posts.*', 'c.category_name')
                ->leftJoin('categories as c', 'c.id', '=', 'posts.category_id')
                ->where('state', $inputs['state'])
                ->orderBy('posts.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'english_title' => $items->english_title,
                'gujarati_title' => $items->gujarati_title,
                'hindi_title' => $items->hindi_title,
                'category_name' => $items->category_name,
                'created_at' => date("d-m-Y h:i:A", strtotime($items->created_at)),
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
        return view('admin.posts.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();

        $filename = '';
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $file->store('posts', 'public');
            $filename = $file->hashName();
        }

        // Check slug
        $slug = Str::slug($inputs['english_title']);
        $checkSlug = DB::table('posts')->where('slug',$slug)->first();
        if($checkSlug){
            $slug = $checkSlug->slug.'-new';
        }

        $insertable = [
            "slug" => $slug,
            "english_title" => $inputs['english_title'],
            "gujarati_title" => $inputs['gujarati_title'],
            "hindi_title" => $inputs['hindi_title'],
            "english_content" => $inputs['english_content'],
            "gujarati_content" => $inputs['gujarati_content'],
            "hindi_content" => $inputs['hindi_content'],
            "category_id" => $inputs['category_id'],
            "featured_image" => $filename,
            "state"=> session('state')
        ];
        DB::table("posts")->insert($insertable);

        return redirect()->route('admin.posts.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['categories'] = DB::table('categories')->get();

        $data['edit_record'] = DB::table('posts')->where('id',$id)->first();
        return view('admin.posts.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();

        $updatableRecord = DB::table('posts')->where('id',$inputs['hidden_record_id'])->first();

        $filename = '';
        if($request->hasFile('featured_image')){
            if (!empty($updatableRecord->featured_image) && Storage::disk('public')->exists('posts/'.$updatableRecord->featured_image)) {
                Storage::disk('public')->delete('posts/'.$updatableRecord->featured_image);
            }

            $file = $request->file('featured_image');
            $file->store('posts', 'public');
            $filename = $file->hashName();
        } else {
            $filename = $inputs['hidden_featured_image'];
            if (empty($filename) && Storage::disk('public')->exists('posts/'.$updatableRecord->featured_image)) {
                Storage::disk('public')->delete('posts/'.$updatableRecord->featured_image);
            }
        }

        // Check slug

        $insertable = [
            "english_title" => $inputs['english_title'],
            "gujarati_title" => $inputs['gujarati_title'],
            "hindi_title" => $inputs['hindi_title'],
            "english_content" => $inputs['english_content'],
            "gujarati_content" => $inputs['gujarati_content'],
            "hindi_content" => $inputs['hindi_content'],
            "category_id" => $inputs['category_id'],
            "featured_image" => $filename,
        ];
        DB::table("posts")->where('id',$inputs['hidden_record_id'])->update($insertable);
        return redirect()->route('admin.posts.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Record = DB::table('posts')->where('id',$id)->first();

        if (empty($filename) && Storage::disk('public')->exists('posts/'.$Record->featured_image)) {
            Storage::disk('public')->delete('posts/'.$Record->featured_image);
        }
        DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('admin.posts.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }
}
