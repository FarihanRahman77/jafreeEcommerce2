<!DOCTYPE html>
<html lang="zxx">
@include('frontEnd.includes.header')

<body>
    <style>
    
    </style>
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
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> <a href="{{url('/userDashboard')}}"> {{Auth::user()->name}} Profile </a></h4>
                    <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input class="form-control" name="email" type="email" disabled="" value="{{Auth::user()->email}}">
                         </div>
                        <div class="form-group">
                            <label for="email">Phone Number:</label>
                            <input class="form-control" name="email" type="email" disabled="" value="{{Auth::user()->phone}}">
                         </div>
                        <!--div class="form-group">
                            <textarea class="has-value paddingForExtraContent form-control" name="email" type="email" disabled="" >
                                {{Auth::user()->address}}
                            </textarea>
                        </div-->
                        <div class="deliveryStep activeStep">
                            <div class="deliveryStepTitle">
                            <div class="titleLeft">
                                <h2>Address Book</h2>
                            </div></div>
                            <div class="deliveryStepContent">
                                <div class="addressComponent mui">
                                    <div class="submitting">
                                        <section class="">
                                            <!--div class="newAddressAddBtn buttonOnTop">
                                                <section>
                                                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus" style="font-size:18px;color:gray"></i><span> New Address</span></a>
                                                </section>
                                            </div-->
                                            <section class="addresses">
                                                <div class="address selectedAddress">
                                                    <div class="profileIcon"><i class="fa fa-check-square" style="font-size:20px;color:green"></i></div>
                                                    <div class="profileAddress"><p>{{Auth::user()->address}}</p></div>
                                                    <div><a class="delete">delete</a></div>
                                                </div>
                                            </section>
                                          </section>
                                       </div>
                                   </div>
                              </div>
                        </div>
                      </div>
                      </div>
                      
                </div>
            </section>
            <!-- flexSlider
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
            </script> -->
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


<!-- The Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal" data-backdrop="false">
    <div class="modal-dialog">
      <div class="modal-content addressModal">
      
        <!-- Modal Header -->
        <div class="modal-header">
            
            <h4 class="modal-title">New Address <button class="btn_cancel" id="close" style="margin: 0em 0em 0em 11em;"> × </button></h4>
        </div>
        
        <!-- Modal body -->
        
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Street Address</label>
                        <textarea type="text" class="form-control input-lg" id="streetAddress" name="streetAddress"></textarea>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-6" style="padding-right: 10px;padding-left: 0px;">
                            <label class="control-label">Floor No</label>
                            <input type="text" class="form-control" id="floorNo" name="floorNo" >
                        </div>
                        <div class="col-md-6" style="padding-right: 0px;padding-left: 10px;">
                            <label class="control-label">Apertment No</label>
                            <input type="text" class="form-control" id="apertmentNo" name="apertmentNo" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Area</label>
                        <input type="text" class="form-control" id="area" name="area" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone Number</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" >
                    </div>
            </div>
        
        <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Save Address</button>
            </div>
        </form>
      </div>
    </div>
  </div>


    
</body>
</html>
<script>
$('#close').on('click', function() {
       $('#myModal').modal('hide')
    });
</script>
