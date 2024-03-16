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

class HotelController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public $uploadDirectory = "facilities/";

    public function index()
    {
        return view('admin.hotel.index');
    }

    public function getData(){
        $dataPost = DB::table('hotels')
                ->select('hotels.*')
                ->orderBy('hotels.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'slug' => $items->slug,
                'title' => $items->title,
                'description' => $items->description,
                'location_url' => $items->location_url,
                'contact_number' => $items->contact_number,
                'hotel_type' => $items->hotel_type,
                'address' => $items->address,
                'email' => $items->email,
                'state' => $items->state,
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
        $data['hotel_type'] = config('collections.hotel_type');
        $data['facilities_type'] = DB::table('facilities_type')->get();
        $data['state'] = ['Diu','Daman','DNH'];
        return view('admin.hotel.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $slug = Str::slug(strtolower(session('state').'-hotel'));
        $insertable = [
            "slug" => $slug,
            "state" => session('state'),
            "hotel_type" => $inputs['hotel_type'],
            "title" => $inputs['title'],
            "description" => $inputs['description'],
            "location_url" => $inputs['location_url'],
            "contact_number" => $inputs['contact_number'],
            "address" => $inputs['address'],
            "email" => $inputs['email']
        ];
        $insertId = DB::table("hotels")->insertGetId($insertable);

        // new_images[] MULTIPL IMAGE
        if(!empty($inputs['new_images'])){
            $imageData = $inputs['new_images'];

            foreach($imageData as $imageValue){
                SELF::uploadDataStringImage($insertId, $slug, $imageValue);
            }
        }

        // new_images[] MULTIPL IMAGE
        if(!empty($inputs['new_image_selected'])){
            $filename = SELF::uploadDataStringImage($insertId, $slug, $inputs['new_image_selected'],1);
            $updatable = ['featured_image' => $filename];
            DB::table("hotels")->where('id',$insertId)->update($updatable);
        }
        return redirect()->route('admin.hotel.index')->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
        $data['gallery'] = DB::table('photo_gallery_details')->where(['type' => 'hotels', 'gallery_id' => $id, 'state' => session('state')])->get();
        $data['edit_record'] = DB::table('hotels')->where('id',$id)->first();
        return view('admin.hotel.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();
        $slug = Str::slug(strtolower(session('state').'-hotel'));

        $updateData = DB::table('hotels')->where('id',$inputs['hidden_record_id'])->first();

        // removed_images[] REEMOVE MULTIPL IMAGE
        if(!empty($inputs['removed_images'])){
            $imageData = $inputs['removed_images'];
            foreach($imageData as $image){
                $image = explode("~",$image);
                if($image[0] == "old"){
                    if (Storage::disk('public')->exists($this->uploadDirectory.$slug.'/'.$image[2])) {
                        Storage::disk('public')->delete($this->uploadDirectory.$slug.'/'.$image[2]);
                    }
                    DB::table('photo_gallery_details')->where(['id'=>$image[0],'type' => 'hotels', 'gallery_id' => $updateData->id, 'state' => session('state')])->delete();
                    DB::table('hotels')->where(['id'=>$updateData->id,'state' => session('state')])->update(['featured_image' => '']);
                }
            }
        }

        // new_images[] MULTIPL IMAGE
        if(!empty($inputs['new_images'])){
            $imageData = $inputs['new_images'];
            foreach($imageData as $imageValue){
                $image = explode("~",$imageValue);
                if($image[0] != "old"){
                    SELF::uploadDataStringImage($updateData->id, $slug, $imageValue);
                }
            }
        }

        // new_image_selected SELECTED IMAGE
        if(!empty($inputs['new_image_selected'])){
            $image = explode("~",$inputs['new_image_selected']);
            if($image[0] == "old"){
                DB::table('photo_gallery_details')->where(['type' => 'hotels', 'gallery_id' => $updateData->id, 'state' => session('state')])->update(['main_image' => '0']);
                $updatable = ['featured_image' => $image[2]];
                DB::table("hotels")->where('id',$updateData->id)->update($updatable);
            } else {
                $filename = SELF::uploadDataStringImage($updateData->id, $slug, $inputs['new_image_selected'],1);
                $updatable = ['featured_image' => $filename];
                DB::table("hotels")->where('id',$updateData->id)->update($updatable);
            }
        }


        // Check slug
        $insertable = [
            "state" => 'Diu',
            "hotel_type" => $inputs['hotel_type'],
            "title" => $inputs['title'],
            "description" => $inputs['description'],
            "location_url" => $inputs['location_url'],
            "contact_number" => $inputs['contact_number'],
            "address" => $inputs['address'],
            "email" => $inputs['email']
        ];
        DB::table("hotels")->where('id',$inputs['hidden_record_id'])->update($insertable);
        return redirect()->route('admin.hotel.index')->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slug = Str::slug(strtolower(session('state').'-hotel'));
        $galleryData = DB::table('photo_gallery_details')->where(['type' => 'hotels', 'gallery_id' => $id, 'state' => session('state')])->get();
        foreach($galleryData as $element){
            if (Storage::disk('public')->exists($this->uploadDirectory.$slug.'/'.$element->filename)) {
                Storage::disk('public')->delete($this->uploadDirectory.$slug.'/'.$element->filename);
            }
        }
        DB::table('hotels')->where('id',$id)->delete();
        return redirect()->route('admin.hotel.index')->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }

    public function uploadDataStringImage($galleryId, $slug, $imageValue, $isMain = 0){
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
            'type' => 'hotels',
            'gallery_id' => $galleryId,
            'state' => session('state'),
        ];
        DB::table("photo_gallery_details")->insert($insertable);

        return $fileName;
    }
}
