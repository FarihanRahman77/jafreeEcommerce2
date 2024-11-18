<!DOCTYPE html>
<html>
    <head>
       <style>
        .citiestd13 {background-color: gray;color: white;text-align: center;font-size: 13px;padding: 5px;}
        .citiestd14 {text-align: center;font-size: 11px;}
        .citiestd15 {text-align: left;font-size: 11px;}
        .supAddress {font-size: 12px;}
		.supAddressFont {font-size:11px;}
		table {
		width:100%;    
        border-collapse: collapse;
        margin: 0px 0;
        font-size: 0.8em;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        thead tr {
            background-color: #ffff;
            color: black;
            text-align: left;
        }
        th, td {
            padding: 12px 15px;
        }
        
    </style>
       
    
    </head>
<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">



          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="col-sm-12" style="text-align: center;">
            @foreach($settings as $setting)
                <div><img src="{{ asset($setting->shop_logo) }}" width="140" height="55"></div>
                <div><strong style="font-size: 1rem;"> {{$setting->shop_name}} </strong></div>
                <div class="citiestd14">Phone: {{$setting->phone_no}} {{$setting->mobile_no}} Email:  {{$setting->email}}</div><br>
            @endforeach
            
            <div class="citiestd13">Order Invoice Reports</div>
            
                  @foreach ($orders as $order)
                  {{ ucfirst($order->status) }} Orders -
                  {{Carbon\Carbon::now()->format('d/m/Y')}}
                  @break
                  @endforeach

            
            </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
          
            <!-- /.row -->

            <!-- Table row -->
            <br>
            <div class="row">
              <div class="col-12">
                @php
                    $productImage = '/shopLogo/SornaShopLogo.jpg';
                @endphp
                 {{-- <img src="{{url('/shopLogo/SornaShopLogo.jpg') }}"  height="100"/> --}}
                  <!--<img src="http://127.0.0.1:8000/productImage/8901526211760_T1.jpg" />-->
                <table border="1" cellspacing="0" cellpadding="3">
                    <thead class="citiestd13">
                        <tr>
                        <th>#</th>
                        <th >Order ID</th>
                        <th>Order Date</th>
                        <th>Delivery Location</th>
                        <th>Customer Info</th>
                        <th>Total</th>
                        </tr>
                    </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach ($orders as $order)

                   
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                        <td>{{ $order->address }}, {{ $order->city }}</td>
                        <td>{{ $order->full_name }}<br>{{ $order->phone_number }}</td>
                        <td>{!!Session::get('currency').' '. $order->grand_total !!}</td>
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
                    <table>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total:</td>
                        <td>{!!Session::get('currency').' '.$totalGrandTotal!!}</td>
                        </tr>
                    </table>
                </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>
</html>