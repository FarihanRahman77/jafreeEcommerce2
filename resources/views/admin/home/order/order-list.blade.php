@extends('admin.master')
@section('title')
Admin Order-List
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/order-list')}}">Order List</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-md-6"><h3>Order List</h3></div>
                            <div class="col-md-6 text-right">
                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            </div>    
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Party Info</th>
                                        <th>Order Number</th>
                                        <th>Delivery Location</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php($i = 1)
                                    @foreach($orders as $order)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>
                                            {{$order->name}}<br>
                                            {{$order->address}}<br>
                                            {{$order->phone}}
                                        </td>
                                        <td>{{$order->order_number}}</td>
                                       
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->grand_total}}</td>
                                        <td>{!!'Order: '.ucfirst(trans($order->status)) .'<br>User: '.ucfirst(trans($order->user_status)).'<br>Payment: '.ucfirst(trans($order->payment_status)) !!}</td>
                                        
                                        
                                        <td style="width: 12%;">
                                            {{-- <a href="{{route('order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('pdf-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-print"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> --}}


                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                <li class="action"><a href="{{url('/order-invoice/'.$order->id)}}" class="btn" ><i class="fas fa-eye"></i> Invoice </a></li>
                                                <li class="action"><a href="{{url('/invoice/pdf/'.$order->id)}}" target="_blank" class="btn" ><i class="fas fa-print"></i> PDF </a></li>

                                            </ul>
                                                </div>

                                        </td>

                                    </tr>@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection