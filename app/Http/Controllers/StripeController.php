<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Order;
use App\Payment;

class StripeController extends Controller
{
    public function stripe(){
        return view('front-end.stripe.stripe');
    }

    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => Session::get('totalPrice') * Session::get('totalPrice'),
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Test payment from Ruiz Shop." 
        ]);
  
        $order = Order::findOrFail(Session::get('order_id'));
        $order->status = 'confirmed';
        $order->save();

        $payment = Payment::findOrFail(Session::get('payment_id'));
        $payment->status = 'confirmed';
        $payment->save();

        Session::forget('payment_id');
        Session::forget('order_id');
        Session::forget('price');
        Session::forget('totalPrice');
          
        return redirect('/')->with('message', 'Your Payment successful! check your mail');
    }
}
