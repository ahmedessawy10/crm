<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\RequestJoinController;
use App\Http\Controllers\SponsorRequestController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/', [MainController::class, "home"])->name("home");
    Route::get("program/{id}", [MainController::class, "getProgram"])->name("getprogram");

});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::post('/request-join', [RequestJoinController::class, 'store'])->name('request.join.store');
Route::post('/sponsors', [SponsorRequestController::class, 'store'])->name('sponsors.store');
