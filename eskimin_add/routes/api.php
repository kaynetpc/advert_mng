<?php

use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\BannerResource;
use App\Models\Advertisement;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**Add Advertisement */
Route::get("/advert", function(){
    $advert = Advertisement::all();
    return AdvertisementResource::collection($advert);
});


//** Add new Advert */
Route::post('/advert', function (Request $request){
    return Advertisement::create([        
        'addId' => $request->addId,
        'name' => $request->name,
        'dateFrom' => $request->dateFrom,
        'dateTo' => $request->dateTo,
        'totalBudget' => $request->totalBudget,
        'dailyBudget' => $request->dailyBudget,
        'description' => $request->description,
        'bannerImage' => $request->bannerImage,
    ]);
});

/** Delete Advert */
Route::delete('/advert/del/{addId}', function($addId){
    DB::table('advertisements')->where('addId', $addId)->delete();
    DB::table('banners')->where('addId', $addId)->delete();
    return 204;
});

//** Get Banner */
Route::get("/banner", function(){
    $banner = Banner::all();
    return AdvertisementResource::collection($banner);
});

/** get single Banner */
Route::get('/banner/get/{addId}', function($addId){
    return Banner::addId($addId);
});

/** Add Banner */
Route::post('/banner', function(Request $request){
    return Banner::create([
        'addId' => $request->addId,
        'imgId' => $request->imgId,
        'name' => $request->name,
    ]);
});

/** Delete Banner */
Route::delete('/banner/del/{addId}', function($addId){
    DB::table('banners')->where('addId', $addId)->delete();
    return 204;
});

/** Update Banner */
// Route::put('/banner/{addId}', function($addId){
//     DB::table('banners')->where('addId', $addId)->update();
//     return Banner::create([
//         'addId' => $request->addId,
//         'imgId' => $request->imgId,
//         'name' => $request->name,
//     ]);
// });






