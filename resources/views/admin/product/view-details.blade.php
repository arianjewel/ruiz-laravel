<div class="modal fade" id="view{{$product->id}}">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Name</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->product_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Brand</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->brands->brand_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->product_qty}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Size</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{strtoupper($product->product_size)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Purchase Price</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->buy_price}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Sell Price</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->sell_price}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h5>Offer Price</h5>
                            </div>
                            <div class="col-md-8">
                                <p>{{$product->offer_price}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <h5>Product Image</h5>
                            </div>
                            <div class="col-md-8">
                                @foreach(json_decode($product->product_image) as $img)
                                    <img src="{{asset($img)}}" width="100">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


