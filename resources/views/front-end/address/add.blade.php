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
                            <li class="breadcrumb-item active">Add Bill Address</li>
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
                                <form action="{{route('address.store')}}" method="post">
                                    @csrf
                                    <h3 class="shoping-checkboxt-title text-center">Add Your Billing Details</h3>
                                    <div class="row">
                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
                                        <div class="col-lg-12">
                                            <div class="single-form-row">
                                                <label>Country <span class="required">*</span></label>
                                                <input name="country" value="Bangladesh" disabled>
                                                
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="order-button-payment col-lg-12" style="margin-top: 0">
                                            <input type="submit" value="Apply" />
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