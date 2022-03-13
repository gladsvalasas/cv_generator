<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix"=>"admin"], function (){
    Auth::routes(["register"=>true]);
});

Route::group(["prefix"=>"portal"], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get("/badgegenerator", [\App\Http\Controllers\Portal\BadgeGeneratorController::class, "index"])->name("badgegenerator")->middleware("company");
    Route::post("/profile/edit", [\App\Http\Controllers\HomeController::class, "edit"])->name("profile.edit");
});
