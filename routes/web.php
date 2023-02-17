<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\FamousPlaceController;
use App\Http\Controllers\Admin\UploadController;



Route::get('admin/users/login',[LoginController::class,'index'])->name('login');
Route::get('admin/users/login/store',[LoginController::class,'store']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('/', [MainController::class, 'index']);

Route::prefix('admin')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('admin');

    #Province
    Route::prefix('province')->group(function () {
        Route::get('add', [ProvinceController::class, 'create']);
        Route::post('add', [ProvinceController::class, 'store']);
        Route::get('list', [ProvinceController::class, 'index']);
        Route::get('edit/{province}', [ProvinceController::class, 'show']);
        Route::post('edit/{province}', [ProvinceController::class, 'update']);
        Route::DELETE('destroy', [ProvinceController::class, 'destroy']);
    });

    #FamousPlace
    Route::prefix('famousplace')->group(function () {
        Route::get('add', [FamousPlaceController::class, 'create']);
        Route::post('add', [FamousPlaceController::class, 'store']);
        Route::get('list', [FamousPlaceController::class, 'index']);
        Route::get('edit/{famousplace}', [FamousPlaceController::class, 'show']);
        Route::post('edit/{famousplace}', [FamousPlaceController::class, 'update']);
        Route::DELETE('destroy', [FamousPlaceController::class, 'destroy']);
    });

    #Upload
    Route::post('upload/services', [UploadController::class, 'store']);


});


