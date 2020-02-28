@extends('admin.layout')
@section('title')
    Manage Category
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
                        <h3 class="card-title">Categories</h3>
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
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_desc}}</td>
                                <td>{{$category->cat_status==1?'Published':'Unpublished'}}</td>
                                <td>
                                    @if($category->cat_status==1)
                                        <a href="{{route('unpublished-category', ['id' => $category->id])}}" class="btn btn-sm btn-info">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a href="{{route('published-category', ['id' => $category->id])}}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                    @endif
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$category->id}}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete-category',['id'=>$category->id])}}" onclick="return confirm('Are you sure to delete data??')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('admin.category.edit-category')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub Categories</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>sl.</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-center" colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($j=1)
                            @foreach($categories as $category)
                            @if ($category->children)
                                @foreach($category->children as $child)
                                <tr>
                                    <td>{{$j++}}</td>
                                    <td>{{$child->cat_name}}</td>
                                    <td>{{$category->cat_name}}</td>
                                    <td>{{$child->cat_desc}}</td>
                                    <td>{{$child->cat_status==1?'Published':'Unpublished'}}</td>
                                    <td>
                                        @if($child->cat_status==1)
                                            <a href="{{route('unpublished-category', ['id' => $child->id])}}" class="btn btn-sm btn-info">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="{{route('published-category', ['id' => $child->id])}}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit{{$child->id}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('delete-category',['id'=>$child->id])}}" onclick="return confirm('Are you sure to delete data??')" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin.category.edit-sub-category')
                                @endforeach
                            @endif
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

