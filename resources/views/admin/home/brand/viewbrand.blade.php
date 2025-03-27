@extends('admin.master')
@section('title')
{{$settings->website_name}}-Brand List
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')

<style type="text/css">

    h3{
        color: #66a3ff;
    }
</style>
    <div class="content-wrapper">
        <section class="content box-border">
            <div class="card">
                <div class="card-header">
                            <h3 style="float:left;"> Brand List </h3>
                            <br>
                            <h5 class="text-success" id="success-alert"></h5>
                            <!-- <a class="btn btn-primary float-right" onclick="create()"><i class="fa fa-plus circle"></i> Add Brand</a>
                            <a class="btn btn-primary" style="margin-left:20px;" onclick="reloadDt()"><i class="fas fa-sync"></i> Refresh</a> -->
                </div><!-- /.card-header -->
                <div class="card-body">
                            <div class="col-md-12">


                                <!--data listing table-->
                                <table id="manageBrandTable" width="100%" class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <td width="6%">SL#</td>
                                            <td>Logo</td>
                                            <td>Image</td>
                                            <td>Brand Name</td>
                                            <td>Is Website</td>
                                            <td>Is Top</td>
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
                <h4 class="modal-title float-left"> Add Brand</h4>
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close" ></i></button>
            </div> 
            <div class="modal-body">
                <form id="brandForm" method="POST" enctype="multipart/form-data" action="#">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label> Brand Name <span class="text-danger"> * </span></label>
                        <input class="form-control input-sm" id="brandName" type="text" name="brandName" >
                        <span class="text-danger" id="brandNameError"></span>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="">Brand Logo</label>
                            <input type="file" name="brand_logo2" id="brand_logo2" class="form-control form-control-sm">
                            <span class="text-danger" id="brand_logo2Error"></span>
                        </div>
                        <div class="col-md-4">
                            <img id="showImage" src="{{asset('brandLogo/no_image.png')}}" style="width: 70px;height: 80px; border:1px solid #000000">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">X Close</button>
                        <button type="submit" class="btn btn-primary btnSave" id="saveCategory"><i class="fa fa-save"></i> Save</button>
                </form> </div>
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
                <button type="button" class="close"data-dismiss="modal" aria-hidden="true"><i class="fas fa-window-close" ></i></button>
            </div> 
            <div class="modal-body">
                <form id="editBrandForm" method="POST" enctype="multipart/form-data" action="#">
                    @csrf

                    <input type="hidden" name="editId" id="editId">
                    <div class="form-group row">
                        
                        <div class="col-md-6">
                            <label> Is Top</label>
                            <select id="is_top" name="is_top" class="form-control input-sm">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Top Priority <span class="text-danger"> * </span></label>
                            <input class="form-control input-sm" id="top_priority" type="number" name="top_priority" value="0">
                            <span class="text-danger" id="top_priorityError"></span>
                        </div>
                        <div class="col-md-6">
                            <label> Is Website</label>
                            <select id="is_website" name="is_website" class="form-control input-sm">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="">Image</label>
                            <input type="file" name="brand_Image" id="brand_image" class="form-control form-control-sm">
                            <span class="text-danger" id="brand_ImageError"></span>
                        </div>
                        <div class="col-md-4" >
                            <img id="imgPreview" src="{{url('brandLogo/no_image.png')}}"style="width: 70px;height: 80px; border:1px solid #000000" /><br>
                                <a href="#" onclick="removeImage()" style="margin-left:20px;"> <i class="fas fa-trash-alt"></i> Remove Image</a>
                            <input type="hidden" id="removeImage" name="removeImage" value="" />
                        </div>
                        <div class="col-md-8">
                            <label for="">Logo</label>
                            <input type="file" name="brand_logo" id="brand_logo" class="form-control form-control-sm">
                            <span class="text-danger" id="brand_logoError"></span>
                        </div>
                        <div class="col-md-4" >
                            <img id="logoPreview" src="{{url('brandLogo/no_image.png')}}"style="width: 70px;height: 80px; border:1px solid #000000" /><br>
                                <a href="#" onclick="removeLogo()" style="margin-left:20px;"> <i class="fas fa-trash-alt"></i> Remove Image</a>
                            <input type="hidden" id="removeLogo" name="removeLogo" value="" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">X Close</button>
                        <button type="submit" class="btn btn-primary btnUpate" id="editCategory"><i class="fa fa-save"></i> Update</button>
                </form> </div>
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
          //$(".btnSave").show();
      }
	$('#modal').on('shown.bs.modal', function() {
		$('#name').focus();
	})
	$('#editModal').on('shown.bs.modal', function() {
		$('#editName').focus();
	})
	var table;
	$(document).ready(function() {
		table = $('#manageBrandTable').DataTable({
			'ajax': "{{route('brands.getBrands')}}",
			processing:true,
		});
	});
		
        $("#brandForm").submit(function (e){
           // alert("calling");
          e.preventDefault();
          clearMessages();
          var brandName = $("#brandName").val();
          var brand_logo = $('#brand_logo')[0].files[0];
          var _token = $('input[name="_token"]').val();
          var fd = new FormData();
          fd.append('brandName',brandName);
          fd.append('brand_logo',brand_logo);
          fd.append('_token',_token);
          $.ajax({
                url:"{{ route('brands.store')}}",
                method:"POST",
                data:fd,
                contentType: false,
                processData: false,
                success:function(result){
                    
                    alert(JSON.stringify(result));
                  $("#modal").modal('hide');
                  Swal.fire("Brand Saved!",result.success,"success");
                  table.ajax.reload(null, false);
              }, error: function(response) {
                console.log(response);
                   alert(JSON.stringify(response));
                $('#brandNameError').text(response.responseJSON.errors.brandName);
                $('#brand_logoError').text(response.responseJSON.errors.brand_logo);
              }, beforeSend: function () {
                  $('#loading').show();
              },complete: function () {
                  $('#loading').hide();
              }

          })
        })
        function clearMessages(){
          $('#brandNameError').text("");
          $('#brand_logoError').text("");
        }
        function editClearMessages(){
          $('#is_topError').text("");
          $('#is_websiteError').text("");
          $('#top_priorityError').text("");
          $('#brand_imgError').text("");
          $('#brand_logoError').text("");
        }
        function reset(){
          $("#brandName").val("");
          $("#brand_logo").val("")
          $('#showImage').attr('src',"");
        }
		function editReset(){
			$("#editName").val("");
			$("#editImage").val("");
			$('#editShowImage').attr('src',"");
			$("#removeImage").val("")
		}
        function editBrand(id){
			editReset();
			editClearMessages();
          $.ajax({
              url:"{{route('brands.edit')}}",
              method:"GET",
              data:{"id":id},
              datatype:"json",
              success:function(result){
                $("#editModal").modal('show');
                $("#is_website").val(result.is_website);
                $("#top_priority").val(result.top_priority);
                $("#is_top").val(result.is_top);
                var imageString = '{{asset("ecomas/images/brand")}}'+"/"+result.brand_image;
                $('#imgPreview').attr('src',imageString);
                var logoString = '{{asset("ecomas/images/brand")}}'+"/"+result.brand_logo;
                $('#logoPreview').attr('src',logoString);
                $("#editId").val(result.id);
                if(result.status != ""){
                  $("#editStatus").val(result.status);
                }else{
                  $("#editStatus").val("Inactive");
                }
              }, beforeSend: function () {
                  $('#loading').show();
              },complete: function () {
                  $('#loading').hide();
              }
          });
        }

        $("#editBrandForm").submit(function (e){
          e.preventDefault();
		  var is_website = $("#is_website").val();
		  var is_top = $("#is_top").val();
		  var top_priority = $("#top_priority").val();
          var brandImage = $('#brand_image')[0].files[0];
          var brandLogo = $('#brand_logo')[0].files[0];
          var _token = $('input[name="_token"]').val();
          var id = $("#editId").val();
          var fd = new FormData();
          fd.append('is_website',is_website);
          fd.append('is_top',is_top);
          fd.append('top_priority',top_priority);
          fd.append('brand_image',brandImage);
          fd.append('brand_logo',brandLogo);
          fd.append('id',id);
          fd.append('_token',_token);
          $.ajax({
              url:"{{route('brands.update')}}",
              method:"POST",
              data:fd,
              contentType: false,
              processData: false,
              success:function(result){
                //alert(JSON.stringify(result));
                $("#editModal").modal('hide');
                    $('#success-alert').text(result.success);
                  table.ajax.reload(null, false);
              }, error: function(response) {
               // alert(JSON.stringify(response));
                $('#brand_imageError').text(response.responseJSON.errors.brand_image);
                $('#brand_logoError').text(response.responseJSON.errors.brand_logo);
              }, beforeSend: function () {
                  $('#loading').show();
              },complete: function () {
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
                url:"{{route('brands.delete')}}",
                method: "POST",
                data: {"id":id, "_token":_token},
                success: function (result) {
                  // if(result == "Success"){
                    Swal.fire("Done!","Brand was succesfully deleted!","success");
                    table.ajax.reload(null, false);
                  // }else{
                  //   Swal.fire("Cancelled", result, "error");
                  // }
                }, error: function(response) {
                  Swal.fire("Cancelled", result, "error");
                  $('#editNameError').text(response.responseJSON.errors.name);
                  $('#editImageError').text(response.responseJSON.errors.image);
                }, beforeSend: function () {
                    $('#loading').show();
                },complete: function () {
                    $('#loading').hide();
                }
            });
        }else{
          Swal.fire("Cancelled", "Your imaginary Brand is safe :)", "error");
        }
      })
        
    }
	function removeImage(){
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
				$("#editShowImage").attr('src',"");
			}else{
			  Swal.fire("Cancelled", "Your image is safe :)", "error");
			}
        })
	}

	
	  
	  $('#brand_image').change(function(e){
		var reader =new FileReader();
		reader.onload =function(e){  
		  $('#imgPreview').attr('src',e.target.result);
		}
		reader.readAsDataURL(e.target.files['0']);
	  });
	  $('#brand_logo').change(function(e){
		var reader =new FileReader();
		reader.onload =function(e){  
		  $('#logoPreview').attr('src',e.target.result);
		}
		reader.readAsDataURL(e.target.files['0']);
	  });
	

	Mousetrap.bind('ctrl+shift+n', function(e) {
		e.preventDefault();
		if($('#modal.in, #modal.show').length){
			
		}else{
			create();
		}
	});
	function reloadDt(){
		if($('#modal.in, #modal.show').length){
			
		}else if($('#editModal.in, #editModal.show').length){
			
		}
		else{
			table.ajax.reload(null, false);
		}
	}
	Mousetrap.bind('ctrl+shift+r', function(e) {
		e.preventDefault();
		reloadDt();
	});
	Mousetrap.bind('ctrl+shift+s', function(e) {
		e.preventDefault();
		if($('#modal.in, #modal.show').length){
			$("#brandForm").trigger('submit');
		}else{
			alert("Not Calling");
		}
	});
	Mousetrap.bind('ctrl+shift+u', function(e) {
		e.preventDefault();
		if($('#editModal.in, #editModal.show').length){
			$("#editBrandForm").trigger('submit');
		}else{
			alert("Not Calling");
		}
	});
	Mousetrap.bind('esc', function(e) {
		e.preventDefault();
		if($('#editModal.in, #editModal.show').length){
			$("#editModal").modal('hide');
		}else if($('#modal.in, #modal.show').length){
			$('#modal').modal('hide');
		}
	});
    </script>



@endsection