@extends('admin.layout')
@section('title')
    Admin | Single Order
@endsection()
@section('content')
	
	@if(Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
	<div class="jumbotron">
   		<div class="row">
   			<div class="col-lg-12">
   				<h1 class="text-center">Users</h1>
   			</div>
   		</div>
   	</div>

   	  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">UsersTable</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Join Date</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @foreach($users as $user)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at->diffForHumans()}}</td>
                  @if($user->role == 'admin')
                  <td>Admin</td>
                  @else
                  <td>User</td>
                  @endif
                  <td><a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit{{$user->id}}">Edit</a> <a href="{{route('user.delete', ['id' => $user->id])}}" onclick="return confirm('Are you sure to delete data??')" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>
                @include('admin.user.edit')
                @endforeach
       
               </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
