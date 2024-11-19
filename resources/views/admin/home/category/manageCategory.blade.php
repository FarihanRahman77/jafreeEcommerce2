@extends('admin.master')
@section('title')
{{$settings->website_name}}-category edit
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
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
                        <div class="card-header py-3">
                            <span class="text">Update Category</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'category/update','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data','name'=>'editCategoryForm'])!!}
                                <div class="col-xl-3 col-lg-3"></div>
                                <input type="hidden" value="{{$categoryById->id}}" name="id">
                                <!-- <div class="form-group row">
                                    <label for="Categoryname" class="col-sm-3 control-label">Category Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Categoryname" value="{{$categoryById->categoryName}}" name="Categoryname" placeholder=" Category name " required>
                                        <span class="text-danger">{{$errors->has('Categoryname')?$errors->first('Categoryname'):''}}</span>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label for="CategoryStatus" class="col-sm-3 control-label">Status</label>
                                    
                                    <div class="col-sm-9">
                                        <select class="form-control" id="CategoryStatus" name="CategoryStatus"  required>
                                            <option value="">- Select One -</option>
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('CategoryStatus')?$errors->first('CategoryStatus'):''}}</span>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label for="comments" class="col-sm-3 control-label">Comments</label>

                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="comments" name="comments" placeholder=" Write about category " >{{$categoryById->comments}}</textarea>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="">Edit Image</label>
                                        <input type="file" name="image" id="editImage" class="form-control form-control-sm">
                                        <span class="text-danger" id="editImageError"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <img id="editShowImage"
                                            src="{{ !empty($categoryById->image) ? url('website/images/categories/' . $categoryById->image) : url('website/images/categories/no_image.png') }}"
                                            style="width: 100px;height: 80px; border:1px solid #000000">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="">Edit Logo</label>
                                        <input type="file" name="logo" id="editlogo" class="form-control form-control-sm">
                                        <span class="text-danger" id="editlogoError"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <img id="editShowlogo"
                                            src="{{ !empty($categoryById->logo) ? url('website/images/categories/' . $categoryById->logo) : url('website/images/categories/no_image.png') }}"
                                            style="width: 100px;height: 80px; border:1px solid #000000">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addCategory"><i class="fa fa-save"></i> Update </button>
                                </div>
                                {!!Form::close()!!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection
@section('contentJavaScripts')
<script>
    $(document).ready(function() {

        // For editImage preview
        $('#editImage').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#editShowImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        // For editlogo preview
        $('#editlogo').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#editShowlogo').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })

    });



    //document.form['editCategoryForm'].elements['CategoryStatus'].value="{{$categoryById->status}}";
    //alert("{{$categoryById->status}}");
    document.getElementById("status").value = "{{$categoryById->status}}";
</script>
@endsection