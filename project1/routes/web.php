<?php

use App\Http\Controllers\student1;
use Illuminate\Support\Facades\Route;

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

//this can't be used for crud ...only for front-end view page 
Route::get('/', function () {
    return view('welcome');
});


//Use this type route only
Route::resource('first',student1::class);