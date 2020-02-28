@extends('admin.layout')
@section('title')
    Admin | Orders
@endsection()
@section('content')
    <div class="jumbotron">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="text-center">Orders</h1>
        </div>
      </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">OrdersTable</li>
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
              <h3 class="card-title">Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Order No.</th>
                  <th>Status</th>
                  <th>Payment</th>
                  <th>Payment Type</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
                @foreach($orders as $order)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$order->order_number}}</td>
                  <td>{{$order->status}}</td>
                  <td>{{$order->payment->status}}</td>
                  <td>{{$order->payment->type}}</td>
                  <td>{{$order->price}}</td>
                  <td><a href="{{route('order.single', ['id' => $order->id])}}" class="btn btn-sm btn-info">View</a></td>
                </tr>
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