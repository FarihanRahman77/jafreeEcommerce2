@extends('admin.master')
@section('title')
Admin Order Queue List
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
                            <div class="col-md-6"><h3>Order Queue List</h3></div>
                            <div class="col-md-6 text-right">
                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            </div>    
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="10%">Order Queue Number</th>
                                        <th width="20%">Party Info</th>
                                        <th width="25%">Note</th>
                                        <th width="25%">Reply</th>
                                        <th width="10%">Status</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php($i = 1)
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$order->order_no}}</td>
                                        <td>
                                            <b>Name: </b> {{$order->name}}<br>
                                            <b>Address: </b>{{$order->address}}<br>
                                            <b>Mobile: </b>{{$order->mobile}}
                                        </td>
                                        <td>{!! $order->note !!}</td>
                                        <td>{!! $order->reply !!}</td>
                                        <td>{{$order->status}}</td>
                                        <td style="width: 12%;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                    <li class="action"><a href="{{url('/order-view/'.$order->id)}}" class="btn" ><i class="fas fa-eye"></i> View </a></li>
                                                   
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
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