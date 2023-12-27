<?php

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

Route::resources([
    '/supplier' => 'SupplierController',
    '/product' => 'ProductController',
    '/stock' => 'StockController',
    '/transaction' => 'TransactionController',
    '/transaction/details' => 'TransactionDetailsController',
    '/transaction' => 'UnitController'
]);