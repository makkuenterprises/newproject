<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories;
use App\Models\topproducts;
use App\Models\banner;
use App\Models\users;
use App\Models\cart;
use App\Models\wishlist;
use DB;


class HomePageController extends Controller
{
    //
     public function index()
    {
        // $data= categories::all();
        $catdata = DB::table('categories')
       ->join('products', 'products.category_id', '=', 'categories.id')
       ->select('categories.*', DB::raw("count(products.id) as products_count"))
       ->groupBy('categories.id')
       ->get()->toArray();
       
        $topproducts = DB::table('top_products')
       ->join('products', 'products.id', '=', 'top_products.product_id')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('top_products.id')
       ->get();
       
        $banner = banner::all();
        
        $personalcareproducts = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',2)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(12)->get();
       
       $babycareproducts = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',3)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(12)->get();
       
       $nutritionandfitnesssuppliments = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',7)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(12)->get();
       
        //$topproducts= topproducts::all();
        return view('layouts.index',
                                    ['categories'=>$catdata,
                                     'topproducts'=>$topproducts,
                                     'banner'=>$banner,
                                     'personalcareproducts'=>$personalcareproducts,
                                     'babycareproducts'=>$babycareproducts,
                                     'nutritionandfitness'=>$nutritionandfitnesssuppliments
                                    ]);
       
        
    }
    
    public function apihome(Request $request)
    {
        // $data= categories::all();
        $catdata = DB::table('categories')
       ->join('products', 'products.category_id', '=', 'categories.id')
       ->select('categories.*', DB::raw("count(products.id) as products_count"))
       ->groupBy('categories.id')
       ->get();
       
       //dd($catdata);
       
        $topproducts = DB::table('top_products')
       ->join('products', 'products.id', '=', 'top_products.product_id')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('top_products.id')
       ->get();
       
        $banner = banner::all()->toArray();
        
        $personalcareproducts = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',2)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(10)->get();
       
       $babycareproducts = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',3)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(10)->get();
       
       $babycareproducts = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',3)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(10)->get();
       
       $nutritionandfitnesssuppliments = DB::table('products')
       ->join('categories', 'categories.id', '=', 'products.category_id')
       ->where('categories.id',7)
       ->select('products.*','categories.category_name')
       ->where('products.status',1)
       ->orderBy('products.id')
       ->skip(0)->take(10)->get();
     
       //$user = $request->users();
       $userId=$request->user_id;
       $cartcount;
       $wishlistcount;
       if($request->user_id == null || $request->user_id == 0)
       {
           $cartcount = 0;
           $wishlistcount = 0;
       }
       else{
           $cartcount = cart::where('user_id',$userId)->count();
           $wishlistcount = wishlist::where('user_id',$userId)->count();
       }
       
       
     //  return json_decode(json_encode(['category' => $catdata, $banner]));
     
     
    
            
            
         $data =  [
            "status"=> true,
            'message'=>'success',
            'cart_count'=>$cartcount,
            'wishlist_count'=>$wishlistcount,
            
           
            
            "data"=>  [ 
                
                 
                    
                             
                     "category" => $catdata
                    ,
                             
                         "banner" => 
                            $banner
                        ,
                        
                        "top_products" => 
                        $topproducts 
                        ,
                        
                        
                        "personal_care_products" => 
                            $personalcareproducts
                        ,
                        
                        "baby_care_products" => 
                            $babycareproducts
                        ,
                        
                        "nutrition_and_fitnesss_suppliments" => 
                            $nutritionandfitnesssuppliments
                        ,
                        
    
    
                ]
                        
             
      ];
      
       return response()->json($data, 200);
      
      
        //$json= json_encode((object)$data,JSON_FORCE_OBJECT);
        //$json =  json_encode($data, 200);
        //return $json;
        
       // $parse = JSON.parse($json);
        
         //$area = json_decode($json,TRUE);
         //$area = $area['data'];
        // $parse = json.parse($area);
  // dd($area);
  //return $json;
//   return  json_decode($area, TRUE);
    //return $area;
    //$area = implode(", ",$area);
    //echo $area->category;
      foreach($area as $i){
      print_r($i);
          }
     //return $i;
    
    
     
      
        
    //     $licenses_with_1 = array();
        
    //     foreach($area["data"] as $i){
        
    //       $licenses_with_1[] = $i;
    //     }
        
    //     //dd($licenses_with_1);
    // return $licenses_with_1;
//     $results = json_encode(array("Result" => "OK", "Category" => $catdata), true);
       
//       $json =  '[ 
   
//         "area" =>  $catdata
        
    
   
// ]';

// //$test =  json_encode($json, 200);
 
 
//  $area = json_decode($json,TRUE);
//  dd($area);
// $licenses_with_1 = array();

// foreach($area['area'] as $i){
        
//          $licenses_with_1[] = $i['category_name'];
        
       
   
// }

//return $licenses_with_1;
//dd($licenses_with_1);



 
 $cat = $area['area'];
 dd($cat);
// //return $cat;

 
//  foreach($cat as $i => $v)
// {
//   	//return $v["area"];
//     return	array_push($result, ['id'=>$v['area']]);

 
// }
       
    //   $response =  response()->json($catdata);
       //$jsonArray = json_decode($response,true);
       
      // return $jsonArray;
       //var_dump($rooms);
       
    
       
       
    //   $json= json_encode((object)$data,JSON_FORCE_OBJECT);
    //   return response()->json(['success' => '1','data' =>$json]);
       
      // return json_decode(json_encode([$data]));
       
         
         
        // dd($tesd);
       // $arrayOfEmails=json_decode($test);
         //return $arrayOfEmails;
        
        
        // $result=array();
        //  $result["0"]=$catdata;
        //   $result["1"]=$banner;
        //  $json= json_encode((object)$result,JSON_FORCE_OBJECT);
        //  return response()->json(['success' => '1','data' =>$json]);
     
     
    //   return response()->json(['status'=>true,
    //                              'message'=>'success',
    //                           'cart_count'=>$cartcount,
    //                           'wishlist_count'=>$wishlistcount,
    //                           'category' => $catdata, 'banner' => $banner]);
       //dd($obj);
       
        //  $result=array();
        // $result["0"]=$catdata;
        // $json= json_encode((object)$result,JSON_FORCE_OBJECT);
        // return response()->json(['success' => '1','data' =>$json]);
       
    //  $test =  ['status'=>true,
    //                              'message'=>'success',
    //                              'cart_count'=>$cartcount,
    //                             'wishlist_count'=>$wishlistcount
                                 
    //                              ];
       
    //   return response()->json($catdata,$banner);
       
        
    //   $dynamic = [ '1'=>$catdata,
    //                 '2'=>$banner,
    //                 '3'=>$topproducts,
    //                 '4'=>$personalcareproducts,
    //                 '5'=>$babycareproducts,
    //                 '6'=>$nutritionandfitnesssuppliments];
                    
                    
    //   return response()->json(['status'=>true,
    //                             'message'=>'success',
    //                             'cart_count'=>$cartcount,
    //                             'wishlist_count'=>$wishlistcount,
    //                             'dynamic'=>$dynamic
    //                             ],200);
        //$topproducts= topproducts::all();
        // return view('layouts.index',
        //                             ['categories'=>$catdata,
        //                              'topproducts'=>$topproducts,
        //                              'banner'=>$banner,
        //                              'personalcareproducts'=>$personalcareproducts,
        //                              'babycareproducts'=>$babycareproducts,
        //                              'nutritionandfitness'=>$nutritionandfitnesssuppliments
        //                             ]);
       
        
    }
}
