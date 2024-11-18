<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;


class UsersController extends Controller
{
    public function userList(){

        $users = Users::where('utype','=','USR')->get();
        return view('admin.home.users.user-list',compact('users'));
    }

    public function activateUser($id){
        $user = Users::find($id);
        $user->status = "active";
        $user->save();
        return redirect()->back()->with('message','User is now active');
     }

     public function inactivateUser($id){
        $user = Users::find($id);
        $user->status = "inactive";
        $user->save();
        return redirect()->back()->with('message','User is now inactive');
     }

     public function resetPasswordUser($id){
        $user = Users::find($id);
        $user->password = bcrypt("123456");
        $user->save();
        return redirect()->back()->with('message','User password reseted successfully');
     }
}
