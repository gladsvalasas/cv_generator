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
Route::group(["middleware" => ["auth:sanctum"], "prefix" => "landing"], function (){
    Route::post("/main/save", [\App\Http\Controllers\Api\LandingApiController::class, "saveMain"]);
    Route::post("/stack/save", [\App\Http\Controllers\Api\LandingApiController::class, "saveStack"]);
    Route::post("/portfolio/save", [\App\Http\Controllers\Api\LandingApiController::class, "savePortfolio"]);
    Route::post("/links/save", [\App\Http\Controllers\Api\LandingApiController::class, "saveLinks"]);

    Route::delete("/stack/delete/{id}", [\App\Http\Controllers\Api\LandingApiController::class, "deleteStack"]);
    Route::delete("/portfolio/delete/{id}", [\App\Http\Controllers\Api\LandingApiController::class, "deletePortfolio"]);
    Route::delete("/links/delete/{id}", [\App\Http\Controllers\Api\LandingApiController::class, "deleteLinks"]);
});


