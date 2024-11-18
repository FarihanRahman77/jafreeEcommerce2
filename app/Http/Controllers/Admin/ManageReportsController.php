<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\orders;
use App\Models\ShopSetting;
use Illuminate\Http\Request;
use DB;
use PDF;

class ManageReportsController extends Controller
{
    public function reportList()
    {
        return view('admin.home.manage-reports.report-list');
    }

    public function searchedOrderList(Request $request)
    {
        //return $request->all();
        //$date = $request->created_at->toDateString();
        $orders = DB::table('orders')
        ->join('users','orders.user_id','users.id')
        
        ->whereBetween('orders.created_at',[$request->from_date,$request->to_date])
        ->where('orders.status',$request->status)
        ->select('orders.*')
        ->get();

        $totalGrandTotal = 0;
        foreach($orders as $order){
            $grandTotal = $order->grand_total;
            $totalGrandTotal = $totalGrandTotal+$grandTotal;
        }

    
         //return $totalGrandTotal;
        // return $request->all();
        return view('admin.home.manage-reports.searched-order-list',['searchInformation'=>$request,'totalGrandTotal'=>$totalGrandTotal,'orders'=>$orders]);
    }

    public function createPDF(Request $request) {
        // retreive all records from db
        //$data = Employee::all();
        $orders = DB::table('orders')
        ->join('users','orders.user_id','users.id')
        
        ->whereBetween('orders.created_at',[$request->from_date,$request->to_date])
        ->where('orders.status',$request->status)
        ->select('orders.*')
        ->get();

        $totalGrandTotal = 0;
        foreach($orders as $order){
            $grandTotal = $order->grand_total;
            $totalGrandTotal = $totalGrandTotal+$grandTotal;
        }
  
        // share data to view
       // view()->share('employee',$data);
    //     $pdf = PDF::loadHTML('
    //     <div class="row">
    //     <div class="col-12 table-responsive">
    //       <table class="table table-striped">
    //         <thead>

    //           <tr>
    //             <th>#</th>
    //             <th>Order ID</th>
    //             <th>Customer Info</th>
    //             <th>Grand Total</th>
    //             <th>Delivery Location</th>
    //             <th>Order Date</th>

    //           </tr>
    //         </thead>
    //         <tbody>
    //           @php($i = 1)
    //           @foreach ($orders as $order)

             
    //           <tr>
    //             <td>{{ $i++ }}</td>
    //             <td>{{ $order->order_number }}</td>
    //             <td>{{ $order->full_name }}<br>
    //               {{ $order->phone_number }}
    //             </td>
    //             <td>{{ $order->grand_total }}</td>
    //             <td>{{ $order->address }}, {{ $order->city }}</td>
    //             <td>{{ \Carbon\Carbon::parse($order->created_at)->format("d/m/Y") }}</td>
    //           </tr>
              
    //           @endforeach
              
    //         </tbody>
    //       </table>
    //     </div>
    //     <!-- /.col -->
    //   </div>
    //   <!-- /.row -->
      
    //   <div class="row">
    //     <!-- accepted payments column -->
    //     <div class="col-6">
          
    //     </div>
    //     <!-- /.col -->
    //     <div class="col-6">
          
    //       <div class="table-responsive">
    //         <table class="table">
              
              
             
    //           <tr>
    //             <th>Total:</th>
    //             <td>{{$totalGrandTotal}} TK</td>
    //           </tr>
    //         </table>
    //       </div>
    //     </div>
    //     <!-- /.col -->
    //   </div>
    //     ');
    $settings = ShopSetting::orderby('id','desc')->where('deleted','No')->get();
    
    $pdf = PDF::loadView('admin.home.manage-reports.pdf_view', compact('totalGrandTotal','orders','settings'));
        
        // download PDF file with download method
        return $pdf->stream();
      }
}
