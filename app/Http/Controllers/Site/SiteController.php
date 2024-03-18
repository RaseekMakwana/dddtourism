<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Helpers\APIResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function screenReaderAccess(){
        $data['banner'] = DB::table('banner')->where(['id'=>'40'])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.screen-reader-access', compact('data'));
    }
    public function contact(){
        $data['banner'] = DB::table('banner')->where(['id'=>'41'])->get();
        $data['banner_type'] = "banner_with_center_content_position";
        return view('site.contact', compact('data'));
    }

}
