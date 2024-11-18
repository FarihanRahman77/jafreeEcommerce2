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
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            <div class="card-header d-flex justify-content-end">
                <h3>Manage Top Products</h3>
              <a href="#" class="btn btn-success btn-icon-split modalButton" data-toggle="modal" data-target="#exampleModal">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Products</span>
              </a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped dt_view" id="top_products_table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($topProducts as $product)
                  <tr>

                    <td>{{$product->id}}</td>
                    <td>{{$product->productName}}</td>
                    <td><img src = "{{ asset('/productImage/'.$product->productImage) }}" width="110" height="90" /></td>
                    <td>{{$product->productStatus}}</td>
                    <td>{{$product->created_at}}</td>
                    <td style="width: 12%;">
                      {{-- <a href="{{url('/products/edit/'.$product->id)}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a> --}}
                      <a href="{{route('remove-top-product',['id'=>$product->id])}}" class="btn btn-danger btn-sm "
                        title="Edit"
                        onclick="return confirm('Are you sure you want to remove this item from Top Products list?');"><i class="fas fa-trash"></i></a>
                      </td>

                    </tr>@endforeach
                  </tbody>
                </table>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <form action="{{route('update-top-product')}}" method="post">
                     <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Are you sure to
                       proceed?</h5>
                       <button type="button" class="close" data-dismiss="modal"
                       aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     @csrf


                     <select class="form-control dynamic topProduct"  name="id" >
                      <option value="" selected>~~ Select Product ~~</option>
                      @foreach($nonTopProducts as $product)
                      <option value="{{$product->id}}">{{$product->productName}}</option>
                      @endforeach
                    </select>
                    {{-- <select class="form-control dynamic topProduct" data-dependent="subCategoryName" id="CategoryName" name="CategoryName" >
                      <option value="" selected>~~ Select Product ~~</option>
                      @foreach($products as $product)
                      <option value="{{$product->id}}">{{$product->productName}}</option>
                      @endforeach
                    </select> --}}
                    <br>
                    {{-- <select name="is_top" class="form-control">
                      <option >Select Top Product Status</option>
                      <option value="on">On</option>
                      <option value="off">Off</option>
                      
                    </select> --}}
                  </div>
                  <div class="modal-footer">
                   <button type="button" class="btn btn-secondary"
                   data-dismiss="modal">Close
                 </button>
                 <button type="submit" class="btn btn-primary">Save changes
                 </button>
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
        //select2 top products
        $(".topProduct").select2( {
          placeholder: "Select Product",
          allowClear: true
        }); 

      </script>
      @endsection