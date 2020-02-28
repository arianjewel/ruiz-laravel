<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use PDF;

class OrderController extends Controller
{

	//front-end

    public function frontOrderShow($id){
    	$order = Order::findOrFail($id);
    	return view('front-end.order.order', compact('order'));
    }


    //back-end

    public function orderShow(){
    	$orders = Order::latest()->get()->all();
    	return view('admin.order.orders', [
    		'orders' => $orders,
    	]);
    }

    public function orderSingle($id){
    	$order = Order::findOrFail($id);

    	return view('admin.order.order_single', [
    		'order' => $order,
    	]);
    }

    public function orderDelete($id){
    	$order = Order::findOrFail($id);
    	$order->delete();

    	return back()->with('message', 'Order deleted successfully!');
    }

    public function orderUpdate(Request $request){
    	$order = Order::findOrFail($request->id);
    	$order->status = $request->status;
    	$order->save();

    	$payment = Payment::findOrFail($request->payment_id);;
    	$payment->status = $request->payment_status;
    	$payment->save();

    	return back()->with('message', 'Order updated successfully!');
    }


    public function orderPdf($id){
        $order = Order::findOrFail($id);

        $pdf = PDF::loadView('admin.order.pdf',[
            'order' => $order,
        ]);

        return $pdf->stream($order->order_number.'.pdf');
    }
}
