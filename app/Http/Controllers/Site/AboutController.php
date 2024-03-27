<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(){
        $data['banner'] = DB::table('banner')->where(['category'=>'Front Page','state'=>'Super'])->get();
        $data['banner_type'] = "banner_with_left_bottom_content_position";
        return view('site.main.front_page',compact('data'));
    }
    public function diuAbout(Request $request){
        $data['banner'] = DB::table('banner')->where(['category'=>'About','state'=>'Diu'])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        $data['posts'] = DB::table('posts')->where('category_id','3')->where('state','Diu')->get();
        return view('site.diu.about',compact('data'));
    }

}
