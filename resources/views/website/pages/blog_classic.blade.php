@extends('website.master')
@section('title')
Jafree Ecommerce - Blog Classic
@endsection
@section('content')
     
        <div class="site__body">
            <div class="page-header">
                <div class="page-header__container container">
                    <div class="page-header__breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg></li>
                                <li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="page-header__title">
                        <h1>Latest Blogs</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    



                <div class="col-12 col-lg-8">
                        <div class="block">
                            <div class="posts-view">
                                <div class="posts-view__list posts-list posts-list--layout--classic">
                                    <div class="posts-list__body">
                                      @foreach ($blogs as  $blog)
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--grid post-card--size--lg">
                                                <div class="post-card__image"><a href="#"><img src="{{asset('/website/images/blog/'.$blog->content_image)}}" alt=""></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__category"><a href="#">{{$blog->content_title}}</a></div>
                                                    <div class="post-card__name"><a href="#">{!! $blog->content_description !!}</a></div>
                                            
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="block block-sidebar block-sidebar--position--end">
                          
                            <div class="block-sidebar__item">
                                <div class="widget-aboutus widget">
                                    <h4 class="widget__title">About Blog</h4>
                                  
                                    <div class="widget-aboutus__socials">
                                        <ul>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--youtube" href="{{$settings->youtube}}" target="_blank"><i class="widget-aboutus__icon fab fa-youtube"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--facebook" href="{{$settings->facebook}}" target="_blank"><i class="widget-aboutus__icon fab fa-facebook-f"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--facebook" href="{{$settings->linkedin}}" target="_blank"><i class="widget-aboutus__icon fab fa-linkedin"></i></a></li>
                                            <li><a class="widget-aboutus__link widget-aboutus__link--instagram" href="{{$settings->instagram}}" target="_blank"><i class="widget-aboutus__icon fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-categories widget-categories--location--blog widget">
                                    <h4 class="widget__title">Categories</h4>
                                    <ul class="widget-categories__list" data-collapse data-collapse-opened-class="widget-categories__item--open">
                                       @foreach ($categories as $catrgory )
                                       <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row"><a href="{{ url('/categorywiseproduct/'.$catrgory->id) }}">{{$catrgory->categoryName}}</a></div>
                                        </li>
                                       @endforeach
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-posts widget">
                                    <h4 class="widget__title">Latest Products</h4>
                                    <div class="widget-posts__list">
                                        @foreach ($latestproducts as $latestproduct)
                                        <div class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="{{  route('product.details',$latestproduct->id) }}"><img src="{{ $settings->erp_baseurl.'/images/products/thumb/'.$latestproduct->productImage }}" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="{{  route('product.details',$latestproduct->id) }}">{{$latestproduct->productName}}</a></div>
                                                <div class="widget-posts__date"><b>Category:</b>{{$latestproduct->categoryName}}</div>
                                                <div class="widget-posts__date"><b>Brand:</b>{{$latestproduct->brandName}}</div>
                                            </div>
                                        </div> 
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="d-none block-sidebar__item">
                                <div class="widget-newsletter widget">
                                    <h4 class="widget-newsletter__title">Our Newsletter</h4>
                                    <div class="widget-newsletter__text">Phasellus eleifend sapien felis, at sollicitudin arcu semper mattis. Mauris quis mi quis ipsum tristique lobortis. Nulla vitae est blandit rutrum.</div>
                                    <form class="widget-newsletter__form" action="#"><label for="widget-newsletter-email" class="sr-only">Email Address</label> <input id="widget-newsletter-email" type="text" class="form-control" placeholder="Email Address"> <button type="submit" class="btn btn-primary mt-3">Subscribe</button></form>
                                </div>
                            </div>
                            <div class="d-none block-sidebar__item">
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
                                        <div class="tags__list">
                                            @foreach ($brands as $brand)
                                                <a href="{{ route('brandwiseproduct',$brand->id) }}">{{$brand->brandName}}</a> 
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection