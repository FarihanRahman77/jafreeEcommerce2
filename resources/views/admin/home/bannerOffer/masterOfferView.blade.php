@extends('admin.master')
@section('title')
Admin Master Offer -View
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/products/specialOfferView')}}">Create Master Offer</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <div class="col-md-6"><h3>Master Offer List</h3></div>
                                <div class="col-md-6 text-right">
                                <a href="{{url('/master/masterOfferAdd')}}" class="btn btn-success btn-icon-split">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Master Offer</span>
                                </a>
                                </div>
                                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <!--<th>Start Date</th>
                                        <th>End Date</th>-->
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($masterOffer as $masterOffers)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>{{$masterOffers->master_offerName}}</td>
                                        <td>{{$masterOffers->master_offerCode}}</td>
                                        <!--<td>{{$masterOffers->startDate}}</td>
                                        <td>{{$masterOffers->endDate}}</td>-->
                                        <td>{{$masterOffers->created_at}}</td>
                                        <td>{{$masterOffers->status}}</td>
                                        <td style="width: 12%;">
                                            <!--href="{{url('/master/masterOfferDelete/'.$masterOffers->id)}}"-->
                                            <a  class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="deleteOffer({{$masterOffers->id}})"><i class="fas fa-trash"> Delete</i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('contentJavaScripts')
<script>
    function deleteOffer(id){
        var result = confirm("Sure to delete?");
        if (result) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('deleteOffer')}}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(result){
                    window.location.href = window.location.href;
                }
            });
        }
    }
</script>  	
@endsection
