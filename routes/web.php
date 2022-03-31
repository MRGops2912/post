<?php

use Illuminate\Support\Facades\Rouse;
use  App\Http\Controllers\user;
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

    Route::view('/','login');
   // Route::get('/master','master');
   Route::resource('user', user::class)->middleware('auth');
   Route::post('logout',[user::class,'delete']);
