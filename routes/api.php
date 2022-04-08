<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:sanctum', "prefix" => "endpoint"], function() {
    Route::get("/{method}/get/{id}", [\App\Http\Controllers\Api\EndpointsController::class, "get"]);
    Route::get("/{method}/all", [\App\Http\Controllers\Api\EndpointsController::class, "getAll"]);
    Route::post("/{method}/create/", [\App\Http\Controllers\Api\EndpointsController::class, "create"]);
    Route::post("/{method}/update/{id}", [\App\Http\Controllers\Api\EndpointsController::class, "update"]);
    Route::delete("/{method}/delete/{id}",  [\App\Http\Controllers\Api\EndpointsController::class, "delete"]);

});

Route::group(["middleware" => ["auth:sanctum"], "prefix" => "landing"], function (){
    Route::post("/main/save", [\App\Http\Controllers\Api\LandingApiController::class, "saveMain"]);
    Route::post("/stack/save", [\App\Http\Controllers\Api\LandingApiController::class, "saveStack"]);
    Route::post("/portfolio/save", [\App\Http\Controllers\Api\LandingApiController::class, "savePortfolio"]);
    Route::post("/links/save", [\App\Http\Controllers\Api\LandingApiController::class, "saveLinks"]);
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken("APITOKEN");

    return ['token' => $token->plainTextToken];
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(["prefix"=>"invites"], function(){
   Route::get("/checkInvite", [\App\Http\Controllers\Api\CheckInviteController::class, "get"]);
   Route::post("/addInvite", [\App\Http\Controllers\Api\CheckInviteController::class, "add"]);
});


