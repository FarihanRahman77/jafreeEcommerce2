@extends('admin.master')
@section('title')
{{$settings->website_name}} Add setting
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
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> /<a href="{{url('shop-setting/create')}}">Create Setting</a> </li>
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
                            <span class="text">Add Setting</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            {!!Form::open(['url'=>'setting/save', 'class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                <div class="col-md-12 row">    
                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Owners Name</label>

                                        <div class="col-md-12">
                                            <input  class="form-control" type="text" name="owners_name">
                                            <span class="text-danger">{{$errors->has('owners_name')?$errors->first('owners_name'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Shop Name</label>

                                        <div class="col-md-12">
                                            <input  class="form-control" type="text" name="name">
                                            <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
                                        </div>

                                    </div>

                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Shop Logo</label>

                                        <div class="col-md-12">
                                            <input  class="form-control" type="file" name="shop_logo">
                                            <span class="text-danger">{{$errors->has('shop_logo')?$errors->first('shop_logo'):''}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                        <label class="col-form-label">Currency</label>

                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="currency">
                                            <span class="text-danger">{{$errors->has('currency')?$errors->first('motto'):''}}</span>
                                        </div>
                                    </div>
                                <div class=" d-none col-md-12 row"> 
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Motto</label>

                                        <div class="col-sm-12">
                                            <input class="form-control" type="text" name="motto">
                                            <span class="text-danger">{{$errors->has('motto')?$errors->first('motto'):''}}</span>
                                        </div>
                                    </div>
                                   
                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Address</label>

                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="address">
                                            <span class="text-danger">{{$errors->has('address')?$errors->first('address'):''}}</span>
                                        </div>
                                    </div>

                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Phone Number</label>

                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="phone_no">
                                            <span class="text-danger">{{$errors->has('phone_no')?$errors->first('phone_no'):''}}</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 row">
                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Alternative Phone Number</label>
    
                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="alt_phone_no">
                                            <span class="text-danger">{{$errors->has('alt_phone_no')?$errors->first('alt_phone_no'):''}}</span>
                                        </div>
                                    </div>

                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Mobile Number</label>
    
                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="mobile_no">
                                            <span class="text-danger">{{$errors->has('mobile_no')?$errors->first('mobile_no'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Email</label>
    
                                        <div class="col-sm-12">
                                            <input class="form-control" type="text" name="email">
                                            <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="d-none col-md-12 row">        
                                    <div class="col-md-4 form-group">
                                        <label class="col-form-label">Website</label>
    
                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="website">
                                            <span class="text-danger">{{$errors->has('website')?$errors->first('website'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="d-none col-md-4 form-group">
                                        <label class="col-form-label">Fax</label>
    
                                        <div class="col-sm-12">
                                            <input  class="form-control" type="text" name="fax">
                                            <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                        </div>
                                </div>
                            </div>
                           

                            <div class="col-md-12 row">
                                <div class="d-none col-md-6 form-group">
                                    <label class="col-form-label">Report Header 1</label>

                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="reportHeader1Ckeditor" name="report_header1"></textarea>
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>
                                
                                <div class="d-none col-md-6 form-group">
                                    <label class="col-form-label">Report Header 2</label>

                                    <div class="col-sm-12">
                                        <textarea  class="form-control" id="reportHeader2Ckeditor" name="report_header2"></textarea>
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="d-none col-md-12 row">
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Report Watermark 1</label>

                                    <div class="col-sm-12">
                                        <input  class="form-control" type="file" name="report_watermark1">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>
                                <div class="d-none col-md-4 form-group row">
                                    <label class="col-form-label">Report Watermark 2</label>

                                    <div class="col-sm-12">
                                        <input  class="form-control" type="file" name="report_watermark2">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>
                            
                                <div class="d-none col-md-4 form-group">
                                    <label class="col-form-label">Report Footer 1</label>

                                    <div class="col-sm-12">
                                        <input  class="form-control" type="text" name="report_footer1">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-none col-md-12 row">    
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Report Footer 2</label>

                                    <div class="col-sm-12">
                                        <input  class="form-control" type="text" name="report_footer2">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>

                                <div class="d-none col-md-4 form-group">
                                    <label class="col-form-label">Licence Key</label>

                                    <div class="col-sm-12">
                                        <input  class="form-control" type="text" name="licence_key">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>
                                <div class="d-none col-md-4 form-group">
                                    <label class="col-form-label">Type</label>

                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" name="type">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 row">
                                <div class="col-md-4 form-group">
                                    <label class="col-form-label">Status</label>

                                    <div class="col-sm-12">
                                        <select class="form-control dynamic category"  name="status" >
                                            <option value="" selected>~~ Select Status ~~</option>
                                            <option  value="Active">Active</option>
                                            <option  value="Inactive">Inactive</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('status')?$errors->first('status'):''}}</span>
                                    </div>
                                </div>
                                
                                <div class="d-none col-md-4 form-group">
                                    <label class="col-form-label">Expire Date</label>

                                    <div class="col-sm-12">
                                        <input  type="date" name="expire_date">
                                        <span class="text-danger">{{$errors->has('fax')?$errors->first('fax'):''}}</span>
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


