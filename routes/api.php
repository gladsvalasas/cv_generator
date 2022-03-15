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

Route::middleware('auth:sanctum')->group(function (){
    Route::group(["prefix" => "languages"], function() {
        Route::delete("/delete/{id}",  [\App\Http\Controllers\LanguagesController::class, "delete"]);
    });
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken("APITOKEN");

    return ['token' => $token->plainTextToken];
});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(["prefix"=>"invites"], function(){
   Route::get("/checkInvite", [\App\Http\Controllers\CheckInviteController::class, "get"]);
   Route::post("/addInvite", [\App\Http\Controllers\CheckInviteController::class, "add"]);
});


