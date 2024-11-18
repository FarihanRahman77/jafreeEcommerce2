<!DOCTYPE html>
<html>
@include('frontEnd.includes.header')	
<body>
    <!-- header -->
    @include('frontEnd.includes.menue')		
    <!-- //header -->
    <!-- bannerLeftCategory -->
    <!-- banner -->
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
                <i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/')}}">Home</a><span>|  Sub Category</span>
            </div>
        </div>
    </div>
   
    <div class="fresh-vegetables">
        <div class="container">
            @include('frontEnd.home.topMainCategory')
            <h3 class="keyH3">{{ucfirst($sCatName)}}</h3>
            <div class="w3l_fresh_vegetables_grids">
                <div class="row w3l_fresh_vegetables_grid_right">
                    <div id="loadProductsAuto"></div>
                    <div id="autoloader">Loading.......</div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        <div class="clearfix"></div>
        </div>
    </div>
<!-- newsletter -->
@include('frontEnd.home.newsLetter')
<!-- //newsletter -->
<!-- footer -->
@include('frontEnd.includes.footer')	
<!-- //footer -->
<!-- Core JavaScript -->
@include('frontEnd.includes.scripts')
<!-- //Core JavaScript -->
<script>
	var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $('body').on('touchmove', onScroll);
    $(window).on('scroll', onScroll);
    
    
    function onScroll(){
        
       if ($(window).scrollTop() + $(window).height() >= $(document).height()-100 && page < {{$lastPage}} ) {
            //alert($(window).scrollTop() + $(window).height() + '>='+ $(document).height() +'&&'+ page +'<'+ {{$lastPage}});
            page++;
            
            infinteLoadMore(page);
        }
    }

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/sCatProducts/{!!$sCatName!!}/?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('#autoloader').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('#autoloader').html("We don't have more data to display :(");
                    return;
                }
                $('#autoloader').hide();
                $('#loadProductsAuto').append(response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
</body>
</html>
