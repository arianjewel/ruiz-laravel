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
                        <h3 class="card-title">Brands</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>sl.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td>{{$brand->brand_desc}}</td>
                                    <td>{{$brand->brand_status==1?'Published':'Unpublished'}}</td>
                                    <td><img src="{{asset($brand->brand_img)}}" width="100px" height="50px"></td>
                                    <td>
                                        @if($brand->brand_status==1)
                                            <a href="" class="btn btn-sm btn-info">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="" class="btn btn-sm btn-warning">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" onclick="return confirm('Are you sure to delete data??')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
{{--                                @include('admin.category.edit-category')--}}
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


