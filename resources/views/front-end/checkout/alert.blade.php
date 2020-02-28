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

        <div class="jumbotron">
            <div class="container text-center"><h1 style="color: red"><strong>Cart Empty!</strong><br> Please add product to Cart</h1></div>
        </div>

@endsection