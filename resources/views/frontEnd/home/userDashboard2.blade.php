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

{{-- <div class="col-md-6">
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
</div> --}}
<!-- /.info-box -->
<!-- /.content -->
<!-- /.col -->

<div style="margin-top: 5%;" class="col-md-12">
    <!-- USERS LIST -->
    <div class="card">
        <div class="card-header">
            <b class="titleHeader">Order List</b>
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
                        <th>Action</th>
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


                        <td style="width: 12%;">
                            {{-- <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="{{route('order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                            <a href="{{route('pdf-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-print"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> --}}

                            {{-- @if($order->status != "processing")
                            <a href="#" data-order-id={{$order->id}} data-target="#exampleModal" class="btn btn-danger btn-xs" >
                                <i class="fas fa-user"></i>
                            </a>

                            @endif --}}
                            @if($order->status == "pending")
                            <button type="button" class="btn btn-danger modalButton" data-order-id={{$order->id}} data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-times"></i>
                            </button>
                            @endif
                        </td>

                    </tr>@endforeach
                </tbody>
            </table>


            {{-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <form action="{{route('user-cancel-order')}}" method="post">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Are you sure to
                           proceed?</h5>
                           <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       @csrf
                       <input type="hidden" id="orderIdInput" name="id">

                       <input type="text" name="user_remarks" placeholder="Enter reason here">
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                       data-dismiss="modal">Close
                   </button>
                   <button type="submit" class="btn btn-primary">Save changes
                   </button>
               </div>
           </form>
       </div>
   </div>
</div> --}}


<div style="margin:auto; width:50%;  padding: 10px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{route('user-cancel-order')}}" method="post">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are you sure to
              proceed?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="orderIdInput" name="id">

            <input type="text" name="user_remarks" placeholder="Enter reason here">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
</div>
</div>
</div>
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
<script>
    $('.modalButton').click(function () {
        var orderId = $(this).attr('data-order-id');
            //var orderId = 3;
            $("#orderIdInput").val(orderId);
        });

    </script>



</body>
</html>