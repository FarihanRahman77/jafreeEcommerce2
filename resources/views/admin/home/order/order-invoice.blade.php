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
                  
                    @foreach($settings as $setting)
                        <div><img src="{{ asset($setting->shop_logo) }}" width="70" height="55"></div>
                        <div style="font-size: .9rem;">Phone: {{$setting->phone_no}} {{$setting->mobile_no}} Email:  {{$setting->email}}</div><br>
                    @endforeach
                    
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-7 invoice-col" style="font-size: .9rem;">
                    @foreach($invoice as $user)
                        <address>
                            <div><strong>Name : </strong>{{$user->full_name}}</div>
                            <div><strong>Phone: </strong>{{$user->phone_number}} <strong>Email: </strong>{{$user->email}}</div>
                            <div><strong>Address: </strong>{{$user->address}} , {{$user->city}}</div>
                        </address>
                        @break
                    @endforeach
                </div>
                
                <!-- /.col -->
                <div class="col-sm-5 invoice-col" style="font-size: .9rem;">
                    @foreach($invoice as $info)
                        <div><strong>Invoice #{{$info->order_number}}</strong></div>
                        <div><strong>Order Date: </strong> {{$info->created_at}}</div>
                        <div><strong>Status: </strong> {{ucfirst(trans($info->status)).', '.ucfirst(trans($info->payment_status))}}</div>
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
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php 
                            $i = 1;
                        @endphp
                        @foreach($invoice as $products)
                        @php
                        if($products->real_amount != $products->salesAmount){
                            $realAmount = '<br>'.Session::get('currency').'<strike>'.$products->real_amount.'</strike>';
                        }else{
                            $realAmount = '';
                        }
                        @endphp
                    <tr>
                      <td>{{$i++}}</td>
                      <td><img src="{{asset('product-thumbnail-image/'.$products->productImage)}}" width="50" height="40"></td>
                      <td>{{$products->productName.' - '.$products->specificationName}}</td>
                      <td>{{$products->quantity}}</td>
                      <td>{!!Session::get('currency').' '.$products->salesAmount.' '.$realAmount!!}</td>
                      <td>{!!Session::get('currency').' '.$products->totalAmount!!}</td>
                    </tr>
                    @endforeach
                
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-md-6">
                  
                </div>
                <!-- /.col -->
                <div class="col-md-6">

                  <div class="table-responsive">
                    <table class="table">
                        @foreach ($invoice as $expense)
                            
                            @php
                            $totalCost = floatval($expense->grand_total);
                            $shippingCost = floatval($expense->shipping_cost);
                            $subTotal = $totalCost - $shippingCost;
                            @endphp
                        
                      <tr>
                        <th style="width:70%">Subtotal:</th>
                        <td>{!!Session::get('currency').' '.$subTotal!!}</td>
                      </tr>
                      
                      <tr>
                        <th>Shipping:</th>
                        <td>{!!Session::get('currency').' '.$shippingCost!!}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><b>{!!Session::get('currency').' '.$totalCost!!}</b></td>
                      </tr>
                      @break
                      @endforeach
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              @php
                $status = '';
                $orderId = '';
              @endphp
              <div class="row no-print">
                <div class="col-12"> 
                @foreach ($invoice as $item)
                  <a href="{{route('pdf-invoice',['id'=>$item->order_id])}}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <!--button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> 
                  </button-->
                  @if ($item->payment_status != 'paid')
                    <a href="{{route('admin-order-payment',['id'=>$item->order_id])}}" class="btn btn-primary float-right" style="margin-right: 5px;"  onclick="return confirm('Are you sure to receive payment?');">
                        <i class="far fa-credit-card"></i> Submit Payment
                    </a>
                  @endif
                  {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"> --}}
                   
                  
                    <a href="{{route('pdf-invoice',['id'=>$item->order_id])}}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generate PDF
                    </a>
                    @php
                        $status = $item->status;
                        $orderId = $item->order_id;
                    @endphp
                  @break
                  @endforeach
                  @if ($status=="processing")
                  <a href="{{route('admin-order-complete',['id'=>$orderId])}}" class="btn btn-success float-right" style="margin-right: 5px;" onclick="return confirm('Are you sure to complete order?');">
                    <i class="fas fa-download"></i> Completed
                  </a>
                  @endif
                  @if ($status!="completed")
                  <a href="{{route('admin-order-cancel',['id'=>$orderId])}}" class="btn btn-danger float-right" style="margin-right: 5px;" onclick="return confirm('Are you sure to cancel order?');">
                    <i class="fas fa-download"></i> Cancel
                  </a>
                  @endif
                  @if ($status=="pending")
                      
                  
                  <a href="{{route('admin-order-confirm',['id'=>$orderId])}}" class="btn btn-warning float-right" style="margin-right: 5px;" onclick="return confirm('Are you sure to confirm order?');">
                    <i class="fas fa-download"></i> Processing
                  </a>
                  @endif
                  {{-- </button> --}}
                </div>
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