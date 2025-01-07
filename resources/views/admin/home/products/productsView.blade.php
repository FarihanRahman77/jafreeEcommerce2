@extends('admin.master')
@section('title')
{{$settings->website_name}}-Product view
@endsection
<link rel="icon" type="image/png" href="{{asset('website/images/setting/'.$settings->image)}}">
@section('content')

<div class="content-wrapper">
    <section class="content-header" style="padding: 0px 1.0rem;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{url('/products/view')}}">Product List</a></li>
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
                        
                        <div class="card-header row">
                            <div class="col-md-3"> <h3>Product List</h3></div>
                            
                            <div class="form-group float-right col-md-1">
                                <label class="col-form-label">Show In Website</label>
                                <select class="form-control"  id="is_website" name="is_website" style="width:100%;" onchange="loadFilterDatatable('is_website')">
                                    <option value='' selected>Show In Website</option>
                                    <option value='Yes'> Yes </option>
                                    <option value='No'> No </option>
                                </select>
                            </div>
                            <div class="form-group float-right col-md-1">
                                <label class="col-form-label">Featured</label>
                                <select class="form-control"  id="featured" name="featured" style="width:100%;" onchange="loadFilterDatatable('featured')">
                                    <option value='' selected>Featured</option>
                                    <option value='Yes'> Yes </option>
                                    <option value='No'> No </option>
                                </select>
                            </div>
                            <div class="form-group float-right col-md-1">
                                <label class="col-form-label">Best Selling</label>
                                <select  class="form-control" id="best_selling" name="best_selling" style="width:100%;" onchange="loadFilterDatatable('best_selling')">
                                    <option value='' selected>Best Selling</option>
                                    <option value='Yes'> Yes </option>
                                    <option value='No'> No </option>
                                </select>
                            </div>
                            <div class="form-group float-right col-md-1">
                                <label class="col-form-label">New Arrival</label>
                                <select  class="form-control" id="new_arrival" name="new_arrival" style="width:100%;" onchange="loadFilterDatatable('new_arrival')">
                                    <option value='' selected>New Arrival</option>
                                    <option value='Yes'> Yes </option>
                                    <option value='No'> No </option>
                                </select>
                            </div>
                            <div class="form-group float-right col-md-1">
                                <label class="col-form-label">Top Rated</label>
                                <select  class="form-control" id="top_rated" name="top_rated" style="width:100%;" onchange="loadFilterDatatable('top_rated')">
                                    <option value='' selected>Top Rated</option>
                                    <option value='Yes'> Yes </option>
                                    <option value='No'> No </option>
                                </select>
                            </div>
                            <div class="form-group float-right col-md-1">
                                <label class="col-form-label">Special Offer</label>
                                <select  class="form-control" id="special_offer" name="special_offer" style="width:100%;" onchange="loadFilterDatatable('special_offer')">
                                    <option value='' selected>Special Offer</option>
                                    <option value='Yes'> Yes </option>
                                    <option value='No'> No </option>
                                </select>
                            </div>
                            <div class="col-md-4"> <h3 class="text-center text-success">{{Session::get('message')}}</h3></div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tbl_product" class="table table-bordered table-striped dt_view">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Model</th>
                                        <th>Website Info</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
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

        $("#is_website").val('Yes');
        

        var table;
        $(document).ready(function() {

            loadFilterDatatable();

        });

    function loadFilterDatatable(filterBy = '') {
        //alert(filterBy);
        if(filterBy === 'is_website'){
            $('#best_selling').val('');
            $('#top_rated').val('');
            $('#new_arrival').val('');
            $('#special_offer').val('');
            $('#featured').val('');
        }
        if(filterBy === 'featured'){
            $('#is_website').val('');
            $('#best_selling').val('');
            $('#top_rated').val('');
            $('#new_arrival').val('');
            $('#special_offer').val('');
        }
        if(filterBy === 'best_selling'){
            $('#featured').val('');
            $('#top_rated').val('');
            $('#new_arrival').val('');
            $('#special_offer').val('');
            $('#is_website').val('');
        }
        if(filterBy === 'top_rated'){
            $('#featured').val('');
            $('#best_selling').val('');
            $('#new_arrival').val('');
            $('#special_offer').val('');
            $('#is_website').val('');
        }
        if(filterBy === 'new_arrival'){
            $('#featured').val('');
            $('#best_selling').val('');
            $('#top_rated').val('');
            $('#special_offer').val('');
            $('#is_website').val('');
        }
        if(filterBy === 'special_offer'){
            $('#featured').val('');
            $('#best_selling').val('');
            $('#top_rated').val('');
            $('#new_arrival').val('');
            $('#is_website').val('');
        }

        const is_website = $("#is_website").val();
        const featured = $("#featured").val();
        const best_selling = $("#best_selling").val();
        const top_rated = $("#top_rated").val();
        const new_arrival = $("#new_arrival").val();
        const special_offer = $("#special_offer").val();

        var filter = is_website + "@" + featured + "@" + best_selling +  "@" + new_arrival + "@" + top_rated + "@" + special_offer;
       // alert(filter);
        
        table = $('#tbl_product').DataTable({
                'ajax': `{{ url('/products/get/data/${filter}') }}`,
                processing: true,
                destroy: true,
            });
        }


        function edit(id){
            window.open("{{url('/products/edit/')}}"+"/"+id);
        }
  </script>
@endsection