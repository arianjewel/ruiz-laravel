<div class="modal fade modal-wrapper" id="exampleModalCenter{{$product->id}}" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area">
                    <div class="row  product-details-inner">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <!-- Product Details Left -->
                            <div class="product-large-slider">
                                @foreach(json_decode($product->product_image) as $img)
                                    <div class="pro-large-img">
                                        <img src="{{asset($img)}}" alt="product-details" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="product-nav">
                                @foreach(json_decode($product->product_image) as $img)
                                <div class="pro-nav-thumb">
                                    <img src="{{asset($img)}}" alt="product-details" />
                                </div>
                                @endforeach
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6 col-sm-6">
                            <div class="product-details-view-content">
                                <div class="product-info">
                                    <h3>{{$product->product_name}}</h3>
                                    <div class="product-rating d-flex">
                                        <ul class="d-flex">
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                        </ul>
                                        <a href="#">(<span class="count">1</span> customer review)</a>
                                    </div>
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
                                    <p>{!! $product->product_desc !!}</p>

                                <div class="single-add-to-cart">
                                    <form action="{{route('add-cart')}}" class="cart-quantity d-flex" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input type="number" class="input-text" min="1" max="{{$product->product_qty}}" name="qty" value="1" title="Qty">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                            </div>
                                        </div>
                                        <button class="add-to-cart" type="submit">Add To Cart</button>
                                    </form>
                                </div>
                                    <ul class="single-add-actions">
                            
                                    </ul>
                                    <ul class="stock-cont">
                                        <li class="product-stock-status">Categories: @foreach($product->categories as $category){{$category->cat_name}}@endforeach</li>
                                        <li class="product-stock-status">Brand: {{$product->brands->brand_name}}</li>
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
                </div>
            </div>
        </div>
    </div>
</div>
