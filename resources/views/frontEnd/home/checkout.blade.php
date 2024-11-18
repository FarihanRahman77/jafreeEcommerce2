<!DOCTYPE html>
<html lang="zxx">
@include('frontEnd.includes.header')

<!-- navigation -->
@include('frontEnd.includes.menue')
<!-- //navigation -->
    <div class="topBreadcrumb">
        <div class="container">
            <div class="col-md-3">
                <div class="catDisplay" style="padding-right: 0px;padding-left: 0px;">
                    @include('frontEnd.home.bannerLeftCategory')
                </div>
                <div class="panel panel-default catColMenu" style="position: absolute;z-index: 4;width: 250px;">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           <i class="fa fa-bars"></i> <a data-toggle="collapse" href="#collapse1"> CATEGORIES </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        @include('frontEnd.home.topLeftCategory')
                    </div>
                </div>
            </div>
            <div class="col-md-9 text-right" style="font-size: 12px;">
                <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>| Checkout</span>
            </div>
        </div>
    </div>
    <div class="fresh-vegetables">
        <!-- about -->
        <div class="container">
        <div class="privacy about">
            <h3 style="padding-top: 0%;text-align: left;font-size: 1.5em;">Checkout</h3>

            <h4 class="text-center text-danger">{{Session::get('message')}}</h3>

            {!!Form::open(['url'=>'payment/','class'=>'creditly-card-form agileinfo_form' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="checkout-right">
                <h4>Your shopping cart contains: <span> Products</span></h4>
                <div class="table-responsive">
                <table class="timetable_sub" width="100%" >
                    <thead>
                        <tr>
                            <th>#SL</th>	
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody id="checkout_page">
                      @php
                      $i = 0;
                      $grandTotal = 0;
                      @endphp
                      @if (Session::get("cart_array") != null)
                          @foreach(Session::get("cart_array") as $keys => $values)
                          @php
                          $i++;
                          @endphp
    
                            <tr class="rem1">
                                <td class="invert checkoutSl">{{$i}}</td>
                                
                                <td class="invert invert-image">
                                    @if(Session::get("cart_array")[$keys]["product_image"])
                                    <a href="#">
                                    <img src="{{asset('product-thumbnail-image/'.Session::get("cart_array")[$keys]["product_image"])}}" alt=" " class="img-responsive"></a>
                                    @else
                                    <a href="#">
                                        <img src="{{asset('productImage/product.jpg')}}" alt=" " class="img-responsive"></a>
                                        @endif
                                    {{Session::get("cart_array")[$keys]["product_name"]}}
                                </td>                                   
                                <td class="invert checkoutincrement">
                                    <div class="quantity checkoutincrementMobile"> 
                                        <div class="quantity-select">                           
                                            <a href="#/" class="entry value-minus" onclick="buttonClickDOWN('{{Session::get("cart_array")[$keys]["product_id"]}}');">&nbsp;</a>
                                            <input class="entry value" id="{{Session::get("cart_array")[$keys]["product_id"]}}" value="{{Session::get("cart_array")[$keys]["product_quantity"]}}"></input>
                                            <a href="#/" class="entry value-plus" onclick="buttonClickUP('{{Session::get("cart_array")[$keys]["product_id"]}}');">&nbsp;</a>
                                        </div>
                                    </div>
                                </td>
                                        @php
                                        if(Session::get("cart_array")[$keys]["product_price"] != Session::get("cart_array")[$keys]["product_discount"]){
                                            $productPrice = Session::get("cart_array")[$keys]["product_discount"];
                                            $strikePrice = Session::get("cart_array")[$keys]["product_price"];
                                            $totalStrike = Session::get("currency").' <strike>'.(Session::get("cart_array")[$keys]["product_quantity"]*$strikePrice).'</strike>';
                                            $strikePrice = Session::get("currency").' <strike>'.$strikePrice.'</strike>';
                                        }else{
                                            $productPrice = Session::get("cart_array")[$keys]["product_price"];
                                            $strikePrice = '';
                                            $totalStrike = '';
                                        }
                                        $totalProductPrice = (Session::get("cart_array")[$keys]["product_quantity"]*$productPrice);
                                        $grandTotal += $totalProductPrice;
                                        $productPrice = Session::get("currency").' '.$productPrice;
                                         $totalProductPrice = Session::get("currency").' '.$totalProductPrice;
                                        @endphp
                                <td class="invert checkoutPrice" id="td_produtPrice_{{Session::get("cart_array")[$keys]["product_id"]}}">{!!$productPrice!!} <br>{!!$strikePrice!!}</td>
                                <td class="invert checkoutTotalPrice" id="td_produtTotal_{{Session::get("cart_array")[$keys]["product_id"]}}">{!!$totalProductPrice!!} <br>{!!$totalStrike!!} </td>
                                <td class="invert checkoutRemove">
                                    <div class="rem">
                                    <a href="#" onclick="removeCartProduct({{Session::get('cart_array')[$keys]['product_id']}})"><i class="fa fa-trash" style="font-size:16px;color:red"></i></a>
                                </div>
        
                                </td>
                            </tr>
    
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="2"></td><td colspan="2">Grand Total  </td>
                            <td>{!!Session::get("currency")!!} <span id = "grandTotalTemp">{{$grandTotal}}</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td><td colspan="2">Carring Cost  </td>
                            <td><span id="carringCostCurrency" style="display:none;">{!!Session::get("currency")!!}</span> <input type="text" Readonly id = "carringCostId" name="carringCost" style="width: 50%;" /></td>
                            <td></td>
                        </tr> 

                        <tr>
                            <td colspan="2"></td><td colspan="2">Net Payable  </td>
                            <td><span id="netPayableCurrency" style="display:none;">{!!Session::get("currency")!!}</span> <input type="text" Readonly id = "netPayableId" name="netPayable" style="width: 50%;"/></td>
                            <td></td>
                        </tr>    

                    </tbody>
                </table>
                </div>
            </div>
            <div class="checkout-left">	
                <div class="col-md-4 checkout-left-basket">
                    <h4><a href="{{url('/')}}">Continue to shopping</a> </h4>
                    <ul>

                    </ul>
                </div>
                <div class="col-md-8 address_form_agile">
                    <h4>Add Shopping Details</h4>
                    
                    @php
                    if(isset($user_Address->name)){
                    $name = $user_Address->name;
                    $phone = $user_Address->phone;
                    $address = $user_Address->address;
                    $location = $user_Address->location;
                }else{
                $name = '';
                $phone = '';
                $address= '';
                $location = '';
            }
            @endphp
            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                <input type="hidden" id="grandTotal" name="grandTotal" value="{{$grandTotal}}" />
                <input type="hidden" id="itemCount" name="itemCount" value="{{$i}}" />
                    <div class="information-wrapper">
                        <div class="first-row form-group">
                            <div class="col-md-12">
                                <div class="col-md-6 controls">
                                    <label class="control-label">Full name: </label>
                                    <input class="billing-address-name form-control" type="text" id="name" value="{{$name}}" name="name" placeholder="Full name">
                                </div>
                                
                                <div class="col-md-6 controls">
                                    <label class="control-label">Mobile number:</label>
                                    <input class="form-control" type="text" id="mobile" name="mobile" value="{{$phone}}" placeholder="Mobile number" required>
                                </div>
                             
                                <div class="col-md-12 controls">
                                    <label class="control-label">Address: </label>
                                    <textarea class="form-control" id="address" name="address" value="" placeholder="Address Here" required>{{$address}}</textarea>
                                </div>
                            
                
                                @if(isset(Auth::user()->utype))
                                @if(Auth::user()->utype ==='ADM')
                                <select class="form-control dynamic" name="user_id">
                                    <option value="" selected="">~~ Select User ~~</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach 
                                </select>
                                @endif
                                @endif
                                <br>
                                    <div class="col-md-12 controls">
                                        <label class="control-label">Town/City:</label>
                                        <select required="" class="form-control dynamic" data-dependent="subCategoryName" id="locationSelectionId" name="location_carring_cost_id">
                                            <option value="" selected="">~~ Select City Location ~~</option>
                                            @if($carringCostList != null)
                                            @foreach($carringCostList as $list)
                                            <option data-foo="{{$list->cost}}" value="{{$list->id}}">{{$list->location}}</option>
                                            @endforeach 
                                            @endif
                                        </select>
                                    </div>    
                                <div class="checkout-right-basket">
                                    <button type="submit">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
                                </div>
                </section>
                            </div>  
                        </div>
                    </div>


            </div>

    <div class="clearfix"> </div>

</div>
{!!Form::close()!!}
</div>
<!-- //about -->
</div>
<div class="clearfix"></div>
</div>     
<script>
$("#carringCostCurrency").hide();
$("#netPayableCurrency").hide();
    $('#locationSelectionId').change(function(e) {
        if($("#locationSelectionId").val() != ""){
            var selected = $(this).find('option:selected');
            var cost = selected.data('foo')
            var costTk = cost;
            $("#carringCostCurrency").show();
            $("#carringCostId").val(costTk);
            //var grandTotal = {{json_encode($grandTotal)}};
            var grandTotal = $("#grandTotalTemp").html();
            var netPayable = parseFloat(cost)+parseFloat(grandTotal);
            $('#grandTotal').val(netPayable);
            var netPayableTk = netPayable; 
            $("#netPayableId").val(netPayableTk);
            $("#netPayableCurrency").show();
        }
    });
    </script>   
    <!-- newsletter -->
    @include('frontEnd.home.newsLetter')
    <!-- newsletter -->

    <!-- footer section -->
    @include('frontEnd.includes.footer')
    <!-- footer section -->
    <!-- Core JavaScript -->
    @include('frontEnd.includes.scripts')
    <!-- //Core JavaScript -->
    </html>
    <script>
        function buttonClickUP(id) {
    /*var el = document.getElementById(id);
    el.value = Number(el.value) + 1;*/
    var quantity = Number($("#"+id).val());
    quantity++;
    $("#"+id).val(quantity);
	/*var productPrice = parseFloat($("#td_produtPrice_"+id).html());
	$("#"+id).val(quantity);
	$("#td_produtTotal_"+id).html((quantity*productPrice) + " Tk");*/
	updateCart(id, quantity,"checkout");
	//viewCart();
}

function buttonClickDOWN(id) {
    var quantity = Number($("#"+id).val());
    if(quantity >1){
      quantity--;
      $("#"+id).val(quantity);
  }
  updateCart(id, quantity,"checkout");
	//viewCart();
	/*var productPrice = parseFloat($("#td_produtPrice_"+id).html());
	$("#"+id).val(quantity);
	$("#td_produtTotal_"+id).html((quantity*productPrice) + " Tk");*/
	
}
</script>