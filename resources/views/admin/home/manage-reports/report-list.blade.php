@extends('admin.master')
@section('title')
Admin Manage Reports
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
                        <li class="breadcrumb-item active"><a href="{{url('/manage-reports')}}">Search Reports</a></li>
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
                        <div class="card-header">
                            <span class="text">Order Reports</span>
                        </div>
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        
                                <form action="{{route('searched-order-list')}}" method="post">
                                    @csrf
                                    <div class="col-md-12 row">
                                        <div class="col-md-3 form-group">
                                            <label for="inputEmail4">Status</label>
                                            <select name="status" class="form-control" aria-label="Default select example">
                                              <option selected>Select Status</option>
                                              <option value="all">All</option>
                                              <option value="pending">Pending</option>
                                              <option value="processing">Processing</option>
                                              <option value="completed">Completed</option>
                                              <option value="decline">Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="inputEmail4">From Date</label>
                                            <input name="from_date" type="date" class="form-control" id="inputEmail4" placeholder="Email">
                                        </div>
                                          <div class="form-group col-md-3">
                                              <label for="inputPassword4">To Date</label>
                                              <input type="date" class="form-control" id="inputPassword4" placeholder="Password" name="to_date">
                                          </div>
                                      <div class="form-group col-md-3">
                                          <input type="submit" style="margin-top: 12%;" class="form-control btn btn-primary" id="inputPassword4" value="Search">
                                      </div>
                                      
                                  </div>
                                </form>
                              
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