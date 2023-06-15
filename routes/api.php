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
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\SocialController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/slider',[SliderController::class, 'index']); 
Route::get('/category',[CategoryController::class, 'index']); 
Route::get('/service',[ServiceController::class, 'index']); 
Route::get('/faq',[FaqController::class, 'index']); 
Route::get('/statistic',[StatisticController::class, 'index']); 
Route::get('/partner',[PartnerController::class, 'index']); 
Route::get('/about',[AboutController::class, 'index']); 
Route::get('/contact-info',[ContactInfoController::class, 'index']); 
Route::get('/social',[SocialController::class, 'index']); 
Route::post('/message',[MessageController::class, 'store']); 
Route::apiResource('/blog',BlogController::class)->only(['index','show']); 
Route::apiResource('/products',ProductController::class)->only(['index','show']); 



