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
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->name}} Dashboard</h4>
                    <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-primary">
                                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        {{-- {!!Form::open(['url'=>'profile/save/'.$type,'class'=>'form-horizontal', 'id'=>'profile_form', 'method'=>'POST','enctype'=>'multipart/form-data'])!!} --}}
                                                        <form action="{{route('user-update-password')}}" method="POST">
                                                            @csrf
                                                        <!-- One "tab" for each step in the form: -->
                                                        <input type='hidden' id='sendFrom' name='sendFrom' value='frontEnd'/>
                                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                        <div class="col-sm-12">
                                                            <center><span id="passwordNotification">
                                                            @if(Session::get('error') != "")
                                                                <span class="alert-danger">{{Session::get('error')}}</span>
                                                            @elseif(Session::get('message') != "")
                                                                <span class="alert-success">{{Session::get('message')}}</span>
                                                            @endif
                                                            </span></center>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-sm-3 col-form-label">Old Password <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input type="password" placeholder="Type Password...." class="form-control"  name="oldPassword" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-sm-3 col-form-label">New Password <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input required type="password" placeholder="Type Password...." class="form-control"  name="newPassword">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="confirmPassword" class="col-sm-3 col-form-label">New Confirm Password <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input required type="password" placeholder="Re-Type Password...." class="form-control"   name="confirmPassword">
                                                            </div>
                                                        </div>
                                                        

                                                        <div style="margin: 2% 0% 6% 4%;">
                                                            <button type="submit" class="btn btn-primary  pull-right" name="btn_register"> Change Password</button>
                                                        </div>

                                                    </form>
                                                        {{-- {!!Form::close()!!} --}}

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
    </div>
        <div class="clearfix"></div>
    <br><br>
</div>
{{--<script>
    $('.select2').select2();
    $(document).ready(function () {
        $("#password").change(function () {
            passwordcheck($('#password').val(), $('#confirmPassword').val());
        })
        $("#confirmPassword").change(function () {
            passwordcheck($('#password').val(), $('#confirmPassword').val());
        })
    });
    function passwordcheck(password, confirmPassword) {
        if (password != "" && confirmPassword != "") {
            if (password == confirmPassword) {
                $("#passwordNotification").html("Matched");
                $("#btn_register").attr("disabled", false);
            } else {
                $("#passwordNotification").html("Not Matched");
                $("#btn_register").attr("disabled", true);
            }
        } else {
            $("#passwordNotification").html("Cannot be blank");
            $("#btn_register").attr("disabled", true);
        }
    }



</script>--}}


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