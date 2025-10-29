<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/index', function () {
        $nama = 'jay';
        $jurusan = 'TRPL';
        $asal = 'cibaduyut';
        return view('index', compact('nama','jurusan','asal'));
    });

    Route::get('/table', function () {
        return view('table');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // penanda hanya untuk admin (prefix)
    Route::prefix('admin')->middleware(['auth','iniAdmin'])->group(function(){
    Route::controller(FrontController::class)->group(function(){  // route percontroller
    Route::get('/dashboard','indexFront')->name('dashboard.admin');
    });

    Route::controller(CategoryController::class)->group(function(){
    Route::get('/Category','indexCategory')->name('index.category');
    Route::POST('/create-category', 'createCategory')->name('create.category');
    Route::PUT('/update-category', 'updateCategory')->name('update.category');
    Route::DELETE('/delete-category', 'deleteCategory')->name('delete.category');
    });

    Route::controller(UserController::class)->group(function(){
    Route::get('/user','indexUser')->name('user.admin');
    Route::post('/user-create','createUser')->name('user.create');
    });
});
