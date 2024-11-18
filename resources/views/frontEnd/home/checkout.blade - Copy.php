<!DOCTYPE html>
<html lang="zxx">
    @include('frontEnd.includes.header')

    <!-- navigation -->
    @include('frontEnd.includes.menue')
    <!-- //navigation -->

    <div class="banner">
        <!-- bannerLeftCategory -->
        @include('frontEnd.home.bannerLeftCategory')
        <!-- //bannerLeftCategory -->
        <!-- products-breadcrumb -->
        <div class="products-breadcrumb">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>|</span></li>
                <li>Checkout</li>
            </ul>
        </div>
        <div class="w3l_banner_nav_right">
            <!-- about -->
            <div class="privacy about">
                <h3>Chec<span>kout</span></h3>

                <div class="checkout-right">
                    <h4>Your shopping cart contains: ds <span>{{$cartProducts->itemLength}} Products</span></h4>
                    <table class="timetable_sub">
                        <thead>
                            <tr>
                                <th>SL No.</th>	
                                <th>Product</th>
                                <th>Quality</th>
                                <th>Product Name</th>

                                <th>Price</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @for($i = 1; $i <= $cartProducts->itemLength; $i++)
                                @php 
                                    $itemName = "item_name_".$i; 
                                    $itemAmount = "amount_".$i; 
                                    $itemQuantity = "quantity_".$i;
                                    $itemId = "item_id_".$i;
                                    $total = "total_".$i;
                                    $discount = "discount_".$i;
                                @endphp
                                
                                    
                                <tr class="rem1">
                                    <td class="invert">{{$i}}</td>
                                    <td class="invert-image"><a href="single.html"><img src="{{asset('frontEnd/images/1.png')}}" alt=" " class="img-responsive"></a></td>
                                    <td class="invert">
                                        <div class="quantity"> 
                                            <div class="quantity-select">                           
                                                <button class="entry value-minus" onclick="buttonClickDOWN('{{$itemId}}');" >&nbsp;</button>
                                                <input class="entry value" id="{{$itemId}}" value="{{$cartProducts->$itemQuantity}}"></input>
                                                <button class="entry value-plus" onclick="buttonClickUP('{{$itemId}}');">&nbsp;</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="invert">{{$cartProducts->$itemName}} 
                                        <br>
                                        @if($cartProducts->$discount!='' && $cartProducts->$discount>0)
                                        <span style="color:gray;">Discount : {{$cartProducts->$discount}} Tk </span>
                                        @endif
                                    </td>

                                    <td class="invert">{{$cartProducts->$itemAmount}} Tk</td>
                                    <td class="invert">{{$cartProducts->$total}} Tk</td>
                                    <td class="minicart-item">
                                        
										<div class="rem">
                                            <a href="#" onclick="removeItem({{$i-1}})"><div class="close1"></div></a>
                                        </div>

                                    </td>
                                </tr>
                            @endfor
                            
                            
                         

                        </tbody></table>
                </div>
                <div class="checkout-left">	
                    <div class="col-md-4 checkout-left-basket">
                        <h4>Continue to basket</h4>
                        <ul>
                            @php 
                                $totalAmount = 0; 
                            @endphp
                            @for($i = 1; $i <= $cartProducts->itemLength; $i++)
                                @php 
                                    $itemName = "item_name_".$i; 
                                    $total = "total_".$i;
                                    $totalAmount += $cartProducts->$total;
                                    
                                @endphp
                                <li>{{$cartProducts->$itemName}}<i>-</i> <span>{{$cartProducts->$total}} Tk</span></li>
                            @endfor
                            <li>Total <i>-</i> <span>{{$totalAmount}} Tk</span></li>
                        </ul>
                    </div>
                    <div class="col-md-8 address_form_agile">
                        <h4>Add a new Details</h4>
                        <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                <div class="information-wrapper">
                                    <div class="first-row form-group">
                                        <div class="controls">
                                            <label class="control-label">Full name: </label>
                                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                        </div>
                                        <div class="w3_agileits_card_number_grids">
                                            <div class="w3_agileits_card_number_grid_left">
                                                <div class="controls">
                                                    <label class="control-label">Mobile number:</label>
                                                    <input class="form-control" type="text" placeholder="Mobile number">
                                                </div>
                                            </div>
                                            <div class="w3_agileits_card_number_grid_right">
                                                <div class="controls">
                                                    <label class="control-label">Landmark: </label>
                                                    <input class="form-control" type="text" placeholder="Landmark">
                                                </div>
                                            </div>
                                            <div class="clear"> </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Town/City: </label>
                                            <input class="form-control" type="text" placeholder="Town/City">
                                        </div>
                                        <div class="controls">
                                            <label class="control-label">Address type: </label>
                                            <select class="form-control option-w3ls">
                                                <option>Office</option>
                                                <option>Home</option>
                                                <option>Commercial</option>

                                            </select>
                                        </div>
                                    </div>
                                    <button class="submit check_out">Delivery to this Address</button>
                                </div>
                            </section>
                        </form>
                        <div class="checkout-right-basket">
                            <a href="{{url('payment/')}}">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                        </div>
                    </div>

                    <div class="clearfix"> </div>

                </div>

            </div>
            <!-- //about -->
        </div>
        <div class="clearfix"></div>
    </div>        
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
    var el = document.getElementById(id);
    el.value = Number(el.value) + 1;
  }

  function buttonClickDOWN(id) {
    var el = document.getElementById(id);
    if(el.value == 1) return false;
    el.value = Number(el.value) - 1;
  }
</script>