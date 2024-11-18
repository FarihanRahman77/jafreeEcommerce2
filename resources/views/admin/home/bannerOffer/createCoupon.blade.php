@extends('admin.master')
@section('title')
{{ucfirst($type)}} -Add
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
                        <li class="breadcrumb-item active"><a href="{{url('/products/specialDealsView')}}">Create {{ucfirst($type)}}</a></li>
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
                            <span class="text">Add {{ucfirst($type)}}</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                {!!Form::open(['url'=>'coupon/save','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                 <input type="hidden" id="type" name="type" value="{{ucfirst($type)}}" />
                                <div class="col-md-12 row">
                                    <div class="col-md-3 form-group">
                                        <label for="couponCode" class="col-form-label">{{ucfirst($type)}} Code</label>
    
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="couponCode" name="couponCode" placeholder=" {{ucfirst($type)}} Code">
                                            <span class="text-danger">{{$errors->has('couponCode')?$errors->first('couponCode'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 form-group" style="margin-top: 3.5%;"><a href="#" class="btn btn-primary btn-flat" onclick="generateCouponCode()">Generate</a></div>
                                @if ($type != 'voucher')
                                    <div class="col-md-4 form-group">
                                        <label for="users_id" class="col-form-label">User</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="users_id" name="users_id">
                                                <option value="">~~Select User~~</option>
                                                 @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('couponCode')?$errors->first('couponCode'):''}}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-4 form-group">
                                    <label for="couponType" class="col-form-label">Type</label>

                                    <div class="col-sm-12">
                                        <select type="text" class="form-control" id="coupon_type" name="coupon_type">
                                            <option value="">~~Select Type~~</option>
                                            <option value="dateRange">Datewise</option>
                                            <option value="times">Coutingwise</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('couponCode')?$errors->first('couponCode'):''}}</span>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-12 row">
                                @if ($type != 'voucher')
                                <div class="col-md-4 form-group">
                                    <label for="minimum_amount" class="col-form-label">Minimum Purchase Limit</label>

                                    <div class="col-sm-12">
                                        <input type="number" min="0" class="form-control" id="minimum_amount" name="minimum_amount">
                                        <span class="text-danger">{{$errors->has('minimum_amount')?$errors->first('minimum_amount'):''}}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4 form-group">
                                    <label for="amount" class="col-form-label">Amount (%)</label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="amount" name="amount">
                                        <span class="text-danger">{{$errors->has('amount')?$errors->first('amount'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group dateRange">
                                    <label for="start_date" class="col-form-label">Start Date</label>

                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="start_date" name="start_date">
                                        <span class="text-danger">{{$errors->has('start_date')?$errors->first('start_date'):''}}</span>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-md-12 row">
                                <div class="col-md-4 form-group dateRange">
                                    <label for="end_date" class="col-form-label">End Date</label>

                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                        <span class="text-danger">{{$errors->has('end_date')?$errors->first('end_date'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group times">
                                    <label for="coupon_time_count" class="col-form-label">{{ucfirst($type)}} Count</label>

                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="coupon_time_count" name="coupon_time_count">
                                        <span class="text-danger">{{$errors->has('coupon_time_count')?$errors->first('coupon_time_count'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="status" class="col-form-label">Status</label>

                                    <div class="col-sm-12">
                                        <select class="form-control" id="status" name="status" >
                                            <option value="" selected>~~Select Status ~~</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">In-Active</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('status')?$errors->first('status'):''}}</span>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addMasterOffer"><i class="fa fa-save"></i> Save </button>
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
defaultCouponLoad();
function defaultCouponLoad(){
    $(".dateRange").each(function() {
      $(this).hide();
    });
    $(".times").each(function() {
      $(this).hide();
    });
}
function generateCouponCode(){
    var type=$("#type").val();
    var _token = $('input[name="_token"]').val();
	$.ajax({
		url:"{{route('generateCouponCode')}}",
		method:"POST",
		data:{type:type, _token:_token},
		/*datatype:"json",*/
		success:function(result){
		    $("#couponCode").val(result);
			//alert(result);
	  }, beforeSend: function () {
		  $('#loading').show();
	  },complete: function () {
		  $('#loading').hide();
	  }, error: function(response) {
		  //$("#barcodeError").text("No such product available in your system");
			alert(JSON.stringify(response));
	  }
	})
}
    $(document).ready(function(){
        
        $('#coupon_type').change(function(){
            var value = $(this).val();
            if(value == "dateRange"){
                $(".dateRange").each(function() {
                  $(this).show();
                });
                $(".times").each(function() {
                  $(this).hide();
                });
            }else if(value == "times"){
                $(".dateRange").each(function() {
                  $(this).hide();
                });
                $(".times").each(function() {
                  $(this).show();
                });
            }else{
                defaultCouponLoad();
            }
        });
        
    });
</script>  	
@endsection