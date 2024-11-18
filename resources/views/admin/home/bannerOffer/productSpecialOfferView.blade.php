@extends('admin.master')
@section('title')
Admin Product Special Offer -View
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Special Offers</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/products/specialOfferView')}}">Create Special Offer</a></li>
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
                       <h3 class="text-center text-success">{{Session::get('message')}}</h3>

                       <div class="card-header d-flex justify-content-end">
                        <a href="{{url('/products/specialOfferAdd')}}" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Add Special Products Offer</span>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl_category" class="table table-bordered table-striped dt_view">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Offer Date</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($productSpecialOfffer as $productSpecialOfffer)
                                <tr>

                                    <td>{{$productSpecialOfffer->id}}</td>
                                    <td>{{$productSpecialOfffer->productName}}<br>{{$productSpecialOfffer->master_offerName}}</td>
                                    <td><img src = "{{ asset('/productImage/'.$productSpecialOfffer->productImage) }}" width="110" height="90" /></td>
                                    <td>{{$productSpecialOfffer->offerPrice}}</td>
                                    <td>{{$productSpecialOfffer->startDate}}<br>{{$productSpecialOfffer->endDate}}</td>
                                    <td>{{$productSpecialOfffer->created_at}}</td>
                                    <td>{{$productSpecialOfffer->status}}</td>
                                    <td style="width: 12%;">
                                        <a href="{{url('/productsSpecialOffer/delete/'.$productSpecialOfffer->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"> Delete</i></a>
                                    </td>

                                </tr>@endforeach
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

