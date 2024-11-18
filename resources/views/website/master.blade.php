<!DOCTYPE html>
<html lang="en" dir="ltr">

    <!-- header start -->
    @include('website.includes.header')	
   <!-- header end -->

<body>
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
   
    <div class="site">
      
        <!-- topnavbars start  -->
        @include('website.includes.topnavbar')	
        <!-- topnavbars ends -->

        <div class="site__body">
            @yield('content')
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
         <!-- footer -->
         @include('website.includes.footer')	
        <!-- //footer -->
    </div><!-- site / end -->
    @include('website.includes.script')
</body>

</html>