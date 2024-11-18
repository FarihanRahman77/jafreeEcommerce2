<div class="fresh-vegetables">
    <div class="container">
        <h3 class="keyH3">Key Products</h3>
           
            <ul class="topProductScat">
                @foreach($fronEndTopProducts as $fronEndTopProduct)
                <li class="liTopKey"><a href='{{url('/sCatProducts/'.$fronEndTopProduct->subCategoryName)}}' class="aTopKey">{{$fronEndTopProduct->subCategoryName}}</a></li>
                @endforeach
            </ul>
                
        <div class="w3l_fresh_vegetables_grids">
            <div class="row w3l_fresh_vegetables_grid_right">
                @foreach($topProducts as $product)
                <div class="col-md-2 col-xs-6" style="margin-top:10px;margin-bottom:10px;padding:1%;">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        <p class="overFlowP">{{$product->productName}}</p>
                                        @if(file_exists(public_path('productImage/'.$product->productImage)))
                                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/'.$product->productImage)}}" /></a>
                                        
                                        @else
                                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/product.jpg')}}" /></a>
                                        @endif
                                        
                                        @php
                                        $discount_amount='';
                                        $regular_price = 0;
                                        /*$regular_price = $product->amount;
                                        $discount_amount = $product->offerPrice;
                                        $after_discount_price = $regular_price-$discount_amount;*/
                                        $minSpec = $product->spec->where('specPrice', $product->spec->min('specPrice'))->first();
                                        
                                        @endphp
                                        <!-- Rating Start -->
                                        <div class="ratingDiv">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <div class="cartLower">
                                        
                                        <h4 style="margin: 1.3%;"><span id="currency{{$product->id}}" style='display:none;'><b>{!!$currency!!}</b></span>
                                            <b id="price{{$product->id}}"></b><span id="regPrice{{$product->id}}"></span>
                                        </h4>
                                        
										<select name="priceSpecification" class="chooseSize" id="priceSpecification{{$product->id}}" onchange="changeSize({{$product->id}})">
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
										<input type="number" min="1" onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;" class="chooseSize" id="quantity_{{$product->id}}" name="quantity" value="1"/>
                                    
                                    <div class="snipcart-details top_brand_home_details">
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
    
    
                                                <!-- <input type="submit" name="submit" value="Add to cart" class="button" /> -->
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
            $("#priceSpecification"+id).val({{$minSpec->id}});
            changeSize(id);
        });
        </script>
        @endforeach
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>