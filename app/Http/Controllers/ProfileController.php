<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfileController extends Controller
{
    //
    public function update_profile(Request $request){
        
        $this->validate($request,[
    	'profile_pic' => 'required|mimes:jpeg,jpg,png|max:4000'
    	]);
    	
    	$user_id = auth()->user()->id;
    	
    	if($request->hasfile('profile_pic')){
            $file = $request->file('profile_pic');
            $ext =  $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/',$filename);
            User::where('id',$user_id)->update([
              'profile_pic'=>$filename
            ]);
        return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
        }
    }
    
    
     public function update_profile_api(Request $request){
        
    //     $this->validate($request,[
    // 	'profile_pic' => 'mimes:jpeg,jpg,png|max:4000'
    // 	]);
    	
    	
    	$validator = Validator::make($request->all(), [ 
                    
                    'name' => 'required',
                    
                    'profile_pic' => 'mimes:jpeg,jpg,png|max:4000'
                    
                ]);
        
                 if ($validator->fails()) { 
                     return \Response::json([
            				    'status' => false,
            				    'message' => 'error',
            				    'error' => $validator->errors()]);
                } 
    	
    	
    	
    	
    	$user_id = $request->id;
    	
    	if($request->hasfile('profile_pic')){
            $file = $request->file('profile_pic');
            $ext =  $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/',$filename);
            User::where('id',$user_id)->update([
              'profile_pic'=>$filename,
              'name' => $request->name
             
            ]);
            
        return response()->json(['status'=>true,'message'=>'Profile Updated With Image','image' => 'https://4med.in/uploads/avatar/'.$filename],200);
        } else {
             User::where('id',$user_id)->update([
              'name' => $request->name
              
            ]);
            $user_image = User::find($user_id);
            $users = $user_image->profile_pic;
            return response()->json(['status'=>true,'message'=>'Profile Updated Without Image','image' => 'https://4med.in/uploads/avatar/'.$users],200);
        }
    }
    
    public function add_address(Request $request){
        
        $data = array();
        
        $check = DB::table('addresses')
                ->select('*')
                ->where('user_id', Auth::User()->id)
                ->get();
                
        if($check->count() > 0)
        {
              
            $data['user_id'] = Auth::User()->id;
            $data['fullname'] = $request->fullname;
            $data['full_address'] = $request->full_address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['alternate_phone'] = $request->alternate_phone;
            $data['default'] = 0;
            $data['created_at'] = Carbon::Now();
            $data['updated_at'] = Carbon::Now();
            
            DB::table('addresses')->insert($data);
        }
        else
        {
            $data['user_id'] = Auth::User()->id;
            $data['fullname'] = $request->fullname;
            $data['full_address'] = $request->full_address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['alternate_phone'] = $request->alternate_phone;
            $data['default'] = 1;
            $data['created_at'] = Carbon::Now();
            $data['updated_at'] = Carbon::Now();
            
            DB::table('addresses')->insert($data);
        }
        
        //dd($data);
        
        $notification=array(
            'messege'=>'New Address Added Successfully',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);
        
    }
    
    public function view_profile($id){
        //dd($id);
        
        
        $view = DB::table('addresses')
        ->select('*')
               ->where('id', $id)
              ->first();
               
    //  dd($view);
    
    return json_encode(array('name' => $view->fullname,
                            'address_id' => $view->id,
                            'city' => $view->city,
                            'address' => $view->full_address,
                            'state' => $view->state,
                            'pin_code' => $view->pin_code,
                            'phone' => $view->alternate_phone,
                            'address' => $view->full_address
    ));
               
    //   return response::json(array(

    // 		'address' => $view
    		

    // 	));
        
    }
    
    public function order_view($id){
        
        $order = DB::table('itemorders')
                ->join('order_details','itemorders.id','order_details.itemorder_id')
                ->join('products','order_details.product_id','products.id')
                ->select('itemorders.*','order_details.product_name','order_details.quantity','order_details.singleprice','order_details.totalprice','products.product_thumbnail')
                ->where('itemorders.id', $id)
                ->get();
                
                foreach($order as $row){
                    $amount = $row->amount;
                    $product_name = $row->product_name;
                }
                
                //dd($order);
                //print_r($order);
                
                return json_encode(
                   
                       $order
                    
                        // payment_type' => $order->payment_type);
                        // // 'product_name' => $order->product_name
                    
                    );
                
                
    //   return json_encode(array(
          
    //             'amount' => $order->amount,
    //             'payment_type' => $order->payment_type,
    //             'payment_status' => $order->payment_status,
    //             'transaction_id' => $order->transaction_id,
    //             'status_code' => $order->status_code,
    //             'status_type' => $order->status,
    //             'date' => $order->date,
    //             'month' => $order->month,
    //             'year' => $order->year,
    //             'product_name' => $order->product_name
          
    //       ));
        
    }
    
    
     public function cancelOrderApi(Request $req){
         
         
         $online_order = DB::table('itemorders')->where('id',$req->order_id)->first();
         
       
            
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
            //echo $response;
            }
             $responsedata = json_decode($response);
             //dd($responsedata);
              $check = DB::table('itemorders')
                     ->where('id',$req->order_id)
                     ->where('user_id',$req->user_id)
                     ->where('status',4)
                     ->get();
                     
                     $check1 = DB::table('itemorders')
                     ->where('id',$req->order_id)
                     ->where('user_id',$req->user_id)
                     ->get();
                     
                     if($check1->count() > 0)
                     {
                     
                          if($check->count() < 1)
                         {
                             
                         
                          $order = DB::table('itemorders')
                         ->where('id',$req->order_id)
                         ->where('user_id',$req->user_id)
                         ->update(['status'=>4]);
                         
                         return response()->json(['status'=>true,'message'=>'Order cancelled Successfully And Refund Is Initiated','refund_id'=>$responsedata->refundId]);
                         }
                         else{
                             return response()->json(['status'=>false,'message'=>'Your order is already cancelled']);
                         }
                     }else{
                          return response()->json(['status'=>false,'message'=>'No orders found']);
                     }
                     
                 
             } else {
                 
                  $check = DB::table('itemorders')
                     ->where('id',$req->order_id)
                     ->where('user_id',$req->user_id)
                     ->where('status',4)
                     ->get();
                     
                     $check1 = DB::table('itemorders')
                     ->where('id',$req->order_id)
                     ->where('user_id',$req->user_id)
                     ->get();
                     
                     if($check1->count() > 0)
                     {
                     
                          if($check->count() < 1)
                         {
                         
                          $order = DB::table('itemorders')
                         ->where('id',$req->order_id)
                         ->where('user_id',$req->user_id)
                         ->update(['status'=>4]);
                         
                         return response()->json(['status'=>true,'message'=>'Order cancelled Successfully']);
                         }
                         else{
                             return response()->json(['status'=>false,'message'=>'Your order is already cancelled']);
                         }
                     }else{
                          return response()->json(['status'=>false,'message'=>'No orders found']);
                     }
                     
                 
                 
             }
        
        
    }
    
     public function order_view_api(Request $req){
        
        $order = DB::table('itemorders')
                ->join('order_details','itemorders.id','order_details.itemorder_id')
                ->join('products','order_details.product_id','products.id')
                ->select('order_details.product_id','order_details.product_name','order_details.quantity','order_details.singleprice','order_details.totalprice','products.product_size','products.product_description','products.product_thumbnail')
                ->where('itemorders.id', $req->order_id)
                ->get();
        if($order->count() < 1)
        {
            return response()->json(['status'=>false,'message'=>'No data found']);
        }
        
        $orderdetails = DB::table('itemorders')
                ->join('userorderinfos','userorderinfos.itemorder_id','itemorders.id')
                ->where('itemorders.id', $req->order_id)
                ->select('itemorders.id as order_id','itemorders.user_id','itemorders.amount as total_amount','itemorders.payment_type','itemorders.payment_status','itemorders.transaction_id','itemorders.status_code','itemorders.status','itemorders.date','itemorders.month','itemorders.year',
                'userorderinfos.fullname','userorderinfos.full_address','userorderinfos.city','userorderinfos.state','userorderinfos.pin_code','userorderinfos.phone','userorderinfos.created_at','userorderinfos.updated_at')
                ->first();
                
        // $address = DB::table('userorderinfos')
        //         ->where('itemorder_id', $req->order_id)
        //         ->value('address');
        //         foreach($order as $row){
        //             $product_name = $row->product_name;
        //         }
                
                return response()->json(['status'=>true,'message'=>'success','order_details'=>$orderdetails, 'item_details'=>$order],200);
                
        
    }
    
    
    
    
    public function update_address(Request $request){
        
        //dd($id);
        $user = Auth::User()->id;
        $address_id = $request->address_id;
        //dd($address_id);
        
        $data = array();
        $data['user_id'] = $user;
        $data['fullname'] = $request->fullname;
        $data['full_address'] = $request->full_address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['pin_code'] = $request->pin_code;
        $data['alternate_phone'] = $request->alternate_phone;
        $data['created_at'] = Carbon::Now();
        $data['updated_at'] = Carbon::Now();
        
        //dd($data);
        
        DB::table('addresses')->where('id', $address_id)->update($data);
        
        $notification=array(
              'messege'=>'Your Address Updaed Successfully!',
              'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        
        
    }
    
    public function update_password(Request $request){
        
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->confirm_password;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      //Auth::logout();  
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
    
    public function update_password_api(Request $request){
        
      $password=DB::table('users')
        ->select('*')
              ->where('id', $request->user_id)
              ->first();
              
      //$password=$request->password;
      
      $oldpass=$request->old_pass;
      $newpass=$request->new_pass;
      $confirm=$request->confirm_pass;
      if (Hash::check($oldpass,$password->password)) {
           if ($newpass === $confirm) {
                      $user=User::find($request->user_id);
                      $user->password=Hash::make($request->new_pass);
                      $user->save();
                      //Auth::logout();  
                      $notification=array(
                        'messege'=>'Password Changed Successfully',
                        'alert-type'=>'success'
                         );
                       return response()->json(['status'=>true,'message'=>'Password Changed Successfully'],200);
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return response()->json(['status'=>false,'message'=>'New password and Confirm Password not matched!']);
                 }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return response()->json(['status'=>false,'message'=>'Old Password not matched!']);
      }
        
    }
    
     public function address_api(Request $request){
         
         if($request->tag == 'fetch'){
             
              $user_id = $request->user_id;
              
              $address =  DB::table('addresses')
                        ->where('user_id', $user_id)
                        ->whereNotNull('fullname')
                        ->get();
                        
              if($address->count() > 0)
              {
                  return \Response::json([
            				    'status' => true,
            				    'message' => 'success',
            				    'addresses' => $address]); 
              }
               else{
                   return \Response::json([
            				    'status' => false,
            				    'message' => 'No address found']); 
               }
               	
             
         }
         
         if($request->tag == 'default'){
             
            $check = DB::table('addresses')
                ->select('*')
                ->where('user_id', $request->user_id)
                ->where('id', $request->address_id)
                ->get();
                
         if($check->count() > 0)
        {
            
             $data = array();
             $data['default'] = 0;
             
             $data1 = array();
             $data1['default'] = 1;
             
             DB::table('addresses')
                ->where('user_id', $request->user_id)
                ->update($data);
            
             DB::table('addresses')
                ->where('id', $request->address_id)
                ->where('user_id', $request->user_id)
                ->update($data1);
                
             $default_address = DB::table('addresses')
                ->select('*')
                ->where('user_id', $request->user_id)
                ->where('default', 1)
                ->get();
                
            
                
             return response()->json(['status'=>true,'message'=>'Success','addresses'=>$default_address]);
            }else{
                
                return response()->json(['status'=>false,'message'=>'No address found']);
            }
             
         }
         
         if($request->tag == 'add'){
             
             
              $validator = Validator::make($request->all(), [ 
            
                    'user_id' => 'required',
                    'fullname' => 'required',
                    'full_address' => 'required', 
                    'city' => 'required',
                    'state' => 'required',
                    'pin_code' => 'required'
                ]);
        
                 if ($validator->fails()) { 
                     return \Response::json([
            				    'status' => false,
            				    'message' => 'error',
            				    'error' => $validator->errors()]);
                } 
                
                 $data = array();
        
        $check = DB::table('addresses')
                ->select('*')
                ->where('user_id', $request->user_id)
                ->get();
                
        if($check->count() > 0)
        {
              
            $data['user_id'] = $request->user_id;
            $data['fullname'] = $request->fullname;
            $data['full_address'] = $request->full_address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['alternate_phone'] = $request->alternate_phone;
            $data['default'] = 0;
            $data['created_at'] = Carbon::Now();
            $data['updated_at'] = Carbon::Now();
            
            DB::table('addresses')->insert($data);
        }
        else
        {
            $data['user_id'] = $request->user_id;
            $data['fullname'] = $request->fullname;
            $data['full_address'] = $request->full_address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['alternate_phone'] = $request->alternate_phone;
            $data['default'] = 1;
            $data['created_at'] = Carbon::Now();
            $data['updated_at'] = Carbon::Now();
            
            DB::table('addresses')->insert($data);
        }
                
            //      $data = array();
        
            //     $data['user_id'] = $request->user_id;
            //     $data['fullname'] = $request->fullname;
            //     $data['full_address'] = $request->full_address;
            //     $data['city'] = $request->city;
            //     $data['state'] = $request->state;
            //     $data['pin_code'] = $request->pin_code;
            //     $data['alternate_phone'] = $request->alternate_phone;
            //     $data['created_at'] = Carbon::Now();
            //     $data['updated_at'] = Carbon::Now();
        
            //   DB::table('addresses')->insert($data);
        
    
        	return \Response::json([
            				    'status' => true,
            				    'message' => 'Address Inserted SuccessFully']); 
                
                
             
         }
         
          if($request->tag == 'edit'){
              
               $user_id = $request->user_id;
               $address_id = $request->address_id;
              
              $address =  DB::table('addresses')
                            ->where('user_id', $user_id)
                            ->where('id', $address_id)->get();
               
               	return \Response::json([
            				    'status' => true,
            				    'message' => 'success',
            				    'addresses' => $address]); 
             
         }
         
          if($request->tag == 'update'){
              
               $validator = Validator::make($request->all(), [ 
            
                    'user_id' => 'required',
                    'fullname' => 'required',
                    'full_address' => 'required', 
                    'city' => 'required',
                    'state' => 'required',
                    'pin_code' => 'required'
                ]);
        
                 if ($validator->fails()) { 
                     
                      return \Response::json([
            				    'status' => false,
            				    'message' => 'error',
            				    'error' => $validator->errors()]);
                    
                } 
                
                
                
                 $data = array();
                 
                 $address_id = $request->address_id;
        
                $data['user_id'] = $request->user_id;
                $data['fullname'] = $request->fullname;
                $data['full_address'] = $request->full_address;
                $data['city'] = $request->city;
                $data['state'] = $request->state;
                $data['pin_code'] = $request->pin_code;
                $data['alternate_phone'] = $request->alternate_phone;
                $data['created_at'] = Carbon::Now();
                $data['updated_at'] = Carbon::Now();
        
               DB::table('addresses')->where('id', $address_id)->update($data);
               
               return \Response::json([
            				    'status' => true,
            				    'message' => 'Address Updated SuccessFully']);
             
         }
         
          if($request->tag == 'delete'){
              
              $address_id = $request->address_id;
              
               $check = DB::table('addresses')
                ->select('*')
                ->where('user_id', $request->user_id)
                ->where('default', 1)
                ->get();
                
            if($check->count() > 0)
            {
                 return \Response::json([
            				    'status' => false,
            				    'message' => 'This is your default address please change your default address before delete']);
                
            }else{
                DB::table('addresses')->where('id', $address_id)->delete();
              
              return \Response::json([
            				    'status' => true,
            				    'message' => 'Address Deleted SuccessFully']);
            }
                
              
             
         }
         
        
    }
    
     public function order_list_api(Request $request){
        
    	$user_id = $request->user_id;
    	
        $orders = DB::table('itemorders')
        ->where('user_id', $user_id)
        ->orderBy('id', 'DESC')->get();
        
         if($orders->count() > 0)
        {
            return response()->json(['status'=>true,'message'=>'success','orders' => $orders],200);
        }
        else
        {
            return response()->json(['status'=>false,'message'=>'No orders found'],200);
        }
        
    }
    
    public function track_order(Request $request){
        
        $code = $request->code;
	 	$track = DB::table('itemorders')->where('status_code',$code)->first();
		if($track){
			return view('layouts.ordertrack',compact('track'));
		} else {
		$notification=array(
          'messege'=>'Invalid Code!',
          'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
		}
        
        
    }
}
