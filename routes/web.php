<?php

Use App\Http\Controllers\SupplierController;
Use App\Http\Controllers\ProductController;
Use App\Http\Controllers\StockController;
Use App\Http\Controllers\TransactionController;
Use App\Http\Controllers\TransactionDetailsController;
Use App\Http\Controllers\UnitController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function() {
    return view('login');
});

Route::get('/', function() {
    return view('dashboard');
});

Route::resource('/supplier', SupplierController::class);
Route::resource('/product', ProductController::class);
Route::resource('/stock', StockController::class);
Route::resource('/transaction', TransactionController::class);
Route::resource('/transaction/details', TransactionDetailsController::class);
Route::resource('/transaction', UnitController::class);