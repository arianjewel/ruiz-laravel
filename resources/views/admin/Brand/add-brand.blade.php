@extends('admin.layout')
@section('title')
    Add Brand
@endsection()
@section('content')
    <div class="card col-md-8">
        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h5 class="card-header">Add Brand</h5>
        <div class="card-body">
            <form method="post" action="{{route('store-brand')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName" class="col-form-label">Name</label>
                    <input id="inputName" type="text" name="brand_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription" class="col-form-label">Description <span class="text-info">(Optional)</span></label>
                    <textarea class="form-control" id="inputDescription" name="brand_desc" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label class="btn btn default">
                        <span class="btn btn outline btn sm btn-info">Upload Image</span>
                        <input type="file" name="brand_img" class="form-control-file" hidden>
                    </label>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary btn-lg" type="submit" style="margin-left: 12px">Add Brand</button>
                </div>
            </form>
        </div>
    </div>
@endsection
