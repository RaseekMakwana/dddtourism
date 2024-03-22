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


class PagesController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    public function getData(){
        $dataPost = DB::table('pages')
                ->select('pages.*')
                ->orderBy('pages.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'english_title' => $items->english_title,
                'gujarati_title' => $items->gujarati_title,
                'hindi_title' => $items->hindi_title,
                'type' => $items->type,
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
        $data['type'] = ['CMS Page','Custom Page','Custom URL'];
        return view('admin.pages.create',compact('data'));
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
            $extenstion = $file->getClientOriginalExtension();
            $filename = md5(time().rand()).'.'.$extenstion;
            $file->move('storage/pages/', $filename);
        }

        // Check slug
        $slug = Str::slug($inputs['english_title']);
        $checkSlug = DB::table('pages')->where('slug',$slug)->first();
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
            "type" => $inputs['type'],
            "featured_image" => $filename
        ];
        DB::table("pages")->insert($insertable);

        return redirect()->route('admin.pages.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['type'] = ['CMS Page','Custom Page','Custom URL'];
        $data['edit_record'] = DB::table('pages')->where('id',$id)->first();
        return view('admin.pages.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();

        $updatableRecord = DB::table('pages')->where('id',$inputs['hidden_record_id'])->first();

        $filename = '';
        if($request->hasFile('featured_image')){
            if (!empty($updatableRecord->featured_image) && Storage::disk('public')->exists('pages/'.$updatableRecord->featured_image)) {
                Storage::disk('public')->delete('pages/'.$updatableRecord->featured_image);
            }

            $file = $request->file('featured_image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = md5(time().rand()).'.'.$extenstion;
            $file->move('storage/pages/', $filename);
        } else {
            $filename = $inputs['hidden_featured_image'];
            if (empty($filename) && Storage::disk('public')->exists('pages/'.$updatableRecord->featured_image)) {
                Storage::disk('public')->delete('pages/'.$updatableRecord->featured_image);
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
            "type" => $inputs['type'],
            "featured_image" => $filename
        ];
        DB::table("pages")->where('id',$inputs['hidden_record_id'])->update($insertable);
        return redirect()->route('admin.pages.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Record = DB::table('pages')->where('id',$id)->first();

        if (empty($filename) && Storage::disk('public')->exists('pages/'.$Record->featured_image)) {
            Storage::disk('public')->delete('pages/'.$Record->featured_image);
        }
        DB::table('pages')->where('id',$id)->delete();
        return redirect()->route('admin.pages.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }
}
