<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    //
    
     public function __construct()
    {
        $this->middleware('auth:admin');
    }   
    
    public function pendingOrder(){
        
        $order = DB::table('itemorders')->where('status',0)->get();
        return view('admin.orders.pending',compact('order'));
        
    }
    
    public function viewOrder($id){
        
        $orders = DB::table('itemorders')
                  ->join('users','itemorders.user_id','users.id')
                  ->select('itemorders.*','users.name','users.phone')
                  ->where('itemorders.id',$id)
                  ->first();
                  
                  //dd($orders);
                  
        $user_info = DB::table('userorderinfos')
                    ->join('users','userorderinfos.user_id','users.id')
                    ->select('userorderinfos.*','users.name','users.phone','users.email')
    				->where('itemorder_id',$id)
    				->first();
    				
    			//	dd($user_info);
    				
    $order_details = DB::table('order_details')
    					->join('products','order_details.product_id','products.id')
    					->select('order_details.*','products.product_name','products.product_thumbnail','products.product_size')
    					->where('order_details.itemorder_id',$id)
    					->get();
        
            //dd($order_details);
            
            return view('admin.orders.view_order',compact('orders','user_info','order_details'));
    }
    
    public function paymentAccept($id){
        
        DB::table('itemorders')->where('id',$id)->update([
                'status' => 1,
                'order_accept_date' => Carbon::now()
            ]);
        
        $notification=array(
              'messege'=>'Payment Accepted',
              'alert-type'=>'success'
            );
            
         return Redirect()->route('admin.pending.order')->with($notification); 
        
    }
    
    public function paymentCancel($id){
        
        DB::table('itemorders')->where('id',$id)->update([
                'status' => 4
            ]);
        
        $notification=array(
              'messege'=>'Order Cancel',
              'alert-type'=>'success'
            );
            
         return Redirect()->route('admin.pending.order')->with($notification); 
        
    }
    
    public function acceptOrder(){
        
        $order = DB::table('itemorders')->where('status',1)->get();
        return view('admin.orders.pending',compact('order'));
        
    }
    
    public function cancelOrder(){
        
         $order = DB::table('itemorders')->where('status',4)->get();
        return view('admin.orders.pending',compact('order'));
        
    }
    
    public function processOrder(){
        
         $order = DB::table('itemorders')->where('status',2)->get();
        return view('admin.orders.pending',compact('order'));
        
    }
    
     public function deleiveredOrder(){
        
         $order = DB::table('itemorders')->where('status',3)->get();
        return view('admin.orders.pending',compact('order'));
        
    }
    
    public function deleiveryProcess($id){
        
        DB::table('itemorders')->where('id',$id)->update([
                'status' => 2,
                'process_delivery' => Carbon::now()
            ]);
            
         $notification=array(
              'messege'=>'Product Is On The Way!!',
              'alert-type'=>'success'
            );
            
         return Redirect()->route('admin.pending.order')->with($notification);
        
    }
    
    public function productDeleivered($id){
        
        DB::table('itemorders')->where('id',$id)->update([
                'status' => 3,
                'delivery_date' => Carbon::now()
            ]);
            
         $notification=array(
              'messege'=>'Product Deleivered!!',
              'alert-type'=>'success'
            );
            
         return Redirect()->route('admin.pending.order')->with($notification);
        
    }
}
