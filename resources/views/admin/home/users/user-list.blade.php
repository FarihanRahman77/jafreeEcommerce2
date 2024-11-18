@extends('admin.master')
@section('title')
Admin User-List
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> / <a href="{{url('manage/user-list')}}">User List</a></li>
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
                        <div class="card-header">
                            <h3>User List</h3>
                             <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php($i = 1)
                                    @foreach($users as $user)
                                    <tr>

                                        <td>{{$i++}}</td>
                                        <td>
                                            {{$user->name}}</td>
                                         <td>   {{$user->address}}</td>
                                         <td>   {{$user->phone}}
                                        </td>
                                        <td>{{$user->email}}</td>
                                       
                                        <td>{{$user->status}}</td>
                                        
                                        
                                        
                                        <td style="width: 12%;">
                                            {{-- <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('pdf-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="View"><i class="fas fa-print"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a> --}}
                                            {{-- @if($user->status == "active")
                                <a href="{{route('inactivate-user',['id'=>$user->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to deactivate this user?');">
                                    <i class="fas fa-user"></i>
                                </a>
                                @else
                                <a href="{{route('activate-user',['id'=>$user->id])}}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to activate this user?');">
                                    <i class="fas fa-user"></i>
                                </a>
                                @endif
                                <a href="{{route('reset-password-user',['id'=>$user->id])}}" class="btn btn-primary btn-xs" onclick="return confirm('Are you sure you want to reset password of this user?');">
                                    <i class="fas fa-lock"></i>
                                </a> --}}



                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-cog"></i>  <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                                        @if($user->status == "inactive")
                                        <li class="action"><a href="{{url('/activate-user/'.$user->id)}}" class="btn" onclick="return confirm('Are you sure you want to activate this user?');"><i class="fas fa-user" ></i> Activate </a></li>

                                        @else
                                        <li class="action"><a href="{{url('/inactivate-user/'.$user->id)}}" class="btn" onclick="return confirm('Are you sure you want to deactivate this user?');"><i class="fas fa-user"></i> InActivate </a></li>

                                        @endif
                                    <li class="action"><a href="{{url('/reset-password-user/'.$user->id)}}" class="btn" onclick="return confirm('Are you sure you want to reset password of this user?');"><i class="fas fa-lock"></i> Reset Password </a></li>
                      

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