@extends('admin.master')
@section('title')
Admin Product-Add
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header"  style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> / <a href="{{url('/home')}}">Edit Carring Cost</a></li>
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
                            <span class="text">Add Carring Cost</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                {!!Form::open(['url'=>'carring-cost/save',  'class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                               
                                <div class="col-md-12 row">
                                    <div class="col-md-12 form-group">
                                        <label for="Productname" class="col-sm-3 col-form-label">Location</label>
                                        <input required="" type="text" class="form-control" id="" name="location" placeholder=" Location">
                                        <span class="text-danger">{{$errors->has('location')?$errors->first('location'):''}}</span>
                                    </div>
                             
                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-6 form-group">
                                        <label for="Productprice" class="col-sm-3 col-form-label">Cost</label>
                                            <input required="" type="number" class="form-control" id="carringCost" name="cost" placeholder=" Carring Cost">
                                            <span class="text-danger">{{$errors->has('cost')?$errors->first('cost'):''}}</span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <select required="" class="form-control" id="status" name="status" >
                                                <option value="" selected>- Select One -</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">In-Active</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('status')?$errors->first('status'):''}}</span>
                                    </div>
                                </div>  
                               

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addCarringCost"><i class="fa fa-save"></i> Save </button>
                                </div>
                                {!!Form::close()!!}
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
