@extends('admin.master')
@section('title')
Admin {{ucfirst($type)}}-Add
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
                        <li class="breadcrumb-item active"><a href="{{url('view/unit')}}">Create {{ucfirst($type)}}</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <span class="text">Add {{ucfirst($type)}}</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'unit/save','class'=>'form-horizontal' ,'method'=>'POST'])!!}
                                <input type="hidden" id="type" name="type" value="{{$type}}" />
                                <div class="form-group row">
                                    <label for="unitName" class="col-sm-3 col-form-label">{{ucfirst($type)}} Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="unitName" name="unitName" placeholder=" Unit name " required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unitName" class="col-sm-3 col-form-label">Description</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="unitDesc" name="unitDesc" placeholder=" Unit Description ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CategoryStatus" class="col-sm-3 col-form-label">Status</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status"  required>
                                            <option value="" selected>- Select One -</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addUnit"><i class="fa fa-save"></i> Save </button>
                                </div>
                                {!!Form::close()!!}
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div> 
<!--</div>
</section>
</div>-->
@endsection
