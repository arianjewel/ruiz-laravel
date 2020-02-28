@extends('front-end.layout')
@section('title')
    My Account
@endsection
@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb my-account-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="account-dashboard">
                        <div class="dashboard-upper-info">
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-4 col-md-12">
                                    <div class="d-single-info">
                                        <p class="user-name">Hello, <span>{{Auth::user()->name}}</span></p>
                                        <p>{{Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="d-single-info">
                                        <p>Need Assistance? Customer service at.</p>
                                        <p>jewel.cse72@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="d-single-info">
                                        <p>E-mail them at </p>
                                        <p>jewel.cse72@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <!-- Nav tabs -->
                                <ul role="tablist" class="nav flex-column dashboard-list">
                                    <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                
                                    <li><a href="#address" data-toggle="tab" class="nav-link">Bill Address</a></li>
                                    <li>
                                        <form action="{{route('logout')}}" method="post">
                                            @csrf
                                                
                                            <input type="submit" name="btn" value="Logout" class="btn-medium btn-transferent" style="border: none;">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane active" id="dashboard">
                                        <h3>Dashboard </h3>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a></p>
                                    </div>
                                    <div class="tab-pane fade" id="orders">
                                        <h3>Orders</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Order Number</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i=1; @endphp
                                                @foreach(Auth::user()->order as $order)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$order->order_number}}</td>
                                                    <td>{{$order->created_at->diffForHumans()}}</td>
                                                    <td>{{$order->status}}</td>
                                                    <td>Tk. {{$order->price}}</td>
                                                    <td><a href="{{route('front.order.show', ['id' => $order->id])}}" class="view">view</a></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="address">
                                        <p>The following addresses will be used on the checkout page by default.</p>
                                        <h4 class="billing-address">Billing address</h4>
                                        @if(Auth::user()->shipping)
                                        <a href="{{route('address.edit', Auth::user()->shipping->id)}}" class="view" style="background-color: green">edit</a>
                                        <a href="{{route('address.show')}}" class="view">view</a>
                                        @else
                                        <a href="{{route('address.index')}}" class="view">add</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection

