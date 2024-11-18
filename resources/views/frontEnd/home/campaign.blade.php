<!DOCTYPE html>
<html>
    @include('frontEnd.includes.header')	
    <body>
        <!-- header -->
        @include('frontEnd.includes.menue')		
        <!-- //header -->
        <!-- bannerLeftCategory -->
        <div class="topBreadcrumb">
            <div class="container">
                <div class="col-md-3">
                    <div class="catDisplay" style="padding-right: 0px;padding-left: 0px;">
                        @include('frontEnd.home.bannerLeftCategory')
                    </div>
                    <div class="panel panel-default catColMenu" style="position: absolute;z-index: 4;width: 250px;">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                               <i class="fa fa-bars"></i> <a data-toggle="collapse" href="#collapse1"> CATEGORIES </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            @include('frontEnd.home.topLeftCategory')
                        </div>
                    </div>
                </div>
                <div class="col-md-9 text-right" style="font-size: 12px;">
                    <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>|Campaign</span>
                </div>
            </div>
        </div>
        
            <!-- //products-breadcrumb -->
          <div class="fresh-vegetables">
            @include('frontEnd.home.topMainCategory')
            <div class="container">
                <h3 class="keyH3">Our Campaign</h3>
                <div class="w3l_banner_nav_right_banner3_btm">
                    <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                        <div class="view view-tenth">
                            <img src="{{asset('frontEnd/images/13.jpg')}}" alt=" " class="img-responsive" />
                            <div class="mask">
                                <h4>Grocery Store</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                            </div>
                        </div>
                        <h4>Utensils</h4>
                        <ol>
                            <li>sunt in culpa qui officia</li>
                            <li>commodo consequat</li>
                            <li>sed do eiusmod tempor incididunt</li>
                        </ol>
                    </div>
                    <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                        <div class="view view-tenth">
                            <img src="{{asset('frontEnd/images/14.jpg')}}" alt=" " class="img-responsive" />
                            <div class="mask">
                                <h4>Grocery Store</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                            </div>
                        </div>
                        <h4>Hair Care</h4>
                        <ol>
                            <li>enim ipsam voluptatem officia</li>
                            <li>tempora incidunt ut labore et</li>
                            <li>vel eum iure reprehenderit</li>
                        </ol>
                    </div>
                    <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                        <div class="view view-tenth">
                            <img src="{{asset('frontEnd/images/15.jpg')}}" alt=" " class="img-responsive" />
                            <div class="mask">
                                <h4>Grocery Store</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                            </div>
                        </div>
                        <h4>Cookies</h4>
                        <ol>
                            <li>dolorem eum fugiat voluptas</li>
                            <li>ut aliquid ex ea commodi</li>
                            <li>magnam aliquam quaerat</li>
                        </ol>
                    </div>
                    <div class="clearfix"> </div>
                </div>
               {{--@include('frontEnd.home.popularBrands')--}}
            </div>
</div></div>
            <div class="clearfix"></div>
        <!-- newsletter -->
        @include('frontEnd.home.newsLetter')
        <!-- //newsletter -->
        <!-- footer -->
        @include('frontEnd.includes.footer')	
        <!-- //footer -->
        <!-- Core JavaScript -->
        @include('frontEnd.includes.scripts')
        <!-- //Core JavaScript -->
    </body>
</html>
