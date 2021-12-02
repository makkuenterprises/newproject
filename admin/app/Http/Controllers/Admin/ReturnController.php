<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReturnController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    
    public function ReturnRequests(){
        
        $orders = DB::table('itemorders')->where('return_order',1)->get();
        return view('admin.returns.return_request',compact('orders'));
        
    }
    
     public function ApproveRequests($id){
        
       DB::table('itemorders')->where('id',$id)->update(['return_order' => 2]);
    	$notification=array(
              'messege'=>'Return Process Approved',
               'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
        
    }
    
    public function ApprovedRequests(){
        
        $approved = DB::table('itemorders')->where('return_order',2)->get();
        return view('admin.returns.approved_request',compact('approved'));
        
    }
    
    public function ApprovePaymentOnline($id){
        
         $online_order = DB::table('itemorders')->where('id',$id)->first();
        
        if($online_order->payment_type == 'online'){
            
            $order_id = $online_order->id;
            $refrence_id = $online_order->refrence_id;
            $refund_amount = $online_order->amount;
            
            $appid = env('CASHFREE_APP_ID');
            $secret_key = env('CASHFREE_SECRET_KEY');
            
             $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.cashfree.com/api/v1/order/refund",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "appId=$appid&secretKey=$secret_key&orderId=$order_id&referenceId=$refrence_id&refundAmount=$refund_amount&refundNote=Sample%20Refund%20note",
            CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
            ),
            ));
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
            
             DB::table('itemorders')->where('id',$id)->update(['return_order' => 3]);
         $notification=array(
              'messege'=>'Refund Initiated SuccessFully By Online Mode',
               'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
            
            
        }
        
    }
    
    public function ApprovePaymentCash($id){
        
           DB::table('itemorders')->where('id',$id)->update(['return_order' => 3]);
         $notification=array(
              'messege'=>'Refund Initiated SuccessFully By Cash On Mode',
               'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
        
    }
    
    public function BankDetails($id){
        
        
    $test =    DB::table('bank_details')
        ->join('users', 'bank_details.user_id', 'users.id')
        ->join('itemorders', 'bank_details.order_id', 'itemorders.id')
        ->select('bank_details.*', 'users.name', 'users.email', 'users.phone', 'itemorders.amount', 'itemorders.shipping_charge', 'itemorders.payment_type', 'itemorders.delivery_date')
        ->where('bank_details.order_id', $id)
        ->first();
        
        //dd($test);
        
       return view('admin.returns.bank_details',compact('test')); 
        
        
    }
    
}
