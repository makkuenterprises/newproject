<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class ProfileController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    
    public function viewProfile(){
        return view('admin.profiles.view');
    }
    
    public function updateProfile(Request $request){
        
        $id = $request->user_id;
        
        $data = array();
        
        $data['name'] = $request->user_name;
        $data['phone'] = $request->user_phone;
        $data['email'] = $request->user_email;
        
        $update = DB::table('admins')->where('id', $id)->update($data);
        
        if($update){
            $notification=array(
	          'messege'=>'Admin Profile Updated SuccessFully!',
	          'alert-type'=>'success'
	        );
	        return Redirect()->route('admin.home')->with($notification); 
        } else {
            $notification=array(
	          'messege'=>'No Data Updated!',
	          'alert-type'=>'success'
	        );
	        return Redirect()->route('admin.home')->with($notification);
        }
        
        
    }
    
    public function changePassword(){
        
        return view('admin.profiles.change_password');
        
    }
    
    public function update_password(Request $request){
        
      $password=Auth::user()->password;
      //dd($password);
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->confirm_password;
      
      
      if (Hash::check($oldpass,$password)) {
           if ($newpass == $confirm) {
               
                      //$user=User::find(Auth::id())->update(['password'=> Hash::make($request->password)]);
                       $data = array();
                        $data['password'] = Hash::make($request->password);
                        $update = DB::table('admins')->where('id', Auth::id())->update($data);
                    
                      $notification=array(
                        'messege'=>'Password Changed Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
        
    }
}
