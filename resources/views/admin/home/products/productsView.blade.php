@extends('admin.master')
@section('title')
Admin Products-View
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
                        <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Create Products</a></li>
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
                            <div class="col-md-3 text-right">
                                <a href="{{url('/products/add')}}" class="btn btn-success">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Products</span>
                                </a>
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category Name</th>
                                        <th>Company Name</th>
                                        <th>Status</th>
                                        <th>Availability</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @php
									$i = 1;
								@endphp
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>{{$product->productName}}</td>
                                        <td><img src = "{{ asset('/product-thumbnail-image/'.$product->productImage) }}" width="55" height="55" /></td>
                                        <td>{{$product->categoryName}}</td>
                                        <td></td>
                                        <td>{{$product->status}}</td>
                                        <td>
                                            {{$product->status}}
                                        </td>
                                        <td>{{$product->created_at}}</td>
                                        <td style="width: 12%;">
                                            {{-- <a href="{{url('/products/edit/'.$product->id)}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('/products/viewProfile/'.$product->id)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="{{url('/products/delete/'.$product->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> --}}
                                        
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                <li class="action"><a href="{{url('/products/edit/'.$product->id)}}" class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                                                <li class="action" style="display:none;"><a href="{{url('/products/viewProfile/'.$product->id)}}" class="btn" ><i class="fas fa-eye"></i> View </a></li>
                                                <li class="action"><a href="{{url('/products/delete/'.$product->id)}}" class="btn"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Delete </a></li>

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

