<header class="site__header d-lg-none">
    <div class="mobile-header mobile-header--sticky mobile-header--stuck">
        <div class="mobile-header__panel">
            <div class="custom-container">
                <div class="mobile-header__body">
                    <button class="mobile-header__menu-button">
                        <img src="{{asset('website/images/setting/'.$settings->landscape_image)}}" width="18px" height="14px" />
                    </button>
                    <!-- <a class="mobile-header__logo" href="{{ url('/') }}"><img
                                  src="{{asset('website/images/setting/'.$settings->landscape_image)}}" width="60px" height="60px"/>
                            </a> -->
                    <div class="mobile-header__search">
                        <form class="mobile-header__search-form" action="#"><input
                                class="mobile-header__search-input" name="search"
                                placeholder="Search over 10,000 products" aria-label="Site search" type="text"
                                autocomplete="off"> <button
                                class="mobile-header__search-button mobile-header__search-button--submit"
                                type="submit"><svg width="20px" height="20px">
                                    <use xlink:href="images/sprite.svg#search-20"></use>
                                </svg></button> <button
                                class="mobile-header__search-button mobile-header__search-button--close"
                                type="button"><svg width="20px" height="20px">
                                    <use xlink:href="images/sprite.svg#cross-20"></use>
                                </svg></button>
                            <div class="mobile-header__search-body"></div>
                        </form>
                    </div>
                    <div class="mobile-header__indicators">
                        <div class="indicator indicator--mobile-search indicator--mobile d-sm-none"><button
                                class="indicator__button"><span class="indicator__area"><svg width="20px"
                                        height="20px">
                                        <use xlink:href="{{asset('website/images/sprite.svg#search-20')}}"></use>
                                    </svg></span></button></div>
                        <div class="indicator indicator--mobile d-sm-flex d-none"><a href="{{ url('/wishlist') }}"
                                class="indicator__button"><span class="indicator__area"><svg width="20px"
                                        height="20px">
                                        <use xlink:href="{{asset('website/images/sprite.svg#heart-20')}}"></use>
                                    </svg> <span class="indicator__value">0</span></span></a></div>
                        <div class="indicator indicator--mobile">
                            <a href="{{ url('/card') }}"  class="indicator__button">
                                <span class="indicator__area">
                                    <i class="fa fa-cart-arrow-down"></i> 
                                    <span class="indicator__value">3</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- mobile site__header / end --><!-- desktop site__header -->
<header class="site__header d-lg-block d-none">
    <div class="site-header"><!-- .topbar -->
        <div class="site-header__topbar topbar">
            <div class="topbar__container custom-container">
                <div class="topbar__row">
                    <div class="topbar__item topbar__item--link"><a class="topbar-link"
                            href="{{ url('/aboutus') }}">About Us</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link"
                            href="{{ url('/contactus') }}">Contacts</a></div>
                    <div class="topbar__item topbar__item--link d-none"><a class="topbar-link" href="#">Store
                            Location</a></div>
                    <div class="topbar__item topbar__item--link d-none"><a class="topbar-link"
                            href="{{ url('/tractorder') }}">Track Order</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link"
                            href="{{ url('/blog_classic') }}">Blog</a></div>

                    <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ url('/termscondition') }}">Terms And Conditions</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link" href="{{ url('/faq') }}">FAQ</a></div>

                    <div class="topbar__spring"></div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown"><button class="topbar-dropdown__btn" type="button">My
                                Account <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg></button>
                            <div class="topbar-dropdown__body"><!-- .menu -->
                                <ul class="menu menu--layout--topbar">
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Addresses</a></li>
                                </ul><!-- .menu / end -->
                            </div>
                        </div>
                    </div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown"><button class="topbar-dropdown__btn"
                                type="button">Currency: <span class="topbar__item-value">{{$settings->currency}}</span> <svg
                                    width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg></button>
                            <!-- <div class="topbar-dropdown__body">
                                        <ul class="menu menu--layout--topbar">
                                            <li><a href="#">€ Euro</a></li>
                                            <li><a href="#">£ Pound Sterling</a></li>
                                            <li><a href="#">$ US Dollar</a></li>
                                            <li><a href="#">₽ Russian Ruble</a></li>
                                        </ul>
                                    </div> -->
                        </div>
                    </div>
                    <div class="topbar__item d-none">
                        <div class="topbar-dropdown"><button class="topbar-dropdown__btn"
                                type="button">Language: <span class="topbar__item-value">EN</span> <svg
                                    width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg></button>
                            <div class="topbar-dropdown__body"><!-- .menu -->
                                <ul class="menu menu--layout--topbar menu--with-icons">
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="{{asset('website/images/languages/language-1.png, images/languages/language-1@2x.png 2x')}}"
                                                    src="{{asset('website/images/languages/language-1.png')}}" alt=""></div>English
                                        </a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="{{asset('website/images/languages/language-2.png, images/languages/language-2@2x.png 2x')}}"
                                                    src="{{asset('website/images/languages/language-2.png')}}" alt=""></div>French
                                        </a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="{{asset('website/images/languages/language-3.png, images/languages/language-3@2x.png 2x')}}"
                                                    src="{{asset('website/images/languages/language-3.png')}}" alt=""></div>German
                                        </a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="{{asset('website/images/languages/language-4.png, images/languages/language-4@2x.png 2x')}}"
                                                    src="{{asset('website/images/languages/language-4.png')}}" alt=""></div>Russian
                                        </a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="{{asset('website/images/languages/language-5.png, images/languages/language-5@2x.png 2x')}}"
                                                    src="{{asset('website/images/languages/language-5.png')}}" alt=""></div>Italian
                                        </a></li>
                                </ul><!-- .menu / end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .topbar / end -->
        <div class="site-header__middle custom-container">
            <div class="site-header__logo">
                <a class="mobile-header__logo mt-1" href="{{ url('/') }}">
                    <img src="{{asset('website/images/setting/'.$settings->landscape_image)}}" width="280px" height="40px" />
                </a>
            </div>

            <!-- search form -->
            <div class="site-header__search">
                <div class="search">
                    <form class="search__form" action="{{route('search')}}" method="GET">
                        <input class="search__input" id="searchBar" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                        <button class="search__button" type="submit">
                                <i class="fa fa-search"></i>
                        </button>
                    </form>
                    <ul id="searchSuggestions" class="search__suggestions" style="display: none; position: absolute; background: #fff; list-style: none; width: 100%; z-index: 1000; width: 40%;"></ul>
                        <div class="search__border"></div>
                </div>
            </div>
            <!-- search form / end -->

            <div class="site-header__phone">

                <div class="site-header__phone-title">Hot Line</div>
                <div class="d-flex">
                    <i class="fa fa-phone m-1"></i> <div class="site-header__phone-number">{{$settings->phone}}</div>
                </div>
                
            </div>
        </div>
        <div class="site-header__nav-panel">
            <div class="nav-panel">
                <div class="nav-panel__container custom-container">
                    <div class="nav-panel__row">
                        <div class="nav-panel__departments"><!-- .departments -->
                            <div class="departments" data-departments-fixed-by="">
                                <div class="departments__body">
                                    <div class="departments__links-wrapper">
                                        <ul class="departments__links">
                                            @foreach($categories as $category)
                                            <li class="departments__item">
                                                <a href="{{ url('/categorywiseproduct/'.$category->id) }}">
                                                    {{$category->categoryName}}
                                                    <svg class="departments__link-arrow" width="6px"
                                                        height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div><button class="departments__button"><svg class="departments__button-icon"
                                        width="18px" height="14px">
                                        <use xlink:href="images/sprite.svg#menu-18x14"></use>
                                    </svg> Shop By Category <svg class="departments__button-arrow" width="9px"
                                        height="6px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                                    </svg></button>
                            </div><!-- .departments / end -->
                        </div><!-- .nav-links -->
                        <div class="nav-panel__nav-links nav-links">
                            <ul class="nav-links__list">
                                <li class="nav-links__item nav-links__item--with-submenu">
                                    <a href="{{ url('/') }}"><span>Home </span></a>
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a
                                        href="#"><span>Brands <svg class="nav-links__arrow" width="9px"
                                                height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6">
                                                </use>
                                            </svg></span></a>
                                    <div class="nav-links__megamenu nav-links__megamenu--size--nl">
                                        <!-- .megamenu -->
                                        <div class="megamenu">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="megamenu__links megamenu__links--level--0">
                                                        <li class="megamenu__item megamenu__item--with-submenu">
                                                            <a href="#">Trending Brands</a>
                                                            <ul class="megamenu__links megamenu__links--level--1 row">
                                                                @foreach($brands as $brand)
                                                                <li class="megamenu__item col-md-4">
                                                                    <a href="{{ route('brandwiseproduct',$brand->id) }}">{{$brand->brandName}}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div><!-- .megamenu / end -->
                                    </div>
                                </li>
                                <li class="d-none nav-links__item nav-links__item--with-submenu"><a
                                        href="{{ url('/shop_grid_3_columns_sidebar') }}"><span>Shop Old<svg
                                                class="nav-links__arrow" width="9px" height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6">
                                                </use>
                                            </svg></span></a>
                                    <div class="nav-links__menu"><!-- .menu -->
                                        <ul class="menu menu--layout--classic">
                                            <li><a href="{{ url('/shop_grid_3_columns_sidebar') }}">Shop Grid <svg
                                                        class="menu__arrow" width="6px" height="9px">
                                                        <use
                                                            xlink:href="images/sprite.svg#arrow-rounded-right-6x9">
                                                        </use>
                                                    </svg></a>
                                                <div class="menu__submenu"><!-- .menu -->
                                                    <ul class="menu menu--layout--classic">
                                                        <li><a href="{{ url('/shop_grid_3_columns_sidebar') }}">3 Columns
                                                                Sidebar</a></li>
                                                        <li><a href="{{ url('/shop_grid_4_column_full') }}">4 Columns
                                                                Full</a></li>
                                                        <li><a href="{{ url('/shop_grid_5_column') }}">5 Columns
                                                                Full</a></li>
                                                    </ul><!-- .menu / end -->
                                                </div>
                                            </li>
                                            <li><a href="{{ url('/shoplist') }}">Shop List</a></li>
                                            <li><a href="{{ url('/shop_right_side_bar') }}">Shop Right Sidebar</a></li>
                                            <li><a href="{{ url('/products') }}">Product <svg class="menu__arrow"
                                                        width="6px" height="9px">
                                                        <use
                                                            xlink:href="images/sprite.svg#arrow-rounded-right-6x9">
                                                        </use>
                                                    </svg></a>
                                                <div class="menu__submenu"><!-- .menu -->
                                                    <ul class="menu menu--layout--classic">
                                                        <li><a href="{{ url('/products') }}">Product</a></li>
                                                        <li><a href="{{ url('/products') }}">Product Alt</a></li>
                                                        <li><a href="{{ url('/product_sidebar') }}">Product Sidebar</a>
                                                        </li>
                                                    </ul><!-- .menu / end -->
                                                </div>
                                            </li>
                                            <li><a href="{{ url('/card') }}">Cart</a></li>
                                            <li><a href="{{ url('/checkoutcard') }}">Checkout</a></li>
                                            <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                                            <li><a href="{{ url('/compare') }}">Compare</a></li>
                                            <li><a href="{{ url('/contactus') }}">My Account</a></li>
                                            <li><a href="{{ url('/tractorder') }}">Track Order</a></li>
                                        </ul><!-- .menu / end -->
                                    </div>
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a
                                        href="#"><span>Importer <svg class="nav-links__arrow" width="9px"
                                                height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6">
                                                </use>
                                            </svg></span></a>
                                    <div class="nav-links__megamenu nav-links__megamenu--size--nl">
                                        <!-- .megamenu -->
                                        <div class="megamenu">
                                            <div class="row">
                                                <div class="col-12">
                                                    <ul class="megamenu__links megamenu__links--level--0">
                                                        <li class="megamenu__item megamenu__item--with-submenu">

                                                            <ul class="megamenu__links megamenu__links--level--1 row">
                                                                @foreach($importers as $importer)
                                                                <li class="megamenu__item col-md-4">
                                                                    <a href="{{ route('brandwiseproduct',$importer->id) }}">{{$importer->brandName}}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div><!-- .megamenu / end -->
                                    </div>
                                </li>
                                <li class="nav-links__item"><a href="{{ url('/shop/data') }}"><span>Shop
                                        </span></a></li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a
                                        href="{{ url('/blog_classic') }}"><span>Blog <svg class="nav-links__arrow"
                                                width="9px" height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6">
                                                </use>
                                            </svg></span></a>
                                    
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu d-none"><a
                                        href="#"><span>Pages <svg class="nav-links__arrow" width="9px"
                                                height="6px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6">
                                                </use>
                                            </svg></span></a>
                                    <div class="nav-links__menu"><!-- .menu -->
                                        <ul class="menu menu--layout--classic">
                                            <li><a href="{{ url('/aboutus') }}">About Us</a></li>
                                            <li><a href="{{ url('/contactus') }}">Contact Us</a></li>
                                            <li><a href="{{ url('/contactus') }}">Contact Us Alt</a></li>
                                            <!-- <li><a href="404.html">404</a></li> -->
                                            <li><a href="{{ url('/termscondition') }}">Terms And Conditions</a>
                                            </li>
                                            <li><a href="{{ url('/faq') }}">FAQ</a></li>
                                            <!-- <li><a href="components.html">Components</a></li>
                                                    <li><a href="typography.html">Typography</a></li> -->
                                        </ul><!-- .menu / end -->
                                    </div>
                                </li>
                                <li class="nav-links__item d-none"><a href="{{ url('/contactus') }}"><span>Contact
                                            Us</span></a></li>
                                <li class="nav-links__item d-none"><a
                                        href="https://themeforest.net/user/kos9/portfolio"><span>Buy
                                            Theme</span></a></li>
                            </ul>
                        </div><!-- .nav-links / end -->
                        <div class="nav-panel__indicators">
                            <div class="indicator d-none">
                                <a href="{{ url('/wishlist') }}" class="indicator__button ">
                                    <span class="indicator__area">
                                        <i class="fa fa-heart"></i>
                                        <span class="indicator__value">0</span>
                                    </span>
                                </a>
                            </div>
                            <div class="indicator indicator--mobile">
                                <a href="{{ url('/card') }}" class="indicator__button"> 
                                    <span class="indicator__area"> 
                                        <i class="fa fa-cart-arrow-down"></i> 
                                        <span class="indicator__value" id="cartCounterText">0</span> 
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><!-- desktop site__header / end --><!-- site__body -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title">Menu</div><button type="button" class="mobilemenu__close"><svg
                    width="20px" height="20px">
                    <use xlink:href="images/sprite.svg#cross-20"></use>
                </svg></button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse
                data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{ url('/') }}"
                            class="mobile-links__item-link">Home</a> <button class="mobile-links__item-toggle"
                            type="button" data-collapse-trigger><svg class="mobile-links__item-arrow" width="12px"
                                height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button></div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/') }}"
                                        class="mobile-links__item-link">Home 1</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/home2') }}"
                                        class="mobile-links__item-link">Home 2</a></div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Categories</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger><svg
                                class="mobile-links__item-arrow" width="12px" height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button>
                    </div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">Power Tools</a> <button
                                        class="mobile-links__item-toggle" type="button" data-collapse-trigger><svg
                                            class="mobile-links__item-arrow" width="12px" height="7px">
                                            <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                        </svg></button></div>
                                <div class="mobile-links__item-sub-links" data-collapse-content>
                                    <ul class="mobile-links mobile-links--level--2">
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Engravers</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Wrenches</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Wall Chaser</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Pneumatic Tools</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">Machine Tools</a> <button
                                        class="mobile-links__item-toggle" type="button" data-collapse-trigger><svg
                                            class="mobile-links__item-arrow" width="12px" height="7px">
                                            <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                        </svg></button></div>
                                <div class="mobile-links__item-sub-links" data-collapse-content>
                                    <ul class="mobile-links mobile-links--level--2">
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Thread Cutting</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Chip Blowers</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Sharpening Machines</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Pipe Cutters</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Slotting machines</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                    class="mobile-links__item-link">Lathes</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{ url('/shop/data') }}"
                            class="mobile-links__item-link">Shop </a> <button class="mobile-links__item-toggle"
                            type="button" data-collapse-trigger><svg class="mobile-links__item-arrow" width="12px"
                                height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button></div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/shop_grid_3_columns_sidebar') }}"
                                        class="mobile-links__item-link">Shop Grid</a> <button
                                        class="mobile-links__item-toggle" type="button" data-collapse-trigger><svg
                                            class="mobile-links__item-arrow" width="12px" height="7px">
                                            <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                        </svg></button></div>
                                <div class="mobile-links__item-sub-links" data-collapse-content>
                                    <ul class="mobile-links mobile-links--level--2">
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a
                                                    href="{{ url('//shop_grid_3_columns_sidebar') }}"
                                                    class="mobile-links__item-link">3 Columns Sidebar</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a
                                                    href="{{ url('/shop_grid_4_column_full') }}"
                                                    class="mobile-links__item-link">4 Columns Full</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a
                                                    href="{{ url('/shop_grid_5_column') }}"
                                                    class="mobile-links__item-link">5 Columns Full</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/shoplist') }}"
                                        class="mobile-links__item-link">Shop List</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/shop_right_side_bar') }}"
                                        class="mobile-links__item-link">Shop Right Sidebar</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/products') }}"
                                        class="mobile-links__item-link">Product</a> <button
                                        class="mobile-links__item-toggle" type="button" data-collapse-trigger><svg
                                            class="mobile-links__item-arrow" width="12px" height="7px">
                                            <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                        </svg></button></div>
                                <div class="mobile-links__item-sub-links" data-collapse-content>
                                    <ul class="mobile-links mobile-links--level--2">
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="{{ url('/products') }}"
                                                    class="mobile-links__item-link">Product</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="{{ url('/products') }}"
                                                    class="mobile-links__item-link">Product Alt</a></div>
                                        </li>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="{{ url('/product_sidebar') }}"
                                                    class="mobile-links__item-link">Product Sidebar</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/card') }}"
                                        class="mobile-links__item-link">Cart</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/checkoutcard') }}"
                                        class="mobile-links__item-link">Checkout</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/wishlist') }}"
                                        class="mobile-links__item-link">Wishlist</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/compare') }}"
                                        class="mobile-links__item-link">Compare</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/login_register') }}"
                                        class="mobile-links__item-link">My Account</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/tractorder') }}"
                                        class="mobile-links__item-link">Track Order</a></div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-links__item"><a href="{{ url('/contactus') }}"><span>Contact
                            Us</span></a></li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="{{ url('/blog_classic') }}"
                            class="mobile-links__item-link">Blog</a> <button class="mobile-links__item-toggle"
                            type="button" data-collapse-trigger><svg class="mobile-links__item-arrow" width="12px"
                                height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button></div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/blog_classic') }}"
                                        class="mobile-links__item-link">Blog Classic</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/blog_grid') }}"
                                        class="mobile-links__item-link">Blog Grid</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/blog_list') }}"
                                        class="mobile-links__item-link">Blog List</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/blog_left_sidebar') }}"
                                        class="mobile-links__item-link">Blog Left Sidebar</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/post') }}"
                                        class="mobile-links__item-link">Post Page</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/post_without_sidebar') }}"
                                        class="mobile-links__item-link">Post Without Sidebar</a></div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pages</a>
                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger><svg
                                class="mobile-links__item-arrow" width="12px" height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button>
                    </div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/aboutus') }}"
                                        class="mobile-links__item-link">About Us</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/contactus') }}"
                                        class="mobile-links__item-link">Contact Us</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/contactus') }}"
                                        class="mobile-links__item-link">Contact Us Alt</a></div>
                            </li>
                            <!-- <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="404.html"
                                            class="mobile-links__item-link">404</a></div>
                                </li> -->
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/termscondition') }}"
                                        class="mobile-links__item-link">Terms And Conditions</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="{{ url('/faq') }}"
                                        class="mobile-links__item-link">FAQ</a></div>
                            </li>
                            <!-- <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="components.html"
                                            class="mobile-links__item-link">Components</a></div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title"><a href="typography.html"
                                            class="mobile-links__item-link">Typography</a></div>
                                </li> -->
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a data-collapse-trigger
                            class="mobile-links__item-link">Currency</a> <button class="mobile-links__item-toggle"
                            type="button" data-collapse-trigger><svg class="mobile-links__item-arrow" width="12px"
                                height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button></div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">€
                                        Euro</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">£
                                        Pound Sterling</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">$
                                        US Dollar</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">₽
                                        Russian Ruble</a></div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title"><a data-collapse-trigger
                            class="mobile-links__item-link">Language</a> <button class="mobile-links__item-toggle"
                            type="button" data-collapse-trigger><svg class="mobile-links__item-arrow" width="12px"
                                height="7px">
                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                            </svg></button></div>
                    <div class="mobile-links__item-sub-links" data-collapse-content>
                        <ul class="mobile-links mobile-links--level--1">
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">English</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">French</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">German</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">Russian</a></div>
                            </li>
                            <li class="mobile-links__item" data-collapse-item>
                                <div class="mobile-links__item-title"><a href="#"
                                        class="mobile-links__item-link">Italian</a></div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
          
        </div>
    </div>
</div><!-- mobilemenu / end --><!-- site -->


