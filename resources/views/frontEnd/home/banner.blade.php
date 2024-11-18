<div class="container">
    <!-- bannerLeftCategory -->
    <div class="col-md-3" style="padding-right: 0px;padding-left: 0px;">
        @include('frontEnd.home.bannerLeftCategory')
    </div>
    <div class="col-md-9" style="padding-right: 0px;padding-left: 0px;">
    <!-- //bannerLeftCategory -->
        <div class="w3l_banner_nav_right">
    
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
    
                        @foreach($fronEndTopBanners as $fronEndTopBanner)
                        <?php $bannerImage = 'bannerImage/' . $fronEndTopBanner->bannerImage; ?>
                        <li>
                            <div class="w3l_banner_nav_right_banner" style="background: url({{asset($bannerImage)}}) no-repeat 0px 0px; background-size: 1152px 360px;">
                                <h3><?php echo $fronEndTopBanner->carousal_caption_description; ?></h3>
                                <a href="#" class="shopNow button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <!-- flexSlider -->
            <link rel="stylesheet" href="{{asset('frontEnd/css/flexslider.css')}}" type="text/css" media="screen" property="" />
            <script defer src="{{asset('frontEnd/js/jquery.flexslider.js')}}"></script>
            <script type="text/javascript">
                $(window).load(function () {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function (slider) {
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
            <!-- //flexSlider -->
        </div>
    </div>
    <div class="clearfix"></div>
</div>