<input type="hidden" id="isSlider" value="slider">
<div class="block-slideshow block-slideshow--layout--with-departments block">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12 col-lg-9 offset-lg-3">
                            <div class="block-slideshow__body">
                                <div class="owl-carousel">
                                    @foreach($banners as $banner)
                                    <a class="block-slideshow__slide" href="#">
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                            style="background-image: url('{{ asset('website/images/banners/'.$banner->bannerImage) }}')"></div>
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile setcarousalimg"
                                            style="background: url('{{ asset('website/images/banners/'.$banner->bannerImage) }}')">
                                        </div>
                                        <div class="block-slideshow__slide-content">
                                            <div class="block-slideshow__slide-title">{{$banner->carousal_caption_offer}}
                                            </div>
                                            <div class="block-slideshow__slide-text">{{$banner->carousal_caption_description}}</div>
                                            <div class="block-slideshow__slide-button" ><a href="{{ url('/shop/data') }}"
                                                    class="btn btn-primary btn-lg"><span>Shop Now</span></a></div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .block-slideshow / end --><!-- .block-features -->