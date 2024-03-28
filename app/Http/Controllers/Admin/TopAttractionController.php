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


class TopAttractionController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.top_attraction.index');
    }

    public function getData(Request $request){

        $inputs = $request->input();

        $dataPost = DB::table('top_attraction')
                ->select('top_attraction.*')
                ->where('state', $inputs['state'])
                ->orderBy('top_attraction.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'english_title' => $items->english_title,
                'gujarati_title' => $items->gujarati_title,
                'hindi_title' => $items->hindi_title,
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
        return view('admin.top_attraction.create',compact('data'));
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
            $file->store('top_attraction', 'public');
            $filename = $file->hashName();
        }

        // Check slug
        $slug = Str::slug($inputs['english_title']);
        $checkSlug = DB::table('top_attraction')->where('slug',$slug)->first();
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
            "english_sort_content" => $inputs['english_sort_content'],
            "gujarati_sort_content" => $inputs['gujarati_sort_content'],
            "hindi_sort_content" => $inputs['hindi_sort_content'],
            "english_tag" => $inputs['english_tag'],
            "gujarati_tag" => $inputs['gujarati_tag'],
            "hindi_tag" => $inputs['hindi_tag'],
            "featured_image" => $filename,
            "state"=> session('state')
        ];
        DB::table("top_attraction")->insert($insertable);

        return redirect()->route('admin.top.attraction.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['edit_record'] = DB::table('top_attraction')->where('id',$id)->first();
        return view('admin.top_attraction.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs);

        $updatableRecord = DB::table('top_attraction')->where('id',$inputs['hidden_record_id'])->first();

        $filename = '';
        if($request->hasFile('featured_image')){
            if (!empty($updatableRecord->featured_image) && Storage::disk('public')->exists('top_attraction/'.$updatableRecord->featured_image)) {
                Storage::disk('public')->delete('top_attraction/'.$updatableRecord->featured_image);
            }

            $file = $request->file('featured_image');
            $file->store('top_attraction', 'public');
            $filename = $file->hashName();
        } else {
            $filename = $inputs['hidden_featured_image'];
            if (empty($filename) && Storage::disk('public')->exists('top_attraction/'.$updatableRecord->featured_image)) {
                Storage::disk('public')->delete('top_attraction/'.$updatableRecord->featured_image);
            }
        }

        // Check slug

        $updatable = [
            "english_title" => $inputs['english_title'],
            "gujarati_title" => $inputs['gujarati_title'],
            "hindi_title" => $inputs['hindi_title'],
            "english_content" => $inputs['english_content'],
            "gujarati_content" => $inputs['gujarati_content'],
            "hindi_content" => $inputs['hindi_content'],
            "english_sort_content" => $inputs['english_sort_content'],
            "gujarati_sort_content" => $inputs['gujarati_sort_content'],
            "hindi_sort_content" => $inputs['hindi_sort_content'],
            "english_tag" => $inputs['english_tag'],
            "gujarati_tag" => $inputs['gujarati_tag'],
            "hindi_tag" => $inputs['hindi_tag'],
            "featured_image" => $filename,
        ];
        DB::table("top_attraction")->where('id',$inputs['hidden_record_id'])->update($updatable);
        return redirect()->route('admin.top.attraction.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Record = DB::table('top_attraction')->where('id',$id)->first();

        if (empty($filename) && Storage::disk('public')->exists('top_attraction/'.$Record->featured_image)) {
            Storage::disk('public')->delete('top_attraction/'.$Record->featured_image);
        }
        DB::table('top_attraction')->where('id',$id)->delete();
        return redirect()->route('admin.top.attraction.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }
}
