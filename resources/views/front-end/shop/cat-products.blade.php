@extends('front-end.layout')

@section('title')
    Ruiz|Shop
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb">
        <div class="container">
            <div class="row">
                @include('front-end.shop.side-bar')
                <div class="col-lg-9 order-lg-2 order-1">

                    <!-- shop-product-wrapper start -->
                    <div class="shop-product-wrapper">
                        <div class="row align-itmes-center">
                            <div class="col">
                                <!-- shop-top-bar start -->
                                <div class="shop-top-bar">
                                    <!-- product-view-mode start -->

                                    <div class="product-mode">
                                        <!--shop-item-filter-list-->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active"><a class="active grid-view" data-toggle="tab" href="#grid"><i class="fa fa-th"></i></a></li>
                                            <li><a class="list-view" data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <!-- product-view-mode end -->
                                    <!-- product-short start -->
                                    <!-- <div class="product-short">
                                        <p>Sort By :</p>
                                        <select class="nice-select" name="sortby">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name(A - Z)</option>
                                            <option value="sales">Name(Z - A)</option>
                                            <option value="rating">Price(Low > High)</option>
                                            <option value="date">Rating(Lowest)</option>
                                        </select>
                                    </div> -->
                                    <!-- product-short end -->
                                </div>
                                <!-- shop-top-bar end -->
                            </div>
                        </div>

                        <!-- shop-products-wrap start -->
                        <div class="shop-products-wrap">
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid">
                                    <div class="shop-product-wrap">
                                        <div class="row">
                                                @if($catProducts->products)
                                                    @foreach($catProducts->products as $product)
                                                <div class="col-lg-4 col-md-6">
                                                    <!-- single-product-area start -->
                                                    <div class="single-product-area mt-30">
                                                        <div class="product-thumb">
                                                            <a href="{{route('product-details',['id'=>$product->id])}}">
                                                                @foreach(json_decode($product->product_image) as $img)
                                                                    <img class="primary-image" src="{{asset($img)}}" alt="" height="200px" width="270px">
                                                                    @break
                                                                @endforeach
                                                            </a>
                                                            {{--                                                        <div class="label-product label_new">New</div>--}}
                                                            <div class="action-links">
                                                                
                                                                
                                                                <a href="" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}"><i class="icon-magnifier icons"></i></a>
                                                            </div>
                                                            <div class="text-center">
                                                            <form action="{{route('add-cart')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="qty" value="1">
                                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                              <!-- form elements -->
                                                              <button style=" border-radius: 50%; background-color: #cd853f; border: none; color: white;padding: 10px 14px;
  font-size: 16px;"><i class="icon-basket-loaded"></i></button>
                                                            </form>
                                                        </div>
                                                        </div>
                                                        <div class="product-caption">
                                                            <h4 class="product-name"><a href="{{route('product-details',['id'=>$product->id])}}">{{$product->product_name}}</a></h4>
                                                            @if($product->offer_price)
                                                                <div class="price-box">
                                                                    <span class="new-price">TK. {{$product->offer_price}}</span>
                                                                    <span class="old-price">TK. {{$product->sell_price}}</span>
                                                                </div>
                                                            @else
                                                                <div class="price-box">
                                                                    <span class="new-price">TK. {{$product->sell_price}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- single-product-area end -->
                                                </div>
                                                @include('front-end.modal.product-details-modal')
                                                    @endforeach
                                                @endif
{{--                                            @endforeach--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="list">
                                    @if($catProducts->products)
                                    @foreach($catProducts->products as $product)
                                        <div class="shop-product-list-wrap">
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{route('product-details',['id'=>$product->id])}}">
                                                                @foreach(json_decode($product->product_image) as $img)
                                                                    <img class="primary-image" src="{{asset($img)}}" alt="" height="200px">
                                                                    @break
                                                                @endforeach
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">

                                                        <h4><a href="{{route('product-details',['id'=>$product->id])}}" class="product-name">{{$product->product_name}}</a></h4>
                                                        @if($product->offer_price)
                                                            <div class="price-box">
                                                                <span class="new-price">TK. {{$product->offer_price}}</span>
                                                                <span class="old-price">TK. {{$product->sell_price}}</span>
                                                            </div>
                                                        @else
                                                            <div class="price-box">
                                                                <span class="new-price">TK. {{$product->sell_price}}</span>
                                                            </div>
                                                        @endif

                                                        <div class="product-rating">
                                                            <ul class="d-flex">
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                            </ul>
                                                        </div>

                                                        <p>{!!$product->product_desc!!}</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            <li class="product-stock-status">Availability: @if($product->stock_status==1)<span class="in-stock">In Stock</span> @else <span class="text-danger">Out of Stock</span> @endif</li>
                                                        </ul>
                                                        <div class="product-button">

                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                   <form action="{{route('add-cart')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="qty" value="1">
                                                                    <input type="hidden" name="id" value="{{$product->id}}">
                                                                    <button type="submit" class="add-to-cart">Add to cart</a>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        @endif
                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrap end -->

                        <!-- paginatoin-area start -->
{{--                        <div class="paginatoin-area">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <ul class="pagination-box">--}}
{{--                                        <li class="active"><a href="#">1</a></li>--}}
{{--                                        <li><a href="#">2</a></li>--}}
{{--                                        <li><a href="#">3</a></li>--}}
{{--                                        <li>--}}
{{--                                            <a class="Next" href="#">Next</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- paginatoin-area end -->
                    </div>
                    <!-- shop-product-wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
