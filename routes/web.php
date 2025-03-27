<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Tutorial 1
// Route::get('/download.invoice/{id}', [ProductController::class, 'DownloadProduct'])->name('download.invoice');

// Tutorial 2
Route::controller(App\Http\Controllers\ProductController::class)->group(function() {
    Route::get('/invoice', 'index');
    Route::get('/invoice/{productId}', 'viewInvoice');
    Route::get('/invoice/{productId}/generate', 'generateInvoice');
});