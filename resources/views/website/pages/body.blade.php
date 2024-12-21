<br><br><br>
<div class="block block-features block-features--layout--classic">
                <div class="custom-container">
                    <div class="block-features__list">
                        <div class="block-features__item">
                            <div class="block-features__content">
                                <video width="100%" height="auto" autoplay muted loop>
                                    <source src="{{asset('/website/video/1.mp4')}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="block-features__divider"></div>
                        <div class="block-features__item">
                            <div class="block-features__content">
                                <video width="100%" height="auto" autoplay muted loop>
                                    <source src="{{asset('/website/video/2.mp4')}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="block-features__divider"></div>
                        <div class="block-features__item">
                            <div class="block-features__content">
                                <video width="100%" height="auto" autoplay muted loop>
                                    <source src="{{asset('/website/video/3.mp4')}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="block-features__divider"></div>
                        <div class="block-features__item">
                            <div class="block-features__content">
                                <video width="100%" height="auto" autoplay muted loop>
                                    <source src="{{asset('/website/video/4.mp4')}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .block-features / end --><!-- .block-products-carousel -->
            <div class="block block-products-carousel" data-layout="grid-4">
                <div class="custom-container">
                    <div class="block-header">
                        <h3 class="block-header__title">Featured Products</h3>
                        <div class="block-header__divider"></div>
                        <!-- <ul class="block-header__groups-list">
                            <li><button type="button"
                                    class="block-header__group block-header__group--active">All</button></li>
                            <li><button type="button" class="block-header__group">Power Tools</button></li>
                            <li><button type="button" class="block-header__group">Hand Tools</button></li>
                            <li><button type="button" class="block-header__group">Plumbing</button></li>
                        </ul>
                        <div class="block-header__arrows-list">
                            <button
                                class="block-header__arrow block-header__arrow--left" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg>
                            </button> <button class="block-header__arrow block-header__arrow--right" type="button"><svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg>
                            </button>
                        </div>-->
                    </div> 
                    <div class="block-products-carousel__slider">
                        <div class="block-products-carousel__preloader"></div>
                        <div class="owl-carousel">
                            @foreach($featuredProducts as $product)
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                                width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">Featured</div>
                                        </div>
                                        <div class="product-card__image"><a href="{{  route('product.details',$product->id) }}"><img
                                                    src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="{{  route('product.details',$product->id) }}">{{$product->productName}}</a></div>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices"><span class="badge badge-warning">{{$product->brandName}} </span></div>
                                            <div class="product-card__prices">{{$product->categoryName}} </div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button" onclick="addToCart({{$product->id}})">
                                                    <span>Add To Cart</span></button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- .block-products-carousel / end --><!-- .block-banner -->
            <div class="block block-banner">
                <div class="custom-container"><a href="#" class="block-banner__body">
                        <div class="block-banner__image block-banner__image--desktop"
                            style="background-image: url('{{asset('website/images/banners/banner-1.jpg')}}"></div>
                        <div class="block-banner__image block-banner__image--mobile"
                            style="background-image: url('{{asset('website/images/banners/banner-1-mobile.jpg')}}"></div>
                        <div class="block-banner__title">Hundreds<br class="block-banner__mobile-br">Hand Tools</div>
                        <div class="block-banner__text">Hammers, Chisels, Universal Pliers, Nippers, Jigsaws, Saws</div>
                        <div class="block-banner__button"><span class="btn btn-sm btn-primary">Shop Now</span></div>
                    </a></div>
            </div><!-- .block-banner / end --><!-- .block-products -->
            <div class="block block-products block-products--layout--large-first">
                <div class="custom-container">
                    <div class="block-header">
                        <h3 class="block-header__title">Bestsellers</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-products__body">
                        <div class="block-products__featured d-none">
                            <div class="block-products__featured-item">
                                <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                            width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg> <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--new">New</div>
                                    </div>
                                    <div class="product-card__image"><a href="product.html"><img
                                                src="{{asset('website/images/products/product-1.jpg')}}" alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                                                KL370090G 300 Watts</a></div>
                                        <div class="product-card__rating">
                                            <div class="rating">
                                                <div class="rating__body"><svg class="rating__star rating__star--active"
                                                        width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div
                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div><svg class="rating__star rating__star--active" width="13px"
                                                        height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div
                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div><svg class="rating__star rating__star--active" width="13px"
                                                        height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div
                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div><svg class="rating__star rating__star--active" width="13px"
                                                        height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div
                                                        class="rating__star rating__star--only-edge rating__star--active">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div><svg class="rating__star" width="13px" height="12px">
                                                        <g class="rating__fill">
                                                            <use xlink:href="images/sprite.svg#star-normal"></use>
                                                        </g>
                                                        <g class="rating__stroke">
                                                            <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                            </use>
                                                        </g>
                                                    </svg>
                                                    <div class="rating__star rating__star--only-edge">
                                                        <div class="rating__fill">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                        <div class="rating__stroke">
                                                            <div class="fake-svg-icon"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices">$749.00</div>
                                        <div class="product-card__buttons"><button
                                                class="btn btn-primary product-card__addtocart" type="button">Add To
                                                Cart</button> <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button"><span>Add To Cart</span></button> <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__list">
                            @foreach($bestSellingProducts as $product)
                            <div class="block-products__list-item">
                                <div class="product-card"><button class="product-card__quickview" type="button"><svg
                                            width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg> <span class="fake-svg-icon"></span></button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--hot">Best Selling</div>
                                    </div>
                                    <div class="product-card__image"><a href="{{  route('product.details',$product->id) }}"><img
                                                src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt=""></a></div>
                                    <div class="product-card__info">
                                        <div class="product-card__name"><a href="{{  route('product.details',$product->id) }}">{{$product->productName}}</a></div>
                                        
                                        
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">Availability: <span
                                                class="text-success">In Stock</span></div>
                                        <div class="product-card__prices"><span class="badge badge-warning">{{$product->brandName}} </span></div>
                                        <div class="product-card__prices">{{$product->categoryName}} </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button" onclick="addToCart({{$product->id}})"><span>Add To Cart</span></button> 
                                            <button
                                                class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                type="button" onclick="addToCart({{$product->id}})"><span>Add To Cart</span>
                                            </button> 
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button
                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                type="button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg> <span
                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- .block-products / end --><!-- .block-categories -->
            <!-- <div class="block block--highlighted block-categories block-categories--layout--classic">
                <div class="custom-container">
                    <div class="block-header">
                        <h3 class="block-header__title">Popular Categories</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-categories__list owl-carousel">
                        @foreach($categories as $category)
                        <div class="block-categories__item category-card category-card--layout--classic">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href="#">
                                        <img src="{{asset('/website/images/categories/category-1.jpg')}}" alt="">
                                    </a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name"><a href="#">Power Tools</a></div>
                                    <ul class="category-card__links">
                                        <li><a href="#">Screwdrivers</a></li>
                                        <li><a href="#">Milling Cutters</a></li>
                                        <li><a href="#">Sanding Machines</a></li>
                                        <li><a href="#">Wrenches</a></li>
                                        <li><a href="#">Drills</a></li>
                                    </ul>
                                    <div class="category-card__all"><a href="#">Show All</a></div>
                                    <div class="category-card__products">572 Products</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>.block-categories / end.block-products-carousel -->

            <div class="block block-category-carousel" data-layout="horizontal">
                <div class="custom-container">
                    <div class="block-header">
                        <h3 class="block-header__title">Popular Categories</h3>
                        <div class="block-header__divider"></div>
                        
                        <div class="block-header__arrows-list"><button
                                class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px"
                                    height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg></button> <button class="block-header__arrow block-header__arrow--right"
                                type="button"><svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg></button></div>
                    </div>
                    <div class="block-category-carousel__slider">
                        <div class="block-category-carousel__preloader"></div>
                        <div class="owl-carousel">
                            @foreach($categories as $category)
                            <div class="block-category-carousel__column">
                                <div class="block-category-carousel__cell">
                                    <div class="product-card">
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">Trending</div>
                                        </div>
                                        <div class="product-card__image"><a href="{{ url('/categorywiseproduct/'.$category->id) }}"><img
                                                    src="{{asset('website/images/categories/'.$category->image)}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="{{ url('/categorywiseproduct/'.$category->id) }}">
                                                    {{$category->categoryName}}
                                                </a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- .block-products-carousel / end --><!-- .block-posts -->



            <div class="block block-products-carousel" data-layout="horizontal">
                <div class="custom-container">
                    <div class="block-header">
                        <h3 class="block-header__title">New Arrivals</h3>
                        <div class="block-header__divider"></div>
                        
                        <div class="block-header__arrows-list"><button
                                class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px"
                                    height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg></button> <button class="block-header__arrow block-header__arrow--right"
                                type="button"><svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg></button></div>
                    </div>
                    <div class="block-products-carousel__slider">
                        <div class="block-products-carousel__preloader"></div>
                        <div class="owl-carousel">
                            @php 
                                $newArrivalProductIncrementor=1;
                            @endphp
                            @foreach($newArrivalProducts as $product)
                            <div class="block-products-carousel__column">
                                @if($newArrivalProductIncrementor % 2 != 0)
                                <div class="block-products-carousel__cell">
                                    <div class="product-card">
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">{{$product->brandName}} </div>
                                        </div>
                                        <div class="product-card__image"><a href="{{  route('product.details',$product->id) }}"><img
                                                    src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="" style="max-height:90px;"></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="{{  route('product.details',$product->id) }}">{{$product->productName}}</a></div>
                                            
                                           
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: 
                                                <span
                                                    class="text-success">In Stock</span>
                                                </div>
                                            <div class="product-card__prices d-flex">{{$product->categoryName}} </div>
                                            <div class="product-card__prices "><button class="btn btn-primary" type="button" onclick="addToCart({{$product->id}})"><span> <i class="fa fa-cart-arrow-down"></i></span> </button> </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="block-products-carousel__cell">
                                    <div class="product-card">
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--hot">{{$product->brandName}}</div>
                                        </div>
                                        <div class="product-card__image"><a href="{{ route('product.details',$product->id) }}"><img
                                                    src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="" style="max-height:90px;"></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="{{ route('product.details',$product->id) }}">{{$product->productName}}</a></div>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: 
                                                <span
                                                    class="text-success">In Stock</span>
                                                </div>
                                            <div class="product-card__prices d-flex">{{$product->categoryName}} </div>
                                            <div class="product-card__prices "><button class="btn btn-primary" type="button" onclick="addToCart({{$product->id}})"><span> <i class="fa fa-cart-arrow-down"></i></span> </button> </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @php  
                                $newArrivalProductIncrementor++;
                            @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- .block-products-carousel / end --><!-- .block-posts -->
            <div class="block block-posts block-posts--layout--list-sm" data-layout="list-sm">
                <div class="custom-container">
                    <div class="block-header">
                        <h3 class="block-header__title">Latest News</h3>
                        <div class="block-header__divider"></div>
                        <div class="block-header__arrows-list"><button
                                class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px"
                                    height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg></button> <button class="block-header__arrow block-header__arrow--right"
                                type="button"><svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg></button></div>
                    </div>
                    <div class="block-posts__slider">
                        <div class="owl-carousel">
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-1.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                    <div class="post-card__name"><a href="#">Philosophy That Addresses Topics Such As
                                            Goodness</a></div>
                                    <div class="post-card__date">October 19, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-2.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Latest News</a></div>
                                    <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And
                                            Argument Part 2</a></div>
                                    <div class="post-card__date">September 5, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-3.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">New Arrivals</a></div>
                                    <div class="post-card__name"><a href="#">Some Philosophers Specialize In One Or More
                                            Historical Periods</a></div>
                                    <div class="post-card__date">August 12, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-4.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                    <div class="post-card__name"><a href="#">A Variety Of Other Academic And
                                            Non-Academic Approaches Have Been Explored</a></div>
                                    <div class="post-card__date">Jule 30, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-5.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">New Arrivals</a></div>
                                    <div class="post-card__name"><a href="#">Germany Was The First Country To
                                            Professionalize Philosophy</a></div>
                                    <div class="post-card__date">June 12, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-6.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                    <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And
                                            Argument Part 1</a></div>
                                    <div class="post-card__date">May 21, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-7.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                    <div class="post-card__name"><a href="#">Many Inquiries Outside Of Academia Are
                                            Philosophical In The Broad Sense</a></div>
                                    <div class="post-card__date">April 3, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-8.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Latest News</a></div>
                                    <div class="post-card__name"><a href="#">An Advantage Of Digital Circuits When
                                            Compared To Analog Circuits</a></div>
                                    <div class="post-card__date">Mart 29, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-9.jpg')}}" alt=""></a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">New Arrivals</a></div>
                                    <div class="post-card__name"><a href="#">A Digital Circuit Is Typically Constructed
                                            From Small Electronic Circuits</a></div>
                                    <div class="post-card__date">February 10, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                            <div class="post-card">
                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-10.jpg')}}"
                                            alt=""></a></div>
                                <div class="post-card__info">
                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                    <div class="post-card__name"><a href="#">Engineers Use Many Methods To Minimize
                                            Logic Functions</a></div>
                                    <div class="post-card__date">January 1, 2019</div>
                                    <div class="post-card__content">In one general sense, philosophy is associated with
                                        wisdom, intellectual culture and a search for knowledge. In that sense, all
                                        cultures...</div>
                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                            More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .block-posts / end --><!-- .block-brands -->
            <div class="block block-brands">
                <div class="custom-container">
                    <div class="block-brands__slider">
                        <div class="owl-carousel">
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-1.png')}}" alt=""></a>
                            </div>
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-2.png')}}" alt=""></a>
                            </div>
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-3.png')}}" alt=""></a>
                            </div>
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-4.png')}}" alt=""></a>
                            </div>
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-5.png')}}" alt=""></a>
                            </div>
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-6.png')}}" alt=""></a>
                            </div>
                            <div class="block-brands__item"><a href="#"><img src="{{asset('website/images/logos/logo-7.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .block-brands / end --><!-- .block-product-columns -->
            <div class="block block-product-columns d-lg-block d-none">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Top Rated Products</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">New</div>
                                        </div>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-1.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Electric Planer
                                                    Brandix KL370090G 300 Watts</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$749.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--hot">Hot</div>
                                        </div>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-2.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                                    DPS3000SY 2700 Watts</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$1,019.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-3.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Drill Screwdriver
                                                    Brandix ALX7054 200 Watts</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$850.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Special Offers</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--sale">Sale</div>
                                        </div>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-4.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Drill Series 3
                                                    Brandix KSR4590PQS 1500 Watts</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices"><span
                                                    class="product-card__new-price">$949.00</span> <span
                                                    class="product-card__old-price">$1189.00</span></div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-5.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Brandix Router Power
                                                    Tool 2017ERXPK</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$1,700.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-6.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Brandix Drilling
                                                    Machine DM2019KW4 4kW</a></div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$3,199.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Bestsellers</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-7.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Brandix Pliers</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$24.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-8.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Water Hose 40cm</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$15.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--layout--horizontal"><button
                                            class="product-card__quickview" type="button"><svg width="16px"
                                                height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg> <span class="fake-svg-icon"></span></button>
                                        <div class="product-card__image"><a href="product.html"><img
                                                    src="{{asset('website/images/products/product-9.jpg')}}" alt=""></a></div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="product.html">Spanner Wrench</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating">
                                                    <div class="rating__body"><svg
                                                            class="rating__star rating__star--active" width="13px"
                                                            height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star rating__star--active"
                                                            width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div
                                                            class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div><svg class="rating__star" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke">
                                                                </use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__prices">$19.00</div>
                                            <div class="product-card__buttons"><button
                                                    class="btn btn-primary product-card__addtocart" type="button">Add To
                                                    Cart</button> <button
                                                    class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                                    type="button"><span>Add To Cart</span></button> <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                                                <button
                                                    class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                    type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg> <span
                                                        class="fake-svg-icon fake-svg-icon--compare-16"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .block-product-columns / end -->