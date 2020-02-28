@extends('front-end.layout')

@section('title')
    Ruiz|Cart
@endsection

@section('content')
    @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
	<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cart Page</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        
        <!-- main-content-wrap start -->
        <div class="main-content-wrap section-ptb cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('update-cart')}}" method="post" class="cart-table">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-thumbnail">Images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="plantmore-product-price">Unit Price</th>
                                            <th class="plantmore-product-quantity">Quantity</th>
                                            <th class="plantmore-product-subtotal">Total</th>
                                            <th class="plantmore-product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @csrf
                                    	@php $sum = 0; @endphp
                                    	@foreach($cartProducts as $cartProduct)
                                        <tr>
                                            <td class="plantmore-product-thumbnail"><a href="#"><img src="{{asset($cartProduct->options->image)}}" height="50px" width="80px"></a></td>
                                            <td class="plantmore-product-name"><a href="#">{{$cartProduct->name}}</a></td>
                                            <td class="plantmore-product-price"><span class="amount">Tk. {{$cartProduct->price}}</span></td>
                                            <td class="plantmore-product-quantity">
                                                <input value="{{$cartProduct->qty}}" name="qty[]" min="1" max="{{$cartProduct->options->product_qty}}" type="number">
                                                <input type="hidden" value="{{$cartProduct->rowId}}" name="rowId[]">
                                            </td>
                                            <td class="product-subtotal"><span class="amount">Tk. {{$cartProduct->subtotal}}</span></td>
                                            <td class="plantmore-product-remove"><a href="{{route('delete-cart', ['id'=>$cartProduct->rowId])}}"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        @php $sum += $cartProduct->subtotal; @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coupon-all">

                                        <div class="coupon2">
                                            <input class="submit" name="update_cart" type="submit" value="Update Cart">
                                            <a href="{{route('shop')}}" class=" continue-btn">Continue Shopping</a>
                                        </div>
                                    </form>
                                        
                                        <form action="{{route('coupon.apply')}}" method="post">
                                            @csrf
                                        <div class="coupon">
                                            <h3>Coupon</h3>
                                            <p>Enter your coupon code if you have one.</p>
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span>Tk. {{$sum}}</span></li>
                                            @if(Session::get('coupons'))
                                                @if(Session::get('coupons')->type == 'percent')
                                                    <li>Discount({{Session::get('coupons')->code}})<span>- Tk. {{$sum*Session::get('coupons')->value / 100}}</span></li>
                                                    <li>Total <span>Tk. {{$sum - ($sum*Session::get('coupons')->value / 100)}}</span></li>
                                                @else
                                                    <li>Discount({{Session::get('coupons')->code}})<span>- Tk. {{Session::get('coupons')->value}}</span></li>
                                                    <li>Total <span>Tk. {{$sum - Session::get('coupons')->value}}</span></li>
                                                @endif
                                            @else
                                            <li>Total <span>Tk. {{$sum}}</span></li>
                                            @endif
                                        </ul>
                                        <a href="{{route('checkout.index')}}" class="proceed-checkout-btn">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content-wrap end -->
@endsection