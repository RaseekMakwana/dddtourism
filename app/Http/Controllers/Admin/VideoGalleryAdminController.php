<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VideoGalleryAdminController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.video_gallery.index');
    }

    public function getData(){
        $dataPost = DB::table('video_gallery')
                ->select('video_gallery.*')
                ->orderBy('video_gallery.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'english_title' => $items->english_title,
                'hindi_title' => $items->hindi_title,
                'gujarati_title' => $items->gujarati_title,
                'event_date' => date("d-m-Y", strtotime($items->event_date)),
                'video_type' => $items->type,
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
        return view('admin.video_gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();

        $insertable = [
            "english_title" => $inputs['english_title'],
            "hindi_title" => $inputs['hindi_title'],
            "gujarati_title" => $inputs['gujarati_title'],
            "event_date" => $inputs['event_date'],
            "video_url" => $inputs['youtube_video_url'],
            "type" => $inputs['video_type'],
            "state" => session('state')
        ];
        DB::table("video_gallery")->insert($insertable);

        return redirect()->route('admin.video.gallery.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['edit_record'] = DB::table('video_gallery')->where('id',$id)->first();
        return view('admin.video_gallery.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();
        // Check slug
        $updatable = [
            "english_title" => $inputs['english_title'],
            "hindi_title" => $inputs['hindi_title'],
            "gujarati_title" => $inputs['gujarati_title'],
            "event_date" => $inputs['event_date'],
            "video_url" => $inputs['youtube_video_url'],
            "type" => $inputs['video_type'],
        ];
        DB::table("video_gallery")->where('id',$inputs['hidden_record_id'])->update($updatable);
        return redirect()->route('admin.video.gallery.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('video_gallery')->where('id',$id)->delete();
        return redirect()->route('admin.video.gallery.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }

}
