<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FacilitiesController extends Controller
{
    use APIResponseTrait;

    public $segment1;
    public $segment3;
    public function __construct() {
        $this->segment1 = request()->segment(1);
        $this->segment3 = request()->segment(3);
    }

    public function index(){
        $data['banner'] = DB::table('banner')->where(['category'=>'Facilities','state'=>'Diu'])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.facilities.index', compact('data'));
    }

    public function facilitiesHospitals(){
        $data['banner'] = DB::table('banner')->where(['category'=>'Hospitals','state'=>'Diu'])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.facilities.hospitals', compact('data'));
    }

}
