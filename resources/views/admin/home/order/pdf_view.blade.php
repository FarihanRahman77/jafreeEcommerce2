<!DOCTYPE html>
<html>
<head>
    <title>Jaman | Pdf Report</title>
    <style>
        .citiestd13 {background-color: gray;color: white;text-align: center;font-size: 13px;padding: 5px;}
        .citiestd14 {text-align: center;font-size: 11px;}
        .citiestd15 {text-align: left;font-size: 11px;}
        .citiestd16 {text-align: center;font-size: 11px;}
        .citiestd17 {text-align: right;font-size: 11px;}
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
            padding: 5px 5px;
        }
        
    </style>
</head>
<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12" style="text-align: center;">
            @foreach($settings as $setting)
                <div><img src="{{ public_path($setting->shop_logo) }}" width="140" height="55"></div>
                <div><strong style="font-size: 1rem;"> {{$setting->shop_name}} </strong></div>
                <div class="citiestd14">Phone: {{$setting->phone_no}}  Alternate number: {{$setting->mobile_no}} Email:  {{$setting->email}}</div><br>
            @endforeach
            <div class="citiestd13">Product Invoice </div>
            
            <table border="" cellspacing="0" cellpadding="3">
    			<tr>
    				<td width="60%" class="supAddress">
    				     @foreach($invoice as $user)
                                <div><strong>Name : </strong>{{$user->full_name}}</div>
                                <div><strong>Phone: </strong>{{$user->phone_number}} <strong>Email: </strong>{{$user->email}}</div>
                                <div><strong>Address: </strong>{{$user->address}} , {{$user->city}}</div>
                            @break
                        @endforeach
    				</td>
    				<td width="40%" class="supAddress">
    				    @foreach($invoice as $info)
                            <div><strong>Invoice #{{$info->order_number}}</strong></div>
                            <div><strong>Order Date: </strong> {{$info->created_at}}</div>
                            <div><strong>Status: </strong> {{ucfirst(trans($info->status)).'  '.ucfirst(trans($info->payment_status))}}</div>
                        @break
                        @endforeach
    				</td>
    			</tr>
			
		    </table><br>
            <table border="1" cellspacing="0" cellpadding="3">
                <thead><tr><th>SL</th><th>Image</th><th>Product</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
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
                            <td><img src="{{public_path('product-thumbnail-image/'.$products->productImage)}}" width="50" height="40"></td>
                            <td class="citiestd15">{{$products->productName.' - '.$products->specificationName}}</td>
                            <td class="citiestd16">{{$products->quantity}}</td>
                            <td class="citiestd16">{!!Session::get('currency').' '.$products->salesAmount.' '.$realAmount!!}</td>
                            <td class="citiestd17">{!!Session::get('currency').' '.$products->totalAmount!!}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table><br>
              
            <table border="" cellspacing="0" cellpadding="3">
                @foreach ($invoice as $expense)
                    @php
                    $totalCost = floatval($expense->grand_total);
                    $shippingCost = floatval($expense->shipping_cost);
                    $subTotal = $totalCost - $shippingCost;
                    @endphp
                
                <tr><td width="65%"></td><td width="20%">Subtotal :</td><td width="10%" class="citiestd17"> {!!Session::get('currency').' '.$subTotal!!}</td></tr>
                <tr><td width="65%"></td><td width="20%">Shipping :</td><td width="10%" class="citiestd17"> {!!Session::get('currency').' '.$shippingCost!!}</td></tr>
                <tr><td width="65%"></td><td width="20%">Total :</td><td width="10%" class="citiestd17"> {!!Session::get('currency').' '.$totalCost!!}</td></tr>
                
                @break
                @endforeach
            </table>
            <br><br>
            <table>        
                <tr><td width="85%">.....................<br> Checked By </td><td width="25%">.....................<br> Authorized Sign </td></tr>
                
            </table>
                 
            </div>
            </div>
        </div>
    </section>

  </div>
</body>
</html>