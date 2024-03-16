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

        $data['beaches'] = DB::table('posts')->where('id','35')->first();
        $data['ghoghla_beach'] = DB::table('pages')->where('id','3')->first();
        $data['nagoa_beach'] = DB::table('pages')->where('id','4')->first();
        $data['gomtimata_beach'] = DB::table('pages')->where('id','5')->first();
        $data['chakratirth_beach'] = DB::table('pages')->where('id','6')->first();
        $data['jallandhar_beachx'] = DB::table('pages')->where('id','7')->first();

        $data['forest'] = DB::table('posts')->where('id','36')->first();
        $data['diu_fort'] = DB::table('pages')->where('id','8')->first();
        $data['fortress_of_panikotha'] = DB::table('pages')->where('id','9')->first();

        $data['churches'] = DB::table('posts')->where('id','37')->first();
        $data['st_paul_church'] = DB::table('pages')->where('id','10')->first();
        $data['st_francis_of_assisi_church'] = DB::table('pages')->where('id','11')->first();

        $data['diu_museums'] = DB::table('posts')->where('id','38')->first();
        $data['st_paul_church1'] = DB::table('pages')->where('id','12')->first();
        $data['st_francis_of_assisi_church1'] = DB::table('pages')->where('id','13')->first();

        $data['water_sport'] = DB::table('posts')->where('id','39')->first();
        $data['scuba_diving'] = DB::table('pages')->where('id','14')->first();
        $data['wind_surfing'] = DB::table('pages')->where('id','15')->first();
        $data['water_scooter'] = DB::table('pages')->where('id','16')->first();
        $data['desert_bike'] = DB::table('pages')->where('id','17')->first();
        $data['water_skiing'] = DB::table('pages')->where('id','18')->first();

        $data['bird_sanctuary'] = DB::table('posts')->where('id','40')->first();
        $data['forest1'] = DB::table('posts')->where('id','41')->first();

        return view('site.place_to_visit',compact('data'));
    }

    public function preferredSiteLanguage($language){
        return redirect()->back();
    }

}
