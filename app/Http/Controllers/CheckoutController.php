<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Cart;
use Auth;
use Mail;
use App\DeliveryCharge;
use App\Order;
use App\OrderDetail;
use App\OrderShipping;
use App\Payment;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::count()==0) {
            return view('front-end.checkout.alert');
        }
        $cartProducts = Cart::content();
        return view('front-end.checkout.checkout',[
            'cartProducts' => $cartProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required | string',
            'last_name' => 'required | string',
            'phone' => 'required | numeric',
            'email' => 'required | email',
            'address' => 'required | string',
            'post_office' => 'required | string',
            'post_code' => 'required | numeric',
            'thana' => 'required | string',
            'district' => 'required | string',
            'payment_type' => 'required',
            'delivery_charge_id' => 'required'
        ]);

        $data = $request->except('_token','delivery_charge_id', 'payment_type');

      
        $paymentType = $request->payment_type;

        $order = $this->saveOrder($request->delivery_charge_id);
        $this->saveOrderShipping($order->id, $data);

        $payment = new Payment;
        $payment->order_id = $order->id;
        $payment->type = $paymentType;
        $payment->save();

        $this->saveOrderDetails($order->id);

        if ($paymentType == 'cash') {
           Session::forget('price');
           Session::forget('totalPrice');

           return redirect('/')->with('message', 'Wow! Your order successfully done. Please check your email');
 
        }
        if ($paymentType == 'stripe') {
            Session::put('order_id', $order->id);
            Session::put('payment_id', $payment->id);
            return redirect('/stripe');
        }
    }



    /**
    * @param int $id = delivery_charge_id
    */
    protected function saveOrder($id){
        $today = date("Ymdhs");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $order_number = 'ORD' . $today . $rand;
        Session::put('orderNumber', $order_number);


        $delivery_charge = DeliveryCharge::findOrFail($id);
        $price = Session::get('price') + $delivery_charge->value;
        
        if (Session::get('coupons')) {
            if (Session::get('coupons')->type == 'percent') {
                $discount = Session::get('price') * Session::get('coupons')->value / 100;
            }
            else{
                $discount = Session::get('coupons')->value;
            }
            $price -= $discount;   
        }

        Session::put('totalPrice', $price);
     
        if (Session::get('coupons')) {
            $order = new Order;
            $order->order_number = $order_number;
            $order->user_id = Auth::user()->id;
            $order->coupon_id = Session::get('coupons')->id;
            $order->delivery_charge_id = $delivery_charge->id;
            $order->price = $price;
            $order->save();
        }else{
            $order = new Order;
            $order->order_number = $order_number;
            $order->user_id = Auth::user()->id;
            $order->delivery_charge_id = $delivery_charge->id;
            $order->price = $price;
            $order->save();
        }
        
        return $order;
    }

    /**
    *   @param int $id = order->id
    */
    protected function saveOrderDetails($id){
        $cartProducts = Cart::content();
        foreach ($cartProducts as $cartProduct) {
            $orderDetail = new OrderDetail;
            $orderDetail->oder_id = $id;
            $orderDetail->product_id = $cartProduct->id;
            $orderDetail->product_qty = $cartProduct->qty;
            $orderDetail->save();
        }

        Cart::destroy();
        Session::forget('coupons');
    }

    /**
    *   @param int $id = order->id
    *   @param array $data
    */
    protected function saveOrderShipping($id, $array){
        OrderShipping::create(array_merge($array, ['order_id' => $id]));

        $data['name'] = $array['first_name'].' '.$array['last_name'];
        $data['email'] = $array['email'];
        $data['address'] = $array['address'].', '.$array['post_office'].', '.$array['thana'].', '.$array['district'].'-'.$array['post_code'];
        $data['price'] = Session::get('totalPrice');
        $data['order_number'] = Session::get('orderNumber');
        Mail::send('mail.order', $data, function($message) use($data){
            $message->to($data['email']);
            $message->subject('Thanks for your Order');
        });

        Session::forget('orderNumber');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
