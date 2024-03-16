<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HotelsController extends Controller
{
    use APIResponseTrait;

    public $segment1;
    public $segment3;
    public $documentDirectory = 'storage/facilities/';
    public function __construct() {

        $this->segment1 = request()->segment(1);
        $this->segment3 = request()->segment(3);
    }

    public function index(){

        $data['banner'] = DB::table('banner')->where(['category'=>'Hotels','state'=> ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.facilities.hotels', compact('data'));
    }

    public function apiGetMasterData(Request $request){


        $validationParam = [
            'state' => 'required',
            'page_number' => 'required'
        ];
        $validation = Validator::make($request->all(), $validationParam);
        if ($validation->fails()) {
            return $this->validationError($validation);
        }
        try {
            $inputs = $request->input();
            $slug = Str::slug(strtolower($inputs['state'].'-hotel'));

            $queryString ='';
            if(!empty($inputs['hotel_type'])){
                $queryString .= " AND hotel_type='".$inputs['hotel_type']."'";
            }

            $per_page_records = 1;
            $facilities = DB::table("hotels")->select("*")
                        ->where('state',$inputs['state'])
                        ->whereRaw("1=1". $queryString)
                        ->where('status','Active')
                        ->paginate($per_page_records, ['*'], 'page', $inputs['page_number']);

            $response = [];
            foreach($facilities as $item){
                $data = [];
                $data["title"] = $item->title;
                $data["description"] = $item->description;
                $data["location_url"] = $item->location_url;
                $data["contact_number"] = $item->contact_number;
                $data["hotel_type"] = $item->hotel_type;
                $data["address"] = $item->address;
                $data["email"] = $item->email;
                $data["featured_image"] = asset($this->documentDirectory.$slug."/".$item->featured_image);
                $data["state"] = $item->state;
                $data["facility_1"] = $item->facility_1;
                $data["facility_2"] = $item->facility_2;
                $data["facility_3"] = $item->facility_3;
                $data["facility_4"] = $item->facility_4;
                $data["facility_5"] = $item->facility_5;
                $data["facility_6"] = $item->facility_6;
                $data["facility_7"] = $item->facility_7;
                $data["facility_8"] = $item->facility_8;
                $data["facility_9"] = $item->facility_9;
                $data["facility_10"] = $item->facility_10;
                $data["facility_11"] = $item->facility_11;
                $data["facility_12"] = $item->facility_12;
                $response[] = $data;
            }

            $meta = [
                'current_page' => $facilities->currentPage(),
                'last_page' => $facilities->lastPage(),
                'per_page' => $facilities->perPage(),
                'total' => $facilities->total(),
            ];
            return $this->success($response,"Data gets successfully",$meta);
        } catch (\Exception $e) {
            return $this->errorOnException($e);
        }


    }
    // public function apiGetMasterData(Request $request){


    //     $validationParam = [
    //         'state' => 'required',
    //         'facility_type' => 'required',
    //         'page_number' => 'required'
    //     ];
    //     $validation = Validator::make($request->all(), $validationParam);
    //     if ($validation->fails()) {
    //         return $this->validationError($validation);
    //     }
    //     try {
    //         $slug = Str::slug(strtolower(session('state').'-hotel'));

    //         $inputs = $request->input();

    //         $queryString ='';
    //         if(!empty($inputs['tab_option'])){
    //             $queryString .= " AND tab_option='".$inputs['tab_option']."'";
    //         }

    //         $per_page_records = 1;
    //         $facilities = DB::table("facilities")->select("*")
    //                     ->where('state',$inputs['state'])
    //                     ->where('facility_type',$inputs['facility_type'])
    //                     ->whereRaw("1=1". $queryString)
    //                     ->paginate($per_page_records, ['*'], 'page', $inputs['page_number']);

    //         $response = [];
    //         foreach($facilities as $item){
    //             $data = [];
    //             $data["title"] = $item->title;
    //             $data["description"] = $item->description;
    //             $data["location"] = $item->location;
    //             $data["featured_image"] = asset($this->documentDirectory.$slug."/".$item->featured_image);
    //             $data["tab_option"] = $item->tab_option;
    //             $data["contact_number"] = $item->contact_number;
    //             $data["state"] = $item->state;
    //             $response[] = $data;
    //         }
    //         // dd($response);
    //         // state,hotel,page_number,option
    //         $meta = [
    //             'current_page' => $facilities->currentPage(),
    //             'last_page' => $facilities->lastPage(),
    //             'per_page' => $facilities->perPage(),
    //             'total' => $facilities->total(),
    //         ];
    //         return $this->success($response,"Data gets successfully",$meta);
    //     } catch (\Exception $e) {
    //         return $this->errorOnException($e);
    //     }


    // }

}
