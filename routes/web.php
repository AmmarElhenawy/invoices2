<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Invoice2Controller;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProductsController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('invoices', Invoice2Controller::class);
Route::resource('sections', SectionController::class);
Route::resource('products', ProductsController::class);
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
