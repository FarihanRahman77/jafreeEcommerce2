@extends('admin.master')
@section('title')
Jafree Ecommerce - Admin Category Edit
@endsection
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
                                {!!Form::open(['url'=>'category/update','class'=>'form-horizontal' ,'method'=>'POST','name'=>'editCategoryForm'])!!}
                                <div class="col-xl-3 col-lg-3"></div> 

                                <input type="hidden" value="{{$categoryById->id}}" name="id">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="Categoryname" value="{{$categoryById->categoryName}}" name="Categoryname" placeholder=" Category name " required>
                                            <span class="text-danger">{{$errors->has('Categoryname')?$errors->first('Categoryname'):''}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label>Logo</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" id="logo" name="logo">
                                            <span class="text-danger">{{$errors->has('logo')?$errors->first('logo'):''}}</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label>Image</label><br>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" id="image" name="image">
                                        <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="" alt="">
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

<script>
    //document.form['editCategoryForm'].elements['CategoryStatus'].value="{{$categoryById->categoryStatus}}";
    //alert("{{$categoryById->categoryStatus}}");
    document.getElementById("CategoryStatus").value = "{{$categoryById->categoryStatus}}";
</script>
@endsection