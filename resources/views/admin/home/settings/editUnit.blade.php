@extends('admin.master')
@section('title')
Admin {{ucfirst($type)}} Edit
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ucfirst($type)}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/unit/view/'.$type)}}">Manage {{ucfirst($type)}}</a></li>
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
                        <div class="card-header py-3">
                            <span class="text">Edit {{ucfirst($type)}}</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'unit/update','class'=>'form-horizontal' ,'method'=>'POST','name'=>'editCategoryForm'])!!}
                                <input type="hidden" id="type" name="type" value="{{$type}}" />
                                <div class="col-xl-3 col-lg-3"></div> 
                                <input type="hidden" value="{{$unitById->id}}" name="id">
                                <div class="form-group row">
                                    <label for="Categoryname" class="col-sm-3 control-label">{{ucfirst($type)}} Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="unitName" value="{{$unitById->unitName}}" name="unitName" placeholder=" Unit name " required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unitDesc" class="col-sm-3 control-label">Description</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="unitDesc" value="{{$unitById->unitDesc}}" name="unitDesc" placeholder=" Unit Description " required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-3 control-label">Status</label>
                                    
                                    <div class="col-sm-9">
                                        <select class="form-control" id="status" name="status"  required>
                                            <option value="">- Select One -</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="updateUnit"><i class="fa fa-save"></i> Update </button>
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
    document.getElementById("status").value = "{{$unitById->status}}";
</script>
@endsection