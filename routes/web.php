<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\LandingController::class, "index"]);

Route::group(["prefix"=>"admin"], function (){
    Auth::routes(["register"=>env("APP_DEBUG", false)]);
});

Route::group(["prefix"=>"portal", "middleware" => ["auth", "auth.token"]], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get("/landing/settings", [\App\Http\Controllers\Portal\LandingAdminController::class, "index"])->name("landing.settings");

    Route::post("/profile/edit", [\App\Http\Controllers\HomeController::class, "edit"])->name("profile.edit");
});

