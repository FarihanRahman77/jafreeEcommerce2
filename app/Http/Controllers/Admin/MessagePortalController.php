<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use DB;

class MessagePortalController extends Controller
{
    public function messageList(){

        //$orders = Orders::all();
        $messages = DB::table('contact_us')
            ->leftJoin('users', 'contact_us.sender_id', '=', 'users.id')
            ->select('contact_us.*','users.name as userName')
            ->orderBy('id','desc')
            ->get();

        //return $messages;
        return view('admin.home.message-portal.message-list',['messages' => $messages]);
    }

    public function messageReply(Request $request){

        $message = new ContactUs();
        $message->sender_id = $request->sender_id;
        $message->admin_id = auth()->user()->id;
        $message->message = $request->message;
        $message->save();
        return redirect()->back()->with('message','Message sent successfully');
    }

}
