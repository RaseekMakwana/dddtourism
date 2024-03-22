<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.banner.index');
    }

    public function getData(Request $request){
        $dataPost = DB::table('banner')
                ->select('banner.*')
                ->where('state',$request->state)
                ->orderBy('banner.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'title' => $items->title,
                'description' => $items->description,
                'show_text' => $items->show_text,
                'category' => $items->category,
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
        $data['category'] = config('collections.banner_category');
        return view('admin.banner.create',compact('data'));
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
            $file->store('banner', 'public');
            $filename = $file->hashName();
        }
        $insertable = [
            "category" => $inputs['category'],
            "title" => $inputs['title'],
            "description" => $inputs['description'],
            "show_text" => $inputs['show_text'],
            "featured_image" => $filename,
            "state" => session('state')
        ];
        DB::table("banner")->insert($insertable);

        return redirect()->route('admin.banner.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['category'] = config('collections.banner_category');
        $data['edit_record'] = DB::table('banner')->where('id',$id)->first();
        return view('admin.banner.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();

        $updatableRecord = DB::table('banner')->where('id',$inputs['hidden_record_id'])->first();

        // Remove file
        if (empty($inputs['hidden_featured_image']) && Storage::disk('public')->exists('banner/'.$updatableRecord->featured_image)) {
            Storage::disk('public')->delete('banner/'.$updatableRecord->featured_image);
        }

        // upload file
        $filename = '';
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $file->store('banner', 'public');
            $filename = $file->hashName();
        } else {
            $filename = $inputs['hidden_featured_image'];
        }

        $updatable = [
            "category" => $inputs['category'],
            "title" => $inputs['title'],
            "description" => $inputs['description'],
            "show_text" => $inputs['show_text'],
            "featured_image" => $filename,
        ];
        DB::table("banner")->where('id',$inputs['hidden_record_id'])->update($updatable);
        return redirect()->route('admin.banner.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record = DB::table('banner')->where('id',$id)->first();

        if (empty($filename) && Storage::disk('public')->exists('banner/'.$record->featured_image)) {
            Storage::disk('public')->delete('banner/'.$record->featured_image);
        }
        DB::table('banner')->where('id',$id)->delete();
        return redirect()->route('admin.banner.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }
}
