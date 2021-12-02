<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $users = DB::table('users')->latest()->get();
        return view('admin.users.index',compact('users'));
    }
    
    public function activateUser($id){
        
        DB::table('users')->where('id',$id)->update(['status' => 0]);
        $notification=array(
	          'messege'=>'User Inactive SuccessFully!',
	          'alert-type'=>'success'
	   );
	   
	   return Redirect()->back()->with($notification); 
        
    }
    
    public function unactivateUser($id){
        
        DB::table('users')->where('id',$id)->update(['status' => 1]);
        $notification=array(
	          'messege'=>'User Activate SuccessFully!',
	          'alert-type'=>'success'
	   );
	   
	   return Redirect()->back()->with($notification); 
        
    }
}
