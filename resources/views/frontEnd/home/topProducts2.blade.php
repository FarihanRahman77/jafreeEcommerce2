<div class="top-brands">
    <div class="container">
        <h3>Top Products</h3>
        <div class="agile_top_brands_grids">

            @foreach($topProducts as $product)
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="tag"><img src="{{asset('frontEnd/images/tag.png')}}" alt=" " class="img-responsive" /></div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">

                                        @if(file_exists(public_path('productImage/'.$product->productImage)))
                                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/'.$product->productImage)}}" /></a>
                                        
                                        @else
                                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/product.jpg')}}" width="150" height="150" /></a>
                                        @endif
                                        
                                        @php

                                        $regular_price = $product->amount;
                                        $discount_amount = $product->offerPrice;
                                        $after_discount_price = $regular_price-$discount_amount;

                                        @endphp


                                        <p>{{$product->productName}}</p>
                                        <!-- <h4>{{$product->amount}} TK<span>$10.00</span></h4> -->
                                        <h4>{{$after_discount_price}} Tk
                                            @if ($discount_amount)
                                            <span>{{$regular_price}} Tk</span>
                                            @endif
                                        </h4>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="#" method="post">
                                           @csrf
                                           <fieldset>
                                            <!-- <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                            <input type="hidden" name="item_id" value="1" />
                                            <input type="hidden" name="amount" value="7.99" />
                                            <input type="hidden" name="discount_amount" value="1" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " /> -->


                                            <input type="hidden" name="quantity" id="quantity_{{$product->id}}" value="1" />
                                            <input type="hidden" name="item_id" id="item_id_{{$product->id}}" value="{{$product->id}}" />
                                            <input type="hidden" name="item_name" id="item_name_{{$product->id}}" value="{{$product->productName}}" />
                                            <input type="hidden" name="item_image" id="item_image_{{$product->id}}" value="{{$product->productImage}}" />
                                            @if ($discount_amount==null)
                                            <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$regular_price}}" />
                                            @else
                                            <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$after_discount_price}}" />

                                            @endif
                                            {{-- <input type="hidden" name="amount" id="amount_{{$product->id}}" value="{{$product->amount}}" /> --}}
                                            <input type="hidden" name="discount_amount" id="discount_amount_{{$product->id}}" value="1.00" />


                                            <!-- <input type="submit" name="submit" value="Add to cart" class="button" /> -->
                                            <a href="#" onclick="addToCart({{$product->id}})" class="button"> 
                                                <input type="button" name="submit" value="Add to cart" class="button" />
                                            </a>
                                        </fieldset>

                                    </form>

                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



        <div class="clearfix"> </div>
    </div>
</div>
</div>