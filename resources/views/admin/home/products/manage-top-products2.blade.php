@extends('admin.master')
@section('title')
Admin Products-View
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
            <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Create Products</a></li>
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
               <div class="col-md-4"> <h3>Manage Key Products</h3></div>
               <div class="col-md-5"><h3 class="text-center text-success">{{Session::get('message')}}<span id="form_result"></span></h3></div>
                <div class="col-md-3 text-right">
                    <a href="#" class="btn btn-success btn-icon-split modalButton" data-toggle="modal" data-target="#topProductsModal">
                      <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                      </span>
                      <span class="text">Manage Key Products</span>
                    </a>
                    
                </div>
            </div>    
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped dt_view" id="top_products_table">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Sub-Category</th>
                  <th>Name</th>
                  <th>Top Status</th>
                  <th>Action</th>

                </tr>
              </thead>

              
              </table>

              <div class="modal fade" id="topProductsModal" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form method="post" id="sample_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Select Key Product</h5>
                            <button type="button" class="close" data-dismiss="modal"aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            {{-- <select class="form-control dynamic topProduct" data-dependent="subCategoryName" id="CategoryName" name="CategoryName" >
                            <option value="" selected>~~ Select Product ~~</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->productName}}</option>
                            @endforeach
                            </select> --}}
                            <select class="form-control dynamic topProduct"  name="id" >
                                <option value="" selected>~~ Select Product ~~</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->productName}} ({{$product->categoryName}}->{{$product->subCategoryName}})</option>
                                    @endforeach
                            </select>
                            
                            <br>
                            <select name="is_top" class="form-control">
                                <option value="" >Select Top Product Status</option>
                                <option value="on">On</option>
                                <option value="off">Off</option>
                            </select>
                        </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-secondary"
                 data-dismiss="modal">Close
               </button>
               {{-- <button type="submit" class="btn btn-primary">Save changes
               </button> --}}
               <input type="hidden" name="action" id="action" />

               <input type="submit" class="btn btn-primary" value="Save">
             </div>
           </form>
         </div>
       </div>
     </div>


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
  $(document).ready(function(){


        //select2 top products
        $(".topProduct").select2( {
          placeholder: "Select Product",
          allowClear: true
        }); 
        $("#top_products_table").dataTable().fnDestroy();

        $('#top_products_table').DataTable({
          processing: true,
          serverSide: true,
          ajax:{
           url: "{{ route('manage-top-products') }}",
         },
         columns:[
         {
          data: 'categoryName',
          name: 'categoryName'
        },
         {
          data: 'subCategoryName',
          name: 'subCategoryName'
        },
         {
          data: 'productName',
          name: 'productName'
        },
        {
          data: 'is_top',
          name: 'is_top'
        },
        {
          data: 'action',
          name: 'action'
        }
        ]
      });

        $('#sample_form').on('submit', function(event){
          event.preventDefault();
          $('#topProductsModal').modal('hide');
//   $(".topProduct").val('').trigger('change');

$.ajax({
  url:"{{ route('update-top-product') }}",
  method:"POST",
  data: new FormData(this),
  contentType: false,
  cache:false,
  processData: false,
  dataType:"json",
  success:function(data)
  {
   var html = '';
   if(data.errors)
   {
    html = '<div class="alert alert-danger mt-2">';
    for(var count = 0; count < data.errors.length; count++)
    {
     html += '<p>' + data.errors[count] + '</p>';
   }
   html += '</div>';
   $('#form_result').html(html);

 }
 if(data.success)
 {
  html = '<div class="alert alert-success mt-2">' + data.success + '</div>';
    //   html = '<h3 class="text-center text-success">'+ data.success + '</h3>'
    $('#sample_form')[0].reset();

    $('#top_products_table').DataTable().ajax.reload();
    $('#form_result').html(html);
    $(".topProduct").val('').trigger('change');

  }
}
});


});



      });
function removeTopProducts(id){
    if (confirm('Are you sure to remove key product')) {
        var _token="{{ csrf_token() }}";
        $.ajax({
          url:"{{route('remove-top-product')}}",
          method:"POST",
          data: {id:id, _token:_token},
          cache:false,
          dataType:"json",
          success:function(data)
          {
           //   alert(JSON.stringify(data));
           var html = '';
           if(data.errors)
           {
            html = '<div class="alert alert-danger mt-2">';
            for(var count = 0; count < data.errors.length; count++)
            {
             html += '<p>' + data.errors[count] + '</p>';
           }
           html += '</div>';
           $('#form_result').html(html);
        
         }
         if(data.success)
         {
          html = '<div class="alert alert-success mt-2">' + data.success + '</div>';
            //   html = '<h3 class="text-center text-success">'+ data.success + '</h3>'
            $('#sample_form')[0].reset();
        
            $('#top_products_table').DataTable().ajax.reload();
            $('#form_result').html(html);
            $(".topProduct").val('').trigger('change');
        
          }
        },
      error: function (xhr) {
        alert(JSON.stringify(xhr));
      }
        });
    }    
}
    </script>
    @endsection