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
    h5 a{
        font-size: 30px;
        margin-bottom: 40px;
        line-height: 1.5;
        color: #000;
        text-transform: uppercase;
        position: relative;
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

                    <div style="margin-top: 2%;" >
                        <div class="">
                            <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->name}} Profile</h4>
                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Profile Image -->
                                            <div class="card card-primary card-outline">
                                                <span style="text-align: left;padding: 1%;font-size: 20px;">About Me <br><b style="font-size: 15px;">Type: <font color="green">{{ucfirst($profile->type)}}</font> Status:  <font color="green">{{$profile->status}}</font></b></span>
                                                <table style="width:100%">

                                                    <tr>
                                                        <td>{{$profile->full_name}}</td>
                                                        <td><b>Available:</b> {{$profile->preferable_time}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Phone:</b> {{$profile->phone}} / Alt : {{$profile->alt_phone}} </td>
                                                        <td><b>Gender</b> <a class="float-right">{{$profile->gender}}</a></td>


                                                    </tr>
                                                    <tr>
                                                        <td><strong> Education :</strong>  {{$profile->education_information}}</td>
                                                        <td><strong> Medium :</strong>@foreach($mediums as $medium){{$medium->name.', '}}@endforeach</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong> Levels :</strong> {{$profile->prefered_classes}}</td>
                                                        <td><strong> Courses :</strong>{{$profile->prefered_subjects}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong> Location :</strong>{{$profile->location_area.' ,'.$profile->name}}</td>
                                                        <td><b>Monthly</b> <a class="float-right">{{$profile->preferable_amount}}Tk</td>
                                                    </tr>

                                                </table>
                                                <table style="width:100%">

                                                    <tr>
                                                        <td><b>Remarks :</b> {{$profile->remarks}}</td>
                                                    </tr>
                                                </table>
                                                <span style="font-size: 20px;padding: 2%;"><i class="fa fa-download" aria-hidden="true"></i>  <a href='{{asset('profile_cv/'.$profile->cv_file)}}' target="_blank">Download Your CV</a></span>
                                            </div>
                                            <!-- /.card -->

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

@endsection