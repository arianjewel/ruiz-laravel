
<div class="modal fade" id="edit{{$product->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @include('tiny_mce.tiny_mce')
            <div class="modal-body">
                <form method="post" action="{{route('product.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputName" class="col-form-label">Name</label>
                        <input id="inputName" type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
                        <input type="hidden" name="id" value="{{$product->id}}">
                    </div>
                    <div class="form-group">
                        <label for="inputQty" class="col-form-label">Quantity</label>
                        <input id="inputQty" type="number" name="product_qty" value="{{$product->product_qty}}" class="form-control">

                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Purchase Price</label>
                        <input type="number" name="buy_price" value="{{$product->buy_price}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Selling Price</label>
                        <input type="number" name="sell_price" value="{{$product->sell_price}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Offer <span class="text-info">(No Require)</span></label>
                        <input type="number" name="offer"  value="{{$product->offer}}" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="inputDescription" class="col-form-label">Description <span class="text-info">(No Require)</span></label>
                        <textarea class="form-control" id="inputDescription" name="product_desc" rows="3">{{$product->product_desc}}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
