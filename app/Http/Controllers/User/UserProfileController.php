<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    //Shows The view to update profile
    public function getUpdateProfile() {
       $user = \Auth::user();
        return view('user.profile.update' , compact('user')) ;
    }

    //update profile
    public function UpdateProfile(Request $request) {
       $user = \Auth::user();
       if(isset($request->email)) {
         $user->email = $request->email ;
       }
       if(isset($request->password)) {
        $user->password = bcrypt($request->password) ;
       }
       $user->save() ;
      return redirect()->route('user.edit');  
    }


}
