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
                        <div class="col-md-3 text-left"><h3>Best Deals</h3></div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    </div>
                    
                        

            <table id="tbl_category" class="table table-bordered table-striped dt_view">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Offer</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($deals as $deal)
                    <tr>

                        <td>{{$i++}}</td>
                        <td>{{$deal->productName}}</td>
                        <td><img src = "{{ asset('/product-thumbnail-image/'.$deal->productImage) }}" width="70" height="55" /></td>
                        <td>{{$deal->in_offer}}</td>
                        <td>{{$deal->created_at}}</td>
                        <td>{{$deal->productStatus}}</td>
                        <td style="width: 12%;">
                            <a href="{{url('/bestDeals/delete/'.$deal->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"> Delete</i></a>
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

