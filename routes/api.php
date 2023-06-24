<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\StatisticController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\SocialController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\SocialiteController;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->name('verification.verify');
Route::post('email/resend', [EmailVerificationController::class, 'resend'])
    ->name('verification.resend');
Route::post('password/forgot', [ForgotPasswordController::class, 'forgot']);
Route::post('password/reset', [ForgotPasswordController::class, 'reset']);
Route::middleware('api')->group(function () {
    Route::get('google/redirect', [SocialiteController::class, 'redirectToGoogle']);
    Route::get('google/callback', [SocialiteController::class, 'handleGoogleCallback']);
});

Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::get('/slider', [SliderController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/service', [ServiceController::class, 'index']);
    Route::get('/faq', [FaqController::class, 'index']);
    Route::get('/statistic', [StatisticController::class, 'index']);
    Route::get('/partner', [PartnerController::class, 'index']);
    Route::get('/about', [AboutController::class, 'index']);
    Route::get('/contact-info', [ContactInfoController::class, 'index']);
    Route::get('/social', [SocialController::class, 'index']);
    Route::post('/message', [MessageController::class, 'store']);
    Route::apiResource('/blog', BlogController::class)->only(['index', 'show']);
    Route::apiResource('/products', ProductController::class)->only(['index', 'show']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/slider',[SliderController::class, 'index']); 
// Route::get('/category',[CategoryController::class, 'index']); 
// Route::get('/service',[ServiceController::class, 'index']); 
// Route::get('/faq',[FaqController::class, 'index']); 
// Route::get('/statistic',[StatisticController::class, 'index']); 
// Route::get('/partner',[PartnerController::class, 'index']); 
// Route::get('/about',[AboutController::class, 'index']); 
// Route::get('/contact-info',[ContactInfoController::class, 'index']); 
// Route::get('/social',[SocialController::class, 'index']); 
// Route::post('/message',[MessageController::class, 'store']); 
// Route::apiResource('/products',ProductController::class)->only(['index','show']); 
// Route::apiResource('/blog',BlogController::class)->only(['index','show']);    
