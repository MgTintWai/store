<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('categories',[CategoryController::class,'index']);

Route::get('create-category',[CategoryController::class,'create']);

Route::post('create-category',[CategoryController::class,'store']);

Route::get('edit-category/{category}',[CategoryController::class,'edit']);

Route::post('edit-category/{category}',[CategoryController::class,'update']);

Route::get('delete-category/{category}',[CategoryController::class,'destroy']);

Route::resource('product', ProductController::class);

Auth::routes();

Route::get('categories',[CategoryController::class,'index'])->name('index');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
