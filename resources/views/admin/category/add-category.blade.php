@extends('admin.layout')
@section('title')
    Add Category
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
        <h5 class="card-header">Add category</h5>
        <div class="card-body">
            <form method="post" action="{{route('store-category')}}" >
                @csrf
                <div class="form-group">
                    <label for="inputName" class="col-form-label">Name</label>
                    <input id="inputName" type="text" name="cat_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea class="form-control" id="inputDescription" name="cat_desc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <select class="form-control" name="parent_id">
                        <option value="">Select Parent Category</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Add category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
