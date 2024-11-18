@extends('admin.master')
@section('title')
Admin Category-View
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/order-list')}}">Order List</a></li>
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
                            <div class="col-md-6"> <h3>Category List</h3></div>
                            <!-- <div class="col-md-6 text-right">
                                <a href="{{url('/category/add')}}" class="btn btn-success">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Category</span>
                                </a>
                            </div> -->
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Logo</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
									@php
										$i = 1;
									@endphp
                                    @foreach($categories as $category)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td><img src="{{asset('website/images/categories/'.$category->logo)}}" alt="" style="height:50px;"></td>
                                        <td><img src="{{asset('website/images/categories/'.$category->image)}}" alt='' style="height:50px;"></td>
                                        <td>{{$category->categoryName}}</td>
                                        <td>{{$category->status}}</td>
                                        <td>{{$category->createdDate}}</td>
                                        <td style="width: 12%;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                    <li class="action"><a href="{{url('/category/edit/'.$category->id)}}" class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
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

