@extends('admin.master')
@section('title')
Admin Products-View
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Location Carring Cost</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
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
                            <div class="col-md-6">Carring Cost List</div>
                            <div class="col-md-6 text-right">
                            <a href="{{route('add-carring-cost')}}" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Carring Cost</span>
                            </a>
                            </div>
                            
                           
                             
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Location</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php($i = 1)
                                    @foreach($carringCostList as $list)
                                    
                                    
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>{{$list->location}}</td>
                                        <td>{{$list->cost}}</td>
                                        <td>{{$list->status}}</td>
                                        
                                        <td style="width: 12%;">
                                            {{-- <a href="{{route('carring-cost-edit',['id'=>$list->id])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('carring-cost-delete',['id'=>$list->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> --}}

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                                <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                                <li class="action"><a href="{{url('/carring-cost/edit/'.$list->id)}}" class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                                                <li class="action"><a href="{{url('/carring-cost/delete/'.$list->id)}}" class="btn"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i> Delete </a></li>

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