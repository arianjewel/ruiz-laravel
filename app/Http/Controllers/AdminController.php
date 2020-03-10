<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function index(){

        $ordersCount = Cache::remember(
            'count.orders', 
            now()->addSeconds(30), 
            function (){
                return Order::all()->count();
            }
        );

    	$usersCount =  Cache::remember(
            'count.users', 
            now()->addSeconds(30), 
            function (){
                return User::all()->count();
            }
        );

        $productsCount =  Cache::remember(
            'count.products', 
            now()->addSeconds(30), 
            function (){
                return Product::all()->count();
            }
        );
 

        return view('admin.dashboard.dashboard', compact('ordersCount', 'usersCount', 'productsCount'));
    }

}
