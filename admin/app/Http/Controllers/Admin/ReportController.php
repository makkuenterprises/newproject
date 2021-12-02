<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    //
    
     public function __construct()
    {
        $this->middleware('auth:admin');
    }  
    
    public function todayOrder(){
        
        $today = date('d-m-y');
        $order = DB::table('itemorders')->where('status',0)->where('date',$today)->get();
        //dd($order);
        return view('admin.reports.today_order',compact('order'));
        
    }
    
    public function todayDelivery(){
        
         $today = date('d-m-y');
        $order = DB::table('itemorders')->where('status',3)->where('date',$today)->get();
        return view('admin.reports.today_delivery',compact('order'));
        
    }
    
    public function monthlyReport(){
        
        $month = date('F');
    	$order = DB::table('itemorders')->where('status',3)->where('month',$month)->get();
    	return view('admin.reports.this_month',compact('order'));
        
    }
    
    public function searchReport(){
        
        return view('admin.reports.search_report');
        
    }
    
    public function searchByYear(Request $request){
        
        $year = $request->year;
    	
    	$total = DB::table('itemorders')->where('status',3)->where('year',$year)->sum('amount');
    	
    	$order = DB::table('itemorders')->where('status',3)->where('year',$year)->get();
    	return view('admin.reports.search_year', compact('order','total'));
        
    }
    
    public function searchByMonth(Request $request){
        
        
        $month = $request->month;
        
        $total = DB::table('itemorders')->where('status',3)->where('month',$month)->sum('amount');
    	
    	$order = DB::table('itemorders')->where('status',3)->where('month',$month)->get();
    	return view('admin.reports.search_month', compact('order','total'));
    }
    
    public function searchByDate(Request $request){

    	$date = $request->date;
    	$dates = date('d-m-y',strtotime($date));
    	
    	$total =  DB::table('itemorders')->where('status',3)->where('date',$dates)->sum('amount');
    	
    	$precision = 3;
    	$number = intval($total * ($p = pow(10, $precision))) / $p;
    	
    
    	
    	$order = DB::table('itemorders')->where('status',3)->where('date',$dates)->get();
    	return view('admin.reports.search_date', compact('order','number'));
    }

}
