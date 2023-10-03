<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\student1;
use App\Http\Controllers\StudentController;
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

Route::resource('studentroute',StudentController::class);
Route::resource('companyroute',CompanyController::class);       //controller noo import v krrna hunda before use
Route::resource('productroute',ProductController::class);
// ethe brackets kyu hai
Route::get('getproducts/{companyidd}',[ProductController::class,'getproduct']);  //companyidd is just only var for storing incomping string query var value
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
