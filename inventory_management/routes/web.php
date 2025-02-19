<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'category', 'as' => 'category.'], function(){
//     Route::get('/index', [CategoryController::class, 'index'])->name('index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('create');
//     Route::post('/store', [CategoryController::class, 'store'])->name('store');
//     Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
//     Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
//     Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
//     Route::get('/status/{id}', [CategoryController::class, 'status'])->name('status');
// });


Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/status/{id}', 'status')->name('status');
});

Route::controller(ProductController::class)->prefix('product')->name('product.')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/status/{id}', 'status')->name('status');
});
