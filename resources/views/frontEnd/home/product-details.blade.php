<!DOCTYPE html>
<html>
@include('frontEnd.includes.header')
<body>
    @include('frontEnd.includes.menue')


    <!-- //script-for sticky-nav -->

    <!-- //header -->
    <!-- products-breadcrumb -->
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
                    <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>| View Details</span>
                </div>
            </div>
        </div>
    
    <!-- //products-breadcrumb -->
    <!-- banner -->
    <div class="fresh-vegetables">
             @include('frontEnd.home.topMainCategory')
        <div class="container"><h3 class="keyH3">Best Offer Products <span class="blink_me"></span></h3>
            <div class="agileinfo_single" style="padding: 1em;">
                <div class="col-md-4 agileinfo_single_left">
                    <!-- <img id="example" src="{{asset('productImage/'.$product->productImage)}}" alt=" " class="img-responsive" /> -->
                    @if(file_exists(public_path('productImage/'.$product->productImage)))
                    <img title=" " alt=" " src="{{asset('productImage/'.$product->productImage)}}" width="250" height="250" class="img-responsive" />

                    @else
                    <img title=" " class="img-responsive" alt="" src="{{asset('productImage/product.jpg')}}" width="250" height="250" />
                    @endif
                </div>
                <div class="col-md-8 agileinfo_single_right">
                    <h2>{{$product->productName}}</h2>
                    <div class="rating1">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" checked>
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span> reviews
                    </div>
               <div class="w3agile_description">
                <h4>Description :</h4>
                <p>{!!$product->productShortDescription!!}</p>
            </div>
            <div class="snipcart-item block">

                @php
                $discount_amount='';
                $regular_price = 0;
                //$regular_price = $product->amount;
               // $discount_amount = $product->offerPrice;
                //$after_discount_price = $regular_price-$discount_amount;
                $minSpec = $product->spec->where('specPrice', $product->spec->min('specPrice'))->first();
                @endphp

                <div class="snipcart-thumb agileinfo_single_right_snipcart">
                    <h4 style="margin-bottom: 1.3%;"><span id="currency{{$product->id}}" style="display:none;">{!!$currency!!}</span> <b id="price{{$product->id}}"></b>
                        <span class="disCross" id="regPrice{{$product->id}}"></span>
                    </h4>
                    <select name="priceSpecification" style="background-color: white;cursor: pointer;padding: 0.455%;" id="priceSpecification{{$product->id}}" onchange="changeSize({{$product->id}})">
						<option value="" selected>Choose Size</option>
						@foreach ($product->spec as $specification)
							<option value="{{$specification->id}}">{{$specification->specificationName}}</option>
						@endforeach
					</select>
					<select id="specPrice{{$product->id}}" style="display:none;">
					    <option value="" selected>Choose Size</option>
						@foreach ($product->spec as $specification)
							<option value="{{$specification->id}}">{{$specification->specPrice}}</option>
						@endforeach
					</select>
					<select id="discount{{$product->id}}" style="display:none;">
					    <option value="" selected>Choose Size</option>
						@foreach ($product->spec as $specification)
						    @if ($specification->offerPrice != '')
						        @php
						            $lastChar = substr($specification->offerPrice, -1); 
						            if($lastChar != '%'){
						                $discountPrice = $specification->specPrice - $specification->offerPrice;
						            }else{
						                $discountPrice = $specification->specPrice - ($specification->specPrice * (substr($specification->offerPrice, 0, -1) / 100));
						            }
						        @endphp
    							<option value="{{$specification->id}}">{{$discountPrice}}</option>
							@else
							    <option value="{{$specification->id}}">{{$specification->specPrice}}</option>
							@endif
						@endforeach
					</select>
					<input type="number" min="1" id="quantity_{{$product->id}}" name="quantity" value="1" style="width:50px;" />
				<div class="snipcart-details agileinfo_single_right_details">
                    <form action="#" method="post" style="margin: -21% -95% 0% 125%;">
                        
                                <!-- <input type="hidden" name="cmd" value="_cart" />
                                <input type="hidden" name="add" value="1" />
                                <input type="hidden" name="business" value=" " />
                                <input type="hidden" name="item_name" value="pulao basmati rice" />
                                <input type="hidden" name="amount" value="21.00" />
                                <input type="hidden" name="discount_amount" value="1.00" />
                                <input type="hidden" name="currency_code" value="USD" />
                                <input type="hidden" name="return" value=" " />
                                <input type="hidden" name="cancel_return" value=" " />
                                <input type="submit" name="submit" value="Add to cart" class="button" /> 
                                <input type="hidden" name="quantity" id="quantity_{{$product->id}}" value="1" />-->
                                <input type="hidden" name="item_id" id="item_id_{{$product->id}}" value="{{$product->id}}" />
                                <input type="hidden" name="item_name" id="item_name_{{$product->id}}" value="{{$product->productName}}" />
                                <input type="hidden" name="item_image" id="item_image_{{$product->id}}" value="{{$product->productImage}}" />
                                @if ($discount_amount==null)
                                <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$regular_price}}" />
                                @else
                                <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$after_discount_price}}" />
                                @endif
                                <input type="hidden" name="discount_amount" id="discount_amount_{{$product->id}}" value="1.00" />
                                <a onclick="addToCart({{$product->id}})">
                                    <input style="padding: 0.4em;" type="button" name="submit" value="Add to cart" class="button" />
                                </a>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var id = {{$product->id}};
        $("#priceSpecification"+id).val({{$minSpec->id}});
        changeSize(id);
    });
</script>
<!-- //banner -->
<!-- brands -->

@include('frontEnd.home.topProducts')


<!-- //brands -->
<!-- newsletter -->

<!-- //newsletter -->
<!-- footer -->

<!-- //footer -->

<!-- Bootstrap Core JavaScript -->
{{--<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
            );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
            */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <!-- //here ends scrolling icon -->
    <script src="js/minicart.js"></script>
    <script>
        paypal.minicart.render();

        paypal.minicart.cart.on('checkout', function (evt) {
            var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>--}}

@include('frontEnd.home.newsLetter')
<!-- //newsletter -->
<!-- footer -->
@include('frontEnd.includes.footer')
<!-- //footer -->
<!-- Core JavaScript -->
@include('frontEnd.includes.scripts')
</body>
</html>