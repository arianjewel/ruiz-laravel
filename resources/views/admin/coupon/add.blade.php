@extends('admin.layout')
@section('title')
    Add Coupon
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
        <h5 class="card-header">Add Coupon</h5>
        <div class="card-body">
            <form method="post" action="{{route('coupon.store')}}">
                @csrf
                <div class="form-group">
                    <label for="inputName" class="col-form-label">Code</label>
                    <input id="inputName" type="text" name="code" class="form-control">
                </div>

                <div class="form-group">
                    <label class="col-form-label">Type</label>
                    <select class="form-control" name="type">
                        <option>---Select Type---</option>
                        <option value="fixed">Fixed</option>
                        <option value="percent">Parcent</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputValue" class="col-form-label">Value</label>
                    <input id="inputValue" type="number" name="value" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Add Coupon</button>
                </div>
            </form>
        </div>
    </div>
@endsection