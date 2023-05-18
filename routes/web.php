<?php

use App\Http\Controllers\Admin\DashboardAdmindController;
use App\Http\Controllers\Admin\UserRoleAdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\ProfileAdminController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware'=>['auth','isAdmin']], function(){
    Route::get('/',[DashboardAdmindController::class, 'index'])->name('dashboard.index');
    Route::resource('/user-and-roles', UserRoleAdminController::class)
        ->except(['edit','update'])->names('user-and-roles');
    Route::resource('/blog', BlogController::class)->except('show')->names('blog');
    Route::post('/storeRole',[UserRoleAdminController::class, 'storeRole'])->name('storeRole');
    Route::get('/profile',[ProfileAdminController::class, 'index'])->name('profile.index');
    Route::post('/profile',[ProfileAdminController::class, 'update'])->name('profile.update');

    Route::get('/clear', function () {
        Artisan::call('optimize:clear');
        dd("Cache cleared");
    });
}); 

Auth::routes();

