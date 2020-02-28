<?php

namespace App\Providers;

use App\Category;
use View;
use Cart;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('front-end.includes.header', function($view){
            $categories = Category::with('children')->whereNull('parent_id')->where('cat_status',1)->get();
            $cartProducts = Cart::content();
            $view->with(['categories' => $categories, 'cartProducts' => $cartProducts]);
        });
    }
}
