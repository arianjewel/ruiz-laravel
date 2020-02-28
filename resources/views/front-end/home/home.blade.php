@extends('front-end.layout')

@section('title')
    Ruiz|Home
@endsection

@section('content')
    @if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong style="font-size: 150%">{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Hero Section Start -->
    <div class="hero-slider hero-slider-one">

        <!-- Single Slide Start -->
        <div class="single-slide" style="background-image: url({{asset('/public/front-end/assets')}}/images/slider/slide-bg-2.jpg)">
            <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="slider-content-text text-left">
                            <h1>Welcome !</h1>
                            <h4 style="color:white">You May feel better with shoping in our shop</h4>
                            <p>We ready a <strong>User-Friendly</strong> E-commerce shop for you</p>
                            <div class="slide-btn-group">
                                <a href="{{route('shop')}}" class="btn btn-bordered btn-style-1">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End -->
        </div>
        <!-- Single Slide End -->

        <!-- Single Slide Start -->
        <div class="single-slide" style="background-image: url({{asset('/public/front-end/assets')}}/images/slider/slide-bg-1.jpg)">
            <!-- Hero Content One Start -->
            <div class="hero-content-one container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="slider-content-text text-left">
                            <h5>Exclusive Offer -20% Off This Week</h5>
                            <h1>H-Vault Classico</h1>
                            <p>H-Vault Watches Are A Lot Like Classic American Muscle Cars - Expect For The American Part That Is. </p>
                            <p>Starting At <strong>$1.499.00</strong></p>
                            <div class="slide-btn-group">
                                <a href="shop.html" class="btn btn-bordered btn-style-1">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero Content One End -->
        </div>
        <!-- Single Slide End -->

    </div>
    <!-- Hero Section End -->

    <!-- Banner Area Start -->
    <div class="banner-area section-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-banner mb-30">
                        <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/banner/banner-01.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6  col-md-6">
                    <div class="single-banner mb-30">
                        <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/banner/banner-02.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  


    <!-- Product Area Start -->
    <div class="product-area section-pb section-pt-30">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <ul class="nav product-tab-menu" role="tablist">
                        <li class="product-tab-item nav-item active">
                            <a class="product-tab__link nav-link active" id="nav-featured-tab" data-toggle="tab" href="#nav-featured" role="tab" aria-selected="true">Featured</a>
                        </li>
                        <li class="product-tab__item nav-item">
                            <a class="product-tab__link nav-link" id="nav-new-tab" data-toggle="tab" href="#nav-new" role="tab" aria-selected="false">New Arrivals</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="tab-content product-tab__content" id="product-tabContent">
                <div class="tab-pane fade show active" id="nav-featured" role="tabpanel">
                    <div class="product-carousel-group">
                        <div class="row">
                            @foreach($featuredProducts as $product)
                            <div class="col-lg-3">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('product-details',['id'=>$product->id])}}">
                                            @foreach(json_decode($product->product_image) as $img)
                                            <img class="primary-image" src="{{asset($img)}}" alt="" height="180px" width="270px">
                                                @break
                                            @endforeach
                                        </a>
                                        <div class="action-links">

                                            <!-- <a href="" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a> -->
                                            
                                            <a href="" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}"><i class="icon-magnifier icons"></i></a>
                                        </div>
                                        <div class="text-center">
                                            <form action="{{route('add-cart')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                              <!-- form elements -->
                                              <button style=" border-radius: 50%; background-color: #cd853f; border: none; color: white;padding: 10px 14px;
                                                font-size: 16px;"><i class="icon-basket-loaded"></i>
                                            </button>
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
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-new" role="tabpanel">
                    <div class="product-carousel-group">

                        <div class="row">
                            @foreach($newProducts as $product)
                            <div class="col-lg-3">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="{{route('product-details',['id'=>$product->id])}}">
                                            @foreach(json_decode($product->product_image) as $img)
                                            <img class="primary-image" src="{{asset($img)}}" alt="" height="180px" width="270px">
                                                @break
                                            @endforeach
                                        </a>
                                        <div class="action-links">

                                            <!-- <a href="" class="cart-btn" title="Add to Cart"><i class="icon-basket-loaded"></i></a> -->
                                            
                                            <a href="" class="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}"><i class="icon-magnifier icons"></i></a>
                                        </div>
                                        <div class="text-center">
                                            <form action="{{route('add-cart')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                              <!-- form elements -->
                                              <button style=" border-radius: 50%; background-color: #cd853f; border: none; color: white;padding: 10px 14px;
                                                font-size: 16px;"><i class="icon-basket-loaded"></i>
                                            </button>
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
                        </div>

                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!-- Product Area End -->

    <div class="container">
        <h1 style="color: red" class="text-center">Blog still on developing. please don't try to blog</h1>
    </div>

    <!-- letast blog area Start -->
    <div class="letast-blog-area section-pb">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="singel-latest-blog">
                        <div class="aritcles-content">
                            <div class="author-name">
                                post by: <a href="#"> Author Name</a> - 30 Oct 2019
                            </div>
                            <h4><a href="blog-details.html" class="articles-name">Ruiz Watch is one of the web's most visited watch sites and the world's</a></h4>
                        </div>
                        <div class="articles-image">
                            <a href="blog-details.html">
                                <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-01.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="singel-latest-blog">
                        <div class="aritcles-content">
                            <div class="author-name">
                                post by: <a href="#"> Author Name</a> - 20 Oct 2019
                            </div>
                            <h4><a href="blog-details.html" class="articles-name">Ruiz Watch reviews and most popular watch & timepiece blog for serious </a></h4>
                        </div>
                        <div class="articles-image">
                            <a href="blog-details.html">
                                <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-02.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="singel-latest-blog">
                        <div class="aritcles-content">
                            <div class="author-name">
                                post by: <a href="#"> Author Name</a> - 13 Oct 2019
                            </div>
                            <a href="blog-details.html" class="articles-name">Connected to the World: Introducing the G-Shock MTG-B1000-1A</a>
                        </div>
                        <div class="articles-image">
                            <a href="blog-details.html">
                                <img src="{{asset('/public/front-end/assets')}}/images/blog/blog-03.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- letast blog area End -->

    <!-- our-brand-area start -->
    <div class="our-brand-area section-pb">
        <div class="container">
            <div class="row our-brand-active">
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="{{asset('/public/front-end/assets')}}/images/brand/brand-01.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- our-brand-area end -->

    <div class="newletter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newletter-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12">
                                <div class="newsletter-title mb-30">
                                    <h3>Join Our <br><span>Newsletter Now</span></h3>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-7">
                                <div class="newsletter-footer mb-30">
                                    <input type="text" placeholder="Your email address...">
                                    <div class="subscribe-button">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
