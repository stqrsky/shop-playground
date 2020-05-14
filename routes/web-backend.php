<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('backend/home', [
            'productsCount' => App\Product::count(),
            'categoriesCount' => App\Category::count(),
            'ordersCount' => App\Order::count(),
            'usersCount' => App\User::count(),
        ]);
    })->name('home');

    Route::resource('/products', 'ProductController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/orders', 'OrderController')->only(['index', 'show']);
    Route::resource('/users', 'UserController');
});
