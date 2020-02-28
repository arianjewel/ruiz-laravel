@extends('front-end.layout')

@section('title')
    Ruiz|Bill Address
@endsection

@section('content')
		<div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Address</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content-wrap section-ptb checkout-page">
            <div class="container">
            	<div class="checkout-details-wrapper">
                    <div class="row">
                    	<div class="col-lg-6 col-md-6 offset-3">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper">
                                <h3 class="shoping-checkboxt-title"><span style="margin-right: 190px"></span><span style="font-size: 150%;">Bill Address</span></h3>

                                
                                

                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Field</th>
                                                    <th class="product-total">Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                         Name
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->first_name.' '.$shippings->last_name}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Phone
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->phone}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Email
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->email}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Address
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->address.' '.$shippings->post_office.'-'.$shippings->post_code}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Thana
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->thana}}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                       District
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->district}}</span>
                                                    </td>
                                                </tr>
                                                 <tr class="cart_item">
                                                    <td class="product-name">
                                                        Country
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">{{$shippings->country}}</span>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                        

                                    </div>
                                    <!-- your-order-table end -->

                                    <!-- your-order-wrap end -->
                                 
                                    <!-- your-order-wrapper start -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection