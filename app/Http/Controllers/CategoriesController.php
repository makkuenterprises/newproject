<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\wishlist;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data= categories::all();
         $data = DB::table('categories')
       ->join('products', 'products.category_id', '=', 'categories.id')
       ->select('categories.*', DB::raw("count(products.id) as products_count"))
       ->groupBy('categories.id')
       ->get();
       
        return view('layouts.categories',['categories'=>$data]);
    }
    
    public function apiindex(Request $req)
    {
        
        // $data= categories::all();
        // return response()->json($data);
        
         $data = DB::table('categories')
       ->join('products', 'products.category_id', '=', 'categories.id')
       ->select('categories.*', DB::raw("count(products.id) as products_count"))
       ->groupBy('categories.id')
       ->get();
       
        $userId=$req->user_id;
        $cartcount = cart::where('user_id',$userId)->count();
        $wishlistcount = wishlist::where('user_id',$userId)->count();
       
       return response()->json(['status'=>true,'message'=>'success','cart_count'=>$cartcount,'wishlist_count'=>$wishlistcount,'categories'=>$data],200);
    }

 public function getcategory()
    {
        // $data= categories::all();
          $data = DB::table('categories')
       ->join('products', 'products.category_id', '=', 'categories.id')
       ->select('categories.*', DB::raw("count(products.id) as products_count"))
       ->groupBy('categories.id')
       ->get();
       
        return view('layouts.index',['categories'=>$data]);
       
        
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
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        //
    }
}
