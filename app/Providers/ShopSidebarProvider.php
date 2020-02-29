<?php

namespace App\Providers;

use App\Category;
use View;
use Illuminate\Support\ServiceProvider;

class ShopSidebarProvider extends ServiceProvider
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
        View::composer('front-end.shop.side-bar', function ($view){
            $categories = Category::with('children')->whereNull('parent_id')->where('cat_status',1)->get();

            $view->with('categories', $categories);
        });
    }
}
