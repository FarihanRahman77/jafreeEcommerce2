@extends('admin.master')
@section('title')
Admin Products-View
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding: 0px 1.0rem;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('products/view')}}">Product Details</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-5">
              <h3 class="d-inline-block d-sm-none">{{$productById->productName}}</h3>
                <div class="col-12">
                    <img src="{{ asset('/productImage/'.$productById->productImage) }}" class="product-image" alt="Product Image">
                </div>
            </div>
            <div class="col-12 col-sm-7">
              <h3 class="my-3">{{$productById->productName}}</h3>
              <span>{{$productById->productShortDescription}}</span>

              <hr>
            <h4 class="mt-5">Size</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><p>Short Description: <br>{{$productById->productShortDescription}}</p><p>{{$productById->productLongDescription}}</p></div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> {{$productById->productLongDescription}}</div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">{{$productById->productLongDescription}}</div>
            </div>
          </div>
          
          
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  @endsection
  @section('contentJavaScripts')
  
  @endsection