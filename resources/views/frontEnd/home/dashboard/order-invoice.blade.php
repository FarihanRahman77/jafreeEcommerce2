<!DOCTYPE html>
<html lang="zxx">
@include('frontEnd.includes.header')

<body>
    <!-- navigation -->
    @include('frontEnd.includes.menue')
<div class="container">
    <div class=" col-md-3 banner">
        <!-- bannerLeftCategory -->
        @include('frontEnd.home.bannerLeftCategory')
        <!-- //bannerLeftCategory -->
    </div>
    <div class="col-md-9">
        <div class="w3l_banner_nav_right">
    
            <section class="slider">
                <div class="userDashboard">
                     <div class="invoice p-3 mb-3">
                        <div class="col-12 text-center">
                            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            @foreach($settings as $setting)
                                <div><img src="{{ asset($setting->shop_logo) }}" width="70" height="55"><strong style="font-size: 1.5rem;">{{$setting->shop_name}}  </strong></div>
                                <div style="font-size: .8rem;">Phone: {{$setting->phone_no}} {{$setting->mobile_no}} Email:  {{$setting->email}}</div><br>
                            @endforeach
                        </div>
                                <!-- /.col -->
                             
                  <!-- info row -->
                    <div class="invoice-info text-center">
                        <div class="col-sm-8 invoice-col" style="font-size: .9rem;text-align: left;">
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
                        <div class="col-sm-4 invoice-col" style="font-size: .9rem;text-align: left;">
                            @foreach($invoice as $info)
                                <div><strong>Invoice #{{$info->order_number}}</strong></div>
                                <div><strong>Order Date: </strong> {{$info->created_at}}</div>
                                <div><strong>Status: </strong> {{$info->status}}</div>
                            @break
                            @endforeach
                        </div>
                    <!-- /.col -->
                    </div>
                  <!-- /.row -->
    
                  <!-- Table row -->
                <div class="col-12">
                     <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
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
            </div>
            </section>
            <!-- flexSlider -->
            <link rel="stylesheet" href="{{asset('frontEnd/css/flexslider.css')}}" type="text/css" media="screen" property="" />
            <script defer src="{{asset('frontEnd/js/jquery.flexslider.js')}}"></script>
            <script type="text/javascript">
                $(window).load(function () {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function (slider) {
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
            <!-- //flexSlider -->
        </div>
        </div>
        <div class="clearfix"></div>
    <br><br>
</div>



<!-- //welcome -->

<!-- newsletter -->
@include('frontEnd.home.newsLetter')
<!-- newsletter -->

<!-- footer section -->
@include('frontEnd.includes.footer')
<!-- footer section -->
@include('frontEnd.includes.scripts')




</body>
</html>