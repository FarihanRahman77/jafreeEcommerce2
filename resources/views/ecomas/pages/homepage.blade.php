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
                    <a href="shop-collection-sub.html" class="collection-inner">
                        <div class="collection-image img-style">
                            <img class="lazyload" data-src="{{asset('ecomas/images/collections/009furniture-banner-01.jpg')}}" src="{{asset('ecomas/images/collections/009furniture-banner-01.jpg')}}" alt="collection-img">
                        </div>
                        <div class="collection-content">
                            <div class="top wow fadeInUp" data-wow-delay="0s">
                                <h5 class="heading text-white">Spring Collection</h5>
                                <p class="subheading text-white">Every piece is made to last beyond the season</p>
                                <button class="tf-btn btn-line btn-line-light collection-other-link fw-6"><span>Shop Collection</span><i class="icon icon-arrow1-top-left"></i></button>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="item-2 collection-item-v2 hover-img">
                    <a href="shop-collection-sub.html" class="collection-inner">
                        <div class="collection-image img-style">
                            <img class="lazyload" data-src="{{asset('ecomas/images/collections/009furniture-banner-02.jpg')}}" src="{{asset('ecomas/images/collections/009furniture-banner-02.jpg')}}" alt="collection-img">
                        </div>
                        <div class="collection-content justify-content-end">
                            <div class="bottom wow fadeInUp" data-wow-delay="0s">
                                <h5 class="heading text-white">Up to 30% off</h5>
                                <button class="tf-btn btn-line btn-line-light collection-other-link fw-6"><span>Shop Collection</span><i class="icon icon-arrow1-top-left"></i></button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item-3 collection-item-v2 hover-img">
                    <a href="shop-collection-sub.html" class="collection-inner">
                        <div class="collection-image img-style">
                            <img class="lazyload" data-src="{{asset('ecomas/images/collections/009furniture-banner-03.jpg')}}" src="{{asset('ecomas/images/collections/009furniture-banner-03.jpg')}}" alt="collection-img">
                        </div>
                        <div class="collection-content justify-content-end">
                            <div class="bottom wow fadeInUp" data-wow-delay="0s">
                                <h5 class="heading text-white">Lighting Collection</h5>
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
                <a href="{{url('brandwiseproduct/'.$brand->brand_id)}}" class="card-box text-md-start text-center rounded-0">
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
        $id=$brand->brand_id;
        $topThreeBrandProducts = DB::table('tbl_products')
                        ->join('tbl_brands', 'tbl_products.tbl_brandsId', '=', 'tbl_brands.id')
                        ->join('tbl_category', 'tbl_products.categoryId', '=', 'tbl_category.id')
                        ->where('tbl_products.tbl_brandsId', $id)
                        ->where('tbl_products.is_website', 'Yes')
                        ->where('tbl_products.deleted', 'No')
                        ->where('tbl_products.status', 'Active')
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
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                            <span class="icon icon-bag"></span>
                                            <span class="tooltip">Quick Add</span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
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
                                            <img class="lazyload" data-src="images/products/lamp-black.jpg" src="images/products/lamp-black.jpg" alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Dark Green</span>
                                            <span class="swatch-value bg_dark-green"></span>
                                            <img class="lazyload" data-src="images/products/lamp-dark-green.jpg" src="images/products/lamp-dark-green.jpg" alt="image-product">
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

    <!-- Lookbook -->
    <section class="flat-spacing-27 pb-0">
        <div class="flat-title wow fadeInUp" data-wow-delay="0s">
            <span class="title">Room for inspiration</span>
        </div>
        <div class="hover-sw-nav view-default">
            <div dir="ltr" class="swiper tf-sw-lookbook slideshow-lookbook-furniture" data-preview="1.4" data-tablet="1.4" data-mobile="1" data-space-lg="30" data-space-md="15">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-lookbook lookbook-1">
                            <div class="image">
                                <img class="lazyload" data-src="images/slider/009furniture-banner-10.jpg" src="images/slider/009furniture-banner-10.jpg" alt="image-lookbook">
                            </div>
                            <div class="lookbook-item item-1">
                                <div class="inner">
                                    <div class="btn-group dropdown dropup dropdown-center">
                                        <button class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu p-0 border-0">
                                            <li>
                                                <div class="lookbook-product">
                                                    <a href="product-detail.html" class="image">
                                                        <img class="lazyload" data-src="images/shop/products/lb-furniture-1.jpg" src="images/shop/products/lb-furniture-1.jpg" alt="lookbook-item">
                                                    </a>
                                                    <div class="content-wrap">
                                                        <div class="product-title">
                                                            <a href="#">Brasilia Lounge Chair</a>
                                                        </div>
                                                        <div class="price">$982.00</div>
                                                    </div>
                                                    <a href="#quick_view" data-bs-toggle="modal" class=""><i class="icon-view"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item item-2">
                                <div class="inner">
                                    <div class="btn-group dropdown dropup dropdown-center">
                                        <button class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu p-0 border-0">
                                            <li>
                                                <div class="lookbook-product">
                                                    <a href="product-detail.html" class="image">
                                                        <img class="lazyload" data-src="images/shop/products/lb-furniture-2.jpg" src="images/shop/products/lb-furniture-2.jpg" alt="">
                                                    </a>
                                                    <div class="content-wrap">
                                                        <div class="product-title">
                                                            <a href="#">AJ Wall Sconce</a>
                                                        </div>
                                                        <div class="price">$982.00</div>
                                                    </div>
                                                    <a href="#quick_view" data-bs-toggle="modal" class=""><i class="icon-view"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-lookbook lookbook-2">
                            <div class="image">
                                <img class="lazyload" data-src="images/slider/009furniture-banner-11.jpg" src="images/slider/009furniture-banner-11.jpg" alt="image-lookbook">
                            </div>
                            <div class="lookbook-item item-1">
                                <div class="inner">
                                    <div class="btn-group dropdown dropup dropdown-center">
                                        <button class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu p-0 border-0">
                                            <li>
                                                <div class="lookbook-product">
                                                    <a href="product-detail.html" class="image">
                                                        <img class="lazyload" data-src="images/shop/products/lb-furniture-3.jpg" src="images/shop/products/lb-furniture-3.jpg" alt="">
                                                    </a>
                                                    <div class="content-wrap">
                                                        <div class="product-title">
                                                            <a href="#">Eames Lounge Chair</a>
                                                        </div>
                                                        <div class="price">$6,500.00</div>
                                                    </div>
                                                    <a href="#quick_view" data-bs-toggle="modal" class=""><i class="icon-view"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-lookbook lookbook-3">
                            <div class="image">
                                <img class="lazyload" data-src="images/slider/009furniture-banner-12.jpg" src="images/slider/009furniture-banner-12.jpg" alt="image-lookbook">
                            </div>
                            <div class="lookbook-item item-1">
                                <div class="inner">
                                    <div class="btn-group dropdown dropup dropdown-center">
                                        <button class="tf-pin-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu p-0 border-0">
                                            <li>
                                                <div class="lookbook-product">
                                                    <a href="product-detail.html" class="image">
                                                        <img class="lazyload" data-src="images/shop/products/lb-furniture-4.jpg" src="images/shop/products/lb-furniture-4.jpg" alt="">
                                                    </a>
                                                    <div class="content-wrap">
                                                        <div class="product-title">
                                                            <a href="#">MG501 Cuba Lounge Chair, Paper Cord</a>
                                                        </div>
                                                        <div class="price">$1,366.00</div>
                                                    </div>
                                                    <a href="#quick_view" data-bs-toggle="modal" class=""><i class="icon-view"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-sw style-2 nav-next-slider nav-next-lookbook box-icon w_46 round"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw style-2 nav-prev-slider nav-prev-lookbook box-icon w_46 round"><span class="icon icon-arrow-right"></span></div>
                <div class="wrap-pagination">
                    <div class="container-full">
                        <div class="sw-dots sw-pagination-lookbook justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- /Lookbook -->
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
    <!-- Shop Gram -->
    <section class="pb-0 flat-spacing-18">
        <div class="container-full px-0">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <span class="title">Shop Gram</span>
                <p class="sub-title">Here’s some of our most popular products people are in love with.</p>
            </div>
            <div dir="ltr" class="swiper tf-sw-shop-gallery" data-preview="5" data-tablet="3" data-mobile="2" data-space-lg="0" data-space-md="0">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img rounded-0 wow fadeInUp" data-wow-delay="0s">
                            <div class="img-style">
                                <img class="lazyload img-hover" data-src="images/shop/gallery/furniture-gallery_01.jpg" src="images/shop/gallery/furniture-gallery_01.jpg" alt="image-gallery">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img rounded-0 wow fadeInUp" data-wow-delay=".1s">
                            <div class="img-style">
                                <img class="lazyload img-hover" data-src="images/shop/gallery/furniture-gallery_02.jpg" src="images/shop/gallery/furniture-gallery_02.jpg" alt="image-gallery">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img rounded-0 wow fadeInUp" data-wow-delay=".2s">
                            <div class="img-style">
                                <img class="lazyload img-hover" data-src="images/shop/gallery/furniture-gallery_03.jpg" src="images/shop/gallery/furniture-gallery_03.jpg" alt="image-gallery">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img rounded-0 wow fadeInUp" data-wow-delay=".3s">
                            <div class="img-style">
                                <img class="lazyload img-hover" data-src="images/shop/gallery/furniture-gallery_04.jpg" src="images/shop/gallery/furniture-gallery_04.jpg" alt="image-gallery">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img rounded-0 wow fadeInUp" data-wow-delay=".4s">
                            <div class="img-style">
                                <img class="lazyload img-hover" data-src="images/shop/gallery/furniture-gallery_05.jpg" src="images/shop/gallery/furniture-gallery_05.jpg" alt="image-gallery">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="gallery-item hover-img rounded-0 wow fadeInUp" data-wow-delay=".4s">
                            <div class="img-style">
                                <img class="lazyload img-hover" data-src="images/shop/gallery/furniture-gallery_06.jpg" src="images/shop/gallery/furniture-gallery_06.jpg" alt="image-gallery">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute-dots sw-dots sw-pagination-gallery justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Shop Gram -->
@endsection