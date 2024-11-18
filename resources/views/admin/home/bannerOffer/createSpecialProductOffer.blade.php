@extends('admin.master')
@section('title')
Admin Special Product Offer-Add
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
                        <li class="breadcrumb-item active"><a href="{{url('/products/specialOfferView')}}">Create Special Offer</a></li>
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
                            <span class="text">Add Special Offer</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                {!!Form::open(['url'=>'productsSpecialOffer/save','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}

                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label for="productName" class="col-form-label">Product Name</label>
                                            <div class="col-sm-12">
                                            <select class="form-control" data-dependent="productName" id="productName" name="productName" >
                                                <option value="" selected>~~ Select Product ~~</option>
                                                @foreach($products as $products)
                                                <option value="{{$products->id}}">{{$products->productName}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="productName" class="col-form-label">Product Weight</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" data-dependent="productWeight" id="productWeight" name="productWeight" >
                                                <option value="" selected>~~ Select Weight ~~</option>
                                            </select>
                                            <select class="form-control" data-dependent="productPrice" id="productPrice" name="productPrice" >
                                                <option value="" selected>~~ Select Price ~~</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('productWeight')?$errors->first('productWeight'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="masterOfferName" class="col-form-label">Master Offer Name</label>
                                        <div class="col-sm-12">
                                        <select class="form-control" id="masterOfferName" name="masterOfferName" >
                                            <option value="" selected>~~ Select Master Offer ~~</option>
                                            @foreach($masterOffer as $masterOffer)
                                            <option value="{{$masterOffer->id}}">{{$masterOffer->master_offerName}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" style="display:none;">
                                    <label for="specialOfferName" class="col-sm-3 col-form-label">Special Offer Name</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="specialOfferName" value="Special Offer" name="specialOfferName" placeholder=" Product Special Offer Name" readonly>
                                        <span class="text-danger">{{$errors->has('specialOfferName')?$errors->first('specialOfferName'):''}}</span>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                    <label for="offerPrice" class="col-form-label">Min. Purchase Qty.</label>

                                    <div class="col-sm-12">
                                        <input type="number" min="1" class="form-control" id="minPurchaseQty" name="minPurchaseQty" placeholder=" Min. Purchase Qty.">
                                        <span class="text-danger">{{$errors->has('offerPrice')?$errors->first('offerPrice'):''}}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="offerPrice" class="col-form-label">Offer Unit Price</label>
    
                                        <div class="col-sm-12">
                                            <input type="text" min=".01" class="form-control" id="offerPrice" name="offerPrice" placeholder=" Product Offer Price">
                                            <span class="text-danger">{{$errors->has('offerPrice')?$errors->first('offerPrice'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="startDate" class="col-form-label">Start Date</label>
    
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="startDate" name="startDate">
                                            <span class="text-danger">{{$errors->has('startDate')?$errors->first('startDate'):''}}</span>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                    <label for="endDate" class="col-form-label">End Date</label>

                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="startDate" name="endDate">
                                        <span class="text-danger">{{$errors->has('endDate')?$errors->first('endDate'):''}}</span>
                                    </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label for="offerStatus" class="col-form-label">Status</label>

                                    <div class="col-sm-12">
                                        <select class="form-control" id="offerStatus" name="offerStatus" >
                                            <option value="" selected>~~Select Status ~~</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">In-Active</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('offerStatus')?$errors->first('offerStatus'):''}}</span>
                                    </div>
                                    </div>
                                </div>    

                                <div class="form-group save_button">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addProductOffer"><i class="fa fa-save"></i> Save </button>
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
        $('#productName').change(function (){
            var id=$('#productName').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('productWeight.productId')}}",
                method:"POST",
                data:{id:id, _token:_token},
                dataType:'json',
                success:function(result){
                    var ddlOptions = "<option value=''>~~ Select Weight ~~</option>";
                    var ddlPrice = "<option value=''>~~ Select Price ~~</option>";
                    for(var i = 0; i < result.length; i++){
                        ddlOptions += '<option value="'+result[i]["id"]+'">'+result[i]["specificationName"]+'</option>';
                        ddlPrice += '<option value="'+result[i]["id"]+'">'+result[i]["specPrice"]+'</option>';
                    }
                    $("#productWeight").html(ddlOptions);
                    $("#productPrice").html(ddlPrice);
                },beforeSend: function () {
                    $('#loading').show();
                },complete: function () {
                    $('#loading').hide();
                },
        		error: function (xhr) {
        			alert("xhr error: "+xhr.responseText);
        		}
            });
            $("#productWeight").change(function (){
                $("#productPrice").val($("#productWeight").val());
                $("#productPrice").show();
                $("#productPrice").attr('disabled',true);
                
            })
        })
        /*$('.dynamic').change(function(){
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
        });*/
    });
</script>  	
@endsection