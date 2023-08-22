<?php

use App\Http\Controllers\Admin\DashboardAdmindController;
use App\Http\Controllers\Admin\UserRoleAdminController;
use App\Http\Controllers\Backend\AltCategoryController;
use App\Http\Controllers\Backend\AltSubCategoryController;
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
use App\Http\Controllers\TestController;

Route::get('auth/google', [TestController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [TestController::class, 'handleGoogleCallback']);
//Route::resource("test", TestController::class);

Route::group(['prefix' =>LaravelLocalization::setLocale().'/admin', 'middleware' => ['auth', 'isAdmin']], function () {
//    Route::get('/dil', function () {
//        return redirect('/admin/dil');
//    });

    Route::get('/', [DashboardAdmindController::class, 'index'])->name('dashboard.index');
    Route::resource('/user-and-roles', UserRoleAdminController::class)
        ->except(['edit', 'update'])->names('user-and-roles');
    Route::resource('/slider', SliderController::class)->except('show')->names('slider');
    Route::resource('/brand', \App\Http\Controllers\Backend\BrandController::class)->except('show')->names('brand');
    Route::resource('/category', CategoryController::class)->except('show')->names('category');
    Route::resource('/alt-category', AltCategoryController::class)->names('alt-category');
    Route::resource('/alt-sub-category', AltSubCategoryController::class)->except(['index','show'])->names('alt-sub-category');
    Route::resource('/products', ProductController::class)->except('show')->names('products');
    Route::resource('/service', ServiceController::class)->except('show')->names('service');
    Route::resource('/faq', FaqController::class)->except('show')->names('faq');
    Route::resource('/statistic', StatisticController::class)->except('show')->names('statistic');
    Route::resource('/partner', PartnerController::class)->except('show')->names('partner');
    Route::resource('/message', MessageController::class)->only(['index', 'show', 'destroy'])->names('message');
    Route::resource('/blog', BlogController::class)->except('show')->names('blog');
    Route::resource('/about', AboutController::class)->except(['show', 'create', 'store',])->names('about');
    Route::resource('/contact-info', ContactInfoController::class)->except('show')->names('contact-info');
    Route::resource('/language', LanguageController::class)->except('show')->names('language');
    Route::resource('/social', SocialController::class)->except('show')->names('social');
    Route::post('/storeRole', [UserRoleAdminController::class, 'storeRole'])->name('storeRole');
    Route::get('/profile', [ProfileAdminController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileAdminController::class, 'update'])->name('profile.update');
    Route::put('/language-status/{id}', [LanguageController::class, 'languageStatus'])->name('language-status');
    Route::put('/social-status/{id}', [SocialController::class, 'status'])->name('social-status');
    Route::get('/clear', function () {
        Artisan::call('optimize:clear');
        dd("Cache cleared");
    });
});

Route::group(['prefix' =>LaravelLocalization::setLocale()], function () {
    Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home.index');
    Route::get('/product', [\App\Http\Controllers\Frontend\ProductController::class, 'show'])
        ->name('product.show');
    Route::get('/category/{slug}/', [\App\Http\Controllers\Frontend\AltSubCategoryController::class, 'show'])
        ->name('category.show');
    Route::get('/category/{slug}/sort', [\App\Http\Controllers\Frontend\AltSubCategoryController::class, 'sort'])
        ->name('category.sort');
    Route::get('/news',[\App\Http\Controllers\Frontend\NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{id}',[\App\Http\Controllers\Frontend\NewsController::class, 'show'])->name('news.show');
    Route::get('/news/show',[\App\Http\Controllers\Frontend\NewsController::class, 'test']);
    Route::get('/contact-us',[\App\Http\Controllers\Frontend\ContactUsController::class, 'index'])->name('contact-us.index');
    Route::post('/contact-us',[\App\Http\Controllers\Frontend\ContactUsController::class, 'store'])->name('contact-us.store');
    Route::get('/faq',[\App\Http\Controllers\Frontend\FaqController::class, 'index'])->name('frontend.faq.index');
    Route::get('/my-account',[\App\Http\Controllers\Frontend\MyAccountController::class, 'index'])->name('my-account.index')
            ->middleware("guest");
    Route::resource('/comments', \App\Http\Controllers\Frontend\CommentController::class)
        ->except('index','show','create')->names('comments');
});

//
//Route::get('/admin/dil', function () {
//    return back();
//});

Auth::routes();

