<?php

use App\Http\Controllers\Admin\CartController;
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
Route::get('product', [ProductController::class, 'list'])->name('products.list');
Route::post('product/{image}', [ProductController::class, 'details'])->name('products.details');
Route::get('cart', [CartController::class, 'index'])->name('cart');

Route::middleware(['auth','admin'])->group(function() {
    Route::get('/dashboard', [FrontendController::class, 'index']); 

    //Route::resource("/products", ProductController::class);
    Route::get('products', [ProductController::class, 'index'])->name('products');      
    
    Route::get('products/add', [ProductController::class, 'add'])->name('products.add');      
    Route::post('products/add/save', [ProductController::class, 'save'])->name('products.save');
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories');

    Route::get('categories/add', [CategoryController::class, 'add'])->name('categories.add');      
    Route::post('categories/add/save', [CategoryController::class, 'save'])->name('categories.save');
    Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});