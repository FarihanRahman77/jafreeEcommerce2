<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Orders;
use App\Users;
use App\Models\ShopSetting;
use Illuminate\Support\Facades\Auth;
use DB;

class userController extends Controller
{
    public function index(){
       $totalOrders = Orders::where('user_id',Auth::user()->id)->SelectRaw('status,count(id) as totalOrder')->GroupBy('status')->get();
      // dd($totalOrders);
       $totalCount = 0;
       $pendingOrders = 0;
       $completedOrders = 0;
       $declineOrders = 0;
       $processingOrders=0;
       foreach($totalOrders as $totalOrder){
           if($totalOrder->status=='pending'){
               $pendingOrders=$totalOrder->totalOrder;
               $totalCount +=  $pendingOrders;
           }
           else if($totalOrder->status=='completed'){
               $completedOrders=$totalOrder->totalOrder;
               $totalCount +=  $completedOrders;
           }
           else if($totalOrder->status=='decline'){
               $declineOrders=$totalOrder->totalOrder;
               $totalCount +=  $declineOrders;
           }
           else if($totalOrder->status=='processing'){
               $processingOrders=$totalOrder->totalOrder;
               $totalCount +=  $processingOrders;
           }
        }
        return view('frontEnd.home.userDashboard',compact('pendingOrders','completedOrders','declineOrders','processingOrders','totalCount'));
    }

    public function allOrders($id){
        $orders=0;
        if($id=='all'){
        $orders = Orders::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        //$totalOrders = count($orders);
        }
        else if($id=='pending'){
            $orders = Orders::where('user_id',Auth::user()->id)->where('status','=','pending')->orderBy('id','desc')->get();
        }
        else if($id=='decline'){
            $orders = Orders::where('user_id',Auth::user()->id)->where('status','=','decline')->orderBy('id','desc')->get();
        }
        else if($id=='processing'){
            $orders = Orders::where('user_id',Auth::user()->id)->where('status','=','processing')->orderBy('id','desc')->get();
        }
        else if($id=='completed'){
            $orders = Orders::where('user_id',Auth::user()->id)->where('status','=','completed')->orderBy('id','desc')->get();
        }
        
        $allOrders = Orders::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        $totalOrders = count($allOrders);
        
        $allpendingOrders = Orders::where('user_id', Auth::user()->id)->where('status','=','pending')->get();
        $pendingOrders = count($allpendingOrders);
        
        $alldeclineOrders = Orders::where('user_id', Auth::user()->id)->where('status','=','decline')->get();
        $declineOrders = count($alldeclineOrders);
        
        $allprocessingOrders = Orders::where('user_id', Auth::user()->id)->where('status','=','processing')->get();
        $processingOrders = count($allprocessingOrders);
        
        $allCompletedOrders = Orders::where('user_id', Auth::user()->id)->where('status','=','completed')->get();
        $completedOrders = count($allCompletedOrders);

        return view('frontEnd.home.dashboard.all-orders',compact('orders','totalOrders','pendingOrders','processingOrders','declineOrders','completedOrders'));

    }

    public function completedOrders(){

        $orders = Orders::where('user_id',Auth::user()->id)->where('status','=','completed')->get();

        $order = Orders::where('user_id',Auth::user()->id)->get();

        $totalOrders = count($order);

        $allCompletedOrders = Orders::where('user_id',Auth::user()->id)->where('status','=','completed')->get();

        $completedOrders = count($allCompletedOrders);


        return view('frontEnd.home.dashboard.completed-orders',compact('orders','totalOrders','completedOrders'));

    }

    public function orderInvoice($id){

        //$invoice = OrderDetails::find($id);

// $user = DB::table('orders')
// ->join('users', 'orders.user_id', '=', 'users.id')
// ->join('order_details', 'order_details.order_id', '=', 'orders.id')
// ->select('orders.*','users.phone', 'users.email')
// ->where('order_details.order_id','=',$id)
// ->get();

//return $user;

        $invoice = DB::table('order_details')
                    ->join('orders', 'order_details.order_id', '=', 'orders.id')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->join('products', 'order_details.products_id', '=', 'products.id')
                    ->join('productspecifications', 'order_details.specification_id', '=', 'productspecifications.id')
                    ->join('location_carring_costs', 'orders.location_carring_cost_id', '=', 'location_carring_costs.id')
                    ->where('order_details.order_id','=',$id)
                    ->select('order_details.*','orders.full_name','orders.status','orders.created_at','orders.grand_total','orders.order_number', 'orders.address', 'orders.city', 'orders.phone_number' ,'users.phone', 'users.email', 'products.productName', 'products.productShortDescription', 'products.productImage','products.amount','location_carring_costs.cost as shipping_cost', 'productspecifications.specificationName')
                    ->get();

        //return $invoice;
        $settings = ShopSetting::orderby('id','desc')->where('deleted','No')->get();
        return view('frontEnd.home.dashboard.order-invoice',compact('invoice','settings'));

    }

    public function changePassword(){
        return view('frontEnd.home.dashboard.changePassword');
    }

    public function updatePassword(Request $request){

        //return $request->all();
        $user = Users::find($request->id);
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;

        $userPassword = $user->password;

        //return $oldPassword; if(password_verify($oldPassword, $userPassword))

        if(password_verify($oldPassword, $userPassword)){
            if(strcmp( $newPassword,$confirmPassword) == 0){
                $user->password = bcrypt($newPassword);
                $user->save();
                return redirect()->back()->with('message','Password successfully saved');;
            }else{
                return redirect()->back()->with('error','Current password and confirm password not matched');
            }
        }
        else{
            return redirect()->back()->with('error','Old Password not matched');
        }
    }

    public function viewProfile(){
        return view('frontEnd.home.dashboard.userProfile');
    }

    public function editProfile(){
        return view('frontEnd.home.dashboard.editRegister');

    }

    public function updateProfile(Request $request){

        $user = Users::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;

        $user->save();
        return redirect()->back()->with('message','Profile updated successfully');

    }

    public function cancelOrder(Request $request){
//dd($request->id);
        $order = Orders::find($request->id);
        $order->user_status = "decline";
        $order->user_remarks = $request->user_remarks;
        $order->save();
        return redirect()->back();

    }

    public function messagePortal(){

        $messages = ContactUs::where('sender_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('frontEnd.home.dashboard.message-list',compact('messages'));
    }
    
    public function paymentHistory(){
        $paymentHistory = DB::table('payment_vouchers')
            ->join('orders', 'payment_vouchers.tbl_sales_id', '=', 'orders.id')
            ->join('users', 'payment_vouchers.tbl_partyId', '=', 'users.id')
            ->where('payment_vouchers.tbl_partyId','=',Auth::user()->id)
            ->orderBy ('payment_vouchers.id','ASC')
            ->select('payment_vouchers.id','payment_vouchers.tbl_partyId','users.name','payment_vouchers.amount','payment_vouchers.type','payment_vouchers.tbl_sales_id','orders.order_number','payment_vouchers.paymentDate')
            ->get();
           // dd($paymentHistory);
        return view('frontEnd.home.dashboard.payment-history',compact('paymentHistory'));
    }
}
