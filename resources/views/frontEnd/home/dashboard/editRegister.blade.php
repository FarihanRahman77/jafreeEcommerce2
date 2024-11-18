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
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i>Edit  </i> <a href="{{url('/userDashboard')}}"> {{Auth::user()->name}} Dashboard </a></h4>
                    
                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-primary">
                                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        {!!Form::open(['url'=>'/user/update-profile','class'=>'form-horizontal', 'id'=>'profile_form', 'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                                        <!-- One "tab" for each step in the form: -->
                                                        <input type='hidden' id='sendFrom' name='sendFrom' value='frontEnd'/>
                                                        <input type='hidden' id='type' name='type' value=''/>
                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-3 col-md-3 col-form-label">Full Name <font color="red">*</font></label>
                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="Name..." class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                                                                <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-sm-3 col-form-label">Phone No <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="Phone No..." class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                                                                <span class="text-danger">{{$errors->has('phone')?$errors->first('phone'):''}}</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-sm-3 col-form-label">Email</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" placeholder="Eg. example@domain.com" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label for="address" class="col-sm-3 col-form-label">Address <font color="red">*</font></label>
                                                            <div class="col-sm-9">
                                                                <textarea placeholder="Address.." class="form-control" id="address" name="address">{{Auth::user()->address}}</textarea>
                                                                <span class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</span>
                                                            </div>
                                                        </div>
                                                    {{-- <div class="form-group row">
                                                            <label for="name" class="col-sm-3 col-form-label">Profile Picture</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" name="profile_picture" class="form-control" id="profile_picture" />
                                                            </div>
                                                        </div> --}}
                                                        

                                                        <div style="margin: 2% 0% 6% 4%;">
                                                            <button type="submit" class="btn btn-primary  pull-right" name="btn_register">Update Profile</button>
                                                        </div><br>

                                                        {!!Form::close()!!}

                                                        @if(count($errors)>0)
                                                        NB: Must be fiil up 
                                                        @foreach($errors->all() as $error)
                                                        <span style="color: red;">[ {{$error}} ]</span>
                                                        @endforeach
                                                        @endif
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