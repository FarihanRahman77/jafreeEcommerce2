@extends('admin.master')
@section('title')
Admin Special Product Deals-Add
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Create Special Deals</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/products/specialDealsView')}}">Create Special Deals</a></li>
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
                            <span class="text">Add Special Deals</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                {!!Form::open(['url'=>'products/SpecialDealsSave','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                 <div class="form-group row">
                                    <label for="productName" class="col-sm-3 col-form-label">Product Name</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="productName" name="productName" >
                                            <option value="" selected>~~ Select Product ~~</option>
                                            @foreach($products as $products)
                                            <option value="{{$products->id}}">{{$products->productName}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="masterOfferName" class="col-sm-3 col-form-label">Master Offer Name</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="masterOfferName" name="masterOfferName" >
                                            <option value="" selected>~~ Select Master Offer ~~</option>
                                            @foreach($masterOffer as $masterOffer)
                                            <option value="{{$masterOffer->id}}">{{$masterOffer->master_offerName}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="minimumPrice" class="col-sm-3 col-form-label">Minimum Amount</label>

                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="minimumPrice" name="minimumPrice" placeholder=" Product Minimum Price">
                                        <span class="text-danger">{{$errors->has('minimumPrice')?$errors->first('minimumPrice'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dealsPrice" class="col-sm-3 col-form-label">Deals Price</label>

                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="dealsPrice" name="dealsPrice" placeholder=" Product Deals Price">
                                        <span class="text-danger">{{$errors->has('dealsPrice')?$errors->first('dealsPrice'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="startDate" class="col-sm-3 col-form-label">Start Date</label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                        <span class="text-danger">{{$errors->has('startDate')?$errors->first('startDate'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="endDate" class="col-sm-3 col-form-label">End Date</label>

                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="startDate" name="endDate">
                                        <span class="text-danger">{{$errors->has('endDate')?$errors->first('endDate'):''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="offerStatus" class="col-sm-3 col-form-label">Status</label>

                                    <div class="col-sm-9">
                                        <select class="form-control" id="dealsStatus" name="dealsStatus" >
                                            <option value="" selected>~~Select Status ~~</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">In-Active</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('dealsStatus')?$errors->first('dealsStatus'):''}}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-flat" name="addProductDeals"><i class="fa fa-save"></i> Save </button>
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
	
@endsection