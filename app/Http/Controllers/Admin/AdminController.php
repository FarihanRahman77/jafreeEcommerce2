<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use Image;

class AdminController extends Controller
{
	public function updateProfile(Request $request)
	{

		$user = Users::find(auth()->user()->id);

		$oldPassword = $request->current_password;
		$newPassword = $request->new_password;
		$confirmPassword = $request->confirm_password;
		$userPassword = $user->password;

		//return $newPassword;

		if(password_verify($oldPassword, $userPassword))
		{

			if($newPassword && $confirmPassword) 
			{
				if(strcmp( $newPassword,$confirmPassword) == 0) 
				{
					$image = $request->file('profile_photo_path');
					if ($image) {

						$name = $image->getClientOriginalName();
						$uploadPath = 'user-images/';
						$imageUrl = $uploadPath.$name;
						Image::make($image)->resize(360,360)->save($imageUrl);

						$user->name = $request->name;
						$user->address = $request->address;
						$user->phone = $request->phone;
						$user->email = $request->email;
						$user->password = bcrypt($newPassword);
						$user->profile_photo_path = $imageUrl;
						$user->save();
						return redirect()->back()->with('message','Profile updated successfully');
					}
					else{

						$user->name = $request->name;
						$user->address = $request->address;
						$user->phone = $request->phone;
						$user->email = $request->email;
						$user->password = bcrypt($newPassword);
						$user->save();
						return redirect()->back()->with('message','Profile updated successfully');
					}
				}
				else
				{
					return redirect()->back()->with('message','New and Confirm Password didnt match');
				}
				
			}
			else
			{

				$image = $request->file('profile_photo_path');
				if ($image) {
					$name = $image->getClientOriginalName();
					$uploadPath = 'user-images/';
					$imageUrl = $uploadPath.$name;
					Image::make($image)->resize(360,360)->save($imageUrl);


					$user->name = $request->name;
					$user->address = $request->address;
					$user->phone = $request->phone;
					$user->email = $request->email;
					$user->profile_photo_path = $imageUrl;
					$user->save();
					return redirect()->back()->with('message','Profile updated successfully');
				}
				else{
					$user->name = $request->name;
					$user->address = $request->address;
					$user->phone = $request->phone;
					$user->email = $request->email;
					$user->save();
					return redirect()->back()->with('message','Profile updated successfully');
				}

			}
			
		}

		else
		{
			return redirect()->back()->with('message','Incorrect current password');
		}

		


	}
}
