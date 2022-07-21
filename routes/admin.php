<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->group(function () {

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/inventory', [App\Http\Controllers\Admin\InventoryController::class, 'index'])->name('inventory');

// Products
Route::get('/inventory/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('inventory.products');
// Route::get('/inventory/products/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('inventory.products.create');
Route::post('/inventory/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('inventory.products.store');
Route::get('/inventory/products/edit/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->name('inventory.products.edit');
Route::get('/inventory/products/update/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'postProductEdit'])->name('inventory.products.update');
Route::post('/inventory/products/delete/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('inventory.products.delete');

//Categories
Route::get('/inventory/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('inventory.categories');
Route::post('/inventory/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('inventory.categories.store');
Route::get('/inventory/categories/edit/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('inventory.categories.edit');
Route::post('/inventory/categories/update/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'postCategoryEdit'])->name('inventory.categories.update');
Route::post('/inventory/categories/delete/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('inventory.categories.delete');


Route::get('/sales', [App\Http\Controllers\Admin\SalesController::class, 'index'])->name('sales');
Route::post('/sales/store', [App\Http\Controllers\Admin\SalesController::class, 'store'])->name('sales.store');

});