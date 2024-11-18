@extends('admin.master')
@section('title')
Admin Product-Add
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
                        <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Create Product</a></li>
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
                            <span class="text">Add Product</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                {!!Form::open(['url'=>'products/save', 'id'=>'product_form', 'class'=>'form-horizontal' ,'method'=>'POST','enctype'=>'multipart/form-data'])!!}
                                <div class="col-md-12 row">    
                                    <div class="col-md-4 form-group">
                                        <label for="CategoryName" class="col-form-label">Category Name</label>

                                        <div class="col-sm-12">
                                            <select class="form-control dynamic category" data-dependent="subCategoryName" id="CategoryName" name="CategoryName" >
                                                <option value="" selected>~~ Select Category ~~</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('CategoryName')?$errors->first('CategoryName'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="sub-CategoryName" class="col-form-label">Sub-Category</label>

                                        <div class="col-sm-12">
                                            <select class="form-control dynamic2" name="subCategoryName" id="subCategoryName" style="width:100%;">
                                                <option value="">~~ Select Sub Category ~~</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('CategoryName')?$errors->first('CategoryName'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="Productname" class="col-form-label">Name</label>

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="Productname" name="Productname" placeholder=" Product name">
                                            <span class="text-danger">{{$errors->has('Productname')?$errors->first('Productname'):''}}</span>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label for="manufactureName" class="col-form-label">Brand</label>

                                        <div class="col-sm-12">
                                            <select class="form-control" id="manufactureName" name="manufactureName" >
                                                @foreach($manufacturers as $manufacturer)
                                                    <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturerName}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{$errors->has('manufactureName')?$errors->first('manufactureName'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group" style="display:none;">
                                        <label for="Productprice" class="col-form-label">Price</label>

                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="Productprice" name="Productprice" placeholder=" Product price">
                                            <span class="text-danger">{{$errors->has('Productprice')?$errors->first('Productprice'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group" style="display:none;">
                                        <label for="Productquantity" class="col-form-label">Quantity</label>

                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="Productquantity" name="Productquantity" placeholder=" Product Quantity">
                                            <span class="text-danger">{{$errors->has('Productquantity')?$errors->first('Productquantity'):''}}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="itemNote" class="col-form-label">Product Availabilty</label>
                                        <div class="col-sm-12">
                                         <select class="form-control" id="ProductStatus" name="availability" >
                                            <option value="available">Available</option>
                                            <option value="sold_out">Sold Out</option>
                                            <option value="out_of_stock">Out of Stock</option>
                                            <option value="off">Off</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="ProductStatus" class="col-form-label">Status</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" id="ProductStatus" name="ProductStatus" >
                                                <option value="Active">Active</option>
                                                <option value="Inactive">In-Active</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('ProductStatus')?$errors->first('ProductStatus'):''}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                        <div class="col-md-4 form-group ">
                                        <label for="Productimage" class=" col-form-label">Product Main Image</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" id="ProductDefaultimage" name="ProductDefaultimage" accept="image/*">
                                            <span class="text-danger">{{$errors->has('Productimage')?$errors->first('Productimage'):''}}</span>
                                        </div>
                                    </div> 
                                    
                                    
                                    <div class="col-md-4 form-group">
                                        <label for="ProductStatus" class="col-form-label">Offer ?</label>
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
                                        <label for="productSortDescription" class="col-form-label">Sort Description</label>

                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="shortDescriptionCkeditor" name="productSortDescription" placeholder=" Write about product Sort Description " ></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-12 form-group">

                                        <label for="productLongDescription" class="col-form-label">Long Description</label>

                                        <div class="col-sm-12">
                                            <textarea id="longDescriptionCkeditor" class="form-control editor"  name="productLongDescription" placeholder=" Write about product Long Description Sort Description " ></textarea>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="col-md-12 row">
                                    <div class="col-md-7 form-group">
                                        <label for="itemNote" class="col-form-label">Product Specification</label> 
                                        <div class="col-sm-12">
                                            <table class="table table-bordered" id="dynamic_field">  
                                                <tr>  
                                                    <td class="col-sm-6"><input type="text" class="form-control" name="spacName[]" placeholder="Name"></td>  
                                                    <td class="col-sm-4" style="display:none;"><input type="hidden" class="form-control" name="spacValue[]" placeholder="value" ></td>
                                                    <td class="col-sm-6"><input type="text" class="form-control" name="spacPrice[]" placeholder="Price" ></td>
                                                    <td><button type="button" name="add" id="add" class="btn btn-success btn-sm add"><i class='fas fa-plus'></i></button></td>
                                                </tr>  
                                            </table>  
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4 form-group">
                                        <label for="itemNote" class="col-form-label">Product Multiple Image</label>
                                        <div class="col-sm-12">
                                            <table class="table table-bordered" id="dynamic_field2">
                                                <tr>
                                                    <td><input type="file" class="form-control" name="productImage[]" placeholder="Image"></td>
                                                    <td><button type="button" name="add" id="add2" class="btn btn-success btn-sm add"><i class='fas fa-plus'></i></button></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                

                            <div class="form-group save_button">
                                <button type="submit" class="btn btn-primary btn-flat" name="addProduct"><i class="fa fa-save"></i> Product Save </button>
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

    $(".category").select2( {
       placeholder: "Select Category",
       allowClear: true
   });

    $("#subCategoryName").select2( {
       placeholder: "Select Sub Category",
       allowClear: true
   });

    $("#manufactureName").select2( {
       placeholder: "Select Brand",
       allowClear: true
   });
    $(document).ready(function () {
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
                    },beforeSend: function () {
                        $('#loading').show();
                    },complete: function () {
                        $('#loading').hide();
                    },
            		error: function (xhr) {
            			alert("xhr error: "+xhr.responseText);
            		}
                });
            }
            else{
                alert($("#subCategoryName").empty());
            }
        });
    });

    /*Dynamic product Specification*/
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" class="form-control" name="spacName[]" placeholder="Name"></td><td style="display:none;"><input type="hidden" class="form-control" name="spacValue[]" placeholder="value" ></td><td><input type="text" class="form-control" name="spacPrice[]" placeholder="Price" ></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

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
                alert('Maximum 8 images can be uploaded');

            }
        });
        $(document).on('click', '.btn_remove2', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            i--;
        });
        //End

        /*$('#submit').click(function () {
            $.ajax({
                url: "{{route('dynamicValue.fetch')}}",
                method: "POST",
                data: $('#product_form').serialize(),
                success: function (data)
                {
                    alert(data);
                    $('#product_form')[0].reset();
                }
            });
        });*/
    });

    /*Edit Dynamic product Specification*/

</script>
@endsection