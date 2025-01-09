@extends('admin.master')
@section('title')
Admin Sub-Category-View
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Create Sub-Category</a></li>
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
                            <div class="col-md-6">Sub-Category List</div>
                            <div class="col-md-6 text-right">
                                <a href="#" onclick="create()" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Sub-Category</span>
                                </a>
                            </div>
                            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="manageSubCategoryTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Is Website</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header float-left">
                <h4 class="modal-title float-left"> Add Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="subCategoryForm" method="POST" enctype="multipart/form-data" action="#">
                    @csrf
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label>Name <span class="text-danger"> * </span></label>
                            <input class="form-control input-sm" id="name" type="text" name="name" placeholder="Name">
                            <span class="text-danger" id="nameError"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Category <span class="text-danger"> * </span></label>
                            <select class="form-control select2" id="category_id" name="category_id" >
                                <option value="" selected>~~ Select Category ~~</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="category_idError"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <span class="text-danger" id="imageError"></span>
                        </div>
                        <div class="col-md-6">
                            <img id="imgPreview" src="{{asset('brandLogo/no_image.png')}}" style="width: 70px;height: 80px; border:1px solid #000000">
                        </div>
                        <div class="col-md-6">
                            <label for="">Priority</label>
                            <input type="number" name="priority" id="priority" class="form-control">
                            <span class="text-danger" id="priorityError"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Is Website </label>
                            <select class="form-control" id="is_website" name="is_website">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <span class="text-danger" id="category_idError"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">X Close</button>
                        <button type="submit" class="btn btn-primary btnSave" id="saveCategory"><i class="fa fa-save"></i> Save</button>
                    </div>
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
                <h4 class="modal-title">Edit Sub Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                        class="fas fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="editSubCatForm" method="POST" enctype="multipart/form-data" action="#">
                    @csrf

                    <input type="hidden" name="editId" id="editId">
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label>Name <span class="text-danger"> * </span></label>
                            <input class="form-control input-sm" id="edit_name" type="text" name="edit_name" placeholder="Name">
                            <span class="text-danger" id="edit_nameError"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Category <span class="text-danger"> * </span></label>
                            <select class="form-control select2" id="edit_category_id" name="edit_category_id" >
                                <option value="" selected>~~ Select Category ~~</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="edit_category_idError"></span>
                        </div>
                        <div class="col-md-6">
                            <label>Top Priority <span class="text-danger"> * </span></label>
                            <input class="form-control input-sm" id="edit_priority" type="number" name="edit_priority"
                                value="0">
                            <span class="text-danger" id="edit_priorityError"></span>
                        </div>
                        <div class="col-md-6">
                            <label> Is Website</label>
                            <select id="edit_is_website" name="edit_is_website" class="form-control input-sm">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="">Image</label>
                            <input type="file" name="edit_Image" id="edit_image" class="form-control form-control-sm">
                            <span class="text-danger" id="edit_ImageError"></span>
                        </div>
                        <div class="col-md-4">
                            <img id="edit_imgPreview" src="{{url('brandLogo/no_image.png')}}"
                                style="width: 70px;height: 80px; border:1px solid #000000"/><br>
                            <a href="#" onclick="removeImage()" style="margin-left:20px;"> <i
                                    class="fas fa-trash-alt"></i> Remove Image</a>
                            <input type="hidden" id="removeImage" name="removeImage" value="" />
                        </div>
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
    table = $('#manageSubCategoryTable').DataTable({
        'ajax': "{{url('/sub-category/getData')}}",
        processing: true,
    });
    // $.ajax({
    //     url: "{{ url('/sub-category/getData')}}",
    //     method: "GET",
        
    //     success: function(result) {
    //         alert(JSON.stringify(result));
    //     },
    //     error: function(response) {
    //         alert(JSON.stringify(response));
    //     },
    //     beforeSend: function() {
    //         $('#loading').show();
    //     },
    //     complete: function() {
    //         $('#loading').hide();
    //     }

    // })
});

$("#subCategoryForm").submit(function(e) {
    e.preventDefault();
    clearMessages();
    var name=$("#name").val();
    var priority=$("#priority").val();
    var category_id=$("#category_id").val();
    var is_website=$("#is_website").val();
    var image=$('#image')[0].files[0];
    var _token = $('input[name="_token"]').val();
    var fd = new FormData();
    fd.append('name', name);
    fd.append('category_id', category_id);
    fd.append('priority', priority);
    fd.append('image', image);
    fd.append('is_website', is_website);
    fd.append('_token', _token);
    $.ajax({
        url: "{{ url('/sub-category/store')}}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function(result) {
           // alert(JSON.stringify(result));
            $("#modal").modal('hide');
            $('#success-alert').text(result.success);
            table.ajax.reload(null, false);
        },
        error: function(response) {
            //console.log(response);
            //alert(JSON.stringify(response));
            $('#brandNameError').text(response.responseJSON.errors.brandName);
            $('#brand_logoError').text(response.responseJSON.errors.brand_logo);
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
    $('#nameError').text("");
    $('#category_idError').text("");
    $('#priorityError').text("");
    $('#imageError').text("");
    $('#imagePreviewError').text("");
}



function reset() {
    $("#name").val("");
    $("#priority").val("");
    $("#category_id").val("").trigger('change');
    $("#image").val("")
    $('#iamgePreview').attr('src', "");
}

function editReset() {
    $("#edit_name").val("");
    $("#edit_image").val("");
    $('#edit_imgPreview').attr('src', "");
    $("#edit_priority").val("0")
}

function editClearMessages() {
    $('#is_topError').text("");
    $('#is_websiteError').text("");
    $('#top_priorityError').text("");
    $('#brand_imgError').text("");
    $('#brand_logoError').text("");
}

function editBrand(id) {
    editReset();
    editClearMessages();
    $.ajax({
        url: "{{url('/sub-category/edit/')}}",
        method: "GET",
        data: {
            "id": id
        },
        datatype: "json",
        success: function(result) {
            //alert(JSON.stringify(result));
            $("#editModal").modal('show');
            $("#edit_name").val(result.name);
            $("#edit_is_website").val(result.is_website);
            $("#edit_category_id").val(result.category_id);
            $("#edit_priority").val(result.priority);
            var imageString = '{{asset("ecomas/images/category")}}' + "/" + result.image;
            $('#edit_imgPreview').attr('src', imageString);
            $("#editId").val(result.id);
            if (result.status != "") {
                $("#editStatus").val(result.status);
            } else {
                $("#editStatus").val("Inactive");
            }
        },
        beforeSend: function() {
            $('#loading').show();
        },
        complete: function() {
            $('#loading').hide();
        },error: function(response) {
            //alert(JSON.stringify(response));
        }
    });
}

$("#editSubCatForm").submit(function(e) {

    e.preventDefault();
    var name = $("#edit_name").val();
    var is_website = $("#edit_is_website").val();
    var category_id = $("#edit_category_id").val();
    var priority =$("#edit_priority").val();
    var _token = $('input[name="_token"]').val();
    var id = $("#editId").val();
    var image = $('#edit_image')[0].files[0];

    var fd = new FormData();
    fd.append('name',name);
    fd.append('is_website', is_website);
    fd.append('category_id', category_id);
    fd.append('priority', priority);
    fd.append('image', image);
    fd.append('id', id);
    fd.append('_token', _token);
    $.ajax({
        url: "{{url('/sub-category/update/')}}",
        method: "POST",
        data: fd,
        contentType: false,
        processData: false,
        success: function(result) {
            alert(JSON.stringify(result));
            $("#editModal").modal('hide');
            $('#success-alert').text(result.success);
            table.ajax.reload(null, false);
        },
        error: function(response) {
            alert(JSON.stringify(response));
            $('#brand_imageError').text(response.responseJSON.errors.brand_image);
            $('#brand_logoError').text(response.responseJSON.errors.brand_logo);
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