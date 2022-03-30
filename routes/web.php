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

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix"=>"admin"], function (){
    Auth::routes(["register"=>true]);
});

Route::group(["prefix"=>"portal", "middleware" => ["auth", "auth.token"]], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/employment', [App\Http\Controllers\Portal\EmploymentController::class, 'index'])->name('employment');
    Route::get('/education', [App\Http\Controllers\Portal\EducationController::class, 'index'])->name('education');
    Route::get('/links', [\App\Http\Controllers\Portal\SocialController::class, 'index'])->name('links');
    Route::get('/skills', [App\Http\Controllers\Portal\SkillsController::class, 'index'])->name('skills');
    Route::get('/languages', [App\Http\Controllers\Portal\LanguagesController::class, 'index'])->name('languages');
    Route::get('/cv', [App\Http\Controllers\Portal\ResumeController::class, 'index'])->name('cv');

    Route::get("/badgegenerator", [\App\Http\Controllers\Portal\BadgeGeneratorController::class, "index"])->name("badgegenerator")->middleware("company");

    Route::post("/profile/edit", [\App\Http\Controllers\HomeController::class, "edit"])->name("profile.edit");
});

