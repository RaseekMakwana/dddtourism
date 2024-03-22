<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\OtherFacilitiesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PhotoGalleryAdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TentController;
use App\Http\Controllers\Admin\PlaceToVisitAdminController;
use App\Http\Controllers\Admin\VideoGalleryAdminController;
use App\Http\Controllers\Site\BarsAndLiquorShopsController;
use App\Http\Controllers\Site\FacilitiesController;
use App\Http\Controllers\Site\FrontPageController;
use App\Http\Controllers\Site\HospitalController;
use App\Http\Controllers\Site\HotelsController;
use App\Http\Controllers\Site\MediaGalleryController;
use App\Http\Controllers\Site\ParkingPlaceController;
use App\Http\Controllers\Site\PetrolPumpController;
use App\Http\Controllers\Site\PlaceToVisitController;
use App\Http\Controllers\Site\PublicToiletsController;
use App\Http\Controllers\Site\PublicWifiController;
use App\Http\Controllers\Site\RentBicycleController;
use App\Http\Controllers\Site\RentBikeController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\SportFacilitiesController;
use App\Http\Controllers\Site\TentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['preferred.language'])->group(function(){
    Route::get('/', [FrontPageController::class, 'index'])->name('site.frontpage');
    Route::get('place-to-visit', [PlaceToVisitController::class, 'index'])->name('site.place.to.visit');
    Route::get('facilities', [FacilitiesController::class, 'index'])->name('site.facilities');
    Route::get('screen-reader-access', [SiteController::class, 'screenReaderAccess'])->name('site.screen.reader.access');
    Route::get('contact', [SiteController::class, 'contact'])->name('site.contact');

    Route::get('/set-language/{locale}', function ($locale) {
        session(['locale' => $locale]);
        return back();
    })->name('setLanguage');

    Route::prefix("diu")->group(function(){
        Route::get('/', [FrontPageController::class, 'diuFrontPage'])->name('site.diu.index');

        Route::get('place-to-visit', [PlaceToVisitController::class, 'diuPlaceToVisit'])->name('site.diu.place.to.visit');
        Route::get('place-to-visit/{section}/{details_page}', [PlaceToVisitController::class, 'placeToVisitDetails'])->name('site.diu.place.to.visit.detail');

        Route::get('media-gallery', [MediaGalleryController::class, 'pageMediaGallery'])->name('site.diu.media.gallery');
        Route::get('media-gallery-detail/{id}', [MediaGalleryController::class, 'photoGalleryDetail'])->name('site.diu.media.gallery.details');

        Route::get('facilities', [FacilitiesController::class, 'index'])->name('site.diu.facilities');
        Route::get('facilities/hotels', [HotelsController::class, 'index'])->name('site.diu.facilities.hotels');
        Route::get('facilities/hospitals', [HospitalController::class, 'index'])->name('site.diu.facilities.hospitals');
        Route::get('facilities/bars-and-liquor-shops', [BarsAndLiquorShopsController::class, 'index'])->name('site.diu.facilities.bars.and.liquor.shops');
        Route::get('facilities/petrol-pump', [PetrolPumpController::class, 'index'])->name('site.diu.facilities.petrol.pump');
        Route::get('facilities/parking-places', [ParkingPlaceController::class, 'index'])->name('site.diu.facilities.parking_places');
        Route::get('facilities/public-toilets', [PublicToiletsController::class, 'index'])->name('site.diu.facilities.public.toilets');
        Route::get('facilities/sport-facilities', [SportFacilitiesController::class, 'index'])->name('site.diu.facilities.sport.facilities');
        Route::get('facilities/rent-a-bicycle', [RentBicycleController::class, 'index'])->name('site.diu.facilities.rent.a.bicycle');
        Route::get('facilities/public-wifi', [PublicWifiController::class, 'index'])->name('site.diu.facilities.free.public.wifi');
        Route::get('facilities/rent-a-bike', [RentBikeController::class, 'index'])->name('site.diu.facilities.rent.a.bike');
        Route::get('facilities/tents', [TentsController::class, 'index'])->name('site.diu.facilities.tent');
        Route::get('facilities/e-bus-schedule', [FacilitiesController::class, 'facilitiesEBusSchedule'])->name('site.diu.facilities.e.bus.schedule');
    });
});


Route::prefix("admin")->group(function(){

    Route::get('/', [AuthenticationController::class, 'login'])->name('admin');
    Route::post('authentication/verification', [AuthenticationController::class, 'verification'])->name('admin.verification');
    Route::get('log-out', [AuthenticationController::class, 'logout'])->name('admin.logout');
    Route::get('change-password', [AuthenticationController::class, 'changePassword'])->name('admin.change.password');
    Route::post('authentication/update-password', [AuthenticationController::class, 'updatePassword'])->name('admin.update.password');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // POSTS
        Route::get('posts', [PostsController::class, 'index'])->name('admin.posts.index');
        Route::get('posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
        Route::post('posts/store', [PostsController::class, 'store'])->name('admin.posts.store');
        Route::get('posts/edit/{id}', [PostsController::class, 'edit'])->name('admin.posts.edit');
        Route::post('posts/update', [PostsController::class, 'update'])->name('admin.posts.update');
        Route::get('posts/destroy/{id}', [PostsController::class, 'destroy'])->name('admin.posts.destroy');

        // PAGES
        Route::get('pages', [PagesController::class, 'index'])->name('admin.pages.index');
        Route::get('pages/create', [PagesController::class, 'create'])->name('admin.pages.create');
        Route::post('pages/store', [PagesController::class, 'store'])->name('admin.pages.store');
        Route::get('pages/edit/{id}', [PagesController::class, 'edit'])->name('admin.pages.edit');
        Route::post('pages/update', [PagesController::class, 'update'])->name('admin.pages.update');
        Route::get('pages/destroy/{id}', [PagesController::class, 'destroy'])->name('admin.pages.destroy');

        // PLACE TO VISIT
        Route::get('place-to-visit', [PlaceToVisitAdminController::class, 'index'])->name('admin.place.visit.index');
        Route::get('place-to-visit/create', [PlaceToVisitAdminController::class, 'create'])->name('admin.place.visit.create');
        Route::post('place-to-visit/store', [PlaceToVisitAdminController::class, 'store'])->name('admin.place.visit.store');
        Route::get('place-to-visit/edit/{id}', [PlaceToVisitAdminController::class, 'edit'])->name('admin.place.visit.edit');
        Route::post('place-to-visit/update', [PlaceToVisitAdminController::class, 'update'])->name('admin.place.visit.update');
        Route::get('place-to-visit/destroy/{id}', [PlaceToVisitAdminController::class, 'destroy'])->name('admin.place.visit.destroy');

        // PHOTO GALLERY
        Route::get('photo-gallery', [PhotoGalleryAdminController::class, 'index'])->name('admin.photo.gallery.index');
        Route::get('photo-gallery/create', [PhotoGalleryAdminController::class, 'create'])->name('admin.photo.gallery.create');
        Route::post('photo-gallery/store', [PhotoGalleryAdminController::class, 'store'])->name('admin.photo.gallery.store');
        Route::get('photo-gallery/edit/{id}', [PhotoGalleryAdminController::class, 'edit'])->name('admin.photo.gallery.edit');
        Route::post('photo-gallery/update', [PhotoGalleryAdminController::class, 'update'])->name('admin.photo.gallery.update');
        Route::get('photo-gallery/destroy/{id}', [PhotoGalleryAdminController::class, 'destroy'])->name('admin.photo.gallery.destroy');

        // VIDEO GALLERY
        Route::get('video-gallery', [VideoGalleryAdminController::class, 'index'])->name('admin.video.gallery.index');
        Route::get('video-gallery/create', [VideoGalleryAdminController::class, 'create'])->name('admin.video.gallery.create');
        Route::post('video-gallery/store', [VideoGalleryAdminController::class, 'store'])->name('admin.video.gallery.store');
        Route::get('video-gallery/edit/{id}', [VideoGalleryAdminController::class, 'edit'])->name('admin.video.gallery.edit');
        Route::post('video-gallery/update', [VideoGalleryAdminController::class, 'update'])->name('admin.video.gallery.update');
        Route::get('video-gallery/destroy/{id}', [VideoGalleryAdminController::class, 'destroy'])->name('admin.video.gallery.destroy');

        // CATEGORIES
        // Route::get('categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
        // Route::get('categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        // Route::post('categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
        // Route::get('categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        // Route::post('categories/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
        // Route::get('categories/destroy/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

        // FACILITIES
        Route::get('facilities/{module}', [OtherFacilitiesController::class, 'index'])->name('admin.facilities.index');
        Route::get('facilities/{module}/create', [OtherFacilitiesController::class, 'create'])->name('admin.facilities.create');
        Route::post('facilities/{module}/store', [OtherFacilitiesController::class, 'store'])->name('admin.facilities.store');
        Route::get('facilities/{module}/edit/{id}', [OtherFacilitiesController::class, 'edit'])->name('admin.facilities.edit');
        Route::post('facilities/{module}/update', [OtherFacilitiesController::class, 'update'])->name('admin.facilities.update');
        Route::get('facilities/{module}/destroy/{id}', [OtherFacilitiesController::class, 'destroy'])->name('admin.facilities.destroy');

        // BANNER
        Route::get('banner', [BannerController::class, 'index'])->name('admin.banner.index');
        Route::get('banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
        Route::post('banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::post('banner/update', [BannerController::class, 'update'])->name('admin.banner.update');
        Route::get('banner/destroy/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');

        // HOTELS
        Route::get('hotel', [HotelController::class, 'index'])->name('admin.hotel.index');
        Route::get('hotel/create', [HotelController::class, 'create'])->name('admin.hotel.create');
        Route::post('hotel/store', [HotelController::class, 'store'])->name('admin.hotel.store');
        Route::get('hotel/edit/{id}', [HotelController::class, 'edit'])->name('admin.hotel.edit');
        Route::post('hotel/update', [HotelController::class, 'update'])->name('admin.hotel.update');
        Route::get('hotel/destroy/{id}', [HotelController::class, 'destroy'])->name('admin.hotel.destroy');

        // TENTS
        Route::get('tent', [TentController::class, 'index'])->name('admin.tent.index');
        Route::get('tent/create', [TentController::class, 'create'])->name('admin.tent.create');
        Route::post('tent/store', [TentController::class, 'store'])->name('admin.tent.store');
        Route::get('tent/edit/{id}', [TentController::class, 'edit'])->name('admin.tent.edit');
        Route::post('tent/update', [TentController::class, 'update'])->name('admin.tent.update');
        Route::get('tent/destroy/{id}', [TentController::class, 'destroy'])->name('admin.tent.destroy');
    });
});



