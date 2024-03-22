<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaGalleryController extends Controller
{
    use APIResponseTrait;

    public $segment1;
    public $segment3;
    public $documentDirectory = "storage/photo-gallery/";

    public function __construct() {
        $this->segment1 = request()->segment(1);
        $this->segment3 = request()->segment(3);
    }

    public function pageMediaGallery(Request $request){
        $data['banner'] = DB::table('banner')->where(['category'=>'Media Gallery','state'=> ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.media-gallery', compact('data'));
    }

    public function apiGetPhotoGalleryData(Request $request){

        $validationParam = [
            'state' => 'required',
            'page_number' => 'required',
            'language' => 'required'
        ];
        $validation = Validator::make($request->all(), $validationParam);
        if ($validation->fails()) {
            return $this->validationError($validation);
        }
        try {
            $inputs = $request->input();
            $slug = Str::slug(strtolower($inputs['state'].'-photo-gallery'));

            $per_page_records = config('project.media_gallery_per_page');
            $photoGallery = DB::table("photo_gallery")->select("*")
                        ->where('state',$inputs['state'])
                        ->where('status','Active')
                        ->paginate($per_page_records, ['*'], 'page', $inputs['page_number']);

            $response = [];
            foreach($photoGallery as $item){
                $data = [];
                if($inputs['language'] == "en"){
                    $title = $item->english_title;
                } else if($inputs['language'] == "hi") {
                    $title = $item->hindi_title;
                } else if($inputs['language'] == "gu") {
                    $title = $item->gujarati_title;
                }
                $data["id"] = $item->id;
                $data["title"] = $title;
                $data["featured_image"] = asset($this->documentDirectory.$slug."/".$item->featured_image);
                $data["event_date"] = date("d", strtotime($item->event_date)).' '.substr(date("F", strtotime($item->event_date)),0,3);
                $data["state"] = $item->state;
                $response[] = $data;
            }

            $meta = [
                'current_page' => $photoGallery->currentPage(),
                'last_page' => $photoGallery->lastPage(),
                'per_page' => $photoGallery->perPage(),
                'total' => $photoGallery->total(),
            ];
            return $this->success($response,"Data gets successfully",$meta);
        } catch (\Exception $e) {
            return $this->errorOnException($e);
        }
    }

    public function apiGetVideoGalleryData(Request $request){

        $validationParam = [
            'state' => 'required',
            'page_number' => 'required',
            'language' => 'required'
        ];
        $validation = Validator::make($request->all(), $validationParam);
        if ($validation->fails()) {
            return $this->validationError($validation);
        }
        try {
            $inputs = $request->input();
            $slug = Str::slug(strtolower($inputs['state'].'-photo-gallery'));

            $per_page_records = config('project.media_gallery_per_page');
            $photoGallery = DB::table("video_gallery")->select("*")
                        ->where('state',$inputs['state'])
                        ->where('status','Active')
                        ->paginate($per_page_records, ['*'], 'page', $inputs['page_number']);

            $response = [];
            foreach($photoGallery as $item){
                $data = [];
                $title = '';
                if($inputs['language'] == "en"){
                    $title = $item->english_title;
                } else if($inputs['language'] == "hi") {
                    $title = $item->hindi_title;
                } else if($inputs['language'] == "gu") {
                    $title = $item->gujarati_title;
                }

                $featured_image = "";
                if($item->type == 'Video'){
                    $explodePath = explode("?v=", $item->video_url);
                    $featured_image = "https://img.youtube.com/vi/".$explodePath[1]."/mqdefault.jpg";
                } else if($item->type == 'Shorts'){
                    $explodePath = explode("shorts/", $item->video_url);
                    $featured_image = "https://img.youtube.com/vi/".$explodePath[1]."/mqdefault.jpg";
                }

                $data["id"] = $item->id;
                $data["title"] = $title;
                $data["featured_image"] = $featured_image;
                $data["event_date"] = date("d", strtotime($item->event_date)).' '.substr(date("F", strtotime($item->event_date)),0,3);
                $data["state"] = $item->state;
                $response[] = $data;
            }

            $meta = [
                'current_page' => $photoGallery->currentPage(),
                'last_page' => $photoGallery->lastPage(),
                'per_page' => $photoGallery->perPage(),
                'total' => $photoGallery->total(),
            ];
            return $this->success($response,"Data gets successfully",$meta);
        } catch (\Exception $e) {
            return $this->errorOnException($e);
        }
    }

    public function photoGalleryDetail($id){
        $data['banner'] = DB::table('banner')->where(['category'=>'Media Gallery','state'=> ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        $data['photo_gallery'] = DB::table('photo_gallery')->where('id', $id)->first();
        $data['photo_gallery_details'] = DB::table('photo_gallery_details')->where(['gallery_id'=>$id,'type'=>'photo_gallery','state'=> ucfirst($this->segment1)])->get();

        return view('site.media-gallery-details', compact('data'));
    }
}
