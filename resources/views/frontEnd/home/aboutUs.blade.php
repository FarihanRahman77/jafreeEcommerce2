<!DOCTYPE html>
<html>
    @include('frontEnd.includes.header')
    <body>
        <!-- header -->
        @include('frontEnd.includes.menue')		
        <!-- //header -->
        
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
                    <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>| About Us</span>
                </div>
            </div>
        </div>
        <!-- //products-breadcrumb -->
        <div class="fresh-vegetables">
            @include('frontEnd.home.topMainCategory')
            <div class="container">
                <h3 class="keyH3">About Us</h3>
                <div class="agile_about_grids">
                    <div class="col-md-6 agile_about_grid_right">
                            <img src="{{asset('frontEnd/images/31.jpg')}}" alt=" " class="img-responsive" />
                        </div>
                        <div class="col-md-6 agile_about_grid_left">
                            <p class="animi">We are a small family run UK based business. Food is our passion. Rooted in a very multicultural background Asian, 
                    Middle Eastern and African cuisine is at the heart of our culture.  We have grown up watching our mothers and grandmothers prepare mouth-watering authentic 
                    and/or fusion delicacies, bringing the family together for cheerful, happy, loud and boisterous meal times. We truly believe in the age-old adage 
                    ‘The way to a man’s (or even a woman’s) heart is through their stomach’. If good quality ingredients and bold authentic flavours is what you are after, 
                    Jaman is your one stop shop..</p>
                        </div>

                </div><div class="clearfix"> </div>
                <!-- //about -->


            </div><br>
        </div>
        <!-- //testimonials -->
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
@section('contentJavaScripts')
<script>

</script>
@endsection