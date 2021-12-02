<?php

namespace App\Http\Controllers;
use Auth;
use DB;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        return view('dashboard');
    }
    
    public function category(){
        $categories = DB::table('categories')->latest()->get();
        return view('admin.category',compact('categories'));
    }
    
    public function AddCategory(){
        return view('admin.add_category');
    }
    
    public function logout()
    {
        Auth::logout();
        $notification=array(
		          'messege'=>'Logout SuccessFully!',
		          'alert-type'=>'success'
		);
            
        return Redirect()->route('admin.login')->with($notification);
    }
}
