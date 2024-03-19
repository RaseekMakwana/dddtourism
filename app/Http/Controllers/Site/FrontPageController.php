<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontPageController extends Controller
{
    public function index(){
        $data['banner'] = DB::table('banner')->where(['category'=>'Front Page','state'=>'Super'])->get();
        $data['banner_type'] = "banner_with_left_bottom_content_position";
        return view('site.main.front_page',compact('data'));
    }
    public function diuFrontPage(Request $request){
        // echo __('messages.places_to_visit');
        $data['banner'] = DB::table('banner')->where(['category'=>'Front Page','state'=>'Diu'])->get();
        $data['banner_type'] = "banner_with_left_bottom_content_position";
        return view('site.diu.front_page',compact('data'));
    }

}
