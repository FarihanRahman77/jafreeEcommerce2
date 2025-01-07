@extends('admin.master')
@section('title')
{{$settings->website_name}}-Brand List
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')

<style type="text/css">
h3 {
    color: #66a3ff;
}
</style>
<div class="content-wrapper">
    <section class="content box-border">
        <div class="card">
            <div class="card-header">
                <h3 style="float:left;"> Brand Offer List </h3>
                <br>
                <h5 class="text-success" id="success-alert"></h5>
                <a class="btn btn-primary float-right text-light" onclick="create()"><i class="fa fa-plus circle"></i>
                    Add Brand Offer</a>
                <!--<a class="btn btn-primary" style="margin-left:20px;" onclick="reloadDt()"><i class="fas fa-sync"></i> Refresh</a> -->
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-12">


                    <!--data listing table-->
                    <table id="manageBrandOfferTable" width="100%" class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <td width="6%">SL#</td>
                                <td>Image</td>
                                <td>Brand</td>
                                <td>Title</td>
                                <td>Text</td>
                                <td>Priority</td>
                                <td width="5%">Status</td>
                                <td width="5%">Action</td>
                            </tr>
                        </thead>
                    </table>
                    <!--data listing table-->

                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header float-left">
                <h4 class="modal-title float-left"> Add Brand Offer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fas fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="brandOfferForm" method="POST" enctype="multipart/form-data" action="#">
                    @csrf
                    <div class="form-group">
                        <label> Title</label>
                        <input class="form-control input-sm" id="title" type="text" name="title" placeholder="Title">
                        <span class="text-danger" id="titleError"></span>
                    </div>
                    <div class="form-group">
                        <label> Text</label>
                        <input class="form-control input-sm" id="text" type="text" name="text" placeholder="Text">
                        <span class="text-danger" id="textError"></span>
                    </div>
                    <div class="form-group">
                        <label> Proprity</label>
                        <input class="form-control input-sm" id="priority" type="number" name="priority" placeholder="Priority">
                        <span class="text-danger" id="priorityError"></span>
                    </div>
                    <div class="form-group">
                        <label> Brands</label>
                        <select id="brand_id" name="brand_id" class="form-control input-sm">
                            <option value="">Choose Brand</option>
                            @foreach($allBrands as $brand)
                            <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="brand_idError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" id="image" class="form-control form-control-sm">
                        <span class="text-danger" id="imageError"></span>
                    </div>
                    <div class="form-group">
                        <img id="imgPreview" src="{{url('brandLogo/no_image.png')}}"
                            style="width: 200px;height: 200px; border:1px solid #000000" /><br>
                        <a href="#" onclick="removeImage()" style="margin-left:20px;"> <i class="fas fa-trash-alt"></i>
                            Remove Image</a>
                        <input type="hidden" id="removeImage" name="removeImage" value="" />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">X Close</button>
                <button type="submit" class="btn btn-primary btnSave" id="saveCategory"><i class="fa fa-save"></i>
                    Save</button>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- edit modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fas fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="editBrandOfferForm" method="POST" enctype="multipart/form-data" action="#">
                    @csrf

                    <input type="hidden" name="editId" id="editId">
                        <div class="form-group">
                            <label> Title</label>
                            <input class="form-control input-sm" id="edit_title" type="text" name="title" placeholder="Title">
                            <span class="text-danger" id="edit_edit_titleError"></span>
                        </div>
                        <div class="form-group">
                            <label> Text</label>
                            <input class="form-control input-sm" id="edit_text" type="text" name="text" placeholder="Text">
                            <span class="text-danger" id="edit_textError"></span>
                        </div>
                        <div class="form-group">
                            <label> Proprity</label>
                            <input class="form-control input-sm" id="edit_priority" type="number" name="priority" placeholder="Priority">
                            <span class="text-danger" id="edit_priorityError"></span>
                        </div>
                        <div class="form-group">
                            <label> Brands</label>
                            <select id="edit_brand_id" name="brand_id" class="form-control input-sm">
                                <option value="">Choose Brand</option>
                                @foreach($allBrands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="edit_brand_idError"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="edit_image" class="form-control form-control-sm">
                            <span class="text-danger" id="edit_imageError"></span>
                        </div>
                        <div class="form-group">
                            <img id="edit_imgPreview" src="{{url('brandLogo/no_image.png')}}"
                                style="width: 200px;height: 200px; border:1px solid #000000" /><br>
                            <a href="#" onclick="removeImage()" style="margin-left:20px;"> <i class="fas fa-trash-alt"></i>
                                Remove Image</a>
                            <input type="hidden" id="removeImage" name="removeImage" value="" />
                        </div>
                        <div class="form-group">
                            <label> Status</label>
                            <select id="editStatus" name="editStatus" class="form-control input-sm">
                                <option value="">Choose status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <span class="text-danger" id="editStatusError"></span>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">X Close</button>
                        <button type="submit" class="btn btn-primary btnUpate" id="editCategory"><i
                                class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('contentJavaScripts')

<script>
function create() {
    reset();
    $("#modal").modal('show');
}
$('#modal').on('shown.bs.modal', function() {
    $('#name').focus();
})
$('#editModal').on('shown.bs.modal', function() {
    $('#editName').focus();
})
var table;
$(document).ready(function() {
    table = $('#manageBrandOfferTable').DataTable({
        'ajax': "{{route('brand.offer.getOffer')}}",
        processing: true,
    });
});
$(document).ready(function() {
    $('#brand_id').select2();
});



$("#brandOfferForm").submit(function(e) {
    // alert("calling");
    e.preventDefault();
    clearMessages();
    var title = $("#title").val();
    var text = $("#text").val();
    var priority = $("#priority").val();
    var brand_id = $("#brand_id").val();
    var image = $('#image')[0].files[0];
    var _token = $('input[name="_token"]').val();
    var fd = new FormData();
    fd.append('title', title);
    fd.append('image', image);
    fd.append('text', text);
    fd.append('priority', priority);
    fd.append('brand_id', brand_id);
    fd.append('_token', _token);
    $.ajax({
        url: "{{ route('brand.offer.store')}}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function(result) {

            //alert(JSON.stringify(result));
            $("#modal").modal('hide');
            $('#success-alert').text(result.success);
            table.ajax.reload(null, false);
        },
        error: function(response) {
        //    alert(JSON.stringify(response));
            $('#titleError').text(response.responseJSON.errors.title);
            $('#textError').text(response.responseJSON.errors.text);
            $('#brand_idError').text(response.responseJSON.errors.brand_id);
            $('#imageError').text(response.responseJSON.errors.image);
            $('#priorityError').text(response.responseJSON.errors.priority);

        },
        beforeSend: function() {
            $('#loading').show();
        },
        complete: function() {
            $('#loading').hide();
        }

    })
})

function clearMessages() {
    $("#titleError").text("");
    $("#textError").text("");
    $("#brand_idError").text("");
    $("#imageError").text("");
}

function editClearMessages() {
    $("#edit_titleError").text("");
    $("#edit_textError").text("");
    $("#edit_brand_idError").text("");
    $("#edit_imageError").text("");
    $("#editStatusError").text("");
}

function reset() {
    $("#title").val("");
    $("#text").val("");
    $("#image").val("");
    $("#priority").val("");
    $('#imgPreview').attr('src', "");
    $("#brand_id").val("");
}

function editReset() {
    $("#edit_title").val("");
    $("#edit_text").val("");
    $("#edit_image").val("");
    $("#edit_brand_id").val("");
    $("#editStatus").val("");
    $("#edit_imgPreview").attr('src', "");
    $("#editId").val("");
    
}

function editBrand(id) {
    editReset();
    editClearMessages();
    $.ajax({
        url: "{{route('brand.offer.edit')}}",
        method: "GET",
        data: {
            "id": id
        },
        datatype: "json",
        success: function(result) {
            //alert(JSON.stringify(result));
            $("#editModal").modal('show');
            $("#edit_title").val(result.title);
            $("#edit_text").val(result.text);
            $("#edit_priority").val(result.priority);
            $("#edit_brand_id").val(result.brand_id);
            var imageString = '{{asset("ecomas/images/offer")}}' + "/" + result.image;
            $('#edit_imgPreview').attr('src', imageString);
            
            $("#editId").val(result.id);
            if (result.status != "") {
                $("#editStatus").val(result.status);
            } else {
                $("#editStatus").val("Inactive");
            }
        },
        
        error: function(response) {
            //alert(JSON.stringify(response));
        }
    });
}

$("#editBrandOfferForm").submit(function(e) {
    e.preventDefault();
    editClearMessages();
    var title = $("#edit_title").val();
    var text = $("#edit_text").val();
    var priority = $("#edit_priority").val();
    var brand_id = $("#edit_brand_id").val();
    var image = $('#edit_image')[0].files[0];
    var status = $("#editStatus").val();
    var id = $("#editId").val();
    var _token = $('input[name="_token"]').val();
    var fd = new FormData();
    fd.append('title', title);
    fd.append('image', image);
    fd.append('text', text);
    fd.append('priority', priority);
    fd.append('brand_id', brand_id);
    fd.append('status', status);
    fd.append('id', id);
    fd.append('_token', _token);
    $.ajax({
        url: "{{ route('brand.offer.update')}}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function(result) {
           // alert(JSON.stringify(result));
            $("#editModal").modal('hide');
            $('#success-alert').text(result.success);
            table.ajax.reload(null, false);
        },
        error: function(response) {
           // alert(JSON.stringify(response));
            $('#edit_titleError').text(response.responseJSON.errors.title);
            $('#edit_textError').text(response.responseJSON.errors.text);
            $('#edit_brand_idError').text(response.responseJSON.errors.brand_id);
            $('#edit_imageError').text(response.responseJSON.errors.image);
            $('#editStatusError').text(response.responseJSON.errors.status);
            $('#edit_priorityError').text(response.responseJSON.errors.priority);
        },
        beforeSend: function() {
            $('#loading').show();
        },
        complete: function() {
            $('#loading').hide();
        }
    })
});

function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure ?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete Brand!",
        closeOnConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{route('brands.delete')}}",
                method: "POST",
                data: {
                    "id": id,
                    "_token": _token
                },
                success: function(result) {
                    // if(result == "Success"){
                    Swal.fire("Done!", "Brand was succesfully deleted!", "success");
                    table.ajax.reload(null, false);
                    // }else{
                    //   Swal.fire("Cancelled", result, "error");
                    // }
                },
                error: function(response) {
                    Swal.fire("Cancelled", result, "error");
                    $('#editNameError').text(response.responseJSON.errors.name);
                    $('#editImageError').text(response.responseJSON.errors.image);
                },
                beforeSend: function() {
                    $('#loading').show();
                },
                complete: function() {
                    $('#loading').hide();
                }
            });
        } else {
            Swal.fire("Cancelled", "Your imaginary Brand is safe :)", "error");
        }
    })

}

function removeImage() {
    Swal.fire({
        title: "Are you sure ?",
        text: "You will not be able to recover this image file after save!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, remove image!",
        closeOnConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            $("#removeImage").val("1");
            $("#editShowImage").attr('src', "");
        } else {
            Swal.fire("Cancelled", "Your image is safe :)", "error");
        }
    })
}



$('#image').change(function(e) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#imgPreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
});
$('#brand_logo').change(function(e) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#logoPreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
});


Mousetrap.bind('ctrl+shift+n', function(e) {
    e.preventDefault();
    if ($('#modal.in, #modal.show').length) {

    } else {
        create();
    }
});

function reloadDt() {
    if ($('#modal.in, #modal.show').length) {

    } else if ($('#editModal.in, #editModal.show').length) {

    } else {
        table.ajax.reload(null, false);
    }
}
Mousetrap.bind('ctrl+shift+r', function(e) {
    e.preventDefault();
    reloadDt();
});
Mousetrap.bind('ctrl+shift+s', function(e) {
    e.preventDefault();
    if ($('#modal.in, #modal.show').length) {
        $("#brandForm").trigger('submit');
    } else {
        alert("Not Calling");
    }
});
Mousetrap.bind('ctrl+shift+u', function(e) {
    e.preventDefault();
    if ($('#editModal.in, #editModal.show').length) {
        $("#editBrandForm").trigger('submit');
    } else {
        alert("Not Calling");
    }
});
Mousetrap.bind('esc', function(e) {
    e.preventDefault();
    if ($('#editModal.in, #editModal.show').length) {
        $("#editModal").modal('hide');
    } else if ($('#modal.in, #modal.show').length) {
        $('#modal').modal('hide');
    }
});
</script>



@endsection