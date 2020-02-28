@extends('admin.layout')
@section('title')
    Admin | Single Order
@endsection()
@section('content')
	
	@if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
	<div class="jumbotron">
   		<div class="row">
   			<div class="col-lg-12">
   				<h1 class="text-center">Order</h1>
   			</div>
   		</div>
   	</div>

   	<div class="card">
	  <h5 class="card-header">Order</h5>
	  <div class="card-body">
	    @if($order)
	    <table class="table table-striped table-hover">
	      <thead>
	        <tr>
	          <th scope="col">Order</th>
	          <th scope="col">Status</th>
	          <th scope="col">Payment</th>
	          <th scope="col">Price</th>
	          <th scope="col">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	        <tr>
	          <td>{{$order->order_number}}</td>
	          <td>{{$order->status}}</td>
	          <td>{{$order->payment->status}}</td>
	          <td>Tk. {{$order->price}}</td>
	          <td>
	            <a class="btn btn-primary" href="{{route('order.pdf', ['id' => $order->id])}}">Pdf</a>
	            <a class="btn btn-warning" href="" data-toggle="modal" data-target="#edit{{$order->id}}">Edit</a>
	            <a class="btn btn-danger" href="{{route('order.delete', ['id' => $order->id])}}" onclick="return confirm('Are you sure to delete data??')">Delete</a>
	          </td>
	        </tr>
	      </tbody>
	    </table>
		</div>
    </div>


   	<div class="container">
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
			            		@php $discountTotal -=  $discount; @endphp

			            		@else
			            		<td><strong>-Tk. {{$discount = $total * $order->coupon->value / 100}}</strong></td>
			            		@php $discountTotal -= $discount; @endphp

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

	<div class="modal fade" id="edit{{$order->id}}">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <form action="{{route('order.update')}}" method="post">
	                    @csrf
	                    <div class="form-group">
	                        <label>Order Status</label>
	                        <input type="radio" name="status" value="pending" {{$order->status == 'pending'?'Checked':''}}>
	                        <span>Pending</span>
	                        <input type="radio" name="status" value="confirmed" {{$order->status == 'confirmed'?'Checked':''}}>
	                        <span>Confirmed</span>
	                    </div>
	                    <div class="form-group">
	                        <label>Payment Status</label>
	                        <input type="radio" name="payment_status" value="pending" {{$order->payment->status == 'pending'?'Checked':''}}>
	                        <span>Pending</span>
	                        <input type="radio" name="payment_status" value="confirmed" {{$order->payment->status == 'confirmed'?'Checked':''}}>
	                        <span>Confirmed</span>
	                    </div>
	                    <input type="hidden" value="{{$order->id}}" name="id">
	                    <input type="hidden" value="{{$order->payment->id}}" name="payment_id">
	                    <div class="form-group">
	                        <button type="submit" name="btn" class="btn btn-primary">Update Order</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
@endsection