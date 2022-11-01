<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;
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

Route::get('/', function () {
    return view('layouts.app');
})->name('app');
//Route::get('/main', 'App\Http\Controllers\Controller@main')->name('app');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','admin'])->group(function() {
    Route::get('/dashboard', [FrontendController::class, 'index']); 

    Route::get('products', [ProductController::class, 'index'])->name('products');      
    Route::get('add-products', [ProductController::class, 'add']);      
    Route::get('add-products/save', [ProductController::class, 'save'])->name('products.save');
    
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-categories', [CategoryController::class, 'add']);
    Route::get('add-categories/save', [CategoryController::class, 'save']);
});