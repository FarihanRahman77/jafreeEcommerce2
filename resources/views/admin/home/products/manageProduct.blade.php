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
                                <span class="text">Edit Product</span>
                            </div>
                            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                            
                                    {!!Form::open(['url'=>'products/update','class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                    <input type="hidden" value="{{$productById->id}}" name="id">
                                    <div class="col-md-12 row">
                                        <div class="col-md-4 form-group">
                                            <label for="CategoryName" class="col-form-label">Category
                                                Name</label>
                                            <div class="col-sm-12">
                                                <select class="form-control dynamic" data-dependent="subCategoryName"
                                                        id="CategoryName" name="CategoryName">
                                                    <option>~~ Select Category ~~</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{$errors->has('CategoryName')?$errors->first('CategoryName'):''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="sub-CategoryName"
                                                   class="col-form-label">Sub-Category</label>

                                            <div class="col-sm-12">
                                                <select class="form-control" name="subCategoryName" id="subCategoryName"
                                                        style="width:100%;">

                                                </select>
                                                <span class="text-danger">{{$errors->has('subCategoryName')?$errors->first('subCategoryName'):''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="Productname" class="col-form-label">Product
                                                Name</label>

                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="Productname"
                                                       value="{{$productById->productName}}" name="Productname"
                                                       placeholder=" Product name">
                                                <span class="text-danger">{{$errors->has('Productname')?$errors->first('Productname'):''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-3 form-group">
                                            <label for="manufactureName" class="col-form-label">Manufacture
                                                Name</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" id="manufactureName"
                                                        name="manufactureName">
                                                    <option>~~ Select Manufacture ~~</option>
                                                    @foreach($manufacturers as $manufacturer)
                                                        <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">{{$errors->has('manufactureName')?$errors->first('manufactureName'):''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group" style="display:none;">
                                            <label for="Productprice" class="col-form-label">Product
                                                Price</label>

                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" id="Productprice"
                                                       value="{{$productById->amount}}" name="Productprice"
                                                       placeholder=" Product name">
                                                <span class="text-danger">{{$errors->has('Productprice')?$errors->first('Productprice'):''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group" style="display:none;">
                                            <label for="Productquantity" class="col-form-label">Product
                                                Quantity</label>

                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="Productquantity"
                                                       value="{{$productById->productQuantity}}" name="Productquantity"
                                                       placeholder=" Product name">
                                                <span class="text-danger">{{$errors->has('Productquantity')?$errors->first('Productquantity'):''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="itemNote" class="col-form-label">Product Availabilty</label>
                                            <div class="col-sm-12">
                                               <select class="form-control" id="productAvailability" name="availability" >
                                                    <option value="" selected>- Select One -</option>
                                                    <option value="available">Available</option>
                                                    <option value="sold_out">Sold Out</option>
                                                    <option value="out_of_stock">Out of Stock</option>
                                                    <option value="off">Off</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group">
                                                <label for="ProductStatus" class="col-form-label">Status</label>
                                                <div class="col-sm-12">
                                                <select class="form-control" id="ProductStatus" name="ProductStatus">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                                <span class="text-danger">{{$errors->has('ProductStatus')?$errors->first('ProductStatus'):''}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="manufactureName" class="col-form-label">Offer ?</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" id="in_offer" name="in_offer" >
                                                <option value="no">No</option>
                                                <option value="yes">Yes</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('in_offer')?$errors->first('in_offer'):''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row" style="display:none;">
                                        <div class="col-md-12 form-group">
                                            <label for="productSortDescription" class="col-form-label">Product
                                                Short Description</label>

                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control" id="shortDescriptionCkeditor"
                                                          name="productSortDescription"
                                                          placeholder=" Write about product Sort Description ">{{$productById->productShortDescription}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12 row">

                                        <div class="col-md-12 form-group">
                                            <label for="productLongDescription" class="col-form-label">Product
                                                Long Description2</label>

                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control" id="longDescriptionCkeditor"
                                                          name="productLongDescription"
                                                          placeholder=" Write about product Long Description Sort Description ">{{$productById->productLongDescription }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row">
                                        <div class="col-md-6 form-group">
                                            <label for="Productimage" class="col-form-label">Product Main
                                                Image</label>

                                            <div class="col-sm-12">
                                                <input type="file" class="form-control" id="Productimage"
                                                       name="Productimage" accept="image/*">
                                                <img src="{{asset('/productImage/'.$productById->productImage)}}"
                                                     alt="No Image" width="110" height="90"/>
                                                <span class="text-danger">{{$errors->has('Productimage')?$errors->first('Productimage'):''}}</span>
                                            </div>
                                            <label for="itemNote" class="col-form-label">Product Multi Image</label>
                                            <table class="table table-bordered" id="dynamic_field2">
                                                <tr>
                                                    <td class="col-sm-12">
                                                        <input type="file" class="form-control" name="productImage[]" laceholder="Image"></td>
                                                    <td>
                                                        <button type="button" name="add" id="add2" class="btn btn-success btn-sm add"><i class='fas fa-plus'></i></button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="itemNote" class="">Product Specification
                                                <button style="margin-left: 10px;" type='button' name='editSpac'
                                                        id='editSpac' class='btn btn-success btn-sm add'><i
                                                            class='fas fa-plus'></i></button>
                                            </label>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="itemSpecifications"></table>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="specList">
                                                    <tr>
                                                        <th>Weight</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    @foreach($productById->spec as  $specification)
                                                        <tr>
                                                            <td>{{$specification->specificationName}}</td>
                                                            <td>{{$specification->specPrice}}</td>
                                                            <td><a href="{{route('delete-product-price',['id'=>$specification->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure? you want to delete this item?');"><i class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
                                                        <th>Serial</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @php($i = 1)
                                                    @foreach($productImages as $productImage)
                                                        <tr>

                                                            <td>{{$i}}</td>
                                                            <td> <img src="{{asset($productImage->productImage)}}"
                                                                      alt="No Image" width="110" height="90"/></td>
                                                            <td>{{$productImage->status}}</td>
                                                            <td>{{$productImage->image_serial}}</td>

                                                            <td style="width: 12%;">
                                                                <a href="{{route('delete-product-image',['id'=>$productImage->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat" name="editProduct"><i
                                                    class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                                    {!!Form::close()!!}
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.getElementById("ProductStatus").value = "{{$productById->productStatus}}";
        document.getElementById("CategoryName").value = "{{$productById->tbl_categoryId}}";
        document.getElementById("manufactureName").value = "{{$productById->tbl_manufacturerId}}";
        document.getElementById("productAvailability").value = "{{$productById->availability}}";


    </script>
@endsection
@section('contentJavaScripts')
    <script>
        $(document).ready(function () {
            var i = 0;
            $('.dynamic').change(function () {
                if ($(this).val() != '') {
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{route('dynamicdependent.fetch')}}",
                        method: "POST",
                        data: {value: value, _token: _token, dependent: dependent},
                        success: function (result) {
                            //alert(result);
                            $('#' + dependent).html(result);
                            if (i == 0) {
                                i++;
                                document.getElementById("subCategoryName").value = "{{$productById->tbl_subCategoryId}}";
                            }
                        }
                    });
                }

            });

            $('.dynamic').change();

        });


        /*Edit Dynamic product Specification*/
        $(document).ready(function () {
            var i = 1;
            $('#editSpac').click(function () {
                i++;
                $('#itemSpecifications').append('<tr id="row' + i + '"><td><input type="text" class="form-control" name="spacName[]" placeholder="Name"></td><td style="display:none;"><input type="hidden" class="form-control" name="spacValue[]" placeholder="value" ></td><td><input type="text" class="form-control" name="spacPrice[]" placeholder="Price" ></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            //Multiple Image
            $('#add2').click(function () {
                i++;
                if (i<9){
                    $('#dynamic_field2').append('<tr id="row' + i + '"><td><input type="file" class="form-control" name="productImage[]" placeholder="Image"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove2">X</button></td></tr>');

                }
                else {
                    // $('#dynamic_field2').append('<p class="text-danger">Max 3 Image</p>');
                    alert('Maximum 8 images can be uploaded');

                }
            });
            $(document).on('click', '.btn_remove2', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
            //End
            $('#submit').click(function () {
                $.ajax({
                    url: "{{route('dynamicValue.fetch')}}",
                    method: "POST",
                    data: $('#product_form').serialize(),
                    success: function (data) {
                        alert(data);
                        $('#product_form')[0].reset();
                    }
                });
            });
        });

        /*Edit Dynamic product Specification*/

    </script>

    </script>
@endsection