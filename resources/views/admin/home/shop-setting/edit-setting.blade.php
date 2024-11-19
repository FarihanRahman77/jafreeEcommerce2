@extends('admin.master')
@section('title')
{{$settings->website_name}}-Product Edit
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Edit Setting</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
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
                            <span class="text">Edit Setting</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                {!!Form::open(['url'=>'setting/update', 'class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-6 form-group row">
                                        <label class="col-sm-3 col-form-label">Owners Name</label>

                                        <!-- <input type="hidden" name="id" value="{{$setting->id}}"> -->
                                        <div class="col-sm-9">
                                            <input type="text" name="owners_name" value="{{$setting->owners_name}}">
                                            <span class="text-danger">{{$errors->has('owners_name')?$errors->first('owners_name'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 d-md-flex">
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Website Name</label>

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name" value="{{$setting->website_name}}" placeholder="Website Name">
                                            <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label class="col-form-label">Currency</label>

                                    <div class="col-sm-12">
                                        <input required="" class="form-control" type="text" name="currency" value="{{$setting->currency}}" placeholder="Currency">
                                        <span class="text-danger">{{$errors->has('currency')?$errors->first('currency'):''}}</span>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12 d-md-flex">
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Instagram</label>

                                    <div class="col-sm-12">
                                        <input required="" class="form-control" type="text" name="instagram" value="{{$setting->instagram}}" placeholder="Instagram">
                                        <span class="text-danger">{{$errors->has('instagram')?$errors->first('instagram'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Youtube</label>

                                    <div class="col-sm-12">
                                        <input required="" class="form-control" type="text" name="youtube" value="{{$setting->youtube}}" placeholder="youtube">
                                        <span class="text-danger">{{$errors->has('youtube')?$errors->first('youtube'):''}}</span>
                                    </div>
                                </div>
                                </div>
                               
                                <div class="col-md-12 d-md-flex">
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Facebook</label>

                                        <div class="col-sm-12">
                                            <input class="form-control" type="text" name="facebook" value="{{$setting->facebook}}" placeholder="Facebook Url">
                                            <span class="text-danger">{{$errors->has('facebook')?$errors->first('facebook'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Linkedin</label>

                                        <div class="col-sm-12">
                                            <input class="form-control" type="text" name="linkedin" value="{{$setting->linkedin}}" placeholder="Linkedin">
                                            <span class="text-danger">{{$errors->has('linkedin')?$errors->first('linkedin'):''}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 form-group">
                                        <label class="col-form-label">Base Url</label>

                                        <div class="col-sm-12">
                                            <input class="form-control" type="text" name="erp_baseurl" value="{{$setting->erp_baseurl}}" placeholder="ERP Url">
                                            <span class="text-danger">{{$errors->has('erp_baseurl')?$errors->first('erp_baseurl'):''}}</span>
                                        </div>
                                    </div>











                                <div class="form-group">
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
    document.getElementById("settingStatus").value = "{{$setting->status}}";
</script>
@endsection