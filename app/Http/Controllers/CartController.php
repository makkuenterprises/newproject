<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    
    public function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            
            $userid = $req->session()->get('user')['id'];
            $cart= new cart;
        
            $check = DB::table('carts')->where('user_id',$userid)->where('product_id', $req->product_id)->first();
            //dd($check);
           
           //dd($product_id);
           
           $test = DB::table('products')
                  ->select('products.*')
                  ->where('products.id', $req->product_id)->first();
                  
           //dd($test);
           
           if($test->prescription_required == 1)
           {
               $notification=array(
    	          'messege'=>'Prescription Required For This Medicine Please Upload It!',
    	          'alert-type'=>'error'
	        );
                return redirect()->route('upload.prescription')->with($notification);   
           }else{

            if($check)
            {
                DB::table('carts')
                ->where('user_id',$userid)
                ->where('product_id', $req->product_id)
            			    ->update(['qty' => DB::raw('qty + 1'),'updated_at' => Carbon::now()]);
            			    
                
                //return "already exists";
            }
            else
            {
                $cart->user_id=$req->session()->get('user')['id'];
                $cart->product_id=$req->product_id;
                $cart->qty=1;
                $cart->save();
            }
            
            	$notification=array(
                    'messege'=>'Product Added To Cart SuccessFully',
                    'alert-type'=>'success'
                 );
                 

           return redirect(url()->previous())->with($notification);
           
           }
        }
        else
        {
            return redirect('/login_register');
        }
    }
    
    
     public function addToCartapi(Request $req)
    {
        
        
        
                $user = $req->user_id;
                $productId = $req->product_id;

            	$check = DB::table('carts')->where('user_id',$user)->where('product_id', $productId)->first();
            	
            
            		$data = array(
            			'user_id' => $user,
            			'product_id' => $productId,
            			'qty' => 1,
            			'created_at' => Carbon::now(),
            			'updated_at' => Carbon::now()
            		);
            
            		
            
            			if($check){
            			    DB::table('carts')
            			    ->update(['qty' => DB::raw('qty + 1'),'updated_at' => Carbon::now()]);
            			    $count = DB::table('carts')->where('user_id',$user)->count();
            				return \Response::json([
            				    'status' => true,
            				    'message' => 'Cart has been updated',
            				    'cart_count' => $count]);  
            			} else{
            				DB::table('carts')->insert($data);
            				$count = DB::table('carts')->where('user_id',$user)->count();
            				return \Response::json(['status' => true,
            				                        'message' => 'Product Added On Cart',
            				                        'cart_count' => $count
            				]);   
            			}
            
           
    }
    
    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return cart::where('user_id',$userId)->count();
    }
    
    function cartList()
    {
        if(session()->has('user'))
        {
            $userid=Session::get('user')['id'];
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
            // $products = DB::table('products')
            //           ->join('carts', 'products.id', '=', 'carts.product_id')
            //           ->where('carts.user_id', $userId)
            //           ->where('products.discount_price', '')
            //           ->select('products.discount_price')->
            //           get();
                       
                       //dd($products);
                       
                       $cartproductstotal=0;
                        $cartproductstotal1=0;
             $cartproductstotal2=0;
                       
              foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
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
            
           
    
            return view('layouts.cart',['cartproducts'=>$cartproducts, 'totalprice'=>$cartproductstotal, 'deliverycharge'=>$deliverycharge, 'grandprice'=>$grandprice]);
        }
        else
        {
            return redirect('/login_register');
        }
    }
    
    
    public function order_review_api(Request $req)
    {
        $userid=$req->user_id;
        
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->join('users','carts.user_id','users.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
          
            
             $cart_name= DB::table('users')
             ->join('carts','users.id','carts.user_id')
             ->where('carts.user_id',$userid)
                  ->first()->name;
                  
             $cart_email= DB::table('users')
             ->join('carts','users.id','carts.user_id')
             ->where('carts.user_id',$userid)
                  ->first()->email;
                  
                  $cart_phone= DB::table('users')
             ->join('carts','users.id','carts.user_id')
             ->where('carts.user_id',$userid)
                  ->first()->phone;
            
                              
            $cartproductstotal=0;
           $cartproductstotal1=0;
             $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNotNull('products.discount_price')
            ->sum(DB::raw('(products.price - ((products.price / 100) * products.discount_price)) * carts.qty'));
           
        }
        
        $cartproductstotal = $cartproductstotal1 + $cartproductstotal2;
        }
        
        $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userid)
                            ->where('addresses.default',1)
                            ->select('addresses.*')
                            ->first();
                            
                            
        
            
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
            
            $com_image = 'https://4med.in/assets/images/logo/logo1.png';
    
    
    
    
    
    
        
        if(count($cartproducts) > 0)
            {
       
                if($useraddress)
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>true,'name' => $cart_name,'company_image' => $com_image,'email' => $cart_email,'phone' => $cart_phone,'total_price'=>$cartproductstotal,'delivery_charge'=>$deliverycharge,'grand_price'=>$grandprice,'cart_products'=>$cartproducts,'address'=>$useraddress],200);
                 }else
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>false,'cart_products'=>$cartproducts],200);
                 }
       
            
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found"]);
            }
            
            
           
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
    
     public function Cartlistapi(Request $req)
    {
      
            $userId=$req->user_id;
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userId)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();

            $cartcount = cart::where('user_id',$userId)->count();
            $wishlistcount = wishlist::where('user_id',$userId)->count();
            
            if(count($cartproducts) > 0)
            {
       
            return response()->json(['status'=>true,'message'=>'success','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'cart_products'=>$cartproducts],200);
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found"]);
            }
    }
        
    public function moveWishlistoCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $userid = $req->session()->get('user')['id'];
            $cart= new cart;
            
            $count = cart::where('product_id', '=', $req->product_id,'and','user_id','=',$userid)->count();


            if($count > 0)
            {
                $cart->where('product_id', '=', $req->product_id,'and','user_id','=',$userid)
                         ->update(['qty'=> DB::raw('qty + 1'),'updated_at' => Carbon::now()]);
                
                //return "already exists";
            }
            else
            {
                $cart->user_id=$req->session()->get('user')['id'];
                $cart->product_id=$req->product_id;
                $cart->qty=1;
                $cart->save();
            }
            
            $wishlist= new wishlist;
            $wishlist->where('product_id', '=', $req->product_id,'and','user_id','=',$userid)
                         ->delete();
                         
            return redirect(url()->previous());
            
            //return "hello";

        }
        else
        {
            return redirect('/login_register');
        }
    }
    
    
    public function moveWishlistoCartapi(Request $req)
    {
       
            $userid = $req->user_id;
            $productId = $req->product_id;
            
            $cart= new cart;
            
            $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id', $productId)->first();
            $check1 = DB::table('carts')->where('user_id',$userid)->where('product_id', $productId)->first();
            	
            	
            		$data = array(
            			'user_id' => $userid,
            			'product_id' => $productId,
            			'qty' => 1,
            			'created_at' => Carbon::now(),
            			'updated_at' => Carbon::now()
            		);
            
            		
            
            			if(!$check){
            				return \Response::json([
            				    'status' => false,
            				    'message' => 'No product found on your wishlist']);  
            			} else{
            			    
            			    if($check1){
                			    DB::table('carts')
                			    ->update(['qty' => DB::raw('qty + 1'),'updated_at' => Carbon::now()]);
                			    DB::table('wishlists')->where('user_id',$userid)->where('product_id', $productId)->delete();
                			    $cartcount = DB::table('carts')->where('user_id',$userid)->count();
                				$wishlistcount = DB::table('wishlists')->where('user_id',$userid)->count();
                				return \Response::json([
                				    'status' => true,
                				    'message' => 'Cart has been updated',
                				    'cart_count' => $cartcount,
                				    'wishlist_count' => $wishlistcount]);  
                			} else{
                				DB::table('carts')->insert($data);
                				DB::table('wishlists')->where('user_id',$userid)->where('product_id', $productId)->delete();
                				$cartcount = DB::table('carts')->where('user_id',$userid)->count();
                				$wishlistcount = DB::table('wishlists')->where('user_id',$userid)->count();
                				return \Response::json(['status' => true,
                				                        'message' => 'Product Added On Cart',
                				                        'cart_count' => $cartcount,
                				                        'wishlist_count' => $wishlistcount
                				]);   
                			}
            			
                            
            			
            			}
            			


        
    }
    
    
    public function updateCartqtyapi(Request $req)
    {
        
            $userid = $req->user_id;
            $cart= new cart;
            
            $cart->where(['user_id' => $userid, 'product_id' => request('product_id')])
                  ->update(['qty' => request('value'), 'updated_at' => Carbon::now()]);
                  
      
        $cartproductstotal= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->sum(DB::raw('products.price * carts.qty'));
            
           return json_encode(array('statusCode'=>200, 'totalprice'=>$cartproductstotal));
        
        
    }
    
    
    public function updateCartqty()
    {
        if(session()->has('user'))
        {
            $userid = session()->get('user')['id'];
            $cart= new cart;
            
            $cart->where(['user_id' => $userid, 'product_id' => request('product_id')])
                  ->update(['qty' => request('value'), 'updated_at' => Carbon::now()]);
                  
      
         $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();
            
              $cartproductstotal1=0;
             $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
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
            
             return json_encode(array('statusCode'=>200, 'totalprice'=>$cartproductstotal, 'deliverycharge'=>$deliverycharge, 'grandprice'=>$grandprice,));
        
        }
        else
        {
            return redirect('/login_register');
        }
    }
    
    
    public function removeFromCart(Request $req)
    {
        if(session()->has('user'))
        {
            $userid = session()->get('user')['id'];
            $cart = new cart;
            $cart->where('product_id', '=', $req->product_id,'and','user_id','=',$userid)
                             ->delete();
        
        return redirect(url()->previous());
        }
        else
        {
            return redirect('/login_register');
        }
        
        
    }
    
    public function removeallFromCart()
    {
        if(session()->has('user'))
        {
            $userid = session()->get('user')['id'];
            $cart = new cart;
            $cart->where('user_id','=',$userid)->delete();
        
        return redirect(url()->previous());
        }
        else
        {
            return redirect('/login_register');
        }
        
        
    }
    
    public function updateCart()
    {
        if(session()->has('user'))
        {
           
            return Redirect::back();
        
        }
        else
        {
            return redirect('/login_register');
        }
    }
    
    
    public function all_cart_function_api(Request $req)
    {
        if($req->tag == 'cart')
        {
            $userid=$req->user_id;
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();

            $cartcount = cart::where('user_id',$userid)->count();
            $wishlistcount = wishlist::where('user_id',$userid)->count();
            
            $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userid)
                            ->where('addresses.default',1)
                            ->select('addresses.*')
                            ->first();
                            
            $checkdiscountprice= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.discount_price')
            ->get();
            
            $cartproductstotal=0;
            $cartproductstotal1=0;
            $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
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
            
                            
            if(count($cartproducts) > 0)
            {
       
                if($useraddress)
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>true,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'total_price'=>$cartproductstotal,'delivery_charge'=>$deliverycharge,'grand_price'=>$grandprice,'cart_products'=>$cartproducts,'address'=>$useraddress],200);
                 }else
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>false,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'cart_products'=>$cartproducts],200);
                 }
       
            
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found",'cart_count'=>$cartcount]);
            }
        }
        
        if($req->tag == 'plus')
        {
            $userid = $req->user_id;
            $cart= new cart;
            
            $qtycheck = DB::table('carts')
                            ->where('user_id',$userid)
                            ->where('product_id',$req->product_id)
                            ->first()->qty;
                            
                    
            if($qtycheck < 1000)
            {
              
            $cart->where(['user_id' => $userid, 'product_id' => request('product_id')])
                  ->update(['qty' =>  DB::raw('qty + 1'), 'updated_at' => Carbon::now()]);
                  
            }
            
                  
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();

            $cartcount = cart::where('user_id',$userid)->count();
            $wishlistcount = wishlist::where('user_id',$userid)->count();
            
            $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userid)
                            ->where('addresses.default',1)
                            ->select('addresses.*')
                            ->first();
            
            $cartproductstotal=0;
               $cartproductstotal1=0;
             $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
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
            
                            
            if(count($cartproducts) > 0)
            {
       
                if($useraddress)
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>true,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'total_price'=>$cartproductstotal,'delivery_charge'=>$deliverycharge,'grand_price'=>$grandprice,'cart_products'=>$cartproducts,'address'=>$useraddress],200);
                 }else
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>false,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'cart_products'=>$cartproducts],200);
                 }
       
            
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found",'cart_count'=>$cartcount]);
            }
           
        }
        
        if($req->tag == 'minus')
        {
            $userid = $req->user_id;
            $cart= new cart;
            
            $qtycheck = DB::table('carts')
                            ->where('user_id',$userid)
                            ->where('product_id',$req->product_id)
                            ->first()->qty;
                            
                    
            if($qtycheck > 1)
            {
                            
                            
            $cart->where(['user_id' => $userid, 'product_id' => request('product_id')])
                  ->update(['qty' =>  DB::raw('qty - 1'), 'updated_at' => Carbon::now()]);
                  
            }
                  
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();

            $cartcount = cart::where('user_id',$userid)->count();
            $wishlistcount = wishlist::where('user_id',$userid)->count();
            
            $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userid)
                            ->where('addresses.default',1)
                            ->select('addresses.*')
                            ->first();
            
            $cartproductstotal=0;
               $cartproductstotal1=0;
             $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
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
            
                            
            if(count($cartproducts) > 0)
            {
       
                if($useraddress)
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>true,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'total_price'=>$cartproductstotal,'delivery_charge'=>$deliverycharge,'grand_price'=>$grandprice,'cart_products'=>$cartproducts,'address'=>$useraddress],200);
                 }else
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>false,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'cart_products'=>$cartproducts],200);
                 }
       
            
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found",'cart_count'=>$cartcount]);
            }
            
            
        
        }
        
        if($req->tag == 'remove_single_item')
        {
            $userid = $req->user_id;
            $productId = $req->product_id;
            $cart= new cart;
            
            DB::table('carts')->where('user_id',$userid)->where('product_id', $productId)->delete();
                  
            $cartproducts= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->select('products.*','carts.qty','carts.id as cart_id')
            ->get();

            $cartcount = cart::where('user_id',$userid)->count();
            $wishlistcount = wishlist::where('user_id',$userid)->count();
            
            $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',$userid)
                            ->where('addresses.default',1)
                            ->select('addresses.*')
                            ->first();
                            
            $cartproductstotal=0;
           $cartproductstotal1=0;
             $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * carts.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('carts')
            ->join('products','carts.product_id','=','products.id')
            ->where('carts.user_id',$userid)
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
            
                            
            if(count($cartproducts) > 0)
            {
       
                if($useraddress)
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>true,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'total_price'=>$cartproductstotal,'delivery_charge'=>$deliverycharge,'grand_price'=>$grandprice,'cart_products'=>$cartproducts,'address'=>$useraddress],200);
                 }else
                 {
                     return response()->json(['status'=>true,'message'=>'success','address_found'=>false,'cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'cart_products'=>$cartproducts],200);
                 }
       
            
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found",'cart_count'=>$cartcount]);
            }
        }
        
        if($req->tag == 'remove_all')
        {
            $userid = $req->user_id;
            $cart= new cart;
            
            DB::table('carts')->where('user_id',$userid)->delete();
                  
            $cartcount = cart::where('user_id',$userid)->count();
            
            return response()->json(['status'=>true,'message'=>'Cart is empty','cart_count'=>$cartcount],200);
        }
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
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
}
