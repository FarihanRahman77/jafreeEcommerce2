<div class="top-brands">
    <div class="container">
        <h3>Brands</h3>
        <div class="agile_top_brands_grids">

            @foreach($brands as $brand)
            <div class="col-md-3 top_brand_left">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        {{-- <div class="tag"><img src="{{asset('frontEnd/images/tag.png')}}" alt=" " class="img-responsive" /></div> --}}
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block" >
                                    <div class="snipcart-thumb">
                                        {{-- @if(file_exists(public_path('productImage/'.$product->productImage)))
                                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/'.$product->productImage)}}" width="150" height="150" /></a>

                                        @else
                                        <a href="{{route('product-details',['id'=>$product->id])}}"><img title=" " alt=" " src="{{asset('productImage/product.jpg')}}" width="150" height="150" /></a>
                                        @endif	 --}}

                                        <a href="#"><img title=" " alt=" " src="{{asset($brand->image)}}" width="150" height="150" /></a>



                                        {{-- <p>{{$product->productName}}</p>
                                        <h4>{{$after_discount_price}} Tk
                                            @if ($discount_amount)
                                            <span>{{$regular_price}} Tk</span>
                                            @endif
                                        </h4> --}}
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