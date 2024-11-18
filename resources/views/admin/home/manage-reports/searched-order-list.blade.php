@extends('admin.master')
@section('title')
Admin Order Report
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"  style="padding: 0px 1.0rem;">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a> / <a href="{{url('/manage-reports')}}">Search Report</a></li>
            <li class="breadcrumb-item active">Invoice</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">



          <!-- Main content -->
          <div class="invoice">
            <!-- title row -->
            <div class="row">
              <div class="col-12">

                <h3 class="text-center text-success">{{ Session::get('message') }}</h3>


                <h4>
                  @foreach ($orders as $order)
                  {{ ucfirst($order->status) }} Orders - 
                  {{Carbon\Carbon::now()->format('d/m/Y')}}
                  @break
                  @endforeach

                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
          
            <!-- /.row -->

            <!-- Table row -->
            <br>
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>

                    <tr>
                      <th>SL#</th>
                      <th>Order ID</th>
                      <th>Order Date</th>
                      <th>Delivery Location</th>
                      <th>Customer Info</th>
                      <th>Total</th>
                      
                      

                    </tr>
                  </thead>
                  <tbody>
                    @php($i = 1)
                    @foreach ($orders as $order)

                   
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $order->order_number }}</td>
                      <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                      <td>{{ $order->address }}, {{ $order->city }}</td>
                      <td>{{ $order->full_name }}<br>
                        {{ $order->phone_number }}
                      </td>
                      <td>{{ $order->grand_total }}</td>
                      
                      
                    </tr>
                    
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            
            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                
              </div>
              <!-- /.col -->
              <div class="col-6">
                
                <div class="table-responsive">
                  <table class="table">
                    
                    
                   
                    <tr>
                        <td></td>    
                        <td>
                            <form action="{{route('order-report-pdf')}}" method="post">
                            @csrf
                            <input type="hidden" name="status" value="{{$searchInformation->status}}">
                            <input type="hidden" name="from_date" value="{{$searchInformation->from_date}}">
                            <input type="hidden" name="to_date" value="{{$searchInformation->to_date}}">
                            <input type="submit" class="fas fa-download" target="_blank" value="Generate PDF">
                            </form>
                        </td>    
                        <td></td>    
                        <td></td>   
                        <td>Grand Total:</td>
                        <td>{{$totalGrandTotal}} TK</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                
                {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"> --}}
                
                  {{-- <a href="" class="btn btn-primary float-right" style="margin-right: 5px;"> --}}
                    
                  {{-- <i class="fas fa-download"></i> Generate PDF --}}
                    </form>
                {{-- </a> --}}
                
               
                {{-- </button> --}}
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
