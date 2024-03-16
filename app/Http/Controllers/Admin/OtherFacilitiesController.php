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

class OtherFacilitiesController extends Controller
{
    use APIResponseTrait;
    /**
     * Display a listing of the resource.
     */

    public $segmnt3;
    public $uploadDirectory = "facilities/";
    public $facilities;

    public function __construct(){
        $this->facilities = config('collections.facilities_type_name');
        $this->segmnt3 = request()->segment(3);
    }

    public function index(){
        return view('admin.other_facilities.index');
    }

    public function getData(Request $request){

        $dataPost = DB::table('facilities')
                ->select('facilities.*')
                ->where('facility_type',$request['facility_type'])
                ->where('state',$request['state'])
                ->orderBy('facilities.updated_at', 'DESC')
                ->get();

        $response = [];
        foreach($dataPost as $items){
            $data = [
                'id' => $items->id,
                'title' => $items->title,
                'description' => $items->description,
                'location' => $items->location,
                'contact_number' => $items->contact_number,
                'tab_option' => $items->tab_option,
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
        $data['hospital_type'] = config("collections.hospital_type");
        $data['bars_and_liquor_shop_type'] = config("collections.bars_and_liquor_shop_type");
        return view('admin.other_facilities.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();

        $slug = Str::slug(strtolower(session('state').'-'. $this->facilities[$this->segmnt3]));

        $filename = '';
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $file->store($this->uploadDirectory.$slug, 'public');
            $filename = $file->hashName();

            // $filename = md5(time().rand()).'.'.$extenstion;
            // $file->move('storage/facilities/'.$slug, $filename);
        }

        $insertable = [
            "slug" => $slug,
            "facility_type" => $this->facilities[$this->segmnt3],
            "title" => $inputs['title'],
            "description" => $inputs['description'],
            "location" => $inputs['location'],
            "contact_number" => $inputs['contact_number'],
            "tab_option" => empty($inputs['tab_option'])?: $inputs['tab_option'] ,
            "featured_image" => $filename,
            "state" => session('state')
        ];
        DB::table("facilities")->insert($insertable);

        return redirect('admin/facilities/'.$this->segmnt3)->with('success_message', __('admin_messages.data_has_been_saved_successfully'));
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
    public function edit($type,$id)
    {
        $data['hospital_type'] = config("collections.hospital_type");
        $data['bars_and_liquor_shop_type'] = config("collections.bars_and_liquor_shop_type");

        $data['edit_record'] = DB::table('facilities')->where('id',$id)->first();
        return view('admin.other_facilities.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $inputs = $request->input();

        $updatableRecord = DB::table('facilities')->where('id',$inputs['hidden_record_id'])->first();

        $slug = Str::slug(strtolower(session('state').'-'. $this->facilities[$this->segmnt3]));


        // Remove file
        if (empty($inputs['hidden_featured_image']) && Storage::disk('public')->exists($this->uploadDirectory.$slug.'/'.$updatableRecord->featured_image)) {
            Storage::disk('public')->delete($this->uploadDirectory.$slug.'/'.$updatableRecord->featured_image);
        }

        // upload file
        $filename = '';
        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $file->store($this->uploadDirectory.$slug, 'public');
            $filename = $file->hashName();
        } else {
            $filename = $inputs['hidden_featured_image'];
        }

        // Check slug
        $insertable = [
            "slug" => $slug,
            "facility_type" => $this->facilities[$this->segmnt3],
            "title" => $inputs['title'],
            "description" => $inputs['description'],
            "location" => $inputs['location'],
            "contact_number" => $inputs['contact_number'],
            "tab_option" => @$inputs['tab_option'],
            "featured_image" => $filename,
            "state" => session('state')
        ];
        DB::table("facilities")->where('id',$inputs['hidden_record_id'])->update($insertable);
        return redirect('admin/facilities/'.$this->segmnt3)->with('success_message', __('admin_messages.data_has_been_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($type,$id)
    {
        $record = DB::table('facilities')->where('id',$id)->first();

        if (!empty($record->featured_image) && Storage::disk('public')->exists($this->uploadDirectory.$this->facilities[$this->segmnt3].'/'.$record->featured_image)) {
            Storage::disk('public')->delete($this->uploadDirectory.$this->facilities[$this->segmnt3].'/'.$record->featured_image);
        }
        DB::table('facilities')->where('id',$id)->delete();
        return redirect('admin/facilities/'.$this->segmnt3)->with('success_message', __('admin_messages.data_has_been_deleted_successfully'));
    }
}
