@extends('website.master')
@section('title')
{{$settings->website_name}} - Shop
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')
<div class="site__body">
    <div class="page-header">
        <div class="page-header__container custom-container">
           

        </div>
    </div>
    <div class="custom-container">
        <div class="shop-layout shop-layout--sidebar--start">
            <div class="shop-layout__sidebar">
                <div class="block block-sidebar">
                    <div class="block-sidebar__item">
                        <div class="widget-filters widget" data-collapse
                            data-collapse-opened-class="filter--opened">
                            <h4 class="widget__title">Filters</h4>
                            <div class="widget-filters__list">
                                <div class="widget-filters__item">
                                    <div class="filter filter--opened" data-collapse-item><button type="button"
                                            class="filter__title" data-collapse-trigger>Categories <svg
                                                class="filter__arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7">
                                                </use>
                                            </svg></button>
                                        <div class="filter__body" data-collapse-content>
                                            <div class="filter__container">
                                                <div class="filter-categories">
                                                    <ul class="filter-categories__list">
                                                        @foreach($categories as $category)
                                                        <li
                                                            class="filter-categories__item filter-categories__item--parent">
                                                            <svg class="filter-categories__arrow" width="6px"
                                                                height="9px">
                                                                
                                                            </svg> <a href="{{ url('/categorywiseproduct/'.$category->id) }}">{{$category->categoryName}}</a>
                                                           
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-filters__item">
                                    <div class="filter filter--opened" data-collapse-item><button type="button"
                                            class="filter__title" data-collapse-trigger>Price <svg
                                                class="filter__arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7">
                                                </use>
                                            </svg></button>
                                        <div class="filter__body" data-collapse-content>
                                            <div class="filter__container">
                                                <div class="filter-price" data-min="500" data-max="1500"
                                                    data-from="590" data-to="1130">
                                                    <div class="filter-price__slider"></div>
                                                    <div class="filter-price__title">Price: $<span
                                                            class="filter-price__min-value"></span> – $<span
                                                            class="filter-price__max-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-filters__item">
                                    <div class="filter filter--opened" data-collapse-item><button type="button"
                                            class="filter__title" data-collapse-trigger>Brand <svg
                                                class="filter__arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7">
                                                </use>
                                            </svg></button>
                                        <div class="filter__body" data-collapse-content>
                                            <div class="filter__container">
                                                <div class="filter-list">
                                                    <div class="filter-list__list">
                                                        @foreach($brands as $brand)
                                                        <label class="filter-list__item"><span
                                                                class="filter-list__input input-check"><span
                                                                    class="input-check__body"><input
                                                                        class="input-check__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check__box"></span> <svg
                                                                        class="input-check__icon" width="9px"
                                                                        height="7px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-9x7">
                                                                        </use>
                                                                    </svg> </span></span> <a style="color:gray" href="{{ route('brandwiseproduct',$brand->id) }}">{{$brand->brandName}}</a></label>

                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-filters__item">
                                    <div class="filter filter--opened" data-collapse-item><button type="button"
                                            class="filter__title" data-collapse-trigger>Color <svg
                                                class="filter__arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7">
                                                </use>
                                            </svg></button>
                                        <div class="filter__body" data-collapse-content>
                                            <div class="filter__container">
                                                <div class="filter-color">
                                                    <div class="filter-color__list"><label
                                                            class="filter-color__item"><span
                                                                class="filter-color__check input-check-color input-check-color--white"
                                                                style="color: #fff;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color input-check-color--light"
                                                                style="color: #d9d9d9;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #b3b3b3;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #808080;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #666;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #4d4d4d;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #262626;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #ff4040;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox" checked="checked"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #ff8126;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color input-check-color--light"
                                                                style="color: #ffd440;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color input-check-color--light"
                                                                style="color: #becc1f;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #8fcc14;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox" checked="checked"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #47cc5e;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #47cca0;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #47cccc;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #40bfff;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox" disabled="disabled">
                                                                    <span class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #3d6dcc;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox" checked="checked"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #7766cc;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #b852cc;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                        <label class="filter-color__item"><span
                                                                class="filter-color__check input-check-color"
                                                                style="color: #e53981;"><label
                                                                    class="input-check-color__body"><input
                                                                        class="input-check-color__input"
                                                                        type="checkbox"> <span
                                                                        class="input-check-color__box"></span>
                                                                    <svg class="input-check-color__icon"
                                                                        width="12px" height="9px">
                                                                        <use
                                                                            xlink:href="images/sprite.svg#check-12x9">
                                                                        </use>
                                                                    </svg> <span
                                                                        class="input-check-color__stick"></span></label></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-filters__actions d-flex"><button
                                    class="btn btn-primary btn-sm">Filter</button> <button
                                    class="btn btn-secondary btn-sm ml-2">Reset</button></div>
                        </div>
                    </div>
                    <div class="block-sidebar__item d-none d-lg-block">
                        <div class="widget-products widget">
                            <h4 class="widget__title">Latest Products</h4>
                            <div class="widget-products__list">
                                <div class="widget-products__item">
                                    <div class="widget-products__image"><a href="{{ url('/products') }}"><img
                                                src="{{asset('websiteimages/products/product-1.jpg')}}" alt=""></a></div>
                                    <div class="widget-products__info">
                                        <div class="widget-products__name"><a href="{{ url('/products') }}">Electric
                                                Planer Brandix KL370090G 300 Watts</a></div>
                                        <div class="widget-products__prices">$749.00</div>
                                    </div>
                                </div>
                                <div class="widget-products__item">
                                    <div class="widget-products__image"><a href="{{ url('/products') }}"><img
                                                src="{{asset('website/images/products/product-2.jpg')}}" alt=""></a></div>
                                    <div class="widget-products__info">
                                        <div class="widget-products__name"><a href="{{ url('/products') }}">Undefined Tool
                                                IRadix DPS3000SY 2700 Watts</a></div>
                                        <div class="widget-products__prices">$1,019.00</div>
                                    </div>
                                </div>
                                <div class="widget-products__item">
                                    <div class="widget-products__image"><a href="{{ url('/products') }}"><img
                                                src="{{asset('website/images/products/product-3.jpg')}}" alt=""></a></div>
                                    <div class="widget-products__info">
                                        <div class="widget-products__name"><a href="{{ url('/products') }}">Drill
                                                Screwdriver Brandix ALX7054 200 Watts</a></div>
                                        <div class="widget-products__prices">$850.00</div>
                                    </div>
                                </div>
                                <div class="widget-products__item">
                                    <div class="widget-products__image"><a href="{{ url('/products') }}"><img
                                                src="{{asset('website/images/products/product-4.jpg')}}" alt=""></a></div>
                                    <div class="widget-products__info">
                                        <div class="widget-products__name"><a href="{{ url('/products') }}">Drill Series 3
                                                Brandix KSR4590PQS 1500 Watts</a></div>
                                        <div class="widget-products__prices"><span
                                                class="widget-products__new-price">$949.00</span> <span
                                                class="widget-products__old-price">$1189.00</span></div>
                                    </div>
                                </div>
                                <div class="widget-products__item">
                                    <div class="widget-products__image"><a href="{{ url('/products') }}"><img
                                                src="{{asset('website/images/products/product-5.jpg')}}" alt=""></a></div>
                                    <div class="widget-products__info">
                                        <div class="widget-products__name"><a href="{{ url('/products') }}">Brandix Router
                                                Power Tool 2017ERXPK</a></div>
                                        <div class="widget-products__prices">$1,700.00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shop-layout__content">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__options">
                            <div class="view-options">
                                <div class="view-options__layout">
                                    <div class="layout-switcher">
                                        <div class="layout-switcher__list"><button data-layout="grid-3-sidebar"
                                                data-with-features="false" title="Grid" type="button"
                                                class="layout-switcher__button layout-switcher__button--active"><svg
                                                    width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#layout-grid-16x16"></use>
                                                </svg></button> <button data-layout="grid-3-sidebar"
                                                data-with-features="true" title="Grid With Features"
                                                type="button" class="layout-switcher__button"><svg width="16px"
                                                    height="16px">
                                                    <use
                                                        xlink:href="images/sprite.svg#layout-grid-with-details-16x16">
                                                    </use>
                                                </svg></button> <button data-layout="list"
                                                data-with-features="false" title="List" type="button"
                                                class="layout-switcher__button"><svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#layout-list-16x16"></use>
                                                </svg></button></div>
                                    </div>
                                </div>
                                <div class="view-options__legend">Showing 6 of 98 products</div>
                                <div class="view-options__divider"></div>
                                <div class="view-options__control"><label for="">Sort By</label>
                                    <div><select class="form-control form-control-sm" name="" id="">
                                            <option value="">Default</option>
                                            <option value="">Name (A-Z)</option>
                                        </select></div>
                                </div>
                                <div class="view-options__control"><label for="">Show</label>
                                    <div><select class="form-control form-control-sm" name="" id="">
                                            <option value="">12</option>
                                            <option value="">24</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>

                        @if(@$brandWiseProducts)
                        <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                            data-with-features="false">
                            <div class="products-list__body">
                                 @foreach($brandWiseProducts as $product)
                                <div class="products-list__item">
                                    <div class="product-card">
                                        <div class="product-card__badges-list">
                                        
                                        </div>
                                        <div class="product-card__image"><a href="{{  route('product.details',$product->id) }}">
                                                <img src="{{ $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage }}" alt="">

                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="{{ route('product.details',$product->id) }}">
                                                    {{$product->productName}}
                                                </a></div>
                                            @php
                                            $specifications = DB::table('tbl_productspecification')
                                            ->select(
                                                'tbl_productspecification.specificationName',
                                                'tbl_productspecification.specificationValue'
                                            )
                                            ->where('tbl_productspecification.deleted', 'No')
                                            ->where('tbl_productspecification.tbl_productsId', $product->id)
                                            ->get();

                                            @endphp
                                            <ul class="product-card__features-list">
                                            @foreach($specifications as $spec)
                                                <li>{{$spec->specificationName}} - {{$spec->specificationValue}}</li>
                                                

                                            @endforeach
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__name"> <span class="badge badge-warning">{{$product->brandName}}</span></div>
                                            <div class="product-card__name">{{$product->categoryName}}</div>
                                            <div class="product-card__buttons">
                                                <button
                                                    class="btn btn-primary product-card__addtocart"
                                                    type="button" onclick="addToCart({{$product->id}})">Add To Cart
                                                </button> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Pagination Links -->
                            </div>
                        </div>
                        <div class="products-view__pagination">
                            <div class="pagination justify-content-center">
                                {{ $brandWiseProducts->links() }}
                            </div>
                        </div>
                        @elseif(@$categoryWiseProducts)
                        <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                            data-with-features="false">
                            <div class="products-list__body">
                                 @foreach($categoryWiseProducts as $product)
                                <div class="products-list__item">
                                    <div class="product-card">
                                        <div class="product-card__badges-list">
                                        
                                        </div>
                                        <div class="product-card__image"><a href="{{ route('product.details',$product->id) }}">
                                                <img src="{{ $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage }}" alt="">

                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="{{  route('product.details',$product->id) }}">
                                                    {{$product->productName}}
                                                </a></div>
                                            @php
                                            $specifications = DB::table('tbl_productspecification')
                                            ->select(
                                                'tbl_productspecification.specificationName',
                                                'tbl_productspecification.specificationValue'
                                            )
                                            ->where('tbl_productspecification.deleted', 'No')
                                            ->where('tbl_productspecification.tbl_productsId', $product->id)
                                            ->get();

                                            @endphp
                                            <ul class="product-card__features-list">
                                            @foreach($specifications as $spec)
                                                <li>{{$spec->specificationName}} - {{$spec->specificationValue}}</li>
                                                

                                            @endforeach
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__name"> <span class="badge badge-warning">{{$product->brandName}}</span></div>
                                            <div class="product-card__name">{{$product->categoryName}}</div>
                                            <div class="product-card__buttons">
                                                <button
                                                    class="btn btn-primary product-card__addtocart"
                                                    type="button" onclick="addToCart({{$product->id}})">Add To Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Pagination Links -->
                            </div>
                        </div>
                        <div class="products-view__pagination">
                            <div class="pagination justify-content-center">
                                {{ $categoryWiseProducts->links() }}
                            </div>
                        </div>
                        @else
                        <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                            data-with-features="false">
                            <div class="products-list__body">
                                 @foreach($products as $product)
                                <div class="products-list__item">
                                    <div class="product-card">
                                        <div class="product-card__badges-list">
                                        
                                        </div>
                                        <div class="product-card__image"><a href="{{  route('product.details',$product->id) }}">
                                                <img src="{{ $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage }}" alt="">

                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name"><a href="{{ route('product.details',$product->id) }}">
                                                    {{$product->productName}}
                                                </a></div>
                                            @php
                                            $specifications = DB::table('tbl_productspecification')
                                                            ->select(
                                                                'tbl_productspecification.specificationName',
                                                                'tbl_productspecification.specificationValue'
                                                            )
                                                            ->where('tbl_productspecification.deleted', 'No')
                                                            ->where('tbl_productspecification.tbl_productsId', $product->id)
                                                            ->get();
                                            @endphp
                                            <ul class="product-card__features-list">
                                            @foreach($specifications as $spec)
                                                <li>{{$spec->specificationName}} - {{$spec->specificationValue}}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">Availability: <span
                                                    class="text-success">In Stock</span></div>
                                            <div class="product-card__name"> <span class="badge badge-warning">{{$product->brandName}}</span></div>
                                            <div class="product-card__name">{{$product->categoryName}}</div>
                                            <div class="product-card__buttons">
                                                <button
                                                    class="btn btn-primary product-card__addtocart" type="button" onclick="addToCart({{$product->id}})">Add To Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Pagination Links -->
                            </div>
                        </div>
                        <div class="products-view__pagination">
                            <div class="pagination justify-content-center">
                                {{ $products->links() }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection