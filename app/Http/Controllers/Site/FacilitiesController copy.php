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
        $data['banner'] = DB::table('posts')->where('category_id', '8')->get();
        return view('site.facilities.index', compact('data'));
    }
    public function facilitiesHotels(){
        $data['banner'] = DB::table('posts')->where('category_id', '10')->get();
        return view('site.facilities.hotels', compact('data'));

    }
    public function facilitiesHospitals(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.hospitals', compact('data'));
    }
    public function facilitiesBarsAndLiquorShops(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.bars-and-liquor-shops', compact('data'));
    }
    public function facilitiesParkingSlot(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.parking-slot', compact('data'));
    }
    public function facilitiesPetrolPump(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.petrol-pump', compact('data'));
    }
    public function facilitiesPublicToilets(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.public-toilets', compact('data'));
    }
    public function facilitiesPublicWifi(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.public-wifi', compact('data'));
    }
    public function facilitiesSportFacilities(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.sport-facilities', compact('data'));
    }
    public function facilitiesRentABike(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.rent-a-bike', compact('data'));
    }
    public function facilitiesRentABicycle(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.rent-a-bicycle', compact('data'));
    }
    public function facilitiesTent(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.tent', compact('data'));
    }
    public function facilitiesEBusSchedule(){
        $data['banner'] = DB::table('posts')->where('category_id', '11')->get();
        return view('site.facilities.e-bus-schedule', compact('data'));
    }

    

}
