@extends('admin.master')
@section('title')
Admin Manufacturer-View
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
                        <li class="breadcrumb-item active"><a href="{{url('/manufacturer/view')}}">Create Manufacturer</a></li>
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
                            <span class="text">Update Manufacturer</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'manufacturer/update','class'=>'form-horizontal' ,'method'=>'POST','name'=>'editManufacturerForm','enctype'=>'multipart/form-data'])!!}
                                <div class="col-xl-3 col-lg-3"></div> 
                                <input type="hidden" value="{{$manufacturerById->id}}" name="id">
                                <div class="form-group row">
                                    <label for="Manufacturername" class="col-sm-3 control-label">Manufacturer Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Manufacturername" value="{{$manufacturerById->manufacturerName}}" name="Manufacturername" placeholder=" Manufacturer name " required>
                                        <span class="text-danger">{{$errors->has('Manufacturername')?$errors->first('Manufacturername'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ManufacturerStatus" class="col-sm-3 control-label">Status</label>
                                    
                                    <div class="col-sm-9">
                                        <select class="form-control" id="ManufacturerStatus" name="ManufacturerStatus"  required>
                                            <option value="">- Select One -</option>
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('ManufacturerStatus')?$errors->first('ManufacturerStatus'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ManufacturerStatus" class="col-sm-3 control-label">Image</label>
                                    
                                    <div class="col-sm-9">
                                        <img src="{{asset($manufacturerById->image)}}" width="100" height="100"><br><br>
                                        <input type="file" name="image">
                                        <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comments" class="col-sm-3 control-label">Comments</label>

                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="comments" name="comments" placeholder=" Write about category " >{{$manufacturerById->comments}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="editManufacturer"><i class="fa fa-save"></i> Update </button>
                                </div>
                                {!!Form::close()!!}

                            </div>
                        </div>
                    </div>
                </div> 
            </div>
    </section>
</div>

<script>
    //document.form['editCategoryForm'].elements['CategoryStatus'].value="{{$manufacturerById->categoryStatus}}";
    //alert("{{$manufacturerById->categoryStatus}}");
    document.getElementById("ManufacturerStatus").value = "{{$manufacturerById->manufacturerStatus}}";
</script>
@endsection