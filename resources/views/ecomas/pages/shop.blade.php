@extends('ecomas.master')
@section('title')
{{$settings->website_name}} - Shop
@endsection
@section('content')
    <!-- slider -->
    <div class="tf-slideshow slider-women slider-effect-fade position-relative">
        <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-loop="true" data-auto-play="false" data-delay="2000" data-speed="1000">
            <div class="swiper-wrapper">
                @if(@$categoryBanners)
                    @foreach($categoryBanners as $banner)
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" alt="women-slideshow-01" style="">
                            <div class="box-content">
                                <div class="container">
                                    <h1 class="fade-item fade-item-1">{{$banner->carousal_caption_offer}}</h1>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                @elseif(@$brandBanners)
                    @foreach($brandBanners as $banner)
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" alt="women-slideshow-01" style="">
                            <div class="box-content">
                                <div class="container">
                                    <h1 class="fade-item fade-item-1">{{$banner->carousal_caption_offer}}</h1>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    @foreach($shopBanners as $banner)
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" alt="women-slideshow-01" style="">
                            <div class="box-content">
                                <div class="container">
                                    <h1 class="fade-item fade-item-1">{{$banner->carousal_caption_offer}}</h1>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="wrap-pagination">
            <div class="container">
                <div class="sw-dots sw-pagination-slider justify-content-center"></div>
            </div>
        </div>
    </div>
    <!-- /slider -->

     <!-- /page-title -->
     <section class="flat-spacing-1">
            <div class="custom-container">
                <div class="tf-shop-control grid-3 align-items-center">
                    <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a>
                    </div>
                    <ul class="tf-control-layout d-flex justify-content-center d-none">
                        <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                            <div class="item"><span class="icon icon-list"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                            <div class="item"><span class="icon icon-grid-2"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3 active" data-value-layout="tf-col-3">
                            <div class="item"><span class="icon icon-grid-3"></span></div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4" data-value-layout="tf-col-4">
                            <div class="item"><span class="icon icon-grid-4"></span></div>
                        </li>
                    </ul>
                    <div class="tf-control-sorting d-flex justify-content-end d-none">
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">Featured</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="select-item active">
                                    <span class="text-value-item">Featured</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Best selling</span>
                                </div>
                                <div class="select-item" data-sort-value="a-z">
                                    <span class="text-value-item">Alphabetically, A-Z</span>
                                </div>
                                <div class="select-item" data-sort-value="z-a">
                                    <span class="text-value-item">Alphabetically, Z-A</span>
                                </div>
                                <div class="select-item" data-sort-value="price-low-high">
                                    <span class="text-value-item">Price, low to high</span>
                                </div>
                                <div class="select-item" data-sort-value="price-high-low">
                                    <span class="text-value-item">Price, high to low</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Date, old to new</span>
                                </div>
                                <div class="select-item">
                                    <span class="text-value-item">Date, new to old</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(@$subCategories)
                    <ul class="tf-control-layout d-flex justify-content-center ">
                        @foreach($subCategories as $subcat)
                        <li class="tf-view-layout-switch sw-layout-list list-layout" onclick="getSubCategoryWiseProduct({{$subcat->id}},{{$subcat->category_id}})">
                            <div class="item">{{$subcat->name}}</div>
                        </li>
                        @endforeach
                        
                    </ul>
                    @endif
                </div> 
                <div class="tf-row-flex">
                    <aside class="tf-shop-sidebar wrap-sidebar-mobile">
                        <div class="widget-facet wd-categories">
                            <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                                <span>Product categories</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="categories" class="collapse show">
                                <ul class="list-categoris current-scrollbar mb_36">
                                    @foreach($categories as $category)
                                    <li class="cate-item">
                                        <a href="{{url('/categorywiseproduct/'.$category->id)}}">
                                            <span>{{$category->categoryName}}</span>
                                        </a>
                                        <span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#sale-products" data-bs-toggle="collapse" aria-expanded="true" aria-controls="sale-products">
                                <span>Popular Brands</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="sale-products" class="collapse show ">
                                <div class="widget-featured-products mb_36 current-scrollbar">
                                    @foreach($brands as $brand)
                                    <div class="featured-product-item">
                                        <a href="{{ route('brandwiseproduct',$brand->id) }}" class="card-product-wrapper">
                                            <img class="lazyload img-product" data-src="{{ asset('ecomas/images/brand/'.$brand->brand_logo)}}" alt="image-feature">
                                        </a>
                                        <div class="card-product-info">
                                            <a href="{{ route('brandwiseproduct',$brand->id) }}" class="title link">{{$brand->brandName}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#gallery" data-bs-toggle="collapse" aria-expanded="true" aria-controls="gallery">
                                <span>Featured Products</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="gallery" class="collapse show">
                                <div class="grid-3 gap-4 mb_36">
                                    @foreach($featuredProducts as $product)
                                    <a href="{{  route('product.details',$product->id) }}" class="item-gallery">
                                        <img class="lazyload" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="img-gallery">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#follow" data-bs-toggle="collapse" aria-expanded="true" aria-controls="follow">
                                <span>Follow us</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="follow" class="collapse show">
                                <ul class="tf-social-icon d-flex gap-10">
                                    <li><a href="#" class="box-icon w_34 round bg_line social-facebook"><i class="icon fs-14 icon-fb"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round bg_line social-twiter"><i class="icon fs-12 icon-Icon-x"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round bg_line social-instagram"><i class="icon fs-14 icon-instagram"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round bg_line social-tiktok"><i class="icon fs-14 icon-tiktok"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round bg_line social-pinterest"><i class="icon fs-14 icon-pinterest-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <div class="wrapper-control-shop tf-shop-content">
                        <div class="meta-filter-shop">
                            <div id="product-count-grid" class="count-text"></div>
                            <div id="product-count-list" class="count-text"></div>
                            <div id="applied-filters"></div>
                            <button id="remove-all" class="remove-all-filters" style="display: none;">Remove All <i class="icon icon-close"></i></button>
                        </div>
                        
                        <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
                            @if(@$brandWiseProducts)
                                @foreach($brandWiseProducts as $product)
                                <!-- card product 1 -->
                                <div class="card-product grid" data-availability="In stock" data-brand="Ecomus">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#" onclick="addToCart({{$product->id}})"  data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading btn-add-to-cart">
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
                                        <a href="{{  route('product.details',$product->id )}}" class="title link">{{ @$product->brand->brandName ?? 'No Brand' }} - {{$product->productName}}</a>
                                        <span class="price current-price">{{ @$product->category->categoryName ?? 'No Category' }}</span>
                                    </div>
                                </div>
                                @endforeach

                                <!-- pagination -->
                                <ul class="wg-pagination tf-pagination-list">
                                    {{ $brandWiseProducts->links() }}
                                </ul>
                            @elseif(@$categoryWiseProducts)
                                @foreach($categoryWiseProducts as $product)
                                <!-- card product 1 -->
                                <div class="card-product grid" data-availability="In stock" data-brand="Ecomus">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#" onclick="addToCart({{$product->id}})"  data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading btn-add-to-cart">
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
                                        <a href="{{  route('product.details',$product->id )}} " class="title link">{{ @$product->brand->brandName ?? 'No Brand' }} - {{$product->productName}}</a>
                                        <span class="price current-price">{{ @$product->category->categoryName ?? 'No Category' }}</span>
                                    </div>
                                </div>
                                @endforeach

                                <!-- pagination -->
                                <ul class="wg-pagination tf-pagination-list">
                                    {{ $categoryWiseProducts->links() }}
                                </ul>
                            @else
                                @foreach($products as $product)
                                <!-- card product 1 -->
                                <div class="card-product grid" data-availability="In stock" data-brand="Ecomus">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            <img class="lazyload img-product" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" src="{{ $settings->erp_baseurl.'/images/products/big_product_img/'.$product->productImage }}" alt="image-product">
                                        </a>
                                        <div class="list-product-btn absolute-2">
                                            <a href="#" onclick="viewProductDetails({{$product->id}})" onclick="addToCart({{$product->id}})"  data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading btn-add-to-cart">
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
                                        <a href="{{  route('product.details',$product->id )}} " class="title link">{{ @$product->brand_name ?? 'No Brand' }} - {{$product->productName}}</a>
                                        <span class="price current-price">{{ @$product->category_name ?? 'No Category' }}</span>
                                    </div>
                                </div>
                                @endforeach

                                <!-- pagination -->
                                <ul class="wg-pagination tf-pagination-list">
                                    {{ $products->links() }}
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection