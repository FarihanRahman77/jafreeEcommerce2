@extends('admin.master')
@section('title')
{{$settings->website_name}} - Category Add
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
                        <li class="breadcrumb-item active"><a href="{{url('/category/view')}}">Create Category</a></li>
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
                            <span class="text">Add Category</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'category/save','class'=>'form-horizontal' ,'method'=>'POST'])!!}

                                <div class="form-group row">
                                    <label for="Categoryname" class="col-sm-3 col-form-label">Category Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Categoryname" name="Categoryname" placeholder=" Category name">
                                        <span class="text-danger">{{$errors->has('Categoryname')?$errors->first('Categoryname'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CategoryStatus" class="col-sm-3 col-form-label">Status</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="CategoryStatus" name="CategoryStatus" >
                                            <option value="" selected>- Select One -</option>
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('CategoryStatus')?$errors->first('CategoryStatus'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comments" class="col-sm-3 col-form-label">Comments</label>

                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="comments" name="comments" placeholder=" Write about category " ></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addCategory"><i class="fa fa-save"></i> Save </button>
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
</div>
</section>
</div>
@endsection