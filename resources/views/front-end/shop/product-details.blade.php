@extends('front-end.layout')

@section('title')
    Ruiz|Shop|{{$products->product_name}}
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
                        <li class="breadcrumb-item active">Product Details</li>
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
            <div class="row  product-details-inner">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-large-slider">
                        @foreach(json_decode($products->product_image) as $img)
                        <div class="pro-large-img img-zoom">
                            <img src="{{asset($img)}}" alt="product-details" height="350px" width="100%" />
                            <a href="{{asset($img)}}" data-fancybox="images"><i class="fa fa-search"></i></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="product-nav">
                        @foreach(json_decode($products->product_image) as $img)
                        <div class="pro-nav-thumb">
                            <img src="{{asset($img)}}" alt="product-details" height="80px" width="100%" />
                        </div>
                        @endforeach
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content">
                        <div class="product-info">
                            <h3>{{$products->product_name}}</h3>
                            <div class="product-rating d-flex">
                                <ul class="d-flex">
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                </ul>
                                <a href="#reviews">(<span class="count">1</span> customer review)</a>
                            </div>
                            @if($products->offer_price)
                                <div class="price-box">
                                    <span class="new-price">TK. {{$products->offer_price}}</span>
                                    <span class="old-price">TK. {{$products->sell_price}}</span>
                                </div>
                            @else
                                <div class="price-box">
                                    <span class="new-price">TK. {{$products->sell_price}}</span>
                                </div>
                            @endif
                            <div class="text-info">
                                <span>In Stock: {{$products->product_qty}}</span>
                            </div>
                            <div>
                             <p>{!!$products->product_desc!!}</p>
                            </div>

                            <div class="single-add-to-cart">
                                <form action="{{route('add-cart')}}" class="cart-quantity d-flex" method="post">
                                    @csrf
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input type="number" class="input-text" min="1" max="{{$products->product_qty}}" name="qty" value="1" title="Qty">
                                            <input type="hidden" name="id" value="{{$products->id}}">
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Add To Cart</button>
                                </form>
                            </div>
                        
                            <ul class="stock-cont">
                                <li class="product-stock-status">Brand: {{$products->brands->brand_name}}</li>
                                <li class="product-stock-status">Size: {{strtoupper($products->product_size)}}</li>
                            </ul>
                            <div class="share-product-socail-area">
                                <p>Share this product</p>
                                <ul class="single-product-share">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-description-area section-pt">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-tab">
                            <ul role="tablist" class="nav">
                                <li class="active" role="presentation">
                                    <a data-toggle="tab" role="tab" href="#description" class="active">Description</a>
                                </li>
                                <li role="presentation">
                                    <a data-toggle="tab" role="tab" href="#reviews">Comment</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product_details_tab_content tab-content">
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                <div class="product_description_wrap  mt-30">
                                    <div class="product_desc mb-30">
                                         <p>{!!$products->product_desc!!}</p>
                                    </div>

                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                
                              
                                <aside>
                                    <div id="disqus_thread"></div>
                                        <script>

                                        /**
                                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                        /*
                                        var disqus_config = function () {
                                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };
                                        */
                                        (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document, s = d.createElement('script');
                                        s.src = 'https://ruizeshop.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                        })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                </aside>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="related-product-area section-pt">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3> Related Product</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($relatedProducts->products as $product)
                    <div class="col-lg-3">
                                                <!-- single-product-area start -->
                        <div class="single-product-area mt-30">
                            <div class="product-thumb">
                                <a href="{{route('product-details',['id'=>$product->id])}}">
                                    @foreach(json_decode($product->product_image) as $img)
                                    <img class="primary-image" src="{{asset($img)}}" alt="" height="200px" width="270px">
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
    <!-- main-content-wrap end -->
@endsection
