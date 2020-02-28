@extends('admin.layout')
@section('title')
    Manage Brand
@endsection()
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>sl.</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Status</th>
                                <th>Stock Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->brands->brand_name}}</td>
                                    @if($product->categories)
                                        @foreach($product->categories as $category)
                                    <td>{{$category->cat_name}}</td>
                                        @endforeach
                                    @endif
                                    <td>{{$product->product_qty}}</td>
                                    <td>{{strtoupper($product->product_size)}}</td>
                                    <td>{{$product->product_status==1?'Published':'Unpublished'}}</td>
                                    <td>{{$product->stock_status==1?'In Stock':'Not In Stock'}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#view{{$product->id}}">
                                            <i class="fas fa-search-plus"></i>
                                        </a>
                                        @if($product->product_status==1)
                                            <a href="{{route('product.unpublished', ['id' => $product->id])}}" class="btn btn-sm btn-info">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="{{route('product.published', ['id' => $product->id])}}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$product->id}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('product.delete', ['id' => $product->id])}}" onclick="return confirm('Are you sure to delete data??')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin.product.edit')
                                @include('admin.product.view-details')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection



