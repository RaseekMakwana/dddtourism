<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PhotoGalleryAdminController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public $uploadDirectory = "photo-gallery/";

    public function index()
    {
        return view('admin.photo_gallery.index');
    }

    public function getData(){
        $dataPost = DB::table('photo_gallery')
                ->select('photo_gallery.*')
                ->orderBy('photo_gallery.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'english_title' => $items->english_title,
                'hindi_title' => $items->hindi_title,
                'gujarati_title' => $items->gujarati_title,
                'event_date' => date("d-m-Y", strtotime($items->event_date)),
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
        return view('admin.photo_gallery.create');
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
            "state" => session('state')
        ];
        $insertId = DB::table("photo_gallery")->insertGetId($insertable);

        // new_images[] MULTIPL IMAGE
        if(!empty($inputs['new_images'])){
            $imageData = $inputs['new_images'];

            foreach($imageData as $imageValue){
                SELF::uploadDataStringImage($insertId, $imageValue);
            }
        }

        // new_images[] MULTIPL IMAGE
        if(!empty($inputs['new_image_selected'])){
            $filename = SELF::uploadDataStringImage($insertId, $inputs['new_image_selected'],1);
            $updatable = ['featured_image' => $filename];
            DB::table("photo_gallery")->where('id',$insertId)->update($updatable);
        }
        return redirect()->route('admin.photo.gallery.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['hotel_type'] = config('collections.hotel_type');
        $data['gallery'] = DB::table('photo_gallery_details')->where(['type' => 'photo_gallery', 'gallery_id' => $id, 'state' => session('state')])->get();
        $data['edit_record'] = DB::table('photo_gallery')->where('id',$id)->first();
        return view('admin.photo_gallery.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();
        $slug = Str::slug(strtolower(session('state').'-photo-gallery'));

        $updateData = DB::table('photo_gallery')->where('id',$inputs['hidden_record_id'])->first();

        // removed_images[] REEMOVE MULTIPL IMAGE
        if(!empty($inputs['removed_images'])){

            $imageData = $inputs['removed_images'];
            foreach($imageData as $image){
                $image = explode("~",$image);
                if($image[0] == "old"){
                    if (Storage::disk('public')->exists($this->uploadDirectory.$slug.'/'.$image[2])) {
                        Storage::disk('public')->delete($this->uploadDirectory.$slug.'/'.$image[2]);
                    }
                    DB::table('photo_gallery_details')->where('id', $image[1])->delete();
                    DB::table('photo_gallery')->where(['id'=>$updateData->id,'state' => session('state')])->update(['featured_image' => '']);
                }
            }
        }

        // new_images[] MULTIPL IMAGE
        if(!empty($inputs['new_images'])){
            $imageData = $inputs['new_images'];
            foreach($imageData as $imageValue){
                $image = explode("~",$imageValue);
                if($image[0] != "old"){
                    SELF::uploadDataStringImage($updateData->id, $imageValue);
                }
            }
        }

        // new_image_selected SELECTED IMAGE
        if(!empty($inputs['new_image_selected'])){
            $image = explode("~",$inputs['new_image_selected']);
            if($image[0] == "old"){
                DB::table('photo_gallery_details')->where(['type' => 'photo_gallery', 'gallery_id' => $updateData->id, 'state' => session('state')])->update(['main_image' => '0']);
                DB::table('photo_gallery_details')->where(['id'=>$image[1]])->update(['main_image' => '1']);
                $updatable = ['featured_image' => $image[2]];
                DB::table("photo_gallery")->where('id',$updateData->id)->update($updatable);
            } else {
                $filename = SELF::uploadDataStringImage($updateData->id, $inputs['new_image_selected'],1);
                $updatable = ['featured_image' => $filename];
                DB::table("photo_gallery")->where('id',$updateData->id)->update($updatable);
            }
        }


        // Check slug
        $updatable = [
            "english_title" => $inputs['english_title'],
            "hindi_title" => $inputs['hindi_title'],
            "gujarati_title" => $inputs['gujarati_title'],
            "event_date" => $inputs['event_date'],
        ];
        DB::table("photo_gallery")->where('id',$inputs['hidden_record_id'])->update($updatable);
        return redirect()->route('admin.photo.gallery.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slug = Str::slug(strtolower(session('state').'-photo-gallery'));
        $galleryData = DB::table('photo_gallery_details')->where(['type' => 'photo_gallery', 'gallery_id' => $id, 'state' => session('state')])->get();
        foreach($galleryData as $element){
            if (Storage::disk('public')->exists($this->uploadDirectory.$slug.'/'.$element->filename)) {
                Storage::disk('public')->delete($this->uploadDirectory.$slug.'/'.$element->filename);
            }
        }
        DB::table('photo_gallery')->where('id',$id)->delete();
        DB::table('photo_gallery_details')->where(['type' => 'photo_gallery', 'gallery_id' => $id, 'state' => session('state')])->delete();
        return redirect()->route('admin.photo.gallery.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }

    public function uploadDataStringImage($galleryId, $imageValue, $isMain = 0){

        $slug = Str::slug(strtolower(session('state').'-photo-gallery'));

        list($type, $imageValue) = explode(';', $imageValue);
        $type = explode('/',$type);
        $extension = end($type);
        list(, $imageValue) = explode(',', $imageValue);
        $imageValue = base64_decode($imageValue);
        $fileName = md5(time().rand()) .'.'. $extension; // You may adjust the file extension
        Storage::disk('public')->put($this->uploadDirectory.$slug.'/'.$fileName, $imageValue);

        $insertable = [
            'slug' => $slug,
            'filename' => $fileName,
            'type' => 'photo_gallery',
            'gallery_id' => $galleryId,
            'state' => session('state'),
        ];
        DB::table("photo_gallery_details")->insert($insertable);

        return $fileName;
    }
}
