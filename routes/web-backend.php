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

// Route::get('/', function () {
//     return view('welcome');
// });

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

// shop


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('backend/home', [
            'productsCount' => App\Product::count(),
            'categoriesCount' => App\Category::count(),
        ]);
    });

    Route::resource('/products', 'ProductController');

    Route::get('/categories',         function () {
        return view('backend/categories/index');
    });
    Route::get('/categories/create',  function () {
        return view('backend/categories/create');
    });
    Route::get('/categories/edit',    function () {
        return view('backend/categories/edit');
    });
    Route::get('/orders',             function () {
        return view('backend/orders/index');
    });
    Route::get('/orders/show',        function () {
        return view('backend/orders/show');
    });
    Route::get('/users',              function () {
        return view('backend/users/index');
    });
    Route::get('/users/create',       function () {
        return view('backend/users/create');
    });
    Route::get('/users/edit',         function () {
        return view('backend/users/edit');
    });
});



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
