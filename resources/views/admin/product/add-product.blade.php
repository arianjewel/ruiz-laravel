@extends('admin.layout')
@section('title')
    Add Product
@endsection()
@section('content')
    @include('tiny_mce.tiny_mce')
    <div class="card col-md-8">
        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h5 class="card-header">Add Product</h5>
        <div class="card-body">
            <form method="post" action="{{route('store-product')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName" class="col-form-label">Name</label>
                    <input id="inputName" type="text" name="product_name" value="{{old('product_name')}}" class="form-control">
                    <span style="color:red">{{$errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="inputBrand" class="col-form-label">Category</label>
                    <select id="inputBrand" class="form-control" name="cat_id">
                        <option selected disabled>---Select Category---</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @if($category->children)
                                @foreach($category->children as $child)
                                    <option value="{{$child->id}}">--{{$child->cat_name}}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->has('cat_id') ? $errors->first('cat_id') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="inputBrand" class="col-form-label">Brand</label>
                    <select id="inputBrand" class="form-control" name="brand_id">
                        <option selected disabled>---Select Brand---</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                        @endforeach
                    </select>
                    <span style="color:red">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="inputSize" class="col-form-label">Size</label>
                    <select id="inputBrand" class="form-control" name="product_size">
                        <option selected disabled>---Select Size---</option>
                        <option value="xxl">XXL</option>
                        <option value="xl">XL</option>
                        <option value="l">L</option>
                        <option value="m">M</option>
                        <option value="s">S</option>
                    </select>
                    <span style="color:red">{{$errors->has('product_size') ? $errors->first('product_size') : ''}}</span>
                </div>
                <div class="form-group">
                    <label for="inputQty" class="col-form-label">Quantity</label>
                    <input id="inputQty" type="number" name="product_qty" value="{{old('product_qty')}}" class="form-control">
                    <span style="color:red">{{$errors->has('product_qty') ? $errors->first('product_qty') : ''}}</span>

                </div>

                <div class="form-group">
                    <label class="col-form-label">Purchase Price</label>
                    <input type="number" name="buy_price" value="{{old('buy_price')}}" class="form-control">
                    <span style="color:red">{{$errors->has('buy_price') ? $errors->first('buy_price') : ''}}</span>
                </div>

                <div class="form-group">
                    <label class="col-form-label">Selling Price</label>
                    <input type="number" name="sell_price" value="{{old('sell_price')}}" class="form-control">
                    <span style="color:red">{{$errors->has('sell_price') ? $errors->first('sell_price') : ''}}</span>
                </div>

                <div class="form-group">
                    <label class="col-form-label">Offer <span class="text-info">(No Require)</span></label>
                    <input type="number" name="offer"  value="{{old('offer')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label class="btn btn default">
                        <span class="btn btn outline btn sm btn-info">Upload Image</span>
                        <input type="file" name="product_image[]" class="form-control-file" hidden multiple>
                    </label>
                    <span style="color:red">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
                    <span style="color:red">{{$errors->has('product_image.*') ? $errors->first('product_image.*') : ''}}</span>
                </div>
               
                <div class="form-group">
                    <label for="inputDescription" class="col-form-label">Description <span class="text-info">(No Require)</span></label>
                    <textarea class="form-control" id="inputDescription" name="product_desc" rows="3">{{old('product_desc')}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
