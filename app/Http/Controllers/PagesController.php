<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\BankDetails;
use Carbon\Carbon;
use Auth;
use Session;
use DB;
use Validator;


class PagesController extends Controller
{
    //write fucntion to controll blade 
    
    //home page rendering functiom 
    public function index(){
    	return view('layouts.index');
    }
    
    //home page rendering functiom 
    public function response(){
    	return view('layouts.response');
    }
    
    public function about(){
    	return view('layouts.about');
    }
    
    public function productDetails(){
    	return view('layouts.product_details');
    }
    
    public function categories(){
    	return view('layouts.categories');
    }
    
    public function products(){
    	return view('layouts.products');
    	
    }
     
     public function contact(){
    	return view('layouts.contact');
    	
    }
    
    public function loginRegister(){
    	return view('layouts.login_register');
    }
    
    public function wishList(){
    	return view('layouts.wishlist');
    }
    
    public function sidebarCart(){
    	return view('layouts.sidebar_cart');
    }
    
    public function cart(){
    	return view('layouts.cart');
    }
    
    public function otp(){
        
      return view('layouts.otp');
    }
    
    public function terms(){
    	return view('layouts.terms');
    }
    
    public function whatsapp(){
    	return view('layouts.payment');
    }
    
    public function checkOut(){
        
        if(session()->has('user'))
        {
            $userId=Session::get('user')['id'];
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
        
        
            $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userId)
                            ->whereNotNull('fullname')
                            ->select('addresses.*','users.name','users.email','users.phone')
                            ->get();
                            
                            
             $checkdiscountprice= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->select('products.discount_price')
            ->get();
            
            $cartproductstotal=0;
            $cartproductstotal1=0;
            $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->whereNotNull('products.discount_price')
            ->sum(DB::raw('(products.price - ((products.price / 100) * products.discount_price)) * carts.qty'));
           
        }
        
        $cartproductstotal = $cartproductstotal1 + $cartproductstotal2;
        
        }
            
            if($cartproductstotal < 500)
            {
                 $deliverycharge= DB::table('delivery_charge')
                  ->first()->delivery_amount;
                    
                    $grandprice = $cartproductstotal + $deliverycharge;
            }else
            {
                $deliverycharge = "0.00";
                $grandprice = $cartproductstotal;
            }
                            
            //dd($useraddress);                
    
            return view('layouts.checkout',['cartproducts'=>$cartproducts, 'totalprice'=>$cartproductstotal, 'grandprice'=>$grandprice, 'useraddress'=>$useraddress]);
        } 
        else
        {
            return redirect('/login_register');
        }
        
        
    
    }
    
    public function upload_prescription(){
        
        if(Auth::Check()){
            
            $userId = Session::get('user')['id'];
            
             $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userId)
                            ->whereNotNull('fullname')
                            ->select('addresses.*','users.name','users.email','users.phone')
                            ->get();
            
            return view('layouts.upload_prescription',['useraddress'=>$useraddress]);
        } else {
             $notification=array(
                         'messege'=>'Login First To Your Account For Uploading Prescription!',
                         'alert-type'=>'error'
                          );
            
            return redirect('/login_register')->with($notification); 
        }
    	
    	
    }
    
    public function myAccount(){
        
        $id = Auth::User()->id;
        
        $addresses = DB::table('addresses')
                    ->join('users', 'addresses.user_id', 'users.id')->
                    select('addresses.*', 'users.name')->
                    where('addresses.user_id', $id)->
                    get();
                    
        $user = DB::table('users')->where('id', $id)->first();
                    
        $orders = DB::table('itemorders')
        ->where('user_id', $id)
        ->orderBy('id', 'DESC')->get();
        
        $return_orders = DB::table('itemorders')->where('user_id',$id)->where('status',3)->orderBy('id','DESC')->get();
        
        $cancel_orders = DB::table('itemorders')->where('user_id',$id)->orderBy('id','DESC')->get();
        //dd($cancel_orders);
        
        //dd($orders);
                    
        $prescriptions = DB::table('prescriptions')->where('user_id',$id)->get();            
        
        
    	return view('layouts.myaccount', ['addresses'=>$addresses, 'orders' => $orders, 'returnorders' => $return_orders, 'cancelorders' => $cancel_orders,  'prescriptions' =>  $prescriptions, 'user' =>  $user]);
    }
    
    public function confirm_return(Request $request){
        
       
        $userid = Auth::User()->id;
        
        
        if($request->payment_type == "cod")
        {
            
             $validator = Validator::make($request->all(), [
                'orderid' => 'required',
                'accntname' => 'required',
                'bankname' => 'required',
                'ifsc' => 'required',
                'accountnumber' => 'required',
            ]);
        
            if ($validator->fails()) {
                if ($validator->fails()) { 
                    $arr = json_decode($validator->errors());

          foreach ($arr as $key => $jsons) {
             foreach($jsons as $key => $value) {
                //dd($value);
                $notification=array(
                    'message'=>$value,
                    );
                    }
                }
                    //return response()->json(['status' => false, 'message'=>$value], 200);
                    return redirect()->back()->with($notification);
                } 
        
        
            }
            
            BankDetails::create([
              'user_id'=>$userid, 
              'order_id'=>$request->orderid, 
              'accn_holder_name'=>$request->accntname, 
              'bank_name'=>$request->bankname,
              'ifsc_code' =>$request->ifsc,
              'account_no' =>$request->accountnumber
            ]);
            
            DB::table('itemorders')->where('id',$request->orderid)->update(['return_order' => 1]);
             $notification=array(
                  'messege'=>'Return order requested success',
                   'alert-type'=>'success'
                     );
            return Redirect()->back()->with($notification);
        
            
        }else{
            DB::table('itemorders')->where('id',$request->orderid)->update(['return_order' => 1]);
             $notification=array(
                  'messege'=>'Return order requested success',
                   'alert-type'=>'success'
                     );
                     
            
            return Redirect()->back()->with($notification);
        
        }
        
    }
    
    
     public function confirm_return_api(Request $request){
        
     
        $userid = $request->user_id;
        if($userid == null)
        {
            return response()->json(['status' => false, 'message'=>"User id is null"], 200);
        }
        if($request->payment_type == null)
        {
            return response()->json(['status' => false, 'message'=>"Payment type is null"], 200);
        }
        
        if($request->payment_type == "cashon")
        {
            
             $validator = Validator::make($request->all(), [
                'order_id' => 'required',
                'acc_name' => 'required',
                'bank_name' => 'required',
                'ifsc' => 'required',
                'account_number' => 'required',
            ]);
        
            if ($validator->fails()) {
                if ($validator->fails()) { 
                    $arr = json_decode($validator->errors());

          foreach ($arr as $key => $jsons) {
             foreach($jsons as $key => $value) {
                //dd($value);
                $notification=array(
                    'message'=>$value,
                    );
                    }
                }
                    return response()->json(['status' => false, 'message'=>$value], 200);
                    //return redirect()->back()->with($notification);
                } 
        
        
            }
            
            BankDetails::create([
              'user_id'=>$userid, 
              'order_id'=>$request->order_id, 
              'accn_holder_name'=>$request->acc_name, 
              'bank_name'=>$request->bank_name,
              'ifsc_code' =>$request->ifsc,
              'account_no' =>$request->account_number
            ]);
            
            DB::table('itemorders')->where('id',$request->order_id)->update(['return_order' => 1]);
             $notification=array(
                  'messege'=>'Return order requested success',
                   'alert-type'=>'success'
                     );
            return response()->json(['status' => true, 'message'=>"Return order requested success"], 200);
        
            
        }else{
             if($request->order_id == null)
            {
                return response()->json(['status' => false, 'message'=>"Order id is null"], 200);
            }
            DB::table('itemorders')->where('id',$request->order_id)->update(['return_order' => 1]);
             $notification=array(
                  'messege'=>'Return order requested success',
                   'alert-type'=>'success'
                     );
                     
            
           return response()->json(['status' => true, 'message'=>"Return order requested success"], 200);
        
        }
        
    }
    
    
    
    public function cancel_order($id){
        
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
            
             DB::table('itemorders')->where('id',$id)->update(['status' => 4]);
         $notification=array(
              'messege'=>'Order Cancel SuccessFully',
               'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
            
            
        } else {
            
             DB::table('itemorders')->where('id',$id)->update(['status' => 4]);
         $notification=array(
              'messege'=>'Order Cancel SuccessFully',
               'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
        }
            
        }
        
       
        
    
    
    // public function productimgupload(){
    // 	return view('layouts.productimgupload');
    // }
    
     public function imageUpload($id)
    {
        return view('layouts.productimgupload',['productid'=>$id])->with([
    'successful_message' => 'Profile updated successfully'
]);
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:100',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('assets/images/product'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        
 
            $products= new products;
            
            $products->where(['id' => $request->productid])
                  ->update(['product_thumbnail' => 'https://4med.in/public/assets/images/product/'.$imageName, 'updated_at' => Carbon::now()]);
                  
                  
              return redirect('/products');
    
        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName); 
    }
    
    // public function test(){
    // 	return view('layouts.prescription');
    // }
    
     public function SubscribedEmail(Request $req){
         
        $email = $req->email;
        $emailcheck = DB::table('subscribed_email')->where('email',$email)->count();
        if($emailcheck > 0)
        {
         return json_encode(array('statusCode'=>200, 'messege'=>"Already subscribed",'type'=>'error'));
        }
        
      
         	$data = array(
            			'email' => $req->email,
            			'created_at' => Carbon::now(),
            			'updated_at' => Carbon::now()
            		);
            		
    		DB::table('subscribed_email')->insert($data);
    		
    
            
             return json_encode(array('statusCode'=>200, 'messege'=>'Thank you for subscribing','type'=>'success'));
     }
    
}
