@extends('front-end.layout')
@section('title')
    My Order
@endsection
@section('content')
   	<div class="jumbotron">
   		<div class="row">
   			<div class="col-lg-12">
   				<h1 class="text-center">Order</h1>
   			</div>
   		</div>
   	</div>

   <div class="container">
		@if($order)
		<section class="confirmation_part section_padding">
		  <div class="order_boxes">
		    <div class="row">
		      <div class="col-lg-6">
		      	<div class="card">
		      	  <div class="card-header">
		      			<h3>Order Info</h3>
		      	  </div>
		      	  	<div class="card-body">
			          <table class="table table-borderless table-responsive">
			          	<tr>
			          		<td><strong>Order Number</strong></td>
			          		<td>{{$order->order_number}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Date</strong></td>
			          		<td>{{$order->created_at->diffForHumans()}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Total</strong></td>
			          		<td><strong>Tk. {{$order->price}}</strong></td>
			          	</tr>
			          	<tr>
			          		<td><strong>Payment Type</strong></td>
			          		<td>{{$order->payment->type}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Payment Status</strong></td>
			          		<td>{{$order->payment->status}}</td>
			          	</tr>
			          </table>
			       </div>
		        </div>
		      </div>

		      <div class="col-lg-6">
		        <div class="card">
		      	  <div class="card-header">
		      			<h3>Bill Address</h3>
		      	  </div>
		      	  <div class="card-body">
			          <table class="table table-borderless table-responsive">
			          	<tr>
			          		<td><strong>Name</strong></td>
			          		<td>{{$order->order_shipping->first_name.' '.$order->order_shipping->last_name}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Address</strong></td>
			          		<td>{{$order->order_shipping->address.', '.$order->order_shipping->post_office.', '.$order->order_shipping->thana}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>City</strong></td>
			          		<td>{{$order->order_shipping->district}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Country</strong></td>
			          		<td>{{$order->order_shipping->country}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Postcode</strong></td>
			          		<td>{{$order->order_shipping->post_code}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Phone</strong></td>
			          		<td>{{$order->order_shipping->phone}}</td>
			          	</tr>
			          	<tr>
			          		<td><strong>Email</strong></td>
			          		<td>{{$order->order_shipping->email}}</td>
			          	</tr>
			          </table>
			        </div>
		        </div>
		      </div>
		    </div>
		    <br>

		    <div class="row">
		      <div class="col-lg-12">
		      	<div class="card">
		      		<div class="card-header">
		          		<h3>Order Details</h3>
		          	</div>
		          	<div class="card-body">
			          <table class="table table-borderless">
			            <thead>
			              <tr>
			                <th scope="col" colspan="2">Product</th>
			                <th scope="col">Quantity</th>
			                <th scope="col">Total</th>
			              </tr>
			            </thead>
			            <tbody>
			            	@php $total = 0; @endphp
			            	@foreach($order->order_detail as $details)
			            	<tr>
			            		<td colspan="2"><span>{{$details->product->product_name}}</span></td>
			            		<td>x{{$details->product_qty}}</td>

			            		@if($details->product->offer_price)
			            		<td><strong>Tk. {{$subtotal = $details->product->offer_price*$details->product_qty}}</strong></td>
			            		@php $total += $subtotal; @endphp

			            		@else
			            		<td><strong>Tk.{{$subtotal = $details->product->sell_price*$details->product_qty}}</strong></td>
			            		@php $total += $subtotal; @endphp

			            		@endif
			            	</tr>
			            	@endforeach

			            	<tr>
			            		<td colspan="4"><hr></td>
			            	</tr>

			            	<tr>
			            		<td><strong>Subtotal</strong></td>
			            		<td colspan="2"></td>
			            		<td><strong>Tk. {{$total}}</strong></td>
			            	</tr>
			            	@php $discountTotal = $total; @endphp
			            	@if($order->coupon)
			            	<tr>
			            		<td colspan="2"><strong>Discount({{$order->coupon->code}})</strong></td>
			            		<td></td>

			            		@if($order->coupon->type == 'fixed')
			            		<td><strong>-Tk. {{$discount = $order->coupon->value}}</strong></td>
			            		@php $discountTotal = $total - $discount; @endphp

			            		@else
			            		<td><strong>-Tk. {{$discount = $total * $order->coupon->value / 100}}</strong></td>
			            		@php $discountTotal = $total - $discount; @endphp

			            		@endif
			            	</tr>
			            	@endif

			            	<tr>
			            		<td colspan="2"><strong>Delivery Charge</strong></td>
			            		<td></td>
			            		<td><strong>+Tk. {{$deliveryCharge = $order->delivery_charge->value}}</strong></td>
			            	</tr>
			            	<tr>
			            		<td colspan="4"><hr></td>
			            	</tr>
			            </tbody>
			            <tfoot>
			            	<tr>
			            		<th scope="col" colspan="3"></th>
			            		<th scope="col">Total: {{$discountTotal + $deliveryCharge}}</th>
			            	</tr>
			            </tfoot>
			          </table>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
		@endif
	</div>
	<br>
@endsection