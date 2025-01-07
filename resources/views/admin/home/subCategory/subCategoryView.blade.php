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
                        <li class="breadcrumb-item active"><a href="{{url('/category/view')}}">Create Sub-Category</a></li>
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
                            <a href="{{url('/sub-category/add')}}" class="btn btn-success btn-icon-split">
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
                                        <th>Sub Category name</th>
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
      // $(document).ready(function() {
      //   table = $('#manageSubCategoryTable').DataTable({
      //     'ajax': "{{url('/sub-category/getData')}}",
      //     processing:true,
      // });
        $.ajax({
                url:"{{url('/sub-category/getData')}}",
                method:"GET",
                contentType: false,
                processData: false,
                success:function(result){
                    alert(JSON.stringify(result));
                  
              }, error: function(response) {
                
                   alert(JSON.stringify(response));
                
              }, beforeSend: function () {
                  $('#loading').show();
              },complete: function () {
                  $('#loading').hide();
              }

          })
	});
		
        $("#brandForm").submit(function (e){
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