<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ParkingPlaceController extends Controller
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
        $data['banner'] = DB::table('banner')->where(['category'=>'Parking Place','state'=> ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.facilities.parking-place', compact('data'));
    }

    public function apiGetMasterData(Request $request){
        $validationParam = [
            'state' => 'required',
            'facility_type' => 'required',
            'page_number' => 'required'
        ];
        $validation = Validator::make($request->all(), $validationParam);
        if ($validation->fails()) {
            return $this->validationError($validation);
        }
        try {
            $inputs = $request->input();
            $slug = Str::slug(strtolower($inputs['state'].'-parking-place'));

            $queryString ='';
            if(!empty($inputs['tab_option'])){
                $queryString .= " AND tab_option='".$inputs['tab_option']."'";
            }

            $per_page_records = 1;
            $facilities = DB::table("facilities")->select("*")
                        ->where('state',$inputs['state'])
                        ->where('facility_type',$inputs['facility_type'])
                        ->whereRaw("1=1". $queryString)
                        ->where('status','Active')
                        ->paginate($per_page_records, ['*'], 'page', $inputs['page_number']);

            $response = [];
            foreach($facilities as $item){
                $data = [];
                $data["title"] = $item->title;
                $data["description"] = $item->description;
                $data["location"] = $item->location;
                $data["contact_number"] = $item->contact_number;
                $data["tab_option"] = $item->tab_option;
                $data["featured_image"] = asset($this->documentDirectory.$slug."/".$item->featured_image);
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
}
