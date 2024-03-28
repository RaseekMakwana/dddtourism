<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExtraController extends Controller
{
    public function diuContentDetail($slug,$type){
        $data['banner'] = DB::table('banner')->where(['category'=>'Front Page','state'=>'Super'])->get();
        $data['banner_type'] = "banner_with_left_bottom_content_position";
        if($type == "post"){
            $data['detail'] = DB::table('posts')->where('slug', $slug)->first();
        } elseif($type == "top-attraction"){
            $data['detail'] = DB::table('top_attraction')->where('slug', $slug)->first();
        }
        return view('site.diu.content',compact('data'));
    }

}
