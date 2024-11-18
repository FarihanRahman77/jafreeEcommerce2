@extends('admin.master')
@section('title')
Admin Master Offer -Add
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/products/specialDealsView')}}">Create Master Offer</a></li>
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
                            <span class="text">Add Master Offer</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                {!!Form::open(['url'=>'master/masterOffersave','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                 <div class="col-md-12 row">    
                                    <div class="col-md-6 form-group">
                                        <label for="offerName" class="col-form-label">Offer Name</label>
    
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="offerName" name="offerName" placeholder=" Offer name">
                                            <span class="text-danger">{{$errors->has('offerName')?$errors->first('offerName'):''}}</span>
                                        </div>
                                    </div>
                                <!--<div class="form-group row">
                                    <label for="startDate" class="col-sm-3 col-form-label">Start Date</label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                        <span class="text-danger">{{$errors->has('startDate')?$errors->first('startDate'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="endDate" class="col-sm-3 col-form-label">End Date</label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="endDate" name="endDate">
                                        <span class="text-danger">{{$errors->has('endDate')?$errors->first('endDate'):''}}</span>
                                    </div>
                                </div>-->
                                <div class="col-md-6 form-group">
                                    <label for="masterStatus" class="col-form-label">Status</label>

                                    <div class="col-sm-12">
                                        <select class="form-control" id="masterStatus" name="masterStatus" >
                                            <option value="" selected>~~Select Status ~~</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">In-Active</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('masterStatus')?$errors->first('masterStatus'):''}}</span>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addMasterOffer"><i class="fa fa-save"></i> Offer Save </button>
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