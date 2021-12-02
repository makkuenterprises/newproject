<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Razorpay\Api\Api;
use LoveyCom\CashFree\PaymentGateway\Order;

class BookOrderController extends Controller
{
    //
    public function makePayment(Request $request){
        if($request->payment == 'cash'){
            
            
            if($request->addresss == "")
            {
                 $notification=array(
                'messege'=>'Please add address',
                'alert-type'=>'error'
                 );
                 
              return Redirect()->back()->with($notification);
            }
            
            $email = Auth::user()->email;
            $total = $request->total;
            
            
            $data = array();
            $data['user_id'] = Auth::id();
            $data['amount'] = $total;
            $data['shipping_charge'] = $request->shipping_charge;
            $data['payment_type'] = 'cashon';
            $data['status_code'] = mt_rand(100000,999999);
            $data['status'] = 0;
			$data['date'] = date('d-m-y');
			$data['month'] = date('F');
			$data['year'] = date('Y');
			
			//dd($data);
			
			$order_id = DB::table('itemorders')->insertGetId($data);
			
			
            $getaddress = DB::table('addresses')
            ->select('*')
            ->where('id',$request->address_id)
            ->first();
           
			$user_info = array();
			
			$user_info['user_id'] = Auth::id();
			$user_info['itemorder_id'] = $order_id;
			$user_info['fullname'] = $getaddress->fullname;
			$user_info['full_address'] = $getaddress->full_address;
			$user_info['city'] = $getaddress->city;
			$user_info['state'] = $getaddress->state;
			$user_info['pin_code'] = $getaddress->pin_code;
			$user_info['phone'] = $getaddress->alternate_phone;
			$user_info['created_at'] = Carbon::now();
            $user_info['updated_at'] = Carbon::now();
			//dd($user_info);
			DB::table('userorderinfos')->insert($user_info);
		
			
			
			$userId=Session::get('user')['id'];
            
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
            $details = array();
            
            foreach($cartproducts as $row){
                $details['itemorder_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_name'] = $row->product_name;
                $details['quantity'] = $row->qty;
                $details['singleprice'] = $row->price;
                $details['totalprice'] = $row->qty * $row->price;
                $details['discount_price'] = $row->discount_price;
                DB::table('order_details')->insert($details);
            }
            
            $delete_carts = array();
            
            // foreach($cartproducts as $row){
            //     $delete_carts['user_id'] = $order_id;
            //     $delete_carts['user_id'] = $order_id;
            //     $delete_carts['product_id'] = $row->id;
            //     $delete_carts['qty'] = $row->product_name;
            //     DB::table('carts')->delete($delete_carts);
            // }
            
             DB::table('carts')->where('user_id',$userId)->delete();
            
            
            
            
            $notification=array(
                'messege'=>'Order Placed SuccessFully',
                'alert-type'=>'success'
                 );
                 
              return Redirect()->route('my.account')->with($notification);
            
    		//return 'Cash On Delivery Under Construction';
        }
        
     if($request->payment == 'online'){
         
         
            if($request->addresss == "")
            {
                 $notification=array(
                'messege'=>'Please add address',
                'alert-type'=>'error'
                 );
                 
              return Redirect()->back()->with($notification);
            }
            
            
         
        
            // foreach($cartproducts as $row){
            //     $delete_carts['user_id'] = $order_id;
            //     $delete_carts['user_id'] = $order_id;
            //     $delete_carts['product_id'] = $row->id;
            //     $delete_carts['qty'] = $row->product_name;
            //     DB::table('carts')->delete($delete_carts);
            // }
           $email = Auth::user()->email;
            $phone = Auth::user()->phone;
            $total = $request->total; 
            $name = Auth::user()->name;
            
            
            
            $data = array();
            $data['user_id'] = Auth::id();
            $data['amount'] = $total;
            $data['shipping_charge'] = $request->shipping_charge;
            $data['payment_type'] = 'online';
            $data['status_code'] = mt_rand(100000,999999);
            $data['status'] = 0;
			$data['date'] = date('d-m-y');
			$data['month'] = date('F');
			$data['year'] = date('Y');
			
			//dd($data);
			
			$order_id = DB::table('itemorders')->insertGetId($data);
            
            //instantiate the class
$order = new Order();
//prepare the order details
//NOTE: Prepare a route for returnUrl and notifyUrl (something like a webhook). However, if you have webhook setup in your cashfree dashboard, no need for notifyUrl. But if notifyUrl is set, it will be called instead.
$od["orderId"] = $order_id;
$od["orderAmount"] = $total;
//dd($od["orderAmount"]);
$od["orderNote"] = "Subscription";
$od["customerPhone"] = $phone;
$od["customerName"] = $name;
$od["customerEmail"] = $email;
$od["returnUrl"] = "https://4med.in/payment/status";
$od["notifyUrl"] = "https://4med.in/payment/status";
//call the create method
$order->create($od);
//dd($order->create($od));
//get the payment link of this order for your customer
$link = $order->getLink($od['orderId']);



            
            
            
			
				
            $getaddress = DB::table('addresses')
            ->select('*')
            ->where('id',$request->address_id)
            ->first();
			
			$user_info = array();
			
			$user_info['user_id'] = Auth::id();
			$user_info['itemorder_id'] = $order_id;
			$user_info['fullname'] = $getaddress->fullname;
			$user_info['full_address'] = $getaddress->full_address;
			$user_info['city'] = $getaddress->city;
			$user_info['state'] = $getaddress->state;
			$user_info['pin_code'] = $getaddress->pin_code;
			$user_info['phone'] = $getaddress->alternate_phone;
			$user_info['created_at'] = Carbon::now();
            $user_info['updated_at'] = Carbon::now();
			//dd($user_info);
			DB::table('userorderinfos')->insert($user_info);
			
			
			$userId=Session::get('user')['id'];
            
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
            $details = array();
            
            foreach($cartproducts as $row){
                $details['itemorder_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_name'] = $row->product_name;
                $details['quantity'] = $row->qty;
                $details['singleprice'] = $row->price;
                $details['totalprice'] = $row->qty * $row->price;
                $details['discount_price'] = $row->discount_price;
                DB::table('order_details')->insert($details);
            }
            
            $delete_carts = array();
            
            
           
            return Redirect()->to($link->paymentLink);
            
        
     }

    }
    
    

    public function paymentCallback(Request $req)
    {
        
        
        $order_id = $req->orderId;
        $refrence_id = $req->referenceId;
        $payment_mode = $req->paymentMode;
        $transaction_status = $req->txStatus;
        $transaction_time = $req->txTime;
        
        DB::table('itemorders')->where('id',$order_id)->update([
            
                'refrence_id' => $refrence_id,
                'payment_mode' => $payment_mode,
                'transaction_status' => $transaction_status,
                'transaction_time' => $transaction_time
            
            ]);
            
            
            
            
             $notification=array(
                'messege'=>'Order Placed SuccessFully',
                'alert-type'=>'success'
                 );
        
        return redirect()->to('/')->with($notification);
       
    }
    
    public function create_order_api(){
        
        
        
   $apiEndpoint = "https://api.cashfree.com";
   $opUrl = $apiEndpoint."/api/v1/order/create";
  
   $cf_request = array();
   $cf_request["appId"] = "96699e9cee1a3f73a8aea627899669";
    $cf_request["secretKey"] = "38e28e939c4ddfb6ff375f442f1c898359955bf1";
   $cf_request["orderId"] = "ORDER-1048756"; 
   $cf_request["orderAmount"] = 100;
   $cf_request["orderNote"] = "Subscription";
   $cf_request["customerPhone"] = "90000XXXXX";
   $cf_request["customerName"] = "Test Name";
   $cf_request["customerEmail"] = "test@cashfree.com";
   $cf_request["returnUrl"] = "https://4med.in/payment/status";
   $cf_request["notifyUrl"] = "https://4med.in/payment/status";

   $timeout = 10;
   
   $request_string = "";
   foreach($cf_request as $key=>$value) {
     $request_string .= $key.'='.rawurlencode($value).'&';
   }
   
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL,"$opUrl?");
   curl_setopt($ch,CURLOPT_POST, count($cf_request));
   curl_setopt($ch,CURLOPT_POSTFIELDS, $request_string);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
   $curl_result=curl_exec ($ch);
   curl_close ($ch);

   $jsonResponse = json_decode($curl_result);
   if ($jsonResponse->{'status'} == "OK") {
     $paymentLink = $jsonResponse->{"paymentLink"};
     //Send this payment link to customer over email/SMS OR redirect to this link on browser
   } else {
    //Log request, $jsonResponse["reason"]
   }   

        
        
    }

    
        public function makePaymentapi(Request $request){
        if($request->payment_type == 'cash'){
            
            
            if($request->full_address == "")
            {
                 $notification=array(
                'messege'=>'Please add address',
                'alert-type'=>'error'
                 );
                 
              return response()->json(['status'=>false,'error'=>'Please add address']);
            }
            
           
            $userid = $request->user_id;
            $total = $request->total_amount;
            
            
            $data = array();
            $data['user_id'] = $userid;
            $data['amount'] = $total;
            $data['shipping_charge'] = $request->shipping_charge;
            $data['payment_type'] = 'cashon';
            $data['status_code'] = mt_rand(100000,999999);
            $data['status'] = 0;
			$data['date'] = date('d-m-y');
			$data['month'] = date('F');
			$data['year'] = date('Y');
			
			//dd($data);
			
			$order_id = DB::table('itemorders')->insertGetId($data);
			
					
            $getaddress = DB::table('addresses')
            ->select('*')
            ->where('id',$request->address_id)
            ->first();
			
			$user_info = array();
			
			$user_info['user_id'] = Auth::id();
			$user_info['itemorder_id'] = $order_id;
			$user_info['fullname'] = $getaddress->fullname;
			$user_info['full_address'] = $getaddress->full_address;
			$user_info['city'] = $getaddress->city;
			$user_info['state'] = $getaddress->state;
			$user_info['pin_code'] = $getaddress->pin_code;
			$user_info['phone'] = $getaddress->alternate_phone;
			$user_info['created_at'] = Carbon::now();
            $user_info['updated_at'] = Carbon::now();
			//dd($user_info);
			DB::table('userorderinfos')->insert($user_info);
		
		
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
            $details = array();
            
            foreach($cartproducts as $row){
                $details['itemorder_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_name'] = $row->product_name;
                $details['quantity'] = $row->qty;
                $details['singleprice'] = $row->price;
                $details['totalprice'] = $row->qty * $row->price;
                $details['discount_price'] = $row->discount_price;
                DB::table('order_details')->insert($details);
            }
            
            $delete_carts = array();
            
            
             DB::table('carts')->where('user_id',$userid)->delete();
            
            
            
            $notification=array(
                'messege'=>'Order Placed SuccessFully',
                'alert-type'=>'success'
                 );
                 
              return response()->json(['status'=>true,'message'=>'Order Placed SuccessFully', 'order_id'=>$order_id]);
            
    		//return 'Cash On Delivery Under Construction';
        }
        
     if($request->payment_type == 'online'){
         

        
        
    	}

    }
    
    
    
     public function generate_order_token_api(Request $request){
         
         
            if($request->user_id == "")
            {
                 
              return response()->json(['status'=>false,'message'=>'User id is null']);
            }
            
            if($request->total_amount == "")
            {
                 
              return response()->json(['status'=>false,'message'=>'Total amount is null']);
            }
            
            if($request->shipping_charge == "")
            {
                 
              return response()->json(['status'=>false,'message'=>'Shipping charge is null']);
            }
            
            if($request->address_id == "")
            {
                 
              return response()->json(['status'=>false,'message'=>'Address id is null']);
            }
         
          
           $userid = $request->user_id;
            $total = $request->total_amount;
            
            
            $data = array();
            $data['user_id'] = $userid;
            $data['amount'] = $total;
            $data['shipping_charge'] = $request->shipping_charge;
            $data['payment_type'] = 'online';
            $data['status_code'] = mt_rand(100000,999999);
            $data['status'] = 0;
			$data['date'] = date('d-m-y');
			$data['month'] = date('F');
			$data['year'] = date('Y');
			
			
			

			//dd($data);
			
			$order_id = DB::table('itemorders')->insertGetId($data);
			
		    $getaddress = DB::table('addresses')
                ->select('*')
                ->where('id',$request->address_id)
                ->first();
			
			$user_info = array();
			
			$user_info['user_id'] = $userid;
			$user_info['itemorder_id'] = $order_id;
			$user_info['fullname'] = $getaddress->fullname;
			$user_info['full_address'] = $getaddress->full_address;
			$user_info['city'] = $getaddress->city;
			$user_info['state'] = $getaddress->state;
			$user_info['pin_code'] = $getaddress->pin_code;
			$user_info['phone'] = $getaddress->alternate_phone;
			$user_info['created_at'] = Carbon::now();
            $user_info['updated_at'] = Carbon::now();
			//dd($user_info);
			DB::table('userorderinfos')->insert($user_info);
			
			
			$cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$request->user_id)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
            $details = array();
            
            foreach($cartproducts as $row){
                $details['itemorder_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_name'] = $row->product_name;
                $details['quantity'] = $row->qty;
                $details['singleprice'] = $row->price;
                $details['totalprice'] = $row->qty * $row->price;
                $details['discount_price'] = $row->discount_price;
                DB::table('order_details')->insert($details);
            }
			
		
            
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.cashfree.com/api/v2/cftoken/order');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"orderId\": \"$order_id\",\n  \"orderAmount\":$request->total_amount,\n  \"orderCurrency\": \"INR\"\n}");


            $appid = env('CASHFREE_APP_ID');
            $secret_key = env('CASHFREE_SECRET_KEY');
            
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'X-Client-Id: '.$appid;
            $headers[] = 'X-Client-Secret: '.$secret_key;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
                        
                        //return response()->json($result);
                        
                        
                        
                        
                        $resultdata = json_decode($result);
                        if($resultdata->status == "OK")
                        {
                            
                            return response()->json(['status'=>true,'message'=>$resultdata->message,'order_id'=>$order_id,'token'=>$resultdata->cftoken]);
                            
                        }
                        else{
                            return response()->json(['status'=>false,'message'=>$resultdata->message,'order_id'=>$order_id]);
                        }
                        
                        
			
			
			

     }
     
     
     public function paymentCallback_api(Request $req)
    {
        
        
        $order_id = $req->orderId;
        $refrence_id = $req->referenceId;
        $payment_mode = $req->paymentMode;
        $transaction_status = $req->txStatus;
        $transaction_time = $req->txTime;
        
        DB::table('itemorders')->where('id',$order_id)->update([
            
                'refrence_id' => $refrence_id,
                'payment_mode' => $payment_mode,
                'transaction_status' => $transaction_status,
                'transaction_time' => $transaction_time
            
            ]);
            
            
             
             
             
             if($transaction_status == "SUCCESS")
             {
                 DB::table('carts')->where('user_id',$req->user_id)->delete();
                 return response()->json(['status'=>true,'message'=>"Success",'order_id'=>$order_id]);
             }else{
                 return response()->json(['status'=>true,'message'=>"Failed",'order_id'=>$order_id]);
             }
            
             //return response()->json(['status'=>true,'message'=>"Success",'order_id'=>$order_id]);
        
        //return redirect()->to('/')->with($notification);
       
        
    }
  
}
