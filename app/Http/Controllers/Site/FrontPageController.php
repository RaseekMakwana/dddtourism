<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontPageController extends Controller
{
    public $segment1;
    public function __construct() {
        $this->segment1 = request()->segment(1);
    }

    public function index(){
        $data['banner'] = DB::table('banner')->where(['category'=>'Front Page','state'=>'Super'])->get();
        $data['banner_type'] = "banner_with_left_bottom_content_position";
        return view('site.main.front_page',compact('data'));
    }
    public function diuFrontPage(Request $request){
        // echo __('messages.places_to_visit');
        $data['banner'] = DB::table('banner')->where(['category'=>'Front Page','state'=>'Diu'])->get();
        $data['banner_type'] = "banner_with_left_bottom_content_position";
        
        $data['intro'] = DB::table('posts')->where(['id'=>'53'])->first();
        $data['top_attraction'] = DB::table('top_attraction')->where(['state'=>'Diu'])->get();

        return view('site.diu.front_page',compact('data'));
    }

}
