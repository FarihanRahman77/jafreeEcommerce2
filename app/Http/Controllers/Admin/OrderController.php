<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteOrder;
use App\Models\WebsiteOrderDetails;
use App\Models\paymentVoucher;
use App\Models\ShopSetting;
use Carbon\Carbon;
use DB;
use PDF;

class OrderController extends Controller
{
    public function orderList(){
        $orders = WebsiteOrder::orderBy('id','desc')->get();
        return view('admin.home.order.order-list',['orders' => $orders]);
    }

    public function orderView($id){
       $order = WebsiteOrder::find($id);
       if($order->status =='Pending'){
            $order->status='Seen';
            $order->seen_datetime=date('Y-m-d h:i:s');
            $order->seen_by=auth()->user()->id;
            $order->save();
       }
        $invoice = DB::table('website_order_details')
                    ->leftjoin('website_orders', 'website_order_details.order_id', '=', 'website_orders.id')
                    ->join('tbl_products', 'website_order_details.product_id', '=', 'tbl_products.id')
                    ->where('website_order_details.order_id','=',$id)
                    ->select('website_order_details.*',
                            'website_orders.name',
                            'website_orders.status',
                            'website_orders.order_datetime',
                            'website_orders.order_no', 
                            'website_orders.address', 
                            'website_orders.email',
                            'website_orders.mobile',
                            'tbl_products.productName', 
                            'tbl_products.productImage',
                            'tbl_products.modelNo',
                            )
                    ->get();
        
        
        return view('admin.home.order.order-invoice',compact('invoice','order'));

    }

    public function orderReply(Request $request){
        $order = WebsiteOrder::find($request->order_id);
            if($order->status =='Seen'){
                $order->reply=$request->reply;
                $order->status='Replied';
                $order->reply_datetime=date('Y-m-d h:i:s');
                $order->replied_by=auth()->user()->id;
                $order->save();
                return redirect()->back()->with('message','Reply sent successfully');
            }
       
    }



    public function createPDF($id) {
        
        $invoice = DB::table('order_details')
                    ->join('orders', 'order_details.order_id', '=', 'orders.id')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->join('products', 'order_details.products_id', '=', 'products.id')
                    ->leftJoin('productspecifications', 'order_details.specification_id', '=', 'productspecifications.id')
                    ->leftJoin('location_carring_costs', 'orders.location_carring_cost_id', '=', 'location_carring_costs.id')
                    ->where('order_details.order_id','=',$id)
                    ->select('order_details.*','orders.full_name','orders.payment_status','orders.status','orders.created_at','orders.grand_total','orders.order_number', 'orders.address', 'orders.city', 'orders.phone_number' ,'users.phone', 'users.email', 'products.productName', 'products.productShortDescription', 'products.productImage','products.amount','location_carring_costs.cost as shipping_cost', 'productspecifications.specificationName')
                    ->get();
  
        $settings = ShopSetting::orderby('id','desc')->where('deleted','No')->get();
        
        $pdf = PDF::loadView('admin.home.order.pdf_view', compact('invoice','settings'));
        return $pdf->stream('pdf_file.pdf', array("Attachment" => false));
    }

    public function orderPayment(Request $request){
        $paymentDate = date("Y-m-d");
        $order = Orders::find($request->id);
        $order->payment_status = "paid";
        $order->payment_date = $paymentDate;
        $order->save();
        
        $paymentVoucher = new paymentVoucher();
        $paymentVoucher->tbl_partyId = $order->user_id;
        $paymentVoucher->amount = $order->net_payable;
        $paymentVoucher->paymentMethod = 'Cash';
        $paymentVoucher->paymentDate = $paymentDate;
        $paymentVoucher->status = 'Active';
        $paymentVoucher->type = 'paymentReceived';
        $paymentVoucher->voucherType = 'partySale';
        $paymentVoucher->tbl_sales_id = $request->id;
        $paymentVoucher->customerType = 'Party';
        $paymentVoucher->entryBy = auth()->user()->id;
        $paymentVoucher->save();
        return redirect()->back()->with('message','payment received successfully');
    }
      public function confirmOrder($id){
        $processingDate = date("Y-m-d");
        $order = Orders::find($id);
        $order->status = "processing";
        $order->processing_date = $processingDate;
        $payableAmount = $order->grand_total;
        $partyId = $order->user_id;
        $order->save();
        
        $paymentVoucher = new paymentVoucher();
        $paymentVoucher->tbl_partyId = $partyId;
        $paymentVoucher->amount = $payableAmount;
        $paymentVoucher->paymentMethod = 'Cash';
        $paymentVoucher->paymentDate = $processingDate;
        $paymentVoucher->status = 'Active';
        $paymentVoucher->type = 'partyPayable';
        $paymentVoucher->voucherType = 'partySale';
        $paymentVoucher->tbl_sales_id = $id;
        $paymentVoucher->customerType = 'Party';
        $paymentVoucher->entryBy = auth()->user()->id;
        $paymentVoucher->save();
        
        return redirect()->back()->with('message','Order accepted successfully');
     }

     public function cancelOrder($id){
         
        $processingDate = date("Y-m-d");
        $order = Orders::find($id);
        $orderStatus=$order->status;
        $order->status = "decline";
        $order->cancel_date = $processingDate;
        $order->save();
        if($orderStatus!='pending'){
            $paymentVoucher = paymentVoucher::where('tbl_sales_id',$id)->first();
            $paymentVoucher->deleted='Yes';
            $paymentVoucher->deletedDate=date("Y-m-d");
            $paymentVoucher->save();
        }
        
        
        
        return redirect()->back()->with('message','Order cancelled successfully');
     }

     public function completeOrder($id){
        $processingDate = date("Y-m-d");
        $order = Orders::find($id);
        $order->status = "completed";
        $order->complete_date = $processingDate;
        $order->save();
        return redirect()->back()->with('message','Order completed successfully');
     }
}
