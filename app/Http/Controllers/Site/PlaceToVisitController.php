<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceToVisitController extends Controller
{
    public $segment1;
    public $segment3;
    public function __construct() {
        $this->segment1 = request()->segment(1);
        $this->segment3 = request()->segment(3);
    }

    public function index(){
        $data['banner'] = DB::table('banner')->where(['category'=>'Place To Visit','state'=>ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.place_to_visit',compact('data'));
    }

    public function diuPlaceToVisit(Request $request){
        $data['banner'] = DB::table('banner')->where(['category'=>'Place To Visit','state'=>ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";

        $data['Beaches'] = DB::table('place_to_visit')->where('type','Beaches')->where('state','Diu')->get();
        $data['Forts'] = DB::table('place_to_visit')->where('type','Forts')->where('state','Diu')->get();
        $data['Churches'] = DB::table('place_to_visit')->where('type','Churches')->where('state','Diu')->get();
        $data['Diu Museums'] = DB::table('place_to_visit')->where('type','Diu Museums')->where('state','Diu')->get();
        $data['Water Sport'] = DB::table('place_to_visit')->where('type','Water Sport')->where('state','Diu')->get();
        $data['Other'] = DB::table('place_to_visit')->where('type','Other')->where('state','Diu')->get();

        $data['beaches_box'] = DB::table('posts')->where('id','35')->where('state','Diu')->first();
        $data['forts_box'] = DB::table('posts')->where('id','36')->where('state','Diu')->first();
        $data['churches_box'] = DB::table('posts')->where('id','37')->where('state','Diu')->first();
        $data['museums_box'] = DB::table('posts')->where('id','38')->where('state','Diu')->first();
        $data['water_sport_box'] = DB::table('posts')->where('id','39')->where('state','Diu')->first();
        // dd($data['Other']);

        return view('site.place_to_visit',compact('data'));
    }

    public function placeToVisitDetails($section, $detailsPage){
        $data['banner'] = DB::table('banner')->where(['category'=>'Place To Visit','state'=>ucfirst($this->segment1)])->get();
        $data['banner_type'] = "banner_with_center_content_position";

        $data['page_details'] = DB::table('place_to_visit')->where('type',$section)->where('slug',$detailsPage)->where('state','Diu')->first();
        $data['popular_page'] = DB::table('place_to_visit')->where('type',$section)->whereNotIn('slug',[$detailsPage])->where('state','Diu')->get();

        return view('site.place_to_visit_details',compact('data'));
    }
}
