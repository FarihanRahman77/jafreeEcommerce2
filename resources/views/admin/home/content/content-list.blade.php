@extends('admin.master')
@section('title')
{{$settings->website_name}}-Content List
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
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> / <a href="{{url('manage/content')}}">Home content</a></li>

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
                            <a href="{{route('create-content')}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Content</span>
                            </a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Content Title</th>
                                        <th>Content Description</th>
                                        <th>Content Image</th>
                                        <th>Status</th>
                                        <!-- <th>Alias</th>
                                        <th>Sequence</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php($i = 1)
                                    @foreach($contents as $content)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$content->content_title}}</td>
                                        <td>{!!$content->content_description!!}</td>
                                        <td>
                                            <img src="{{ asset('website/images/blog/' . $content->content_image) }}" alt="Blog Image" style="max-width: 100%; height: auto;">
                                        </td>
                                        <td>{{$content->status}}</td>
                                        <!-- <td>{{$content->alias}}</td>
                                        <td>{{$content->sequence}}</td> -->


                                        <td style="width: 12%;">
                                            <!-- <a href    ="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                                <a href         ="#" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-print"></i></a> -->
                                            <!-- <a href    ="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> -->


                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fas fa-cog"></i> <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                    <li class="action"><a href="{{route('edit-content',['id'=>$content->id])}}" class="btn"><i class="fas fa-edit"></i> Edit </a></li>
                                                    <li class="action"><a href="" class="btn"><i class="fas fa-eye"></i> View </a></li>
                                                    <li class="action"><a href="{{route('delete-content',['id'=>$content->id])}}" class="btn" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Delete </a></li>

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