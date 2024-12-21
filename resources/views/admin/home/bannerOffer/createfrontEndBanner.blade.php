@extends('admin.master')
@section('title')
{{$settings->website_name}}-Banner Add
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/banner/frontEndView')}}">Create Front End Banner</a></li>
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
                            <span class="text">Add Front End Banner</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                {!!Form::open(['url'=>'banner/frontEndSave','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label for="Bannerimage" class="col-form-label">Banner Image</label>
    
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="Bannerimage" name="Bannerimage" accept="image/*">
                                            <img id="ShowbannerImage"
                                            src="{{ !empty($banners->image) ? url('website/images/banners/' . $banners->image) : url('website/images/banners/no_image.png') }}"
                                            style="width: 100px;height: 80px; border:1px solid #000000">
                                            <span style="color:gray;">Banner must be 1420*390 Size</span>
                                            <span class="text-danger">{{$errors->has('Bannerimage')?$errors->first('Bannerimage'):''}}</span>
                                        </div>
                                    </div>
                                <div class="col-md-4 form-group">
                                    <label for="carousalCaptionOffer" class="col-form-label">Caption Offer Title</label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="carousalCaptionOffer" name="carousalCaptionOffer" placeholder=" Write Caption Offer">
                                        <span class="text-danger">{{$errors->has('carousalCaptionOffer')?$errors->first('carousalCaptionOffer'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="carousalCaptionOfferDescription" class="col-form-label">Caption Offer Description</label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="carousalCaptionOfferDescription" name="carousalCaptionOfferDescription" placeholder=" Write Caption Offer Description">
                                        <span class="text-danger">{{$errors->has('carousalCaptionOfferDescription')?$errors->first('carousalCaptionOfferDescription'):''}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-4 form-group">
                                    <label for="Bannersorting" class="col-form-label">Banner Sorting</label>

                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="Bannersorting" name="Bannersorting" placeholder="Sort No">
                                        <span class="text-danger">{{$errors->has('Bannersorting')?$errors->first('Bannersorting'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="Bannerstatus" class="col-form-label">Status</label>

                                    <div class="col-sm-12">
                                        <select class="form-control" id="Bannerstatus" name="Bannerstatus" >
                                            <option value="" selected>- Select One -</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">In-Active</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('Bannerstatus')?$errors->first('Bannerstatus'):''}}</span>
                                    </div>
                                </div>
                            </div>

                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addBanner"><i class="fa fa-save"></i> Save </button>
                                </div>
                                {!!Form::close()!!}
                            
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
        $('#Bannerimage').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#ShowbannerImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        $('.dynamic').change(function(){
            if($(this).val() !=''){
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('dynamicdependent.fetch')}}",
                    method:"POST",
                    data:{value:value, _token:_token, dependent:dependent},
                    success:function(result){
                        //alert(result);
                        $('#'+dependent).html(result);
                    }
                });
            }
        });
    });
</script>  	
@endsection