@extends('admin.master')
@section('title')
Admin Sub-category-Add
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
                        <li class="breadcrumb-item active"><a href="{{url('/sub-category/view')}}">Create Sub-category</a></li>
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
                            <span class="text">Add Sub-category</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'sub-category/save','class'=>'form-horizontal' ,'method'=>'POST'])!!}
                                <div class="form-group row">
                                    <label for="CategoryName" class="col-sm-3 col-form-label">Category Name</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="CategoryName" name="CategoryName" >
                                            <option value="" selected>~~ Select Category ~~</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('CategoryName')?$errors->first('CategoryName'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Categoryname" class="col-sm-3 col-form-label">Sub-category Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="subCategoryname" name="subCategoryname" placeholder="Sub Category name">
                                        <span class="text-danger">{{$errors->has('subCategoryname')?$errors->first('subCategoryname'):''}}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="comments" class="col-sm-3 col-form-label">Comments</label>

                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" id="comments" name="comments" placeholder=" Write about category " ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CategoryStatus" class="col-sm-3 col-form-label">Status</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="subCategoryStatus" name="subCategoryStatus" >
                                            <option value="" selected>~~ Select Status ~~</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">In-Active</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('subCategoryStatus')?$errors->first('subCategoryStatus'):''}}</span>
                                    </div>
                                </div>

                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addSubCategory"><i class="fa fa-save"></i> Save </button>
                                </div>
                                {!!Form::close()!!}
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection