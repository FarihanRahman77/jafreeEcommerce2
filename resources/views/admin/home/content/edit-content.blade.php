@extends('admin.master')
@section('title')
Admin Product-Add
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
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> / <a href="{{url('manage/content')}}">Home Content</a></li>
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
                            <span class="text">Edit Content</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                {!!Form::open(['url'=>'content/update', 'class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                <div class="col-md-12 row">    
                                    <div class="col-md-12 form-group">
                                        <label class="col-form-label">Content Title</label>

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="content_title" value="{{$content->content_title}}">
                                            <span class="text-danger">{{$errors->has('content_title')?$errors->first('content_title'):''}}</span>
                                        </div>

                                        <input type="hidden" name="id" value="{{$content->id}}">
                                    </div>

                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-12 form-group">
                                        <label class="col-form-label">Content Description</label>

                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="contentDescriptionCkeditor" name="content_description" placeholder=" Write about product Sort Description " >{{$content->content_description}}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Status</label>

                                        <div class="col-sm-12">
                                            <select id="contentStatus" class="form-control dynamic" data-dependent="" name="status" >
                                                <option value="" selected>~~ Select Status ~~</option>
                                                
                                                <option value="On">On</option>
                                                <option value="Off">Off</option>
                                                
                                            </select>

                                            <span class="text-danger">{{$errors->has('status')?$errors->first('status'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Alias</label>

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alias" value="{{$content->alias}}">
                                            <span class="text-danger">{{$errors->has('alias')?$errors->first('alias'):''}}</span>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Sequence</label>

                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"  name="sequence" placeholder=" Sequence" value="{{$content->sequence}}">
                                            <span class="text-danger">{{$errors->has('sequence')?$errors->first('sequence'):''}}</span>
                                        </div>
                                    </div>
                                </div>


                                
                                

                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addProduct"><i class="fa fa-save"></i> Update </button>
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
<script>

    document.getElementById("contentStatus").value = "{{$content->status}}";

</script>
@endsection


