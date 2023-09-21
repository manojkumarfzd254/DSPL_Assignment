<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostMethodController;
use App\Http\Controllers\AjaxMethodController;
use App\Http\Controllers\DialerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post_methods', PostMethodController::class);
Route::resource('ajax_methods', AjaxMethodController::class);
Route::get('ajax_method/index_data', [AjaxMethodController::class,'index_data'])->name('ajax_methods.index_data');
Route::get('dialer', [DialerController::class,'index'])->name('dialer.index');
Route::post('dialer/makePhoneCall', [DialerController::class,'makePhoneCall'])->name('dialer.makePhoneCall');

