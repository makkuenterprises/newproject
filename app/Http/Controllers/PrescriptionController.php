<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prescriptions;
use DB;
use Carbon\Carbon;

class PrescriptionController extends Controller
{
    //
     public function upload(Request $request)
    {
        
         if($request->addresss == "")
            {
                 $notification=array(
                'messege'=>'Please add address',
                'alert-type'=>'error'
                 );
                 
              return Redirect()->back()->with($notification);
            }
        
         $this->validate($request,[
    	'image' => 'required|mimes:jpeg,jpg,png|max:4000'
    	]);
        
       $user_id = auth()->user()->id;
      // dd($user_id);
        if($request->hasfile('image')){
            
            $getaddress = DB::table('addresses')
            ->select('*')
            ->where('id',$request->address_id)
            ->first();
			
		
            
            
            $file = $request->file('image');
            $ext =  $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/prescription/',$filename);
           
            
            $user_info = array();
			
			$user_info['user_id'] = auth()->user()->id;
// 			$user_info['itemorder_id'] = $order_id;
            $user_info['image'] = $filename;
            $user_info['verified'] = 0;
			$user_info['fullname'] = $getaddress->fullname;
			$user_info['full_address'] = $getaddress->full_address;
			$user_info['city'] = $getaddress->city;
			$user_info['state'] = $getaddress->state;
			$user_info['pin_code'] = $getaddress->pin_code;
			$user_info['phone'] = $getaddress->alternate_phone;
			$user_info['created_at'] = Carbon::now();
            $user_info['updated_at'] = Carbon::now();
			//dd($user_info);
			DB::table('prescriptions')->insert($user_info);
            
             $notification=array(
                         'messege'=>'Your Prescription Has Been Send, We Will Get Back To You Soon',
                         'alert-type'=>'success'
                          );
            
            
        return redirect()->route('my.account')->with($notification);
        }
    }
}
