<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\User;
use App\Models\address;
use App\Models\cart;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Validator;

class UsersController extends Controller
{
    public $successStatus = 200;
    
     function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            // return response()->json([
            //     'message' => 'Unauthorized'
            // ], 401);
            
            $error=array(
                        'messege'=>'Username Or Password Invalid',
                        'alert-type'=>'error'
                         );
            
           return redirect()->back()->with($error);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        $request->session()->put('user',$user);
          $notification=array(
                        'messege'=>'Login SuccessFully!',
                        'alert-type'=>'success'
                         );
            // Session::put($notification);
            return redirect('/')->with($notification);
        
        // $user= users::where(['email'=>$req->email])->first();
        // if(!$user || !Hash::check($req->password,$user->password))
        // {
        //     return "Username or password is not matched";
        // }
        // else{
        //     $req->session()->put('user',$user);
        //     return redirect('/');
        // }
    }
    
    
    
    public function apilogin(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            
            'email' => 'required|email', 
            'password' => 'required'
        ]);
        if ($validator->fails()) { 
            return response()->json(['status'=>false,'message'=>'Login unsuccessfull','error'=>$validator->errors()], 200);
        }  
        
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json(['status'=>false,'message'=>'Login unsuccessfull','error'=>'Unauthorised'], 200);
            
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        
        $userId=$user->id;
        $cartcount = cart::where('user_id',$userId)->count();
        $wishlistcount = wishlist::where('user_id',$userId)->count();
        
        if($user->profile_pic == Null)
        {
            $profile_pic = "";
        }else{
            $profile_pic = 'https://4med.in/uploads/avatar/'.$user->profile_pic;
        }
        
        $response = ['user_id' => $user->id, 
                    'user_name' => $user->name, 
                    'user_email' => $user->email, 
                    'user_phone' => $user->phone,
                    'profile_pic' => $profile_pic,
                    'access_token' => $tokenResult->accessToken, 
                    'token_type' => 'Bearer', 
                    'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()];
     
        
        return response()->json(['status'=>true,'message'=>'Login successfull','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'user_details'=>$response],200);
    }
    
    function register(Request $request)
    {
       
        
        // $user = new users;
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->phone=$request->phone;
        // $user->payment_mode=1;
        // $user->password=Hash::make($request->password);
        // $user->status=1;
        // $user->save();
        
         $user =  users::create([
            'name' => $request['name'],
            'email' => $request['email'],
             'payment_mode' => 1,
            'phone' => $request['phone'],
            'status' => 1,
            'password' => $request['password'],
        ]);

        address::create([

            'user_id' => $user->id,
           
            

        ]);

        
         $notification=array(
                'messege'=>'Registered SuccessFully,  Now Login With Your Credentials',
                'alert-type'=>'success'
                 );
        
            return redirect()->route('user.login')->with($notification);
    }
    
    
     function register_api(Request $request)
    {
       
        
        // $user = new users;
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->phone=$request->phone;
        // $user->payment_mode=1;
        // $user->password=Hash::make($request->password);
        // $user->status=1;
        // $user->save();
        
         $user =  users::create([
            'name' => $request['name'],
            'email' => $request['email'],
             'payment_mode' => 1,
            'phone' => $request['phone'],
            'status' => 1,
            'password' => Hash::make($request['password']),
        ]);

        address::create([

            'user_id' => $user->id,
           
            

        ]);

        
       
        
            return response()->json(['status'=>true,'message'=>'Registered SuccessFully']);
    }
    
    
    
    function mobile_and_email_api(Request $request)
    {
         $emailvalidator = Validator::make($request->all(), [ 
            
            'email' => 'required|email|unique:users,email',
            
        ]);
        
        $phonevalidator = Validator::make($request->all(), [ 
            
            'phone' => 'required|unique:users,phone',
            
        ]);
        if ($emailvalidator->fails() && $phonevalidator->fails()) { 
             
             $obj = json_decode($emailvalidator->errors());
             $obj1 = json_decode($phonevalidator->errors());
             
             return response()->json(['status'=>false,'message'=>'users already','email'=>$obj->email[0],'phone'=>$obj1->phone[0]]);
                
        }
        else if ($emailvalidator->fails()) { 
             
             $obj = json_decode($emailvalidator->errors());
             
             return response()->json(['status'=>false,'message'=>'users already','email'=>$obj->email[0]]);
                
        }else if($phonevalidator->fails())
        {
            $obj = json_decode($phonevalidator->errors());
             
            return response()->json(['status'=>false,'message'=>'users already','phone'=>$obj->phone[0]]);
            
        }else{
             return response()->json(['status'=>true,'message'=>'no users']);
         }
            
    }
    
    function verify_phone_api(Request $request){
        
        
        $emailvalidator = Validator::make($request->all(), [ 
            
            'phone' => 'required|numeric',
            
        ]);
        
        
        if ($emailvalidator->fails()) { 
             
             $obj = json_decode($emailvalidator->errors());
             
             
             return response()->json(['status'=>false,'message'=>'Enter Your Phone Number For Further Process','error_message'=>$obj]);
                
        }
        
        
        
        $phone = $request->phone;
        
        $check = DB::table('users')->where('phone',$phone)->first();
        //dd($check);
        
        if($check){
             $user_email = $check->email;
            $user_phone = $check->phone;
            $user_id = $check->id;
            
             return response()->json(['status'=>true,'message'=>'Phone Number Verified', 'user_id' =>  $user_id,  'email' => $user_email, 'contact_no' => $user_phone]);
        } else {
            return response()->json(['status'=>false,'message'=>'Invalid Phone Number, Please Check Your Phone Number First']);
        }
        
    }
    
    public function forget_password_api(Request $request){
        
         $useridvalidator = Validator::make($request->all(), [ 
            
            'user_id' => 'required|numeric',
            
        ]);
        
        $newpassvalidator = Validator::make($request->all(), [ 
            
            'new_pass' => 'required',
            
        ]);
        
        if ($useridvalidator->fails()) { 
             
             $obj = json_decode($useridvalidator->errors());
             
             
             return response()->json(['status'=>false,'message'=>'Enter User Id For Updating Password For A Unique User','error_message'=>$obj]);
                
        }
        
        if ($newpassvalidator->fails()) { 
             
             $obj = json_decode($newpassvalidator->errors());
             
             
             return response()->json(['status'=>false,'message'=>'Enter New Password To Update It For A User','error_message'=>$obj]);
                
        }
        
        // if ($useridvalidator->fails() && $newpassvalidator->fails()) { 
             
        //      $obj = json_decode($useridvalidator->errors());
        //      $obj1 = json_decode($newpassvalidator->errors());
             
        //      return response()->json(['status'=>false,'message'=>'Please Insert Value For User ID And User Password','email'=>$obj,'phone'=>$obj1]);
                
        // }
        
         $password = DB::table('users')
                    ->select('*')
                    ->where('id', $request->user_id)
                    ->first();
        
         $newpass = $request->new_pass;
        $confirm = $request->confirm_pass;
        
         if ($newpass === $confirm) {
                      $user=User::find($request->user_id);
                      $user->password=Hash::make($request->new_pass);
                      $user->save();
                      //Auth::logout();  
                      
                       return response()->json(['status'=>true,'message'=>'Password Changed Successfully'],200);
                 }else{
                     
                       return response()->json(['status'=>false,'message'=>'New password and Confirm Password not matched!']);
                 }     
        
    }
    
    
    
     function sendotp(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if ($validator->fails()) { 
            $arr = json_decode($validator->errors());

          foreach ($arr as $key => $jsons) {
             foreach($jsons as $key => $value) {
            $notification=array(
                'messege'=>$value,
                'alert-type'=>'error'
                 );
            }
        }
           
            return redirect()->back()->with($notification);
        } 
        
       
        
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $password = $request['password'];
        
         $response = ['name' => $name,
                    'email' => $email,
                    'phone' =>$phone,
                    'payment_mode' => 1,
                    'status' => 1, 
                    'password' => Hash::make($password)];

        return view('layouts.otp',['data'=>$response]);
                                    
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
