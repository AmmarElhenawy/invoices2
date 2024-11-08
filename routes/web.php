<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Invoice2Controller;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InvoicesAttachmentController;
use App\Http\Controllers\ProController;
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
Route::resource('invoiceAttachment', InvoicesAttachmentController::class);
//error
// Route::get('/section/{id}', 'Invoice2Controller@getproducts');

Route::get('/section/{id}', [Invoice2Controller::class, 'getproducts']);
Route::get('/edit_invoice/{id}', [Invoice2Controller::class, 'edit']);
// Route::patch('/invoices/update', [Invoice2Controller::class, 'update']);
Route::patch('invoices/update/{id}', [Invoice2Controller::class, 'update'])->name('invoices.update');

Route::get('/invoiceDetail/{id}', [InvoiceDetailController::class, 'edit']);
Route::get('/view_file/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'view_attach'])->name('view_file');
Route::get('/download/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'download_attach'])->name('download');
Route::delete('delete_file', [InvoiceDetailController::class, 'destroy'])->name('delete_file');

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
