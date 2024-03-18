<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OtherFacilitiesController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PlaceToVisitAdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TentController;
use App\Http\Controllers\Site\BarsAndLiquorShopsController;
use App\Http\Controllers\Site\FacilitiesController;
use App\Http\Controllers\Site\HospitalController;
use App\Http\Controllers\Site\HotelsController;
use App\Http\Controllers\Site\ParkingPlaceController;
use App\Http\Controllers\Site\PetrolPumpController;
use App\Http\Controllers\Site\PlaceToVisitController;
use App\Http\Controllers\Site\PublicToiletsController;
use App\Http\Controllers\Site\PublicWifiController;
use App\Http\Controllers\Site\RentBicycleController;
use App\Http\Controllers\Site\RentBikeController;
use App\Http\Controllers\Site\SportFacilitiesController;
use App\Http\Controllers\Site\TentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("admin")->group(function(){
    Route::post('banner/get-data', [BannerController::class, 'getData'])->name('api.admin.banner.get.data');
    Route::post('posts/get-data', [PostsController::class, 'getData'])->name('api.admin.posts.get.data');
    Route::post('pages/get-data', [PagesController::class, 'getData'])->name('api.admin.pages.get.data');
    Route::post('categories/get-data', [CategoriesController::class, 'getData'])->name('api.admin.categories.get.data');
    Route::post('facilities/get-data', [OtherFacilitiesController::class, 'getData'])->name('api.admin.facilities.get.data');
    Route::post('hotel/get-data', [HotelController::class, 'getData'])->name('api.admin.hotel.get.data');
    Route::post('tent/get-data', [TentController::class, 'getData'])->name('api.admin.tent.get.data');
    Route::post('place-to-visit/get-data', [PlaceToVisitAdminController::class, 'getData'])->name('api.admin.tent.get.data');
});

Route::prefix("site")->group(function(){
    Route::post('hotel/get-data', [HotelsController::class, 'apiGetMasterData'])->name('api.site.facilities.hotel.getdata');
    Route::post('facilities/hospital/get-data', [HospitalController::class, 'apiGetMasterData'])->name('api.site.facilities.hospital.getdata');
    Route::post('facilities/bars-and-liquor-shops/get-data', [BarsAndLiquorShopsController::class, 'apiGetMasterData'])->name('api.site.facilities.barsandliquorshops.getdata');
    Route::post('facilities/petrol-pump/get-data', [PetrolPumpController::class, 'apiGetMasterData'])->name('api.site.facilities.petrolpump.getdata');
    Route::post('facilities/parking-places/get-data', [ParkingPlaceController::class, 'apiGetMasterData'])->name('api.site.facilities.parkingplaces.getdata');
    Route::post('facilities/public-toilets/get-data', [PublicToiletsController::class, 'apiGetMasterData'])->name('api.site.facilities.publictoilets.getdata');
    Route::post('facilities/sport-facilities/get-data', [SportFacilitiesController::class, 'apiGetMasterData'])->name('api.site.facilities.sportfacilities.getdata');
    Route::post('facilities/rent-a-bicycle/get-data', [RentBicycleController::class, 'apiGetMasterData'])->name('api.site.facilities.rentabicycle.getdata');
    Route::post('facilities/public-wifi/get-data', [PublicWifiController::class, 'apiGetMasterData'])->name('api.site.facilities.publicwifi.getdata');
    Route::post('facilities/rent-a-bike/get-data', [RentBikeController::class, 'apiGetMasterData'])->name('api.site.facilities.rentabike.getdata');
    Route::post('facilities/tent/get-data', [TentsController::class, 'apiGetMasterData'])->name('api.site.facilities.tent.getdata');
});
