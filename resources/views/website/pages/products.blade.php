@extends('website.master')
@section('title')
{{$settings->website_name}} - Product Details
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')

<div class="site__body">
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg></li>
                        <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->productName}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">

















            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content"><!-- .product__gallery -->
                    <div class="product__gallery">
                        <div class="product-gallery">
                            <div class="product-gallery__featured">
                                <div class="owl-carousel" id="product-image">
                                    @if ($product->productImage)
                                    <a href="#" target="_blank">
                                        <img src="{{ $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage }}" alt="">
                                    </a>
                                    @endif

                                    @if ($productimages)
                                    @foreach ($productimages as $image)
                                    <a href="#" target="_blank">
                                        <img src="{{asset('website/images/products/'.$image->productImage)}}" alt="">
                                    </a>
                                    @endforeach

                                    @endif


                                </div>
                            </div>
                            <div class="product-gallery__carousel">
                                <div class="owl-carousel" id="product-carousel">
                                    @if ($product->productImage)
                                    <a href="#" target="_blank">
                                        <img src="{{ !empty($product->productImage) ? $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage : asset('/website/images/no-img.jpg') }}" alt="">
                                    </a>
                                    @endif
                                    @if($productimages)
                                    @foreach ($productimages as $image)
                                    <a href="#" class="product-gallery__carousel-item">
                                        <img class="product-gallery__carousel-image" src="{{asset('website/images/products/'.$image->productImage)}}" alt="">
                                    </a>
                                    @endforeach
                                    @endif
                                    @if($product->video_url)
                                    <button type="button" class="product-video__carousel-item btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-play"></i>
                                    </button>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div><!-- .product__gallery / end --><!-- .product__info -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <!-- Wrapper for responsive iframe -->
                                    <div class="iframe-container">

                                        <iframe class="product-video-iframe"
                                            src="{{$product->video_url}}"
                                            title="{{$product->productName}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="product__info">
                        <div class="product__wishlist-compare"><button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist"><svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                </svg></button> <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare"><svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                </svg></button></div>
                        <h1 class="product__name">{{$product->productName}}</h1>
                        <div class="product__rating">
                            <div class="product__rating-stars">
                                <div class="rating">
                                    <div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                            <div class="rating__fill">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                            <div class="rating__stroke">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                        </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                            <div class="rating__fill">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                            <div class="rating__stroke">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                        </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                            <div class="rating__fill">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                            <div class="rating__stroke">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                        </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                            <div class="rating__fill">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                            <div class="rating__stroke">
                                                <div class="fake-svg-icon"></div>
                                            </div>
                                        </div><svg class="rating__star rating__star--active" width="13px" height="12px">
                                            <g class="rating__fill">
                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                            </g>
                                            <g class="rating__stroke">
                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                            </g>
                                        </svg>
                                        <div class="rating__star rating__star--only-edge rating__star--active">
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
                        <div class="product__description">{{$product->productDescriptions}}</div>
                        <ul class="product__features">
                            <li>Speed: 750 RPM</li>
                            <li>Power Source: Cordless-Electric</li>
                            <li>Battery Cell Type: Lithium</li>
                            <li>Voltage: 20 Volts</li>
                            <li>Battery Capacity: 2 Ah</li>
                        </ul>
                        <ul class="product__meta">
                            <li class="product__meta-availability">Availability: <span class="text-success">In Stock</span></li>
                            <br>
                            <li>Category: <a href="{{ url('/categorywiseproduct/'.$product->categoryId) }}">{{$product->categoryName}}</a></li>
                            <br>
                            <li>Brand: <a href="{{ route('brandwiseproduct',$product->tbl_brandsId) }}">{{$product->brandName}}</a></li>
                            <br>
                            <li>Model: {{$product->modelNo}} </li>
                        </ul>
                    </div><!-- .product__info / end --><!-- .product__sidebar -->
                    <div class="product__sidebar">
                        <div class="product__availability">Availability: <span class="text-success">In Stock</span></div>


                    </div><!-- .product__end -->
                    <br>
                    <div class="form-group product__option"><label class="product__option-label"
                            for="product-quantity">Quantity</label>
                        <div class="product__actions">
                            <div class="product__actions-item">
                                <div class="input-number product__quantity"><input id="product-quantity"
                                        class="input-number__input form-control form-control-lg"
                                        type="number" min="1" value="1">
                                    <div class="input-number__add"></div>
                                    <div class="input-number__sub"></div>
                                </div>
                            </div>
                            <div class="product__actions-item product__actions-item--addtocart"><button
                                    class="btn btn-primary btn-lg">Add to cart</button></div>
                            <div class="product__actions-item product__actions-item--wishlist"><button
                                    type="button" class="btn btn-secondary btn-svg-icon btn-lg"
                                    data-toggle="tooltip" title="Wishlist"><svg width="16px"
                                        height="16px">
                                        <use xlink:href="{{asset('website/images/sprite.svg#wishlist-16')}}"></use>
                                    </svg></button></div>
                            <div class="product__actions-item product__actions-item--compare"><button
                                    type="button" class="btn btn-secondary btn-svg-icon btn-lg"
                                    data-toggle="tooltip" title="Compare"><svg width="16px"
                                        height="16px">
                                        <use xlink:href="{{asset('website/images/sprite.svg#compare-16')}}"></use>
                                    </svg></button></div>
                        </div>
                    </div>

                </div>
            </div>






















            <div class="product-tabs">
                <div class="product-tabs__list"><a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a> <a href="#tab-specification" class="product-tabs__item">Specification</a> </div>
                <div class="product-tabs__content">
                    <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                        <div class="typography">
                            <h3>Product Description</h3>
                            <p>{{$product->productDescriptions}}</p>
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-specification">
                        <div class="spec">
                            <h3 class="spec__header">Specification</h3>
                            <div class="spec__section">
                                @foreach ($productspech as $spech )
                                <div class="spec__row">
                                    <div class="spec__name">{{$spech->specificationName}}</div>
                                    <div class="spec__value">{{$spech->specificationValue}}</div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
           
        </div>
    </div><!-- .block-products-carousel -->
    <div class="block block-products-carousel" data-layout="grid-5">
        <div class="container">
            <div class="block-header">
                <h3 class="block-header__title">Related Products</h3>
                <div class="block-header__divider"></div>
                <div class="block-header__arrows-list"><button class="block-header__arrow block-header__arrow--left" type="button"><svg width="7px" height="11px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                        </svg></button> <button class="block-header__arrow block-header__arrow--right" type="button"><svg width="7px" height="11px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                        </svg></button></div>
            </div>
            <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    @foreach ($categoryWiseProducts as $product)
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                    </svg> <span class="fake-svg-icon"></span></button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">New</div>
                                </div>
                                <div class="product-card__image">
                                    <a href="{{ route('product.details',$product->id) }}">
                                        <img src="{{ !empty($product->productImage) ? $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage : asset('/website/images/no-img.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('product.details',$product->id) }}">
                                            {{$product->productName}}
                                        </a>
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
                                    <div class="product-card__prices"><span class="text-success">In Stock</span></div>
                                    <div class="product-card__prices">Brand: {{$product->brandName}}</div>
                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div><!-- .block-products-carousel / end -->
</div>
@endsection