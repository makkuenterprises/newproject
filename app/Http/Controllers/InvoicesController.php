<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;
use App\Models\products;
use View;
use DB;
use PDF;
use Validator;
use Response;

class InvoicesController extends Controller
{
    
     // Generate PDF
    public function invoicePDF($id) {
      // retreive all records from db
      $orderid = $id;
      $order = DB::table('itemorders')
                ->join('order_details','itemorders.id','order_details.itemorder_id')
                ->select('itemorders.*','order_details.product_name','order_details.quantity','order_details.singleprice','order_details.totalprice','order_details.discount_price')
                ->where('itemorders.id', $orderid)
                ->get();
                
      $address = DB::table('userorderinfos')
                    ->select('userorderinfos.*')
                    ->where('itemorder_id', $orderid)
                    ->first();
                    
    $withoutdiscount = 0;
    $withdiscount = 0; 
    $subtotal = 0;
     foreach($order as $row){
        
            if($row->discount_price === NULL){
            
                $withoutdiscount= DB::table('order_details')
                    ->where('itemorder_id',$orderid)
                    ->whereNull('discount_price')
                    ->sum(DB::raw('totalprice'));
            }
            else{
                $withdiscount = DB::table('order_details')
                    ->where('itemorder_id',$orderid)
                    ->whereNotNull('discount_price')
                    ->sum(DB::raw('(totalprice - ((totalprice / 100) * discount_price))'));
               
           
        }
        
        $subtotal = $withoutdiscount + $withdiscount;
     }
            
       $orderdate = DB::table('itemorders')
                ->select('*')
                ->where('id', $orderid)
                ->first();         
              
      $users = DB::table('users')
                    ->where('id',1)
                    ->first();

      // share data to view
      view()->share('order',$order);
     // $pdf = PDF::loadView('layouts.invoice', ['address'=>$address, 'order'=>$order, 'subtotal'=>$subtotal, 'invoiceid'=>$orderid]);
       $pdf = PDF::loadView('layouts.invoice',['address'=>$address, 'order'=>$order, 'subtotal'=>$subtotal, 'orderdate'=>$orderdate->date, 'invoiceid'=>$orderid]);

      //return $pdf->download('pdf_file.pdf');
      
       return $pdf->stream('pdf_file.pdf');
      
      //return view('layouts.invoice',['address'=>$address, 'order'=>$order, 'subtotal'=>$subtotal, 'invoiceid'=>$orderid]);
      
    }
    
    public function user_order_api(Request $request){
        
        
        	$validator = Validator::make($request->all(), [ 
                    
                    'order_id' => 'required',
                    
                ]);
        
                 if ($validator->fails()) { 
                     return \Response::json([
            				    'status' => false,
            				    'message' => 'error',
            				    'error' => $validator->errors()]);
                } 
        
        
         $orderid = $request->order_id;
         
         $test = DB::table('itemorders')->where('itemorders.id', $orderid)->first();
         
      $order = DB::table('itemorders')
                ->join('order_details','itemorders.id','order_details.itemorder_id')
                ->select('itemorders.*','order_details.product_name','order_details.quantity','order_details.singleprice','order_details.totalprice','order_details.discount_price')
                ->where('itemorders.id', $orderid)
                ->get();
                
      $address = DB::table('userorderinfos')
                    ->select('userorderinfos.fullname','userorderinfos.full_address','userorderinfos.city','userorderinfos.state','userorderinfos.pin_code','userorderinfos.phone')
                    ->where('itemorder_id', $orderid)
                    ->first();
                    
    $withoutdiscount = 0;
    $withdiscount = 0; 
    $subtotal = 0;
     foreach($order as $row){
        
            if($row->discount_price === NULL){
            
                $withoutdiscount= DB::table('order_details')
                    ->where('itemorder_id',$orderid)
                    ->whereNull('discount_price')
                    ->sum(DB::raw('totalprice'));
            }
            else{
                $withdiscount = DB::table('order_details')
                    ->where('itemorder_id',$orderid)
                    ->whereNotNull('discount_price')
                    ->sum(DB::raw('(totalprice - ((totalprice / 100) * discount_price))'));
               
           
        }
        
        $subtotal = $withoutdiscount + $withdiscount;
     }
            
       $orderdate = DB::table('itemorders')
                ->select('*')
                ->where('id', $orderid)
                ->first();         
              
      $users = DB::table('users')
                    ->where('id',1)
                    ->first();
                    

    if($test){
      
      view()->share('order',$order);
//      // $pdf = PDF::loadView('layouts.invoice', ['address'=>$address, 'order'=>$order, 'subtotal'=>$subtotal, 'invoiceid'=>$orderid]);
      $pdf = PDF::loadView('layouts.invoice',['address'=>$address, 'order'=>$order, 'subtotal'=>$subtotal, 'orderdate'=>$orderdate->date, 'invoiceid'=>$orderid]);
      //$pdf->download('pdf_file.pdf'); 
     // dd($pdf);
       //return  $pdf->download('pdf_file.pdf');
      //dd($link->headers);
      //return $link;
     // return response()->json(['Content-type'=> 'application/json; charset=utf-8','status'=>true,'message'=>'success',  utf8_encode($link)], JSON_UNESCAPED_UNICODE); 
     
      return response()->json(['status'=>true,'message'=>'success', 'link' => 'https://4med.in/pdf/'.$orderid.'.pdf'],200); 
        
    } else {
        return response()->json(['status'=>false,'message'=>'Order Id Not Found, Please Input Correct Order Id'],200); 
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
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoices $invoices)
    {
        //
    }
}
