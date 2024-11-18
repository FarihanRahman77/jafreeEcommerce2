@extends('frontEnd.userDashboardMaster')
@section('title')

@endsection
@section('userDashboardContent')
<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
<style>
    .titleHeader{font-size: 20px;color: green;}
    .sidebar {
        margin: 0;
        padding: 0;
        background-color: #129B89;
        overflow: auto;
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
    .info-box {
        box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
        border-radius: .25rem;
        background: #fff;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 1rem;
        min-height: 80px;
        padding: .5rem;
        position: relative;
        width: 100%;
    }
    .info-box .info-box-icon {
        border-radius: .25rem;
        -ms-flex-align: center;
        align-items: center;
        display: -ms-flexbox;
        display: flex;
        font-size: 1.875rem;
        -ms-flex-pack: center;
        justify-content: center;
        text-align: center;
        width: 70px;
    }
    .info-box .info-box-number {
        display: block;
        margin-top: .25rem;
        font-weight: 700;
    }
    .info-box .info-box-content {
        line-height: 120%;
        padding: 2%;
        text-align: initial;
        color: #373737;
    }
    .bg-info, .bg-info > a {
        color: #fff !important;
    }
    .bg-info {
        background-color: #17a2b8 !important;
    }
    .bg-danger {
        background-color: #f2dede;
    }
    .bg-success {
        background-color: #dff0d8;
    }
    .bg-warning {
        background-color: #fcf8e3;
    }
    .elevation-1 {
        box-shadow: 0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24) !important;
    }
    .bg-info {
        background-color: #17a2b8 !important;
    }
    .card {
        box-shadow: 0 0 1px rgba(0,0,0,.125),0 1px 3px rgba(0,0,0,.2);
        margin-bottom: 1rem;
    }
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }
    .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(0,0,0,.125);
        padding: .75rem 1.25rem;
        position: relative;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }
    .card-title {
        float: left;
        font-size: 1.1rem;
        font-weight: 400;
        margin: 0;
    }
    .p-0 {
        padding: 0 !important;
    }
    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }
    .users-list {
        padding-left: 0;
        list-style: none;
    }
    .users-list > li {
        float: left;
        padding: 10px;
        text-align: center;
        width: 25%;
    }
    .users-list {
        list-style: none;
    }
    .users-list > li img {
        border-radius: 50%;
        height: auto;
        max-width: 100px;
    }
    .users-list-name {
        color: #495057;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
            <div class="col-md-12  text-center fh5co-heading sdfs" style="margin-bottom: 2%;">
                <div class="col-md-3">
                    @include('frontEnd.home.dashboard.menue')
                </div>
                <div class="col-md-9 text-center fh5co-heading" style="background-color: #eeeee8;">

                    <div style="margin-top: 2%;" >
                        <div class="">
                            <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->name}} Dashboard</h4>
                            <!-- Main content -->
                            <section class="content">

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="info-box">
                                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">CPU Traffic</span>
                                                    <span class="info-box-number">
                                                        10
                                                        <small>%</small>
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Likes</span>
                                                    <span class="info-box-number">41,410</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>


                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Sales</span>
                                                    <span class="info-box-number">760</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 col-sm-6 col-md-3">
                                            <div class="info-box mb-3">
                                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">New Members</span>
                                                    <span class="info-box-number">2,000</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>

                                        <div class="col-md-6">
                                            <div class="info-box mb-3 bg-warning">
                                                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Inventory</span>
                                                    <span class="info-box-number">5,200</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- /.info-box -->
                                            <div class="col-md-6 info-box mb-3 bg-success">
                                                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Mentions</span>
                                                    <span class="info-box-number">92,050</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- /.info-box -->
                                            <div class="col-md-6 info-box mb-3 bg-danger">
                                                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Downloads</span>
                                                    <span class="info-box-number">114,381</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- /.info-box -->
                                            <div class="col-md-6 info-box mb-3 bg-info">
                                                <span class="info-box-icon"><i class="far fa-comment"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Direct Messages</span>
                                                    <span class="info-box-number">163,921</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <!-- /.info-box -->
                                        <!-- /.content -->
                                        <!-- /.col -->

                                        <div class="col-md-12">
                                            <!-- USERS LIST -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <b class="titleHeader">Latest Members</b>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <ul class="users-list clearfix">
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">Alexander Pierce</a>
                                                            <span class="users-list-date">Today</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user8-128x128.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">Norman</a>
                                                            <span class="users-list-date">Yesterday</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user7-128x128.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">Jane</a>
                                                            <span class="users-list-date">12 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user6-128x128.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">John</a>
                                                            <span class="users-list-date">12 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">Alexander</a>
                                                            <span class="users-list-date">13 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user5-128x128.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">Sarah</a>
                                                            <span class="users-list-date">14 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user4-128x128.jpg')}}" alt="User Image">
                                                            <br> <a class="" href="#">Nora</a>
                                                            <span class="users-list-date">15 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src="{{asset('admin/dist/img/user3-128x128.jpg')}}" alt="User Image">
                                                            <br><a class="" href="#">Nadia</a>
                                                            <span class="users-list-date">15 Jan</span>
                                                        </li>
                                                    </ul>
                                                    <!-- /.users-list -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer text-center">
                                                    <a href="javascript::">View All Users</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                            <!--/.card -->
                                        </div>
                                        <!-- /.col -->
                                    </div><!-- /.row -->



                                </div>
                            </section>
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