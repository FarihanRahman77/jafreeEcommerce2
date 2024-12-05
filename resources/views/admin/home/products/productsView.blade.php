@extends('admin.master')
@section('title')
{{$settings->website_name}}-Product view
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')

<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Product List</a></li>
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
                            <div class="col-md-3"> <h3>Product List</h3></div>
                            <div class="col-md-6"> <h3 class="text-center text-success">{{Session::get('message')}}</h3></div>
                            <!-- <div class="col-md-3 text-right">
                                <a href="{{url('/products/add')}}" class="btn btn-success">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Products</span>
                                </a>
                            </div> -->
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        
                                        <th>Model</th>
                                        <th>Website Info</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
									$i = 1;
								@endphp
                                <tbody>
                                    @foreach($admin_products as $product)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><img src = "{{ $settings->erp_baseurl.'/images/products/thumb/'.$product->productImage }}" width="55" height="55" /></td>
                                        <td><b>Name: </b>{{$product->productName}} <br> <b>Category: </b> {{@$product->categoryName}} <br> <b>Brand: </b> {{@$product->brandName}}</td>
                                        
                                        <td>{{@$product->modelNo}}</td>
                                        <td>
                                            <b>Featured: </b>{{@$product->website_featured}} <br>
                                            <b>Best Selling: </b>{{@$product->website_best_selling}} <br>
                                            <b>New Arrival: </b>{{@$product->website_new_arrival}} <br>
                                            <b>Top Rated: </b>{{@$product->website_toprated}} <br>
                                            <b>Special Offer: </b>{{@$product->website_special_offer}} <br>
                                        </td>
                                        <td>{{$product->status}}</td>
                                        <td>{{$product->created_at}}</td>

                                        
                                        <td style="width: 12%;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                <li class="action"><a href="{{url('/products/edit/'.$product->id)}}" class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                                            </ul>
                                                </div>
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

