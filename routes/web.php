<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Invoice2Controller;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InvoicesAttachmentController;
use App\Http\Controllers\InvoiceArchiveController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\Exports;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\HomeController;


//copy with you in all projects
Route::get('/', function () {
    return view('auth.login');
});
//with you in all projects



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('invoices', Invoice2Controller::class);
Route::resource('sections', SectionController::class);
Route::resource('products', ProductsController::class);
Route::resource('invoiceAttachment', InvoicesAttachmentController::class);
Route::resource('invoiceArchive', InvoiceArchiveController::class);
//error
// Route::get('/section/{id}', 'Invoice2Controller@getproducts');

Route::get('/section/{id}', [Invoice2Controller::class, 'getproducts']);
// Route::patch('/invoices/update', [Invoice2Controller::class, 'update']);
Route::get('/edit_invoice/{id}', [Invoice2Controller::class, 'edit']);
Route::get('/status_invoice/{id}', [Invoice2Controller::class, 'show']);
Route::get('/invoiceTemp/{id}', [Invoice2Controller::class, 'print_show']);
Route::patch('invoices/update/{id}', [Invoice2Controller::class, 'update'])->name('invoices.update');
Route::delete('invoices/destroy/{id}', [Invoice2Controller::class, 'destroy'])->name('invoices.destroy');
Route::post('status_update/{id}', [Invoice2Controller::class, 'status_update'])->name('status_update');

Route::get('/invoicePaid', [Invoice2Controller::class, 'showPaid']);
Route::get('/invoiceUnPaid', [Invoice2Controller::class, 'showUnPaid']);
Route::get('/partially', [Invoice2Controller::class, 'partially']);

Route::patch('invoicesArchive/update/{id}', [InvoiceArchiveController::class, 'update'])->name('invoicesArchive.update');
Route::delete('invoicesArchive/destroy/{id}', [InvoiceArchiveController::class, 'destroy'])->name('invoicesArchive.destroy');

Route::get('/invoiceDetail/{id}', [InvoiceDetailController::class, 'edit']);
Route::get('/view_file/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'view_attach'])->name('view_file');
Route::get('/download/{invoice_number}/{file_name}', [InvoiceDetailController::class, 'download_attach'])->name('download');
Route::delete('delete_file', [InvoiceDetailController::class, 'destroy'])->name('delete_file');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
//copy with you in all projects
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//with you in end  in all projects
