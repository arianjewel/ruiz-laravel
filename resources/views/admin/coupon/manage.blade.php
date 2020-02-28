@extends('admin.layout')
@section('title')
    Manage Coupon
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
                        <h3 class="card-title">Coupons</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>sl.</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->type}}</td>
                                    <td>{{$coupon->value}}</td>
                                    <td>
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