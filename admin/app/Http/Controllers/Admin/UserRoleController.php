<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function AllUsers(){
        
        $user = DB::table('admins')->where('type',2)->get();
        return view('admin.roles.all_role',compact('user'));
        
    }
    
    public function AddUsers(){
        return view('admin.roles.add_user');
    }
    
    public function storeUser(Request $request){
        
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['users'] = $request->users;
        $data['products'] = $request->products;
        $data['banners'] = $request->banners;
        $data['orders'] = $request->orders;
        $data['reports'] = $request->reports;
        $data['roles'] = $request->roles;
        $data['return_orders'] = $request->return_orders;
        $data['type'] = 2;
        
        DB::table('admins')->insert($data);
    	 $notification=array(
            'messege'=>'Child Admin Inserted SuccessFully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.user.all')->with($notification);
        
    }
    
     public function editUser($id){

    	$admin = DB::table('admins')->where('id',$id)->first();
    	return view('admin.roles.edit_user',compact('admin'));

    }
    
    public function UpdateUser(Request $request){
        
        $id = $request->id;
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['users'] = $request->users;
        $data['products'] = $request->products;
        $data['banners'] = $request->banners;
        $data['orders'] = $request->orders;
        $data['reports'] = $request->reports;
        $data['roles'] = $request->roles;
        $data['return_orders'] = $request->return_orders;
        
        DB::table('admins')->where('id',$id)->update($data);
    	 $notification=array(
            'messege'=>'Child Admin Updated SuccessFully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.user.all')->with($notification);
        
        
    }
    
    public function removeUser($id){
        
        DB::table('admins')->where('id',$id)->delete();
    	$notification=array(
            'messege'=>'Child Admin Deleted SuccessFully',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.user.all')->with($notification);
    }
}
