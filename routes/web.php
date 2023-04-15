<?php

use App\Http\Controllers\Admin\DashboardAdmindController;
use App\Http\Controllers\Admin\UserRoleAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix'=>'admin'], function(){
    Route::get('/',[DashboardAdmindController::class, 'index'])->name('dashboard.index');
    Route::resource('/user-and-roles', UserRoleAdminController::class)->except(['edit','update'])->names('user-and-roles');
});





