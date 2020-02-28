<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;

class AdminController extends Controller
{
    public function index(){
    	$orders = Order::all();
    	$users = User::all();
    	$products = Product::all();
        return view('admin.dashboard.dashboard', [
        	'orders' => $orders,
        	'users' => $users,
        	'products' => $products,
        ]);
    }

}
