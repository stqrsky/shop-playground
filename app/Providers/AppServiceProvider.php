<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ////before
        // View::share('categories', Category::all());

        try {
            View::share('categories', Category::all());
        } catch (\Exception $e) {
            // categories tables has not been created yet...
        }


        View::share('users', User::all());
        View::share('cartItems', session()->has('cart') ? count(session()->get('cart')) : 0);
    }
}
