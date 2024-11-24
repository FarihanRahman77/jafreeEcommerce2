<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\message;
use DB;
class MessageController extends Controller
{
    public function messageList(){

        //$orders = Orders::all();
        $messages = DB::table('tbl_message')
            ->select('tbl_message.*')
            ->orderBy('id','desc')
            ->get();

        //return $messages;
        return view('admin.home.message-portal.message-list',['messages' => $messages]);
    }
    public function savemessage(Request $request){
      
        $request->validate([
            'name' => 'required|max:255|unique:tbl_message,name|regex:/^([a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+\s)*[a-zA-Z0-9_ "\.\-\s\,\;\:\/\&\$\%\(\)]+$/u'
          ]);

        $message = new message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->mobile = $request->mobile;
        $message->text = $request->text;
        $message->created_date = date('Y-m-d H:i:s');
        $message->save();
        return response()->json(['success'=>'Message saved successfully']);
    }
}
