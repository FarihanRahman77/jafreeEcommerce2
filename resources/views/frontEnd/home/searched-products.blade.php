<!DOCTYPE html>
<html>
@include('frontEnd.includes.header')	
<body>
    <!-- header -->
    @include('frontEnd.includes.menue')		
    <!-- //header -->
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
                <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>| Search Products</span>
            </div>
        </div>
    </div>
    
    <!-- //products-breadcrumb -->
    <div class="fresh-vegetables">
    <div class="container">
         @include('frontEnd.home.topMainCategory')
        <h3 class="keyH3">{{ucfirst($searchKey)}}</h3>
        <div class="w3l_fresh_vegetables_grids">
        <div class="row w3l_fresh_vegetables_grid_right">
            @foreach($products as $product)
            @if(count($product->spec) > 0)
            <div class="col-md-2 col-xs-6 w31_fresh_margin_top_sub_cat">
            <div class="hover14 column">
                <div class="agile_top_brand_left_grid">
                    <div class="agile_top_brand_left_grid_pos">
                        @if($product->in_offer == "yes")
                            <img src="{{asset('frontEnd/images/tag.png')}}" alt=" " class="img-responsive" />
                        @elseif($product->hasDiscount == "Yes")
                            <img src="{{asset('frontEnd/images/offer.png')}}" alt=" " class="img-responsive" />
                        @endif
                    </div>
                <div class="agile_top_brand_left_grid1">
                  <figure>
                    <div class="snipcart-item block">
                      <div class="snipcart-thumb">
                        <p class="overFlowP"><a href="{{route('product-details',['id'=>$product->id])}}">{{$product->productName}}</a></p>
                        @if(file_exists(public_path('productImage/'.$product->productImage)))
                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/'.$product->productImage)}}" width="150" height="150" /></a>
                        @else
                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/product.jpg')}}" width="150" height="150" /></a>
                        @endif

                        @php
                        $discount_amount='';
                        $regular_price = 0;
                        $minSpec = $product->spec->where('specPrice', $product->spec->min('specPrice'))->first();
                        @endphp

                    </div> 
                    <div class="cartLower">
                        <h4 style="margin: 1.3%;"><span id="currency{{$product->id}}" style="display:none;">{!!$currency!!}</span> <b id="price{{$product->id}}"></b><span id="regPrice{{$product->id}}"></span>
                        </h4>
						<select name="priceSpecification" class="chooseSizeSub" id="priceSpecification{{$product->id}}" onchange="changeSize({{$product->id}})">
							<!--<option value="" selected>Choose Size</option>-->
							@foreach ($product->spec as $specification)
								<option value="{{$specification->id}}">{{$specification->specificationName}}</option>
							@endforeach
						</select>
						<select id="specPrice{{$product->id}}" style="display:none;">
						     <!--<option value="" selected>Choose Size</option>-->
							@foreach ($product->spec as $specification)
								<option value="{{$specification->id}}">{{$specification->specPrice}}</option>
							@endforeach
						</select>
						<select id="discount{{$product->id}}" style="display:none;">
    					    <!--<option value="" selected>Choose Size</option>-->
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
						<input type="number" min="1" class="chooseSizeSub" onKeyDown="if(this.value.length==5 && event.keyCode!=8) return false;" id="quantity_{{$product->id}}" name="quantity" value="1" style="width:50px;" />
                      
                        <div class="snipcart-details">
                            <form action="#" method="post">
                                  <fieldset>
                                   <!--<input type="hidden" name="quantity" id="quantity_{{$product->id}}" value="1" />-->
                                   <input type="hidden" name="item_id" id="item_id_{{$product->id}}" value="{{$product->id}}" />
                                   <input type="hidden" name="item_name" id="item_name_{{$product->id}}" value="{{$product->productName}}" />
                                   <input type="hidden" name="item_image" id="item_image_{{$product->id}}" value="{{$product->productImage}}" />
                                   @if ($discount_amount==null)
                                   <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$regular_price}}" />
                                   @else
                                   <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$after_discount_price}}" />
        
                                   @endif
                                   <input type="hidden" name="discount_amount" id="discount_amount_{{$product->id}}" value="1.00" />
        
        
                                   <!-- <input type="submit" name="submit" value="Add to cart" class="button" /> -->
                                   <input type="button" name="submit" value="Add to cart" class="button" onclick="addToCart({{$product->id}})" />
                                </fieldset>
                            </form>
                        </div>
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
                $("#priceSpecification"+id).val({{$minSpec->id}});
                changeSize(id);
            });
        </script>
        @endif
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
</body>
</html>
