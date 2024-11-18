@extends('admin.master')
@section('title')
Admin {{ucfirst($type)}}-View
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
                        <li class="breadcrumb-item active"><a href="{{url($type.'/view/')}}">Manage {{ucfirst($type)}}</a></li>
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
                            <div class="col-md-6"><h3>{{ucfirst($type)}} List</h3></div>
                            <div class="col-md-6 text-right">
                            <a href="{{url('/unit/add/'.$type)}}" class="btn btn-success">
                                <span class="icon"><i class="fas fa-plus"></i></span>
                                <span class="text">Add {{ucfirst($type)}}</span>
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($units as $unit)
                                    <tr>
                                        <td>{{$unit->id}}</td>
                                        <td>{{$unit->unitName}}</td>
                                        <td>{{$unit->unitDesc}}</td>
                                        <td>{{$unit->status}}</td>
                                        <td>{{$unit->created_at}}</td>
                                        <td style="width: 12%;">
                                            {{-- <a href="{{url('/unit/edit/'.$type.'/'.$unit->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('/unit/delete/'.$type.'/'.$unit->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                <li class="action"><a href="{{url('/unit/edit/'.$type.'/'.$unit->id)}}" class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                                                <!-- <li class="action"><a href="{{url('/unit/delete/'.$type.'/'.$unit->id)}}" class="btn"  ><i class="fas fa-trash"></i> Delete </a></li> -->

                                            </ul>
                                                </div>
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