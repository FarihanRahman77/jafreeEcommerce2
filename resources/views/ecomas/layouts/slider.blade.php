<!-- slider -->
<div class="tf-slideshow slider-effect-fade slider-skincare position-relative">
            <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-loop="false" data-auto-play="true" data-delay="1000" data-speed="1000">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                    <div class="swiper-slide" lazy="true">
                        <div class="wrap-slider">
                            <img class="lazyload" data-src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" src="{{asset('ecomas/images/slider/'.$banner->bannerImage)}}" alt="slideshow" loading="lazy">
                            <div class="box-content">
                                <div class="container">
                                    <div class="card-box-2">
                                         <div class="fade-item fade-item-1 text-extra-heading text_white fw-8">{{$banner->carousal_caption_offer}}</div>
                                        <!-- <div class="fade-item fade-item-1 title"><a href="product-detail.html" class="link text-white">Selkirk Vanguard Power Air Invikta <br class="d-none d-md-block"> Midweight Pickleball Paddle</a></div>
                                        <div class="fade-item fade-item-2 price"><span class="old-price">$274.99</span> <span class="new-price text_primary">$279.99</span></div> -->
                                        <div class="fade-item fade-item-3">
                                            <a href="{{ url('/shop/data') }}" class="tf-btn btn-line btn-line-light collection-other-link fw-6"><span>Shop now</span><i class="icon icon-arrow1-top-left"></i></a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="wrap-pagination sw-absolute-3">
                <div class="sw-dots style-2 dots-white sw-pagination-slider justify-content-center"></div>
            </div>
        </div>
        <!-- /slider -->