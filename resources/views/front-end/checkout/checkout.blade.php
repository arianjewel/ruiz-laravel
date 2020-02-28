@extends('front-end.layout')

@section('title')
    Ruiz|Checkout
@endsection

@section('content')
	<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Checkout Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
                <div class="row">
                	<div class="col-lg-12">
                		<h3>If you buy something in previous or add billing address from your account. You will show it on your Billing Form.<br><strong style="color: green">You can edit the form if you want to ship in another address</strong></h3>
                	</div>
                    <div class="col">
                        <div class="coupon-area">
                            <!-- coupon-accordion start -->
                            <!-- coupon-accordion end -->
                            <!-- coupon-accordion start -->
                            <div class="coupon-accordion">
                                <h3>Have a coupon? <span class="coupon" id="showcoupon">Click here to enter your code</span></h3>
                                <div class="coupon-content" id="checkout-coupon">
                                    <div class="coupon-info">
                                        <form action="{{route('coupon.apply')}}" method="post">
                                            @csrf
                                            <p class="checkout-coupon">
                                                <input type="text" placeholder="Coupon code" name="coupon_code">
                                                <button type="submit" class="btn button-apply-coupon" name="apply_coupon" value="Apply Coupon">Apply Coupon</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- coupon-accordion end -->
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper start -->
                <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <form action="{{route('checkout.store')}}" method="post">
                                    @csrf
                                    <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                    @if(Auth::user()->shipping)
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>First name <span class="required">*</span></label>
                                                <input type="text" name="first_name" value="{{Auth::user()->shipping->first_name}}">
                                                <span style="color:red">{{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" name="last_name" value="{{Auth::user()->shipping->last_name}}">
                                                <span style="color:red">{{$errors->has('last_name') ? $errors->first('last_name') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone <span class="required">*</span></label>
                                                <input type="text" name="phone" value="{{Auth::user()->shipping->phone}}">
                                                <span style="color:red">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Email address <span class="required">*</span></label>
                                                <input type="email" name="email" value="{{Auth::user()->shipping->email}}">
                                                <span style="color:red">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Street Address <span class="required">*</span></label>
                                                <input type="text" placeholder="House number and street name" name="address" value="{{Auth::user()->shipping->address}}">
                                                <span style="color:red">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Post Office<span class="required">*</span></label>
                                                <input type="text" name="post_office" value="{{Auth::user()->shipping->post_office}}">
                                                <span style="color:red">{{$errors->has('post_office') ? $errors->first('post_office') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Postcode / ZIP <span class="required">*</span></label>
                                                <input type="number" name="post_code" value="{{Auth::user()->shipping->post_code}}">
                                                <span style="color:red">{{$errors->has('post_code') ? $errors->first('post_code') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Thana<span class="required">*</span></label>
                                                <input type="text" name="thana" value="{{Auth::user()->shipping->thana}}">
                                                <span style="color:red">{{$errors->has('thana') ? $errors->first('thana') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>District<span class="required">*</span></label>
                                                <input type="text" name="district" value="{{Auth::user()->shipping->district}}">
                                                <span style="color:red">{{$errors->has('district') ? $errors->first('district') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12 mb-20">
                                            <div class="single-form-row">
                                                <label>Country</label>
                                                <input name="country" value="Bangladesh" disabled>
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-lg-12">
                                            <p class="single-form-row m-0">
                                                <label>Order notes</label>
                                                <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5">{{Auth::user()->shipping->order_notes}}</textarea>
                                            </p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>First name <span class="required">*</span></label>
                                                <input type="text" name="first_name" value="{{old('first_name')}}">
                                                <span style="color:red">{{$errors->has('first_name') ? $errors->first('first_name') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" name="last_name" value="{{old('last_name')}}">
                                                <span style="color:red">{{$errors->has('last_name') ? $errors->first('last_name') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{old('phone')}}">
                                                <span style="color:red">{{$errors->has('phone') ? $errors->first('phone') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Email address <span class="required">*</span></label>
                                                <input type="email" name="email" value="{{old('email')}}">
                                                <span style="color:red">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Street Address <span class="required">*</span></label>
                                                <input type="text" placeholder="House number and street name" name="address" value="{{old('address')}}">
                                                <span style="color:red">{{$errors->has('address') ? $errors->first('address') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Post Office<span class="required">*</span></label>
                                                <input type="text" name="post_office" value="{{old('post_office')}}">
                                                <span style="color:red">{{$errors->has('post_office') ? $errors->first('post_office') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Postcode / ZIP <span class="required">*</span></label>
                                                <input type="number" name="post_code" value="{{old('post_code')}}">
                                                <span style="color:red">{{$errors->has('post_code') ? $errors->first('post_code') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Thana<span class="required">*</span></label>
                                                <input type="text" name="thana" value="{{old('thana')}}">
                                                <span style="color:red">{{$errors->has('thana') ? $errors->first('thana') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>District<span class="required">*</span></label>
                                                <input type="text" name="district" value="{{old('district')}}">
                                                <span style="color:red">{{$errors->has('district') ? $errors->first('district') : ''}}</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-12 mb-20">
                                            <div class="single-form-row">
                                                <label>Country</label>
                                                <input name="country" value="Bangladesh" disabled>
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col-lg-12">
                                            <p class="single-form-row m-0">
                                                <label>Order notes</label>
                                                <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery." class="checkout-mess" rows="2" cols="5" value="{{old('order_notes')}}"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title">Your Order</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $sum = 0; @endphp
                                                @foreach($cartProducts as $cartProduct)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{$cartProduct->name}} <strong class="product-quantity"> × {{$cartProduct->qty}}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">Tk. {{$cartProduct->subtotal}}</span>
                                                    </td>
                                                </tr>
                                                @php $sum += $cartProduct->subtotal; @endphp
                                                @endforeach
                                                @php Session::put('price' , $sum); @endphp
                                                <tr class="cart-subtotal">
                                                    <th>Cart Subtotal</th>
                                                    <td><span class="amount">Tk. {{$sum}}</span></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="shipping">
                                                    <th>Shipping <span style="color:red">{{$errors->has('delivery_charge_id') ? 'required' : ''}}</span></th>
                                                    <td><input type="radio" name="delivery_charge_id" value="1" onclick="document.getElementById('total').innerHTML ='Tk. '+total"> Free: Tk.00<br><input type="radio" name="delivery_charge_id" value="2" onclick="document.getElementById('total').innerHTML ='Tk. '+(total + 50)"> Fast: Tk.50</td>
                                                </tr>
                                                
                                                @if(Session::has('coupons'))
                                                    <tr class="order-total">
                                                        <th>Discount ({{Session::get('coupons')->code}})</th>
                                                        @if(Session::get('coupons')->type == 'percent')
                                                            <td><span class="amount">- Tk. {{$sum*Session::get('coupons')->value / 100}}</span></td>
                                                        @else
                                                            <td><span class="amount">- Tk. {{Session::get('coupons')->value}}</span></td>
                                                        @endif
                                                    </tr>
                                                @endif

                                                @php $total = $sum; @endphp
                                                @if(Session::has('coupons'))
                                                    @if(Session::get('coupons')->type == 'percent')
                                                        @php $coupon = $sum*Session::get('coupons')->value / 100; @endphp
                                                    @else
                                                        @php $coupon = Session::get('coupons')->value; @endphp
                                                    @endif
                                                    @php $total -= $coupon; @endphp
                                                @endif


                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td><strong><span class="amount" id="total">Tk. {{$total}}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->
                                    <br>
                                    <h3 class="shoping-checkboxt-title">Payment Method</h3>

                                    <!-- your-order-wrap end -->
                                    <div class="payment-method">
                                       <table class="table table-bordered">
                                            <tr>
                                                <td>Cash on delivery</td>
                                                <td><input type="radio" name="payment_type" value="cash"></td>
                                                <span style="color:red">{{$errors->has('payment_type') ? 'required' : ''}}</span>
                                            </tr>
                                            <tr>
                                                <td>Paypal/Stripe</td>
                                                <td><input type="radio" name="payment_type" value="stripe"></td>
                                            </tr>
            
                                        </table>
                                        <div class="order-button-payment">
                                            <input type="submit" value="Cofirm Order" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- checkout-details-wrapper end -->
            </div>
        </div>
        <!-- main-content-wrap end -->
@endsection

<script>
    var total = <?php echo $total; ?>;
</script>
