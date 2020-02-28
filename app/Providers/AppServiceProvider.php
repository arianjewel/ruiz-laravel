<?php

namespace App\Providers;

use App\Category;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        View::composer('front-end.shop.side-bar', function ($view){
            $categories = Category::with('children')->whereNull('parent_id')->where('cat_status',1)->get();

            $view->with('categories', $categories);
        });
    }
}
