@extends('admin.master')
@section('title')
{{$settings->website_name}}-FrontEnd Banner View
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
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
                        <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Create Front End Banner</a></li>
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
                            <div class="col-md-6"><h3>Create Front End Banner</h3></div>
                            <div class="col-md-6 text-right">
                                <a href="{{url('/banner/frontEndAdd')}}" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Front End Banner</span>
                                </a>
                            </div>
                            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Priority</th>
                                        <th>Details Info</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($banners as $banner)
                                    
                                    
                                    <tr>

                                        <td>{{$banner->id}}</td>
                                        <td><img src = "{{ asset('website/images/banners/'.$banner->bannerImage) }}" width="350" height="150" /></td>
                                        <td>{{$banner->sorting}}</td>
                                        <td>{{$banner->created_at}}<br>{{$banner->carousal_caption_offer}}<br>{{$banner->carousal_caption_description}}</td>
                                        <td>{{$banner->status}}</td>
                                        <td style="width: 12%;">
                                            <!-- <a href="{{url('/banner/frontEndDelete/'.$banner->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"> Delete</i></a> -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                    <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                        <li class="action"><a href="{{url('/banner/change-status/'.$banner->id)}}" class="btn" onclick="return confirm('Are you sure you want to change status of this banner?');"><i class="fas fa-edit"></i> Change Status </a></li>
                                                        </li>
                                                        <li class="d-none action"><a href="{{url('/banner/frontEndDelete/'.$banner->id)}}" class="btn"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Delete </a></li>

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

