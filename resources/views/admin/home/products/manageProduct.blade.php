@extends('admin.master')
@section('title')
Admin Product-Edit
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
                        <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Edit Product</a></li>
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
                        <div class="card-header d-flex justify-content-start">
                            <span class="text">Edit Product Image</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>

                        {!!Form::open(['url'=>'products/update','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}

                        <input type="hidden" value="{{$id}}" name="id">
                        <div class="col-md-12 row">
                            <div class="form-group col-md-6">
                                <label for="Productimage" class="col-form-label">Product Main Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="Productimage" name="productImage" accept="image/*">
                                    <span class="text-danger">{{$errors->has('Productimage')?$errors->first('Productimage'):''}}</span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Productimage" class="col-form-label">Image</label>
                                <div class="col-sm-12">
                                    <img src="" id="productimg" alt="No Image" width="110" height="90" />
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Productimage" class="col-form-label text-light">.</label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-flat" name="editProduct"><i class="fa fa-save"></i> Save </button>
                                </div>
                            </div>
                        </div>
                        {!!Form::close()!!}

                        {!!Form::open(['url'=>'products/videoUrl/update','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                        <input type="hidden" value="{{$id}}" name="id">
                        <div class="col-md-12 row">
                            <div class="form-group col-md-6">
                                <label for="video_url" class="col-form-label">Video URL(Embaded)</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="video_url" name="video_url" value="{{$product->video_url}}">
                                    <span class="text-danger">{{$errors->has('video_url')?$errors->first('video_url'):''}}</span>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <label for="Productimage" class="col-form-label text-light">.</label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-flat" name="editProduct"><i class="fa fa-save"></i> Save </button>
                                </div>
                            </div>
                        </div>
                        {!!Form::close()!!}

                        <div class="col-md-12 row">
                            <div class="col-md-12 form-group">
                                <label for="itemNote" class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-12">

                                    <table class="table table-bordered table-striped dt_view">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Status</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php($i = 1)
                                            @foreach($productImages as $productImage)
                                            <tr>

                                                <td>{{$i}}</td>
                                                <td> <img src="{{asset('/website/images/products/'.$productImage->productImage)}}"
                                                        alt="No Image" width="110" height="90" /></td>
                                                <td>{{$productImage->status}}</td>

                                                <td style="width: 12%;">
                                                
                                                    <a href="{{ route('toggle-product-image-status', ['id' => $productImage->id]) }}"
                                                        class="btn btn-sm {{ $productImage->status == 'Active' ? 'btn-success' : 'btn-secondary' }}"
                                                        data-toggle="tooltip"
                                                        title="Click to {{ $productImage->status == 'Active' ? 'Deactivate' : 'Activate' }}"
                                                        onclick="return toggleStatus(this, {{ $productImage->id }}, '{{ $productImage->status }}');">
                                                        <i class="fas {{ $productImage->status == 'Active' ? 'fa-check' : 'fa-times' }}"></i>
                                                        <span>{{ $productImage->status == 'Active' ? 'Active' : 'Inactive' }}</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
@section('contentJavaScripts')
<script>
   
    $(document).ready(function() {
        $('#Productimage').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#productimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

</script>
@endsection