<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prescriptions;
use Validator;
use DB;

class UploadPrescriptionFileController extends Controller

{
    //  public function upload(Request $request)
    //     {
            
            
            
            
    //     //  $this->validate($request, [
    //     //   'select_file'  => 'required|image|mimes:jpg,png,jpeg|max:2048'
    //     //  ]);
    
    //     //  $image = $request->file('select_file');
    
    //     //  $new_name = rand() . '.' . $image->getClientOriginalExtension();
    
    //     //  $image->move(public_path('assets/images'), $new_name);
    //     //  return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
        
    //     //return $request->file('select_file')->store('public');
         
    //      //return view('layouts.index');

    //     echo "hi";
    //     rerurn "hello there";
        
         
    //     }
    
     //upload image
    public function upload(Request $request)
    {
        
       $user_id = auth()->user()->id;
       dd($user_id);
        if($request->hasfile('image')){
            $file = $request->file('image');
            $ext =  $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/prescription/',$filename);
            prescriptions::create([
              'user_id'=>$user_id, 
              'image'=>$filename,
              'verified' => 0
            ]);
            
             $notification=array(
                         'messege'=>'Your Prescription Has Been Send, We Will Get Back To You Soon',
                         'alert-type'=>'success'
                          );
            
            
        return redirect()->route('home.page')->with($notification);
        }
    }
    
    public function prescription_details_api(Request $request)
    {
        
       $user_id = $request->user_id;
       
       if($user_id == null)
       {
           return response()->json(['status'=>false, 'message'=>'User id is null'],200);
       }
       
        $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$user_id)
                            ->whereNotNull('fullname')
                            ->select('addresses.*','users.name','users.email','users.phone')
                            ->get();
            
             $notification=array(
                         'messege'=>'Your Prescription Has Been Send, We Will Get Back To You Soon',
                         'alert-type'=>'success'
                          );
            
        return response()->json(['status'=>true, 'message'=>'success', 'useraddress'=>$useraddress],200);
      
        
    }
    
    public function upload_prescription_api(Request $request)
    {
        
       $user_id = $request->user_id;
       
       if($user_id == null)
       {
           return response()->json(['status'=>false, 'message'=>'User id is null'],200);
       }
       
        if($request->hasfile('image')){
            $file = $request->file('image');
            
            $validator = Validator::make($request->all(), [
                'address_id' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:5120',
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
            
            
             $getaddress = DB::table('addresses')
                ->select('*')
                ->where('id',$request->address_id)
                ->first();
            
    
            $ext =  $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/prescription/',$filename);
            prescriptions::create([
              'user_id'=>$user_id,
              'fullname'=>$getaddress->fullname,
              'full_address'=>$getaddress->full_address,
              'city'=>$getaddress->city,
              'state'=>$getaddress->state,
              'pin_code'=>$getaddress->pin_code,
              'phone'=>$getaddress->alternate_phone,
              'image'=>$filename,
              'verified' => 0
            ]);
            
            
        return response()->json(['status' => true, 'message'=>'Your Prescription Has Been Send, We Will Get Back To You Soon'], 200);
        
        }else{
             return response()->json(['status'=>false, 'message'=>'Image null'],200);
        }
    }
}
