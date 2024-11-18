<!DOCTYPE html>
<html lang="zxx">
    @include('frontEnd.includes.header')
    
<body>
    <!-- navigation -->
    @include('frontEnd.includes.menue')
    <!-- //navigation -->
    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    {{-- <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                        <i>|</i>
                    </li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- //page -->
    <!-- about page -->
    <!-- welcome -->

   

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
                                <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->name}} Dashboard</h4>
                                <!-- Main content -->
                                <section class="content">
    
                                    <div style="margin-top: 5%;" class="container-fluid">
                                        <div class="row">
                                           <div class="col-12 col-sm-6 col-md-3">
                                                <div class="info-box">
                                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
    
                                                    <div class="info-box-content">
                                                        <a href="{{route('user-dashboard')}}">
                                                        <span class="info-box-text">Total Orders: </span>
                                                        <span class="info-box-number">
                                                            {{$totalOrders}}
<!--                                                             <small>%</small>
 -->                                                        </span>
                                                        </a>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-3">
                                                <div class="info-box mb-3">
                                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
    
                                                    <div class="info-box-content">
                                                        <a href="{{route('user-completed-orders')}}">
                                                        <span class="info-box-text">Completed Orders: </span>
                                                        <span class="info-box-number">{{$completedOrders}}</span>
                                                        </a>
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
                                           
    
    
    
                                        
                                            <!-- /.info-box -->
                                            <!-- /.content -->
                                            <!-- /.col -->
    
                                            <div style="margin-top: 5%;" class="col-md-12">
                                                <!-- USERS LIST -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b class="titleHeader">Completed Orders</b>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body p-0">
                                                        


                                                        <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Order Number</th>
                                                                    <th>Delivery Location</th>
                                                                    <th>Grand Total</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody>
                                                                @php($i = 1)
                                                                @foreach($orders as $order)
                                                                <tr>
                            
                                                                    <td>{{$i++}}</td>
                                                                   
                                                                    <td>{{$order->order_number}}</td>
                                                                   
                                                                    <td>{{$order->address}}</td>
                                                                    <td>{{$order->grand_total}}</td>
                                                                    <td>{{$order->status}}</td>
                                                                    
                                                                    
                                                                  
                            
                                                                </tr>@endforeach
                                                            </tbody>
                                                        </table>
                                                        

                                                    


                                                   
                                                        <!-- /.users-list -->
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer text-center">
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
    </div>



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