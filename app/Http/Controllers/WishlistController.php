<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Models\cart;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class WishlistController extends Controller
{
    
    public function addToWishlist(Request $req)
    {
        
        
        $user = Auth::id();
        $product_id = $req->product_id;

    	$check = DB::table('wishlists')->where('user_id',$user)->where('product_id',$product_id)->first();

		$data = array(

			'user_id' => $user,
			'product_id' => $product_id
		);

		if(Auth::Check()){

		    	if($check){
		    	    
    				 $notification=array(
                    'messege'=>'Product Has Already Added On Your Wishlist',
                    'alert-type'=>'error'
                 );
                 
                return Redirect()->back()->with($notification); 
                
			} else{
				DB::table('wishlists')->insert($data);
			    $notification=array(
                    'messege'=>'Product Added To Wishlist SuccessFully',
                    'alert-type'=>'success'
                 );
                 
                return Redirect()->back()->with($notification); 
			}

		} else {
			$notification=array(
                    'messege'=>'Login First To Your Account',
                    'alert-type'=>'error'
                 );
                 
                return Redirect()->route('user.login')->with($notification); 
		}
        
        
        
        
        
        // if($req->session()->has('user'))
        // {
        //     $userid = $req->session()->get('user')['id'];
        //     $wishlist= new wishlist;
        
        //     $count = wishlist::where('product_id', '=', $req->product_id,'and','user_id','=',$userid)->count();

        //     if($count > 0)
        //     {
        //         $wishlist->where('product_id', '=', $req->product_id,'and','user_id','=',$userid)
        //                  ->update(['qty' => DB::raw('qty + 1'),'updated_at' => Carbon::now()]);
        //         //return "already exists";
        //     }
        //     else
        //     {
        //         $wishlist->user_id=$req->session()->get('user')['id'];
        //         $wishlist->product_id=$req->product_id;
        //         $wishlist->qty=1;
        //         $wishlist->save();
        //     }

        //   return redirect(url()->previous());
        // }
        // else
        // {
        //     return redirect('/login_register');
        // }
    }
    
    public function addToWishlistapi(Request $req)
    {
        
        
        
                $user = $req->user_id;
                $productId = $req->product_id;

            	$check = DB::table('wishlists')->where('user_id',$user)->where('product_id', $productId)->first();
            	
            
            $wishlistcount = DB::table('wishlists')->where('user_id',$user)->count();
            
            		$data = array(
            			'user_id' => $user,
            			'product_id' => $productId,
            			'created_at' => Carbon::now(),
            			'updated_at' => Carbon::now()
            		);
            
            		
            
            			if($check){
            			    DB::table('wishlists')
            			        ->where('user_id',$user)
            			        ->where('product_id', $productId)
            			        ->delete();
            			        
            			        
            			        
            			        $count = DB::table('wishlists')->where('user_id',$user)->count();
            				return \Response::json([
            				    'status' => false,
            				    'message' => 'Removed from wishlist',
            				    'isadded'=>false,
            				    'wishlist_count' => $count]);
            				    
            				    
            				    
            			} else{
            				DB::table('wishlists')->insert($data);
            				$count = DB::table('wishlists')->where('user_id',$user)->count();
            				return \Response::json(['status' => true,
            				                        'message' => 'Product Added On Wishlist',
            				                        'isadded'=>true,
            				                        'wishlist_count' => $count
            				]);   
            			}
            
           
    }
    
    public function deleteFromWishlistapi(Request $req){
        
        $user = $req->user_id;
        $productId = $req->product_id;

        $check = DB::table('wishlists')->where('user_id',$user)->where('product_id', $productId)->first();
        $delete_wishlist = DB::table('wishlists')->where('user_id',$user)->where('product_id', $productId)->delete();
        $count = DB::table('wishlists')->where('user_id',$user)->count();
        
        if($check && $delete_wishlist){
            	return \Response::json([
            				    'status' => true,
            				    'message' => 'Product Deleted SuccessFully',
            				    'wishlist_count' => $count
            				    ]);  
        } else {
            $count = DB::table('wishlists')->where('user_id',$user)->count();
            	return \Response::json([
            				    'status' => false,
            				    'message' => 'Product Not Found',
            				    'wishlist_count' => $count]);  
        } 
        
    }
    
    static function wishlistItem()
    {
     $userId=Session::get('user')['id'];
     return wishlist::where('user_id',$userId)->count();
    }
    
    public function wishList()
    {
        if(session()->has('user'))
        {
            $userId=Session::get('user')['id'];
            $wishlistproducts= DB::table('wishlists')
            ->join('products','wishlists.product_id','=','products.id')
            ->where('wishlists.user_id',$userId)
            ->select('products.*','wishlists.qty','wishlists.id as wishlist_id')
            ->get();

            return view('layouts.wishlist',['wishlistproducts'=>$wishlistproducts]);
        }else
        {
            $notification=array(
                'messege'=>'Login First To Add On Wishlist',
                'alert-type'=>'error'
                 );
            return redirect('login_register')->with($notification);
        }
        
        return redirect('cart');
        
        
        
        
    }
    
    public function Wishlistapi(Request $req)
    {
      
            $userId=$req->user_id;
            $wishlistproducts= DB::table('wishlists')
            ->join('products','wishlists.product_id','=','products.id')
            ->where('wishlists.user_id',$userId)
            ->select('products.*','wishlists.qty','wishlists.id as wishlist_id')
            ->get();

            $cartcount = cart::where('user_id',$userId)->count();
            $wishlistcount = wishlist::where('user_id',$userId)->count();
            
            if(count($wishlistproducts) > 0)
            {
       
            return response()->json(['status'=>true,'message'=>'success','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'wishlist_products'=>$wishlistproducts],200);
            }
            else{
                return response()->json(['status'=>false,'message'=>"No data found",'wishlist_count'=>$wishlistcount]);
            }
    }
    
    
    public function updateWishlistqty()
    {
        if(session()->has('user'))
        {
            $userid = session()->get('user')['id'];
            $wishlist= new wishlist;
            
            $wishlist->where(['user_id' => $userid, 'product_id' => request('product_id')])
                  ->update(['qty' => request('value'), 'updated_at' => Carbon::now()]);
      
           return json_encode(array('statusCode'=>200));
        
        }
        else
        {
            return redirect('/login_register');
        }
    }
    
    
     public function updateWishlistqtyapi()
        {
            
                $userId=$req->user_id;
                $wishlist= new wishlist;
                
                $wishlist->where(['user_id' => $userId, 'product_id' => request('product_id')])
                      ->update(['qty' => request('value'), 'updated_at' => Carbon::now()]);
          
               return json_encode(array('statusCode'=>200));
            
            
            
        }
    
    
    public function removeFromWishlist(Request $req)
    {
        // if(session()->has('user'))
        // {
        //     $userid = session()->get('user')['id'];
        //     $wishlist= new wishlist;
        //     $wishlist->where('product_id', '=', $req->product_id,'and','user_id','=',$userid)
        //                      ->delete();
        
        // return redirect(url()->previous());
        // }
        // else
        // {
        //     return redirect('/login_register');
        // }
        
        $user = Auth::id();
        $productId = $req->product_id;

        $check = DB::table('wishlists')->where('user_id',$user)->where('product_id', $productId)->first();
        $delete_wishlist = DB::table('wishlists')->where('user_id',$user)->where('product_id', $productId)->delete();
        $count = DB::table('wishlists')->where('user_id',$user)->count();
        
        if($check && $delete_wishlist){
            
             $notification=array(
                'messege'=>'Deleted Item From Wishlist SuccessFully',
                'alert-type'=>'success'
                 );
                 
             return Redirect()->back()->with($notification);
        } else {
            
            	 $notification=array(
                'messege'=>'Something Went Wrong',
                'alert-type'=>'error'
                 );
                 
            return Redirect()->back()->with($notification);
        } 
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
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
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(wishlist $wishlist)
    {
        //
    }
}
