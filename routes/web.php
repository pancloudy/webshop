<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\OrdersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\SuperAdmin;
use App\Http\Controllers\SuperAdminController;

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
    return view('home');
})->name('app');
//Route::get('/main', 'App\Http\Controllers\Controller@main')->name('app');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('search', [App\http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('product', [ProductController::class, 'list'])->name('products.list');
Route::post('product/{slug}/{image}', [ProductController::class, 'details'])->name('products.details');

Route::get('category', [CategoryController::class, 'list'])->name('categories.list');
Route::get('category/list', [CategoryController::class, 'select'])->name('categories-products-list');


Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/save', [CartController::class, 'save'])->name('cart.save');
Route::delete('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

Route::post('order/save', [OrdersController::class, 'save'])->name('order.save');
Route::get('order/new', [OrdersController::class, 'new'])->name('order.new');
Route::get('order/history', [OrdersController::class, 'history'])->name('order.history');


Route::middleware(['auth','admin'])->group(function() {
    Route::get('/dashboard', [FrontendController::class, 'index']); 


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

   
    Route::get('orders', [OrdersController::class, 'index'])->name('orders');
    Route::post('orders/status', [OrdersController::class, 'status'])->name('orders.status');
});

Route::get('users', [SuperAdminController::class, 'index'])->name('users.index');
Route::post('users', [SuperAdminController::class, 'search'])->name('users.search');
Route::post('users', [SuperAdminController::class, 'role'])->name('users.role');