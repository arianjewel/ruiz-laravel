@extends('front-end.layout')

@section('title')
    Ruiz|Edit Bill Address
@endsection

@section('content')
	<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Bill Address</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout-details-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 offset-3">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                <form action="{{route('address.update', Auth::user()->id)}}" method="post">
                                    @csrf
                                    <h3 class="shoping-checkboxt-title text-center">Edit Your Billing Details</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>First name <span class="required">*</span></label>
                                                <input type="text" name="first_name" value="{{$shippings->first_name}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p class="single-form-row">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" name="last_name" value="{{$shippings->last_name}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{$shippings->phone}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Email address <span class="required">*</span></label>
                                                <input type="email" name="email" value="{{$shippings->email}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Street Address <span class="required">*</span></label>
                                                <input type="text" placeholder="House number and street name" name="address" value="{{$shippings->address}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Post Office<span class="required">*</span></label>
                                                <input type="text" name="post_office" value="{{$shippings->post_office}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Postcode / ZIP <span class="required">*</span></label>
                                                <input type="number" name="post_code" value="{{$shippings->post_code}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Thana<span class="required">*</span></label>
                                                <input type="text" name="thana" value="{{$shippings->thana}}">
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>District<span class="required">*</span></label>
                                                <input type="text" name="district" value="{{$shippings->district}}">
                                            </p>
                                        </div>
                                      
                                        
                                        <div class="order-button-payment col-lg-12" style="margin-top: 0">
                                            <input type="submit" value="Update" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                    </div>
                </div>
                <br><br>
@endsection