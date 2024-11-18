@extends('admin.master')
@section('title')
Admin Product-Add
@endsection
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

                                        <input type="hidden" name="id" value="{{$setting->id}}">
                                        <div class="col-sm-9">
                                            <input type="text" name="owners_name" value="{{$setting->owners_name}}">
                                            <span class="text-danger">{{$errors->has('owners_name')?$errors->first('owners_name'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label class="col-sm-4 col-form-label">Shop Name</label>

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="name" value="{{$setting->name}}">
                                            <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Currency</label>

                                        <div class="col-sm-12">
                                            <input required="" class="form-control" type="text" name="currency" value="{{$setting->currency}}">
                                            <span class="text-danger">{{$errors->has('currency')?$errors->first('currency'):''}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Shop Logo</label>
                                        <img src="{{asset($setting->shop_logo)}}" width="150" height="150">

                                        <div class="col-sm-12">
                                            <input type="file" name="shop_logo">
                                            <span class="text-danger">{{$errors->has('shop_logo')?$errors->first('shop_logo'):''}}</span>
                                        </div>
                                    </div>

                                </div>


                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Motto</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="motto" value="{{$setting->motto}}">
                                            <span class="text-danger">{{$errors->has('motto')?$errors->first('motto'):''}}</span>
                                        </div>
                                    </div>

                                </div>


                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="address" value="{{$setting->address}}">
                                            <span class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Phone Number</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="phone_no" value="{{$setting->phone_no}}">
                                            <span class="text-danger">{{$errors->has('phone_no')?$errors->first('phone_no'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Alternative Phone Number</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="alt_phone_no" value="{{$setting->alt_phone_no}}">
                                            <span class="text-danger">{{$errors->has('alt_phone_no')?$errors->first('alt_phone_no'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Mobile Number</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="mobile_no" value="{{$setting->mobile_no}}">
                                            <span class="text-danger">{{$errors->has('mobile_no')?$errors->first('mobile_no'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="email" value="{{$setting->email}}">
                                            <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Website</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="website" value="{{$setting->website}}">
                                            <span class="text-danger">{{$errors->has('website')?$errors->first('website'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-none col-md-12 row">
                                    <div class="col-md-12 form-group row">
                                        <label class="col-sm-3 col-form-label">Fax</label>

                                        <div class="col-sm-12">
                                            <input type="text" name="fax" value="{{$setting->fax}}">
                                            <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                        </div>
                                    </div>

                                </div>


                                <div class=" col-md-12 row">
                                    <div class="col-md-4 form-group row">
                                        <label class="col-sm-3 col-form-label">Status</label>

                                        <div class="col-sm-12">
                                            <select class="form-control dynamic category" id="settingStatus" name="status" >
                                                <option value="" selected>~~ Select Status ~~</option>
                                                <option  value="Active">Active</option>
                                                <option  value="Inactive">Inactive</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('status')?$errors->first('status'):''}}</span>
                                        </div>
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


