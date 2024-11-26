@extends('admin.master')
@section('title')
Admin Order-Invoice
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: .1rem;">
      <div class="container-fluid" >
        <div class="row mb-2">
            <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12" style="text-align: center;">

                  <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                      <div><img src="{{asset('website/images/setting/'.$settings->landscape_image)}}" width="180" height="55"></div>
                      <div style="font-size: .9rem;">Phone: {{$settings->phone_no}} {{$settings->mobile_no}} Email:  {{$settings->email}}</div><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-7 invoice-col" style="font-size: .9rem;">
                    @foreach($invoice as $user)
                        <address>
                            <div><strong>Name : </strong>{{$user->name}}</div>
                            <div><strong>Phone: </strong>{{$user->mobile}} <strong><br>Email: </strong>{{$user->email}}</div>
                            <div><strong>Address: </strong>{{$user->address}} </div>
                        </address>
                        @break
                    @endforeach
                </div>
                
                <!-- /.col -->
                <div class="col-sm-5 invoice-col" style="font-size: .9rem;">
                    @foreach($invoice as $info)
                        <div><strong>Invoice #{{$info->order_no}}</strong></div>
                        <div><strong>Order Date: </strong> {{$info->order_datetime}}</div>
                        <div><strong>Status: </strong> {{$info->status}}</div>
                    @break
                    @endforeach
                </div>
                <!-- /.col -->
                </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Product Model</th>
                      <th>Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php 
                        $i = 1;
                    @endphp
                    @foreach($invoice as $products)
                    <tr>
                      <td>{{$i++}}</td>
                      <td><img src="{{$settings->erp_baseurl.'/images/products/thumb/'.$products->productImage}}" width="50" height="40"></td>
                      <td>{{$products->productName}}</td>
                      <td>{{$products->modelNo}}</td>
                      <td>{{$products->quantity}}</td>
                    </tr>
                    @endforeach
                
                    </tbody>
                  </table>
                </div>
                <div class="col-md-12">
                  <form action="{{route('order-reply')}}"  method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="order_id" id="order_id" value="{{$order->id}}">
                    <div class="form-group">
                        <label for="form-message">Reply</label>
                        <textarea name="reply" id="reply" class="form-control" rows="4" placeholder="Reply">{{@$order->reply}}</textarea>
                        <span id="replyError" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Reply</button>
                    </div>
                  </form>
                </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection