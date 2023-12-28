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

use App\Http\Controllers\GlobalController;



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
    '/unit' => 'UnitController'
]);

Route::get("/test-uuid", function() {
    $uuid = GlobalController::createUuid();
    print_r($uuid);
    return $uuid;
});


Route::get("/test-variable/{name?}", function($name) {
    return $name;
});