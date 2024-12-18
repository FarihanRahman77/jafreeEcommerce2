@extends('admin.master')
@section('title')
{{$settings->website_name}}-Content Add
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
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> / <a href="{{url('/manage/content')}}">Create Content</a></li>
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
                            <span class="text">Add Content</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                {!!Form::open(['url'=>'content/save', 'class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                <div class="col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-form-label">Content Title</label>

                                        <div class="col-sm-12">
                                            <input required="" type="text" name="content_title" class="form-control">
                                            <span class="text-danger">{{$errors->has('content_title')?$errors->first('content_title'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Content Description</label>

                                        <div class="col-sm-12">
                                            <textarea required="" class="form-control" id="contentDescriptionCkeditor" name="content_description"></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Status</label>

                                        <div class="col-sm-12">
                                            <select required="" class="form-control dynamic category" data-dependent="" name="status">
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
                                            <input required="" type="text" name="alias" class="form-control">
                                            <span class="text-danger">{{$errors->has('alias')?$errors->first('alias'):''}}</span>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-12 d-md-flex">

                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Sequence</label>

                                        <div class="col-sm-12">
                                            <input required="" type="number" class="form-control" name="sequence" placeholder=" Sequence">
                                            <span class="text-danger">{{$errors->has('sequence')?$errors->first('sequence'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Content Image</label>

                                        <div class="col-sm-12">
                                            <input type="file" name="content_image" id="content_image"
                                                class="form-control form-group-sm"/>
                                            <img id="showcontent_image" src="{{ asset('website/images/blog/no_image.png') }}"
                                                style="width: 100px;height: 110px; border:1px solid #000000;margin-top: 1%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addProduct"><i class="fa fa-save"></i> Save </button>
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


@section('contentJavaScripts')
<script>
        $(document).ready(function(){
        $('#content_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showcontent_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection