@extends('website.master')
@section('title')
Jafree Ecommerce - shop Grid 4 Column
@endsection
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
                                <li class="breadcrumb-item active" aria-current="page">Screwdrivers</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="page-header__title">
                        <h1>Screwdrivers</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="block">
                            <div class="products-view">
                                <div class="products-view__options">
                                    <div class="view-options">
                                        <div class="view-options__layout">
                                            <div class="layout-switcher">
                                                <div class="layout-switcher__list"><button data-layout="grid-4-full" data-with-features="false" title="Grid" type="button" class="layout-switcher__button layout-switcher__button--active"><svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#layout-grid-16x16"></use>
                                                        </svg></button> <button data-layout="grid-4-full" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
                                                            <use xlink:href="images/sprite.svg#layout-grid-with-details-16x16"></use>
                                                        </svg></button> <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button"><svg width="16px" height="16px">
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
                                <div class="products-view__list products-list" data-layout="grid-4-full" data-with-features="false">
                                    <div class="products-list__body">
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--new">New</div>
                                                </div>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-1.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Electric Planer Brandix KL370090G 300 Watts</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$749.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                                </div>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-2.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div>
                                                    <div class="product-card__rating">
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$1,019.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-3.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Drill Screwdriver Brandix ALX7054 200 Watts</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$850.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--sale">Sale</div>
                                                </div>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-4.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices"><span class="product-card__new-price">$949.00</span> <span class="product-card__old-price">$1189.00</span></div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-5.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Router Power Tool 2017ERXPK</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$1,700.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="images/products/product-6.jpg" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Drilling Machine DM2019KW4 4kW</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$3,199.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-7.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Pliers</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$24.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-8.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Water Hose 40cm</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$15.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-9.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Spanner Wrench</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$19.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-10.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Water Tap</a></div>
                                                    <div class="product-card__rating">
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$15.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-11.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Hand Tool Kit</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$149.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-12.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Ash's Chainsaw 3.5kW</a></div>
                                                    <div class="product-card__rating">
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$666.99</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-13.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Angle Grinder KZX3890PQW</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$649.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-14.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Air Compressor DELTAKX500</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$1,800.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-15.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Electric Jigsaw JIG7000BQ</a></div>
                                                    <div class="product-card__rating">
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
                                                                </div><svg class="rating__star" width="13px" height="12px">
                                                                    <g class="rating__fill">
                                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                    </g>
                                                                    <g class="rating__stroke">
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$290.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-list__item">
                                            <div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#quickview-16"></use>
                                                    </svg> <span class="fake-svg-icon"></span></button>
                                                <div class="product-card__image"><a href="{{ url('/products') }}"><img src="{{asset('website/images/products/product-16.jpg')}}" alt=""></a></div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name"><a href="{{ url('/products') }}">Brandix Screwdriver SCREW1500ACC</a></div>
                                                    <div class="product-card__rating">
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
                                                    <div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div>
                                                    <div class="product-card__prices">$1,499.00</div>
                                                    <div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px">
                                                                <use xlink:href="images/sprite.svg#compare-16"></use>
                                                            </svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-view__pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#" aria-label="Previous"><svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                                                </svg></a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link page-link--with-arrow" href="#" aria-label="Next"><svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                                                </svg></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection