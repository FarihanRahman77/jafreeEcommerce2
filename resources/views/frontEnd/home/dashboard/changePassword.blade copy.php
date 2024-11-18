@extends('frontEnd.userDashboardMaster')
@section('title')
TutorBD.NET | Home :: Home Tutor Solution
@endsection
@section('userDashboardContent')
<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
<style>
    .sidebar {
        margin: 0;
        padding: 0;
        background-color: #129B89;
        overflow: auto;
    }
    p{text-align: left;font-size: 12px;}

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    h3{color: white;
       padding-top: 3%;
       font-size: 15px;}
    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
        text-align: left;
    }

    .sidebar a.active {
        background-color: #4CAF50;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>
<div id="fh5co-trainer">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-12  text-center fh5co-heading">
                <div class="col-md-3">
                    @include('frontEnd.home.dashboard.menue')
                </div>
                <div class="col-md-9 text-center fh5co-heading" style="background-color: #eeeee8;">
                    <?php $type = '{{$profile->type}}' ?>
                    <div style="margin-top: 2%;" >
                        <div class="">
                            <h4 class="text-center">Change {{Auth::user()->name}} Password</h4>
                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-primary">
                                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        {!!Form::open(['url'=>'profile/save/'.$type,'class'=>'form-horizontal', 'id'=>'profile_form', 'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                                        <!-- One "tab" for each step in the form: -->
                                                        <input type='hidden' id='sendFrom' name='sendFrom' value='frontEnd'/>
                                                        <input type='hidden' id='type' name='type' value='{{$type}}'/>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-sm-3 col-form-label">New Password <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input type="password" placeholder="Type Password...." class="form-control" id="password" name="password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="confirmPassword" class="col-sm-3 col-form-label">New Confirm Password <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input type="password" placeholder="Re-Type Password...." class="form-control" id="confirmPassword" name="confirmPassword">
                                                                <span id="passwordNotification"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-sm-3 col-form-label">Old Password <font color="red">*</font></label>

                                                            <div class="col-sm-9">
                                                                <input type="password" placeholder="Type Password...." class="form-control" id="password" name="password">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12" style="margin-bottom: 1%;">
                                                            <button type="submit" class="btn btn-primary  pull-right" name="btn_register"> Change Password</button>
                                                        </div>

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
                            <!-- /.content -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">

        </div>
    </div>
</div>

@endsection
@section('contentJavaScript')
<script>
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



</script>
@endsection