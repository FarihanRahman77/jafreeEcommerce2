@extends('website.master')
@section('title')
Jafree Ecommerce - Blog List
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
                                <li class="breadcrumb-item active" aria-current="page">Latest News</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="page-header__title">
                        <h1>Latest News</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="block">
                            <div class="posts-view">
                                <div class="posts-view__list posts-list posts-list--layout--list">
                                    <div class="posts-list__body">
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-1.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                                    <div class="post-card__name"><a href="#">Philosophy That Addresses Topics Such As Goodness</a></div>
                                                    <div class="post-card__date">October 19, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-2.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Latest News</a></div>
                                                    <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And Argument Part 2</a></div>
                                                    <div class="post-card__date">September 5, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-3.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">New Arrivals</a></div>
                                                    <div class="post-card__name"><a href="#">Some Philosophers Specialize In One Or More Historical Periods</a></div>
                                                    <div class="post-card__date">August 12, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-4.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                                    <div class="post-card__name"><a href="#">A Variety Of Other Academic And Non-Academic Approaches Have Been Explored</a></div>
                                                    <div class="post-card__date">Jule 30, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-5.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">New Arrivals</a></div>
                                                    <div class="post-card__name"><a href="#">Germany Was The First Country To Professionalize Philosophy</a></div>
                                                    <div class="post-card__date">June 12, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-6.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                                    <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And Argument Part 1</a></div>
                                                    <div class="post-card__date">May 21, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-7.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                                    <div class="post-card__name"><a href="#">Many Inquiries Outside Of Academia Are Philosophical In The Broad Sense</a></div>
                                                    <div class="post-card__date">April 3, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-8.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Latest News</a></div>
                                                    <div class="post-card__name"><a href="#">An Advantage Of Digital Circuits When Compared To Analog Circuits</a></div>
                                                    <div class="post-card__date">Mart 29, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-9.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">New Arrivals</a></div>
                                                    <div class="post-card__name"><a href="#">A Digital Circuit Is Typically Constructed From Small Electronic Circuits</a></div>
                                                    <div class="post-card__date">February 10, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('website/images/posts/post-10.jpg')}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">Special Offers</a></div>
                                                    <div class="post-card__name"><a href="#">Engineers Use Many Methods To Minimize Logic Functions</a></div>
                                                    <div class="post-card__date">January 1, 2019</div>
                                                    <div class="post-card__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge. In that sense, all cultures...</div>
                                                    <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="posts-view__pagination">
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
                    <div class="col-12 col-lg-4">
                        <div class="block block-sidebar block-sidebar--position--end">
                            <div class="block-sidebar__item">
                                <div class="widget-search">
                                    <form class="widget-search__body"><input class="widget-search__input" placeholder="Blog search..." type="text" autocomplete="off" spellcheck="false"> <button class="widget-search__button" type="submit"><svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#search-20"></use>
                                            </svg></button></form>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-aboutus widget">
                                    <h4 class="widget__title">About Blog</h4>
                                    <div class="widget-aboutus__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero.</div>
                                    <div class="widget-aboutus__socials">
                                        <ul>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--rss" href="https://themeforest.net/user/kos9" target="_blank"><i class="widget-social__icon fas fa-rss"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--youtube" href="https://themeforest.net/user/kos9" target="_blank"><i class="widget-aboutus__icon fab fa-youtube"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--facebook" href="https://themeforest.net/user/kos9" target="_blank"><i class="widget-aboutus__icon fab fa-facebook-f"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--twitter" href="https://themeforest.net/user/kos9" target="_blank"><i class="widget-aboutus__icon fab fa-twitter"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--instagram" href="https://themeforest.net/user/kos9" target="_blank"><i class="widget-aboutus__icon fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-categories widget-categories--location--blog widget">
                                    <h4 class="widget__title">Categories</h4>
                                    <ul class="widget-categories__list" data-collapse data-collapse-opened-class="widget-categories__item--open">
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Latest News</a></div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Special Offers </a><button class="widget-categories__expander" type="button" data-collapse-trigger></button></div>
                                            <div class="widget-categories__subs" data-collapse-content>
                                                <ul>
                                                    <li><a href="#">Spring Sales</a></li>
                                                    <li><a href="#">Summer Sales</a></li>
                                                    <li><a href="#">Autumn Sales</a></li>
                                                    <li><a href="#">Christmas Sales</a></li>
                                                    <li><a href="#">Other Sales</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> New Arrivals</a></div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Reviews</a></div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Drills and Mixers</a></div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Cordless Screwdrivers</a></div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Screwdrivers</a></div>
                                        </li>
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="#"><svg class="widget-categories__arrow" width="6px" height="9px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg> Wrenches</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-posts widget">
                                    <h4 class="widget__title">Latest Posts</h4>
                                    <div class="widget-posts__list">
                                        <div class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="#"><img src="{{asset('website/images/posts/post-1-thumbnail.jpg')}}" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="#">Philosophy That Addresses Topics Such As Goodness</a></div>
                                                <div class="widget-posts__date">October 19, 2019</div>
                                            </div>
                                        </div>
                                        <div class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="#"><img src="{{asset('website/images/posts/post-2-thumbnail.jpg')}}" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="#">Logic Is The Study Of Reasoning And Argument Part 2</a></div>
                                                <div class="widget-posts__date">September 5, 2019</div>
                                            </div>
                                        </div>
                                        <div class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="#"><img src="{{asset('website/images/posts/post-3-thumbnail.jpg')}}" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="#">Some Philosophers Specialize In One Or More Historical Periods</a></div>
                                                <div class="widget-posts__date">August 12, 2019</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-newsletter widget">
                                    <h4 class="widget-newsletter__title">Our Newsletter</h4>
                                    <div class="widget-newsletter__text">Phasellus eleifend sapien felis, at sollicitudin arcu semper mattis. Mauris quis mi quis ipsum tristique lobortis. Nulla vitae est blandit rutrum.</div>
                                    <form class="widget-newsletter__form" action="#"><label for="widget-newsletter-email" class="sr-only">Email Address</label> <input id="widget-newsletter-email" type="text" class="form-control" placeholder="Email Address"> <button type="submit" class="btn btn-primary mt-3">Subscribe</button></form>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-comments widget">
                                    <h4 class="widget__title">Latest Comments</h4>
                                    <ul class="widget-comments__list">
                                        <li class="widget-comments__item">
                                            <div class="widget-comments__author"><a href="#">Emma Williams</a></div>
                                            <div class="widget-comments__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge...</div>
                                            <div class="widget-comments__meta">
                                                <div class="widget-comments__date">3 minutes ago</div>
                                                <div class="widget-comments__name">On <a href="#" title="Nullam at varius sapien sed sit amet condimentum elit">Nullam at varius sapien sed sit amet condimentum elit</a></div>
                                            </div>
                                        </li>
                                        <li class="widget-comments__item">
                                            <div class="widget-comments__author"><a href="#">Airic Ford</a></div>
                                            <div class="widget-comments__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge...</div>
                                            <div class="widget-comments__meta">
                                                <div class="widget-comments__date">25 minutes ago</div>
                                                <div class="widget-comments__name">On <a href="#" title="Integer efficitur efficitur velit non pulvinar pellentesque dictum viverra">Integer efficitur efficitur velit non pulvinar pellentesque dictum viverra</a></div>
                                            </div>
                                        </li>
                                        <li class="widget-comments__item">
                                            <div class="widget-comments__author"><a href="#">Loyd Walker</a></div>
                                            <div class="widget-comments__content">In one general sense, philosophy is associated with wisdom, intellectual culture and a search for knowledge...</div>
                                            <div class="widget-comments__meta">
                                                <div class="widget-comments__date">2 hours ago</div>
                                                <div class="widget-comments__name">On <a href="#" title="Curabitur quam augue vestibulum in mauris fermentum pellentesque libero">Curabitur quam augue vestibulum in mauris fermentum pellentesque libero</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-tags widget">
                                    <h4 class="widget__title">Tags Cloud</h4>
                                    <div class="tags tags--lg">
                                        <div class="tags__list"><a href="#">Promotion</a> <a href="#">Power Tool</a> <a href="#">New Arrivals</a> <a href="#">Screwdriver</a> <a href="#">Wrench</a> <a href="#">Mounts</a> <a href="#">Electrodes</a> <a href="#">Chainsaws</a> <a href="#">Manometers</a> <a href="#">Nails</a> <a href="#">Air Guns</a> <a href="#">Cutting Discs</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection