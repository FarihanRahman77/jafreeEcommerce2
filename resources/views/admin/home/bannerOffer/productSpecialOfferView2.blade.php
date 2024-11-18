@extends('admin.master')
@section('title')
Admin Product Special Offer -View
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> </div>
                
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
                    <div class="card">
                     <div class="card-header d-flex justify-content-end">
                        <div class="col-md-3"><h3>Special Offers2</h3></div>
                        <div class="col-md-6 text-center">
                            <form action="{{route('specialOfferView2')}}" method="post">
                            @csrf
                            <div class="col-md-12 row"> 
                                <div class="col-md-3 form-group form-check">
                                    <label>Active</label>
                                    <input value="Active" class="form-check-input" checked type="radio" name="status" id="flexRadioDefault1">  
                                </div>
                                <div class="col-md-3 form-group form-check">
                                    <label class="form-check-label" for="flexRadioDefault2">Inactive</label>
                                    <input value="Inactive" class="form-check-input" type="radio" name="status" id="flexRadioDefault2" >
                                </div>
                                <div class="col-md-2 form-group form-check">
                                    <label class="form-check-label" for="flexRadioDefault3">All</label>
                                    <input value="All" class="form-check-input" type="radio" name="status" id="flexRadioDefault3">
                                </div>
                                <div class="col-md-2"> 
                                    <input type="submit" class="btn-primary" name="" value="Click">
                                </div>
                            </div>    
                            </form>
                        </div>
                        <div class="col-md-3 text-right">
                            <a href="{{url('/products/specialOfferAdd')}}" class="btn btn-success">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Special Products Offer</span>
                            </a>
                        </div> 
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    </div>
                    
                        

            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Offer Date</th>
                        <th>Create Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($productSpecialOfffer as $productSpecialOfffer)
                    <tr>

                        <td>{{$i++}}</td>
                        <td>{{$productSpecialOfffer->productName}}<br>{{$productSpecialOfffer->specificationName}}<br>{{$productSpecialOfffer->master_offerName}}</td>
                        <td><img src = "{{ asset('/product-thumbnail-image/'.$productSpecialOfffer->productImage) }}" width="70" height="55" /></td>
                        <td>{{$productSpecialOfffer->offerPrice}}</td>
                        <td>{{$productSpecialOfffer->startDate}}<br>{{$productSpecialOfffer->endDate}}</td>
                        <td>{{$productSpecialOfffer->created_at}}</td>
                        <td>{{$productSpecialOfffer->status}}</td>
                        <td style="width: 12%;">
                            <a href="{{url('/productsSpecialOffer/delete/'.$productSpecialOfffer->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"> Delete</i></a>
                        </td>

                    </tr>@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</section>
</div>
<script>
       
</script>
@endsection

