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
        <!-- //bannerLeftCategory -->
    </div>
    <div class="col-md-9">
        <div class="w3l_banner_nav_right">
    
            <section class="slider">
                <div class="userDashboard">
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i></i> <a href="{{url('/userDashboard')}}"> {{Auth::user()->name}} Message</a></h4>
                    <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-primary">
                                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                <div class="deliveryStep activeStep">
                            <div class="deliveryStepTitle">
                            <div class="titleLeft">
                                <h2>Message Book</h2>
                            </div></div>
                            <div class="deliveryStepContent">
                                <div class="addressComponent mui">
                                    <div class="submitting">
                                        <section class="">
                                            
                                            <table id="tbl_category" class="table table-bordered table-striped dt_view" style="width:100%;">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Message</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @php($i = 1)
                                                        @foreach($messages as $message)
                                                            <tr>

                                                                <td>{{$i++}}</td>
                                                                <td>
                                                                    {{$message->message}}<br><br>
                                                                    
                                                                    @if($message->name)
                                                                    <small>{{$message->name}}</small><br>
                                                                    @else
                                                                    <small>Admin</small><br>
                                                                    @endif
                                                                    <small>{{$message->created_at->diffForHumans()}}</small>
                                                                </td>
                                                                
                                                            </tr>@endforeach
                                                        </tbody>
                                                    </table>
                                          </section>
                                       </div>
                                  </div>
                             </div>
                        </div>

                                                    

                                                
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </section>
                    
                    
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
        <div class="clearfix"></div>
    </div>
</div><br><br>



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