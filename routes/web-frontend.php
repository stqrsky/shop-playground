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


Route::get('/', function () {
    return view('frontend/home', [
        'products' => App\Product::take(4)->get()
    ]);
});


Route::get('/products/{product}',    'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::get('/cart', 'CartController@show');
Route::post('/cart/add', 'CartController@addToCart')->name('addToCart');
Route::patch('/cart/update', 'CartController@updateCart');
Route::delete('/cart/remove', 'CartController@removeFromCart');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/checkout/shipping', function () {
    return view('frontend/checkout/shipping');
});
Route::get('/checkout/payment', function () {
    return view('frontend/checkout/payment');
});

//Aufgabe
// Route::get('/products/{id}', function ($id) {
//     $products = [
//         'id1' => '10Liter Desinfektionsmittel',
//         'id2' => 'Maske',
//         'id3' => 'Toiletpaper'
//     ];
//     if (array_key_exists($id, $products)) {
//         return $products[$id];
//     }
//     abort(404);
// });

//Aufgabe
// Route::get('/', function () {
//     return view('welcome');
// });

//Aufgabe
// Route::get('/products', function () {
//     $products = [
//         'id1' => '10Liter Disinfectant',
//         'id2' => 'Maske',
//         'id3' => 'Toiletpaper',
//         'id4' => 'Socken',
//         'id5' => '5Kilo Nudeln',
//         'id6' => '30min Sonnenstrahlen',
//     ];
//     return view('products', ['products' => $products]);
// });

//Aufgabe
// Route::get('/', function () {
//     return view('frontend/home', [
//         'products' => App\Product::take(4)->get(),
//         'categories' => App\Category::all(),
//     ]);
// });

//Aufgabe
// Route::get('/products', function () {
//     return view('frontend/products', [
//         'products' => App\Product::all(),
//     ]);
// });
