<!DOCTYPE html>
<html>
    @include('frontEnd.includes.header')	
    <body>
        <!-- header -->
        @include('frontEnd.includes.menue')		
        <!-- //header -->
        <!-- bannerLeftCategory -->
        <!-- banner -->
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
                    <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>| Best Deals</span>
                </div>
            </div>
        </div>
        <div class="fresh-vegetables">
             @include('frontEnd.home.topMainCategory')
        <div class="container">
                <h3 class="keyH3">Best Offer Products </h3>
            <div class="w3l_fresh_vegetables_grids">
                <div class="row w3l_fresh_vegetables_grid_right">
                 @foreach ($deals as $product)
                    <div class="col-md-2 col-xs-6 w31_fresh_margin_top_sub_cat">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="https://www.jaman.co.uk/frontEnd/images/offer.png" alt=" " class="img-responsive">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <p class="overFlowP">{{$product->productName}}</a></p>
                                            <!--p class="overFlowP"><a href="{{route('product-details',['id'=>$product->id])}}" style="margin-left:0; padding-left:0;">{{$product->productName}}</a></p-->
                                            @if(file_exists(public_path('productImage/'.$product->productImage)))
                                            <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/'.$product->productImage)}}" width="150" height="150" /></a>

                                            @else
                                            <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/product.jpg')}}" width="150" height="150" /></a>
                                            @endif
                                            
                                            @php
                                            $discount_amount='';
                                            $regular_price = 0;
                                            /*$regular_price = $product->amount;
                                            $discount_amount = $product->offerPrice;
                                            $after_discount_price = $regular_price-$discount_amount;*/
                                            //$minSpec = $product->spec->where('specPrice', $product->spec->min('specPrice'))->first();
                                            @endphp
                                            <div class="ratingDiv">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                        <div class="cartLower">
                                            <h4 style="margin: 1.3%;"><span id="currency{{$product->id}}" style="display:none;">{!!$currency!!}</span> <b id="price{{$product->id}}"></b> <span class="disCross" id="regPrice{{$product->id}}"></span> 
                                            </h4>
											<select name="priceSpecification" class="chooseSizeSub chose_sub_cat"  id="priceSpecification{{$product->id}}" onchange="changeSize({{$product->id}})">
												<!--<option value="" selected>Choose Size</option>-->
												
													<option value="{{$product->specId}}" Selected>{{$product->specificationName}}</option>
												
											</select>
											<select id="specPrice{{$product->id}}" style="display:none;">
											    <!--<option value="" selected>Choose Size</option>-->
												
													<option value="{{$product->specId}}" Selected>{{$product->specPrice}}</option>
												
											</select>
											<select id="discount{{$product->id}}" style="display:none;">
                        					    <!--<option value="" selected>Choose Size</option>-->
                        						
                        						    @if ($product->offerPrice != '')
                        						        @php
                        						            $lastChar = substr($product->offerPrice, -1); 
                        						            if($lastChar != '%'){
                        						                $discountPrice = $product->specPrice - $product->offerPrice;
                        						            }else{
                        						                $discountPrice = $product->specPrice - ($product->specPrice * (substr($product->offerPrice, 0, -1) / 100));
                        						            }
                        						        @endphp
                            							<option value="{{$product->specId}}">{{$discountPrice}}</option>
                        							@else
                        							    <option value="{{$product->specId}}">{{$specification->specPrice}}</option>
                        							@endif
                        						
                        					</select>
											<input type="number" min="1" class="chooseSizeSub" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" id="quantity_{{$product->id}}" name="quantity" value="1" style="width:50px;" />
                                        
                                        <div class="snipcart-details">
                                            <form action="#" method="post">
                                             @csrf
                                                <fieldset>
                                                    <input type="hidden" name="item_id" id="item_id_{{$product->id}}" value="{{$product->id}}" />
                                                    <input type="hidden" name="item_name" id="item_name_{{$product->id}}" value="{{$product->productName}}" />
                                                    <input type="hidden" name="item_image" id="item_image_{{$product->id}}" value="{{$product->productImage}}" />
                                                    @if ($discount_amount==null)
                                                    <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$regular_price}}" />
                                                    @else
                                                    <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$after_discount_price}}" />
    
                                                    @endif
                                                    <input type="hidden" name="discount_amount" id="discount_amount_{{$product->id}}" value="1.00" />
                                                    <a onclick="addToCart({{$product->id}})" class="button">
                                                        <input type="button" name="submit" value="Add to cart" class="button" />
                                                    </a>
                                                </fieldset>
                                        </div>
                                            </form>
                                        
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    var id = {{$product->id}};
                    $("#priceSpecification"+id).val($("#priceSpecification"+id).val());
                    changeSize(id);
                });
            </script>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
    
<div class="clearfix"></div>
    </div>
 </div>
<!-- newsletter -->
@include('frontEnd.home.newsLetter')
<!-- //newsletter -->
<!-- footer -->
@include('frontEnd.includes.footer')	
<!-- //footer -->
<!-- Core JavaScript -->
@include('frontEnd.includes.scripts')
<!-- //Core JavaScript -->
<script>
	
</script>
</body>
</html>
