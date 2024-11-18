@extends('admin.master')
@section('title')
Admin Sub-Category-View
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
                        <li class="breadcrumb-item active"><a href="{{url('/category/view')}}">Create Sub-Category</a></li>
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
                            <div class="col-md-6">Sub-Category List</div>
                            <div class="col-md-6 text-right">
                            <a href="{{url('/sub-category/add')}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Sub-Category</span>
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
                                        <th>Category Name</th>
                                        <th>Sub Cat name</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <!--tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot-->
                                <tbody>
									@php
										$i = 0;
									@endphp
                                    @foreach($subCategories as $subCategory)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>{{$subCategory->categoryName}}</td>
                                        <td>{{$subCategory->subCategoryName}}</td>
                                        <td>{{$subCategory->comments}}</td>
                                        <td>{{$subCategory->created_at}}</td>
                                        <td>{{$subCategory->status}}</td>
                                        <td style="width: 12%;">
                                            {{-- <a href="{{url('/sub-category/edit/'.$subCategory->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('/sub-category/delete/'.$subCategory->id)}})}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                <li class="action"><a href="{{url('/sub-category/edit/'.$subCategory->id)}}" class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                                                <!-- <li class="action"><a href="{{url('/sub-category/delete/'.$subCategory->id)}}" class="btn"  ><i class="fas fa-trash"></i> Delete </a></li> -->

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

