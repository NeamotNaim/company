<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function passChange(){
        return view('admin.other.passchange');
    }
    public function passSave(Request $request){
        $validateData=$request->validate([
           'password'=>'required|max:255',
           'oldpassword'=>'required',
           'confirm_password'=>'required'
       ],[
           'password.required'=>'Please Input New Password',
           'oldpassword.required'=>'Please Input Current password',
           'confirm_password.required'=>'Retype New password',
          
       ]);
       $hashedPass=Auth::user()->password;
       if(Hash::check($request->oldpassword,$hashedPass)){
           $user=User::find(Auth::id());
           $user->password=Hash::make($request->password);
           $user->save();
           Auth::logout();
           return Redirect()->route('login')->with('success','Successfully Change Password');

       }
       else{
           return Redirect()->back()->with('error',' Current Password Invalid');}

    }


}
