<?php

use App\Http\Controllers\Admin\DashboardAdmindController;
use App\Http\Controllers\Admin\UserRoleAdminController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\StatisticController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\ProfileAdminController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware'=>['auth','isAdmin']], function(){
    Route::get('/',[DashboardAdmindController::class, 'index'])->name('dashboard.index');
    Route::resource('/user-and-roles', UserRoleAdminController::class)
        ->except(['edit','update'])->names('user-and-roles');
    Route::resource('/slider', SliderController::class)->except('show')->names('slider');
    Route::resource('/category', CategoryController::class)->except('show')->names('category');
    Route::resource('/products', ProductController::class)->except('show')->names('products');
    Route::resource('/service', ServiceController::class)->except('show')->names('service');
    Route::resource('/faq', FaqController::class)->except('show')->names('faq');
    Route::resource('/statistic', StatisticController::class)->except('show')->names('statistic');
    Route::resource('/partner', PartnerController::class)->except('show')->names('partner');
    Route::resource('/message', MessageController::class)->only(['index','show','destroy'])->names('message');
    Route::resource('/blog', BlogController::class)->except('show')->names('blog');
    Route::resource('/about', AboutController::class)->except(['show','create','store',])->names('about');
    Route::resource('/contact-info', ContactInfoController::class)->except('show')->names('contact-info');
    Route::resource('/social', SocialController::class)->except('show')->names('social');
    Route::post('/storeRole',[UserRoleAdminController::class, 'storeRole'])->name('storeRole');
    Route::get('/profile',[ProfileAdminController::class, 'index'])->name('profile.index');
    Route::post('/profile',[ProfileAdminController::class, 'update'])->name('profile.update');
    Route::resource('/language',LanguageController::class)->except('show')->names('language');
    Route::put('/language-status/{id}',[LanguageController::class, 'languageStatus'])->name('language-status');
    Route::put('/social-status/{id}',[SocialController::class, 'status'])->name('social-status');
    Route::get('/clear', function () {
        Artisan::call('optimize:clear');
        dd("Cache cleared");
    });
}); 

Auth::routes();

