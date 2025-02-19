<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function(){
    Route::get('/index', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    Route::get('/status/{id}', [CategoryController::class, 'status'])->name('status');
});
