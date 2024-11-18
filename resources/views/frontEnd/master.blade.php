<!DOCTYPE html>
<html>
    @include('frontEnd.includes.header')	
    <body>
		<div class="preloader"></div>
        <!-- header -->
        @include('frontEnd.includes.menue')		
        <!-- //header -->
        <!-- banner -->
        @include('frontEnd.home.banner')		
        <!-- //banner -->
        <!-- banner bottom 
        @include('frontEnd.home.bannerBottom')	-->
        <!-- //banner bottom -->
        <!-- top-brands 
        @include('frontEnd.home.brands')
        @include('frontEnd.home.hotOffers')-->
		
        {{-- @include('frontEnd.home.topProducts2') --}}
        <!-- //top-brands -->
        <!-- best produts slider -->
        @include('frontEnd.home.bestSlidProducts')
        <!-- //best produts slider -->
        
        <!-- fresh-vegetables -->
        @include('frontEnd.home.topProducts')
        <!-- //fresh-vegetables -->
        
        
        
        <!-- /about-Shop -->
		@include('frontEnd.home.aboutUsMisson')
        <!-- //about-Shop -->
        
        <!-- newsletter -->
        @include('frontEnd.home.newsLetter')			
        <!-- //newsletter -->
        
        <!-- footer -->
        @include('frontEnd.includes.footer')	
        <!-- //footer -->
        
        <!-- Core JavaScript -->
        @include('frontEnd.includes.scripts')
        <!-- //Core JavaScript -->
        @yield('contentJavaScripts')
        
    </body>
        
</html>

