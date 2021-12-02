<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\wishlist;
use DB;
use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->paginate(30);
       
        //$data= products::paginate(100);
        $categoriesdata= categories::all();
        
        return view('layouts.products',['products'=>$data, 'categories'=>$categoriesdata]);
    }
    
    public function apiindex(Request $req)
    {
        
         $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->paginate(10);
       
        $userId=$req->user_id;
        $cartcount = cart::where('user_id',$userId)->count();
        $wishlistcount = wishlist::where('user_id',$userId)->count();
       
       //$response = [$data];
     
        
        return response()->json(['status'=>true,'message'=>'success','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'products'=>$data],200);
        //return response()->json($data);
    }
    
    public function productdetails($id)
    {
         $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->where('products.id',$id)
       ->first();
       
        //$data= products::find($id);
        return view('layouts.product_details',['products'=>$data]);
    }
    
    public function apiproductdetails(Request $req)
    {
        
        //$data= products::find($id)->getCategoriesName;
        //$dataa= $data->products;
       // return response()->json($data);
        
        $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('products.id',$req->product_id)
       ->where('products.status',1)
       ->select('products.id','products.category_id','products.product_name','products.product_description','products.product_thumbnail','products.price','products.discount_price','products.product_size','products.prescription_required','products.status','categories.category_name')
       ->get();
       
     
   
       //
       
       //dd($description);
       
       $check = DB::table('wishlists')->where('user_id',$req->user_id)->where('product_id', $req->product_id)->first();
       
       if($check){
            	$isadded = true;
        } else{
            	$isadded = false;
        }
            			
       
        $userId=$req->user_id;
        $cartcount = cart::where('user_id',$userId)->count();
        $wishlistcount = wishlist::where('user_id',$userId)->count();
      
           
           
           return response()->json(['status'=>true,'message'=>'success','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'isadded'=>$isadded,'product_details'=> $data],200);
      
       
       //return response()->json($data);
    }

    public function search(Request $req)
    {
        
        $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->select('products.*','categories.category_name')
       ->where('products.product_name', 'like', '%'.$req->input('query') . '%')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->paginate(30);
       
        return view('layouts.search',['products'=>$data]);
    }
    
    public function searchapi(Request $req)
    {
        //$data= products::where('product_name', 'like', $req->input('query').'%')->paginate(10);
        $data = DB::table('products')
        ->select('products.id', 'products.product_name')   
        ->where('products.product_name', 'like', '%'.$req->input('query') . '%')
        ->where('products.status',1)
        ->get();
        
        if($data->count() > 0)
        {
        return response()->json(['status'=>true,'message'=>'success','products'=>$data]);
        }
        else{
            return response()->json(['status'=>false,'message'=>'No products found']);
        }
    }
    
     public function searchresultapi(Request $req)
    {
        
        $data = DB::table('products')
        ->where('id', $req->product_id)
        ->select('products.*')
        ->where('products.status',1)
        ->get();
        
       
        return response()->json(['status'=>true,'message'=>'success','products'=>$data]);
        
      
    }
    
    
    public function SearchWithCatid(Request $req)
    {
        if($req->input('catid') == '')
        {
            $data = DB::table('products')
           ->join('categories', 'categories.id', '=', 'products.category_id')
           ->select('products.*','categories.category_name')
           ->where('products.product_name', 'like', '%'.$req->input('query') . '%')
           ->where('products.status',1)
           ->orderBy('products.id')
           ->paginate(30);
       
            return view('layouts.search',['products'=>$data]);
        }
        else
        {
            $data = DB::table('products')
           ->join('categories', 'categories.id', '=', 'products.category_id')
           ->select('products.*','categories.category_name')
           ->where('products.product_name', 'like', '%'.$req->input('query') . '%')
           ->where('products.status',1)
           ->orderBy('products.id')
           ->paginate(30);
           
           return view('layouts.search',['products'=>$data]);
        }
        
    }
    
    public function categoryProducts($categoryIds)
    {
        $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',$categoryIds)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->paginate(30);
       
        $cdata= categories::find($categoryIds);
        return view('layouts.category_products',['categoryproducts'=>$data,'categorydetails'=>$cdata]);
    }
    
     public function categoryProductsapi(Request $req)
    {
        $data = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',$req->category_id)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->paginate(10);
       
        $userId=$req->user_id;
        $cartcount = cart::where('user_id',$userId)->count();
        $wishlistcount = wishlist::where('user_id',$userId)->count();
       
       return response()->json(['status'=>true,'message'=>'success','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'products'=>$data],200);
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
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}
