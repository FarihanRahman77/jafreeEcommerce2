<!DOCTYPE html>
<html lang="zxx">
@include('frontEnd.includes.header')

<body>
    <!-- navigation -->
    @include('frontEnd.includes.menue')
<div class="container">
    <div class="col-md-3 banner">
        <!-- bannerLeftCategory -->
        @include('frontEnd.home.bannerLeftCategory')
    </div>
        <!-- //bannerLeftCategory -->
        <div class="col-md-9">
            <div class="w3l_banner_nav_right">
    
            <section class="">
                <div class="userDashboard">
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> <a href="{{url('/userDashboard')}}"> {{Auth::user()->name}} Dashboard </a></h4>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="infoUserDashboard">
                            <span class="info-box-icon elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <a href="#">
                                    <span class="info-box-text">Total : </span>
                                    <span class="info-box-number"> {{$totalCount}}</span>
                                </a>
                             </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="infoUserDashboard mb-3">
                            <span class="info-box-icon elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    
                            <div class="info-box-content">
                                <a href="#">
                                    <span class="info-box-text">Pending : </span>
                                    <span class="info-box-number">{{$pendingOrders}}</span>
                                </a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="infoUserDashboard mb-3">
                            <span class="info-box-icon elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    
                            <div class="info-box-content">
                                <a href="#">
                                    <span class="info-box-text">Processing : </span>
                                    <span class="info-box-number">{{$processingOrders}}</span>
                                </a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="infoUserDashboard mb-3">
                            <span class="info-box-icon elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    
                            <div class="info-box-content">
                                <a href="#">
                                    <span class="info-box-text">Completed : </span>
                                    <span class="info-box-number">{{$completedOrders}}</span>
                                </a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="mb-3 infoUserDashboard">
                    
                            <div class="info-box-content">
                                <a class="active" href="{{route('user-profile-view')}}"><i class="fa fa-address-card" aria-hidden="true"></i> Profile View</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="mb-3 infoUserDashboard">
                    
                            <div class="info-box-content">
                                <a class="" href="{{route('user-profile-edit')}}"><i class="fa fa-location-arrow" aria-hidden="true"></i> Profile Edit</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="mb-3 infoUserDashboard">
                    
                            <div class="info-box-content">
                                <a class="" href="{{route('user-message-portal')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="mb-3 infoUserDashboard">
                    
                            <div class="info-box-content">
                                <a class="" href="{{route('user-change-password')}}"><i class="fa fa-random" aria-hidden="true"></i> Change Password</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                    
                    
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
    <br><br>
</div>



<!-- //welcome -->

<!-- newsletter -->
@include('frontEnd.home.newsLetter')
<!-- newsletter -->

<!-- footer section -->
@include('frontEnd.includes.footer')
<!-- footer section -->
@include('frontEnd.includes.scripts')




</body>
</html>