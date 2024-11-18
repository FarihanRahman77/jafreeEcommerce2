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
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> {{Auth::user()->name}} Orders</h4>
                    <section class="content">
                         <div class="container-fluid">
                            <div class="row">
                                    <!-- <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                                    
                                            <div class="info-box-content">
                                                <a href="{{route('user-completed-orders')}}">
                                                    <span class="info-box-text">Completed Orders: </span>
                                                    <span class="info-box-number">{{$completedOrders}}</span>
                                                </a>
                                            </div>
                                    
                                        </div>
                                    </div>  -->
                                <div class="col-md-2" style="padding-top: 1%;text-align: center;">
                                    <a href="{{route('user-order-list',['id'=>'all'])}}" class="btn btn-warning">All : ({{$totalOrders}})</a>
                                    <!-- /.info-box -->
                                </div>
                                <div class="col-md-2" style="padding-top: 1%;text-align: center;">
                                    <a href="{{route('user-order-list',['id'=>'pending'])}}" class="btn btn-warning">Pending : ({{$pendingOrders}})</a>
                                    <!-- /.info-box -->
                                </div>
                        
                                <div class="col-md-2" style="padding-top: 1%;text-align: center;">
                                    <a href="{{route('user-order-list',['id'=>'processing'])}}" class="btn btn-primary">Processing : ({{$processingOrders}})</a>
                                    <!-- /.info-box -->
                                </div>
                        
                                <div class="col-md-2" style="padding-top: 1%;text-align: center;">
                                    <a href="{{route('user-order-list',['id'=>'completed'])}}" class="btn btn-success">Completed : ({{$completedOrders}})</a>
                                    <!-- /.info-box -->
                                </div>
                        
                                <div class="col-md-2" style="padding-top: 1%;text-align: center;">
                                    <a href="{{route('user-order-list',['id'=>'decline'])}}" class="btn btn-danger">Cancelled : ({{$declineOrders}})</a>
                                    <!-- /.info-box -->
                                </div>
                        
                        
                        
                        <!-- /.info-box -->
                        <!-- /.content -->
                        <!-- /.col -->
                        
                        <div style="margin-top: 2%;" class="col-md-12">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <b class="titleHeader">Order List</b>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="background: white;overflow: auto;">
                        
                        
                        
                                        <table id="tbl_category" class="table table-bordered table-striped dt_view" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Order Number</th>
                                                    <th>Delivery Address</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                        
                                            <tbody>
                                            @php($i = 1)
                                            @foreach($orders as $order)
                                            <tr>
                        
                                                <td>{{$i++}}</td>
                                                <td>Order# <a href="{{route('user-order-invoice',['id'=>$order->id])}}">{{$order->order_number}}</a><br>{!!Session::get('currency')!!}{{$order->grand_total}}</td>
                                                <td>Date {{$order->created_at}}<br>{{$order->address}}</td>
                                                <td style="width: 10%;">
                                                    
                                                    @if($order->status=='pending' && $order->user_status=='decline')
                                                        Decline Request Processing
                                                        @else
                                                        {{$order->status}}
                                                    @endif
                                                </td>
                                                <td style="width: 10%;">
                                                    {{-- <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                                    <a href="{{route('pdf-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-print"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> --}}
                        
                        
                                                    <!-- @if($order->status == "pending")
                                                    <button type="button" class="btn btn-danger modalButton" data-order-id={{$order->id}} data-toggle="modal" data-target="#exampleModal">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                        
                                                    @endif
                        
                                                    <button type="button" class="btn btn-success" >
                                                        <i class="fab fa-first-order"></i>
                                                    </button>
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a> -->
                                                    <div class="btn-group">
                                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                            <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                                <li class="action"><a href="{{route('user-order-invoice',['id'=>$order->id])}}" class="btn" ><i class="fas fa-view"></i> Invoice </a></li>
                                                                <li class="action"><a href="{{route('user-re-order',['id'=>$order->id])}}" class="btn" ><i class="fas fa-view"></i> Re-Order </a></li>
                                                                @if($order->status == "pending")
                                                                <li class="action"><a href="#/" onclick='cencelOrder({{$order->id}})'><i class="fas fa-times"></i> Cancel Order </a></li>
                                                                @endif
                        
                                                                <!-- <li class="action"><a href="{{url('/category/')}}" class="btn"  ><i class="fas fa-trash"></i> Delete </a></li> -->
                        
                                                            </ul>
                                                        </div>
                                                    </td>
                        
                                                </tr>@endforeach
                                            </tbody>
                                        </table>
                        
                        
                                        
                        
                        
                                        <div style="margin:auto; width:50%;  padding: 10px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document" style="margin: 8%;">
                                                <div class="modal-content">
                                                <form action="{{route('user-cancel-order')}}" method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to Cancell This Order ?</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" id="orderIdInput" name="id">
                                            
                                                        <input type="text" class="form-control" name="user_remarks" placeholder="Enter reason here">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Cancell Order</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                            <!-- /.users-list -->
                        </div>
                        
                        </div>
                        <!--/.card -->
                        </div>
                        <!-- /.col -->
                        </div><!-- /.row -->
                        </div>
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



<!-- //welcome -->

<!-- newsletter -->
@include('frontEnd.home.newsLetter')
<!-- newsletter -->

<!-- footer section -->
@include('frontEnd.includes.footer')
<!-- footer section -->
@include('frontEnd.includes.scripts')

<script>
function cencelOrder(id){
    $('#exampleModal').modal('show');
    $('#orderIdInput').val(id);
}
</script>


</body>
</html>