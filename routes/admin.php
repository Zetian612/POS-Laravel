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

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/inventory', [App\Http\Controllers\Admin\InventoryController::class, 'index'])->name('inventory');

Route::get('/sales', [App\Http\Controllers\Admin\SalesController::class, 'index'])->name('sales');