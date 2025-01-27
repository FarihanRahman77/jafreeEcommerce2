@extends('ecomas.master')
@section('title')
{{$settings->website_name}} - HomePage
@endsection
@section('content')
    @include('ecomas.layouts.slider')
    <!-- Categories -->
    <section class="flat-spacing-15 bg_beige-3 flat-control-sw">
        <div class="container">
            <div class="flat-title flex-row justify-content-between px-0">
                <span class="title wow fadeInUp" data-wow-delay="0s">Shop by categories</span>
                <div class="box-sw-navigation">
                    <div class="sw-dots style-2 medium sw-pagination-collection justify-content-center"></div>
                </div>
            </div> 
        </div>
        <div class="container-full slider-layout-right">
            <div dir="ltr" class="swiper tf-sw-collection sw-wrapper-right" data-preview="4.5" data-tablet="2.5" data-mobile="1.5" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                    <div class="swiper-slide" lazy="true">
                        <div class="collection-item large hover-img">
                            <div class="collection-inner">
                                <a href="shop-collection-list.html" class="collection-image img-style rounded-0">
                                    <img class="lazyload" data-src="{{asset('ecomas/images/category/'.$category->image)}}" src="{{asset('ecomas/images/category/'.$category->image)}}" alt="{{$category->categoryName}}">
                                </a>
                                <div class="collection-content">
                                    <a href="{{ url('/categorywiseproduct/'.$category->id) }}" class="tf-btn collection-title hover-icon"><span>{{$category->categoryName}}</span><i class="icon icon-arrow1-top-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!--Categories-->

    
    <!-- Collection -->
    <section class="flat-spacing-18">
        <div class="container">
            <div class="masonry-layout-v4 wow fadeInUp" data-wow-delay="0s">
                <div class="item-1 collection-item-v2 hover-img">
                    @php 
                    if($bigSpecialOffer->type == 'Category'){
                        $urlBig = url('/categorywiseproduct/'.$bigSpecialOffer->category_id);
                    }elseif($bigSpecialOffer->type == 'Brand'){
                        $urlBig = url('/brandwiseproduct/'.$bigSpecialOffer->brand_id);
                    }
                    @endphp
                    <a href="{{$urlBig}}" class="collection-inner">
                        <div class="collection-image img-style">
                            <img class="lazyload" data-src="{{asset('ecomas/images/offer/'.$bigSpecialOffer->image)}}" src="{{asset('ecomas/images/offer/'.$bigSpecialOffer->image)}}" alt="collection-img">
                        </div>
                        <div class="collection-content">
                            <div class="top wow fadeInUp" data-wow-delay="0s">
                                <h5 class="heading text-white">{{$bigSpecialOffer->title}}</h5>
                                <p class="subheading text-white">{{$bigSpecialOffer->text}}</p>
                                <button class="tf-btn btn-line btn-line-light collection-other-link fw-6"><span>Shop Collection</span><i class="icon icon-arrow1-top-left"></i></button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="item-2 collection-item-v2 hover-img">
                    @php 
                        if($smallSpecialOffer1->type == 'Category'){
                            $url1 = url('/categorywiseproduct/'.$smallSpecialOffer1->category_id);
                        }elseif($smallSpecialOffer1->type == 'Brand'){
                            $url1 = url('/brandwiseproduct/'.$smallSpecialOffer1->brand_id);
                        }
                    @endphp
                    <a href="{{$url1}}" class="collection-inner">
                        <div class="collection-image img-style">
                            <img class="lazyload" data-src="{{asset('ecomas/images/offer/'.$smallSpecialOffer1->image)}}" src="{{asset('ecomas/images/offer/'.$smallSpecialOffer1->image)}}" alt="collection-img">
                        </div>
                        <div class="collection-content justify-content-end">
                            <div class="bottom wow fadeInUp" data-wow-delay="0s">
                                <h5 class="heading text-white">{{$smallSpecialOffer1->title}}</h5>
                                <button class="tf-btn btn-line btn-line-light collection-other-link fw-6"><span>Shop Collection</span><i class="icon icon-arrow1-top-left"></i></button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item-3 collection-item-v2 hover-img">
                    @php 
                        if($smallSpecialOffer2->type == 'Category'){
                            $url2 = url('/categorywiseproduct/'.$smallSpecialOffer2->category_id);
                        }elseif($smallSpecialOffer2->type == 'Brand'){
                            $url2 = url('/brandwiseproduct/'.$smallSpecialOffer2->brand_id);
                        }
                    @endphp
                    <a href="{{$url2}}" class="collection-inner">
                        <div class="collection-image img-style">
                            <img class="lazyload" data-src="{{asset('ecomas/images/offer/'.$smallSpecialOffer2->image)}}" src="{{asset('ecomas/images/offer/'.$smallSpecialOffer2->image)}}" alt="collection-img">
                        </div>
                        <div class="collection-content justify-content-end">
                            <div class="bottom wow fadeInUp" data-wow-delay="0s">
                                <h5 class="heading text-white">{{$smallSpecialOffer2->title}}</h5>
                                <button class="tf-btn btn-line btn-line-light collection-other-link fw-6"><span>Shop Collection</span><i class="icon icon-arrow1-top-left"></i></button>
                            </div>
                        </div>
                    </a>
                </div> 
            </div>
        </div>
    </section>
    <!-- /Collection -->
    @foreach($topThreeBrands as $brand)
    <!-- Banner collection -->
    <section class="banner-collection-men-wrap banner-parallax" style="background-image: url('{{ asset('ecomas/images/offer/'.$brand->image) }}');">
        <div class="box-content">
            <div class="container">
                @php 
                    if($brand->type == 'Category'){
                        $url = url('/categorywiseproduct/'.$brand->category_id);
                    }elseif($brand->type == 'Brand'){
                        $url = url('/brandwiseproduct/'.$brand->brand_id);
                    }
                @endphp
                <a href="{{$url}}" class="card-box text-md-start text-center rounded-0">
                    <h3 class="subheading"></h3>
                    <h3 class="heading">{{$brand->title}}</h3>
                    <p class="text">{{$brand->text}}</p>
                    <div class="wow fadeInUp" data-wow-delay="0s">
                        <button class="tf-btn style-2 btn-fill animate-hover-btn"><span>View</span></button>   
                    </div>
                </a>  
            </div>
        </div>
    </section>
    <!-- /Banner collection -->
    @php 
        $query = DB::table('tbl_products')
            ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
            ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
            ->where('tbl_products.is_website', 'Yes')
            ->where('tbl_products.deleted', 'No')
            ->where('tbl_products.status', 'Active');
        if ($brand->type == 'Category') {
            $id = $brand->category_id;
            $query->where('tbl_products.categoryId', $id);
        } elseif ($brand->type == 'Brand') {
            $id = $brand->brand_id;
            $query->where('tbl_products.tbl_brandsId', $id);
        }
        $topThreeBrandProducts = $query
            ->select(
                'tbl_products.id',
                'tbl_products.productCode',
                'tbl_products.productName',
                'tbl_products.maxSalePrice',
                'tbl_products.productImage',
                'tbl_products.modelNo',
                'tbl_products.productDescriptions',
                'tbl_brands.brandName',
                'tbl_brands.brand_logo',
                'tbl_category.categoryName',
                DB::raw('FLOOR(1 + (RAND() * 100)) as random_number')
            )
            ->orderBy('random_number', 'desc')
            ->get();
    @endphp
    <!-- Product -->
    <section class="flat-spacing-12 has-line-bottom">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <span class="title">Trending now</span>
                <div class="d-flex gap-16 align-items-center">
                    <div class="nav-sw-arrow nav-next-slider nav-next-product"><span class="icon icon-arrow1-left"></span></div>
                    <a href="product-style-05.html" class="tf-btn btn-line fs-12 fw-6">VIEW ALL</a>
                    <div class="nav-sw-arrow nav-prev-slider nav-prev-product"><span class="icon icon-arrow1-right"></span></div>
                </div>   
            </div>
            <div class="hover-sw-nav hover-sw-2">
                <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3" data-pagination-lg="3">
                    <div class="swiper-wrapper">
                        @foreach($topThreeBrandProducts as $product)
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product">
                                <div class="card-product-wrapper">
                                    <a href="{{  route('product.details',$product->id) }}" class="product-img">
                                        <img class="lazyload img-product" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                        <img class="lazyload img-hover" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                    </a>
                                    <div class="list-product-btn absolute-2">
                                        <a href="#" data-bs-toggle="modal" onclick="addToCart({{$product->id}})" class="box-icon bg_white quick-add tf-btn-loading btn-add-to-cart">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="#" onclick="viewProductDetails({{$product->id}})" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                    
                                </div>
                                <div class="card-product-info">
                                    <a href="{{  route('product.details',$product->id )}}" class="title link">{{$product->productName}}</a>
                                    
                                    <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="tooltip">Black</span>
                                            <span class="swatch-value bg_dark"></span>
                                            <img class="lazyload" data-src="{{ asset('ecomas/images/products/lamp-black.jpg')}}" src="{{ asset('ecomas/images/products/lamp-black.jpg')}}" alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Dark Green</span>
                                            <span class="swatch-value bg_dark-green"></span>
                                            <img class="lazyload" data-src="{{ asset('ecomas/images/products/lamp-dark-green.jpg')}}" src="{{ asset('ecomas/images/products/lamp-dark-green.jpg')}}" alt="image-product">
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>                                
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
            </div>
        </div>
    </section>
    <!-- /Product -->
    @endforeach

    <!-- Brand -->
    <section class="flat-spacing-12">
        <div class="wrap-carousel wrap-brand wrap-brand-v2 autoplay-linear">
            <div dir="ltr" class="swiper tf-sw-brand border-0" data-play="true" data-loop="true" data-preview="6" data-tablet="4" data-mobile="2" data-space-lg="30" data-space-md="15">
                <div class="swiper-wrapper">
                    @foreach($brands as $brand)
                    <div class="swiper-slide">
                        <div class="brand-item-v2">
                            <img class="lazyload" data-src="{{ asset('ecomas/images/brand/'.$brand->brand_logo)}}" src="{{ asset('ecomas/images/brand/'.$brand->brand_logo)}}" alt="image-brand">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /Brand -->

    <!-- Shop Collection -->
    <section class="flat-spacing-19 pt_0 pb_0">
        <div class="container">

            @foreach($blogs as $blog)
            @if($blog->sequence % 2 == 0)
            <div class="tf-grid-layout gap-0 rounded-0 md-col-2 tf-img-with-text style-3">
                <div class="tf-content-wrap">
                    <div>
                        <div class="heading fs-42 wow fadeInUp" data-wow-delay="0s">{{$blog->content_title}}</div>
                        <p class="description text_black-2 wow fadeInUp" data-wow-delay="0s">
                           {!! $blog->content_description !!}
                        </p>
                       
                    </div>
                </div>
                <div class="tf-image-wrap">
                    <img class="lazyload" data-src="{{ asset('ecomas/images/blog/'.$blog->content_image)}}" src="{{ asset('ecomas/images/blog/'.$blog->content_image)}}" alt="collection-img">
                </div>
            </div>
            @else
            <div class="tf-grid-layout gap-0 rounded-0 md-col-2 tf-img-with-text style-3 bg-f5fbfd">
                <div class="tf-image-wrap">
                    <img class="lazyload" data-src="{{ asset('ecomas/images/blog/'.$blog->content_image)}}" src="{{ asset('ecomas/images/blog/'.$blog->content_image)}}" alt="collection-img">
                </div>
                <div class="tf-content-wrap">
                    <div>
                        <div class="heading fs-42 wow fadeInUp" data-wow-delay="0s">{{$blog->content_title}}</div>
                        <p class="description text_black-2 wow fadeInUp" data-wow-delay="0s">
                           {!! $blog->content_description !!}
                        </p>
                       
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>
    <!-- /Shop Collection -->

    <!-- Icon box -->
    <section class="flat-spacing-27 flat-iconbox wow fadeInUp  has-line-bottom" data-wow-delay="0s">
        <div class="container">
            <div class="wrap-carousel wrap-mobile">
                <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                    <div class="swiper-wrapper wrap-iconbox">
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-shipping"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">Free Shipping</div>
                                    <p>Free shipping over order $120</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-payment fs-22"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">Flexible Payment</div>
                                    <p>Pay with Multiple Credit Cards</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-return fs-20"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">14 Day Returns</div>
                                    <p>Within 30 days for an exchange</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-suport"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">Premium Support</div>
                                    <p>Outstanding premium support</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="wrap-pagination">
                    <div class="container-full">
                        <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Icon box -->
    
@endsection