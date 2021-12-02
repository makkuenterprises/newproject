<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PrescriptionController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    
    public function PrescriptionRequests(){
        $requests = DB::table('prescriptions')
                   ->join('users', 'prescriptions.user_id','users.id')
                   ->select('prescriptions.*', 'users.name', 'users.email','users.phone')
                   ->where('verified',0)
                   ->latest()->paginate();
                   
        return view('admin.prescriptions.index',compact('requests'));
    }
    
    public function ViewPrescriptions($id){
        
        $view_prescriptions = DB::table('prescriptions')
                              ->join('users', 'prescriptions.user_id', 'users.id')
                              ->select('prescriptions.*','users.name','users.email')
                              ->where('prescriptions.id',$id)
                              ->first();
                              
       return view('admin.prescriptions.view',compact('view_prescriptions'));
        
    }
    
    public function DownloadImage($imageId){
        
       
       $book_cover = DB::table('prescriptions')->where('id',$imageId)->first();
       
        $path = "../4med.in/public/uploads/prescription/$book_cover->image";
       
        return response()->download($path);
       //return $path;
        
    }
    
    public function UpdatePrescriptionReview($id){
        
        DB::table('prescriptions')->where('id',$id)->update([
                'verified' => 1
            ]);
            
            $notification=array(
		          'messege'=>'Prescription Is In The Review Process!',
		          'alert-type'=>'success'
		        );
            
        return redirect()->back()->with($notification);
        
    }
    
    public function RemovePrescription($id){
        
        $data = DB::table('prescriptions')->where('id',$id)->first();
        $image = $data->image;
        
        $test = '../4med.in/public/uploads/prescription/'.$image;
        unlink($test);
        
        $prescription = DB::table('prescriptions')->where('id',$id)->delete();
        	$notification=array(
		          'messege'=>'Uploaded Prescription Deleted SuccessFully!',
		          'alert-type'=>'success'
		        );
        return Redirect()->back()->with($notification);
        
    }
    
    public function AcceptedPrescription(){
        
         $data = DB::table('prescriptions')
                   ->join('users', 'prescriptions.user_id','users.id')
                   ->select('prescriptions.*', 'users.name', 'users.email','users.phone')
                   ->where('verified', 1)
                   ->get();
                   //dd($data);
        
        
        return view('admin.prescriptions.accept',compact('data'));
    }
    
    public function MakeOrders(Request $request, $id){
        
        
        
        $user_info = DB::table('prescriptions')
                    ->join('users', 'prescriptions.user_id', 'users.id')
                    ->select('prescriptions.*', 'users.name', 'users.email', 'users.phone','users.id as user_id')
                    ->where('prescriptions.id',$id)
                    ->first();
                    
        $user_med = DB::table('add_medicines')
                    ->join('prescriptions', 'add_medicines.order_id', 'prescriptions.id')
                    ->join('products', 'add_medicines.product_id','products.id')
                    ->join('users', 'add_medicines.user_id','users.id')
                    ->select('add_medicines.*', 'prescriptions.fullname', 'products.product_name', 'products.product_thumbnail', 'products.product_description', 'products.price', 'products.discount_price', 'users.name')
                    ->get();
                    
        $carts = DB::table('abs_cart')
                    ->join('products', 'abs_cart.product_id', 'products.id')
                    ->join('users', 'abs_cart.user_id','users.id')
                    ->select('abs_cart.*', 'products.product_name', 'products.product_thumbnail', 'users.name')
                    ->get();
                //dd($carts);
                    
                    // foreach($user_med as $row){
                    //     dd($row->order_id);                
                    // }
        
        
                    
        return view('admin.prescriptions.make_order',compact('user_info', 'user_med','carts'));
        
    }
    
    public function removeMedicine($id){
        
        DB::table('add_medicines')->where('id', $id)->delete();
        $notification=array(
		          'messege'=>'Products Removed SuccessFully!',
		          'alert-type'=>'success'
		        );
        return Redirect()->back()->with($notification);
        
        
    }
    
    public function makeCart(Request $request){
        
         $user_med = DB::table('add_medicines')
                    ->join('prescriptions', 'add_medicines.order_id', 'prescriptions.id')
                    ->join('products', 'add_medicines.product_id','products.id')
                    ->join('users', 'add_medicines.user_id','users.id')
                    ->select('add_medicines.*', 'prescriptions.fullname', 'products.product_name', 'products.product_thumbnail', 'products.price', 'products.discount_price', 'users.name')
                    ->get();
                    
        $details = array();
        
        
        
        foreach($user_med as $row){
            
        $cars = $request->qty;
        
            $details['user_id'] = $row->user_id;
            $details['product_id'] = $row->product_id;
            $details['qty'] = 1;
            
            
            
            
            $user_id = $row->user_id;
            
            DB::table('abs_cart')->insert($details);
    
            
             //dd($car);
        }
        
        DB::table('add_medicines')->where('user_id', $user_id)->delete();
        
         $notification=array(
            'messege'=>'Add To Cart Successfully',
            'alert-type'=>'success'
             );
            return redirect()->route('view.carts')->with($notification);
        
    }
    
    public function removeCart($id){
        
         DB::table('abs_cart')->where('id', $id)->delete();
         
          $notification=array(
            'messege'=>'Product Deleted SuccessFully',
            'alert-type'=>'success'
             );
            return redirect()->back()->with($notification);
         
        
    }
    
    public function clearCart(){
        
         DB::table('abs_cart')->delete();
         
          $notification=array(
            'messege'=>'All Cart Product Deleted Successfully',
            'alert-type'=>'success'
             );
            return redirect()->route('admin.prescription.accept')->with($notification);
        
    }
    
    public function viewCart(){
        
          $carts = DB::table('abs_cart')
                    ->join('products', 'abs_cart.product_id', 'products.id')
                    ->join('users', 'abs_cart.user_id','users.id')
                    ->select('abs_cart.*', 'products.product_name', 'products.product_thumbnail', 'users.name')
                    ->get();
        
            $test =  DB::table('abs_cart')
                    ->select('abs_cart.user_id')
                    ->first();
                    //dd($test);
       
           
            $cartproducts= DB::table('abs_cart')
            ->join('products','abs_cart.product_id','=','products.id')
            ->select('products.*','abs_cart.qty', 'abs_cart.user_id', 'abs_cart.id as cart_id')
            ->get();
        
        
            $useraddress = DB::table('addresses')
                            ->join('users', 'addresses.user_id','=','users.id')
                            ->where('addresses.user_id',2)
                            ->whereNotNull('fullname')
                            ->select('addresses.*','users.name','users.email','users.phone')
                            ->get();
                            
                            
             $checkdiscountprice= DB::table('abs_cart')
            ->join('products','abs_cart.product_id','=','products.id')
            ->select('products.discount_price')
            ->get();
            
            $cartproductstotal=0;
            $cartproductstotal1=0;
            $cartproductstotal2=0;

        foreach($cartproducts as $row){
        
            if(empty($row->discount_price)){
            
                $cartproductstotal1= DB::table('abs_cart')
            ->join('products','abs_cart.product_id','=','products.id')
            ->whereNull('products.discount_price')
            ->sum(DB::raw('products.price * abs_cart.qty'));
            
            }
            else{
               $cartproductstotal2= DB::table('abs_cart')
            ->join('products','abs_cart.product_id','=','products.id')
            ->whereNotNull('products.discount_price')
            ->sum(DB::raw('(products.price - ((products.price / 100) * products.discount_price)) * abs_cart.qty'));
           
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
                            
            //dd($useraddress);                
    
            // return view('layouts.checkout',['cartproducts'=>$cartproducts, 'totalprice'=>$cartproductstotal, 'grandprice'=>$grandprice, 'useraddress'=>$useraddress]);
        
               
        
        
                    
        return view('admin.prescriptions.view_carts',['carts' => $carts, 'test' => $test, 'cartproducts'=>$cartproducts, 'totalprice'=>$cartproductstotal, 'grandprice'=>$grandprice, 'useraddress'=>$useraddress]);
    }
        
    
    
    public function updateQty(Request $request, $id){
        
        
        $carts = DB::table('abs_cart')->where('product_id', $id)->first();
        
        return view('admin.prescriptions.update_qty',compact('carts'));
        
       
        
    }
    
    public function updateCart(Request $request, $id){
        
        $qty = $request->qty;
        
        DB::table('abs_cart')->where('product_id', $id)->update([
            
                'qty' => $qty
            ]);
            
             $notification=array(
            'messege'=>'Product Quantity Updated Successfully',
            'alert-type'=>'success'
             );
            return redirect()->route('view.carts')->with($notification);
            
            
        
        
    }
    
     public function makePayment(Request $request){
        if($request->payment == 'cash'){
            
            //dd($test);
           
            //dd($id);
            
            $id= DB::table('abs_cart')
            ->select('abs_cart.user_id')
            ->where('abs_cart.user_id', 11)
            ->first();
            
            $total = $request->total;
           // dd($total);
            
            $user_id =DB::table('abs_cart')
            ->select('abs_cart.id')
            ->where('id',1)
            ->first();
            //dd($user_id);
            
            
            $data = array();
            
            $data['user_id'] =  $request->user_id;
            $data['amount'] = $total;
            $data['shipping_charge'] = $request->shipping_charge;
            $data['payment_type'] = 'cashon';
            $data['status_code'] = mt_rand(100000,999999);
            $data['status'] = 0;
			$data['date'] = date('d-m-y');
			$data['month'] = date('F');
			$data['year'] = date('Y');
			
			//dd($data);
			
			//dd($data);
			
			$order_id = DB::table('itemorders')->insertGetId($data);
			
			
            $getaddress = DB::table('addresses')
            ->select('*')
            ->where('id',1)
            ->first();
            
            //dd($getaddress);
           
			$user_info = array();
			
			$user_info['user_id'] = $request->user_id;
			$user_info['itemorder_id'] = $order_id;
			$user_info['fullname'] = $getaddress->fullname;
			$user_info['full_address'] = $getaddress->full_address;
			$user_info['city'] = $getaddress->city;
			$user_info['state'] = $getaddress->state;
			$user_info['pin_code'] = $getaddress->pin_code;
			$user_info['phone'] = $getaddress->alternate_phone;
			$user_info['created_at'] = Carbon::now();
            $user_info['updated_at'] = Carbon::now();
			//dd($user_info);
			DB::table('userorderinfos')->insert($user_info);
		
			
			
			
            
            $cartproducts= DB::table('abs_cart')
            ->join('products','abs_cart.product_id','=','products.id')
            ->select('products.*','abs_cart.qty','abs_cart.id as cart_id')
            ->get();
            
            $details = array();
            
            foreach($cartproducts as $row){
                $details['itemorder_id'] = $order_id;
                $details['product_id'] = $row->id;
                $details['product_name'] = $row->product_name;
                $details['quantity'] = $row->qty;
                $details['singleprice'] = $row->price;
                $details['totalprice'] = $row->qty * $row->price;
                $details['discount_price'] = $row->discount_price;
                DB::table('order_details')->insert($details);
            }
            
            $delete_carts = array();
            
            // foreach($cartproducts as $row){
            //     $delete_carts['user_id'] = $order_id;
            //     $delete_carts['user_id'] = $order_id;
            //     $delete_carts['product_id'] = $row->id;
            //     $delete_carts['qty'] = $row->product_name;
            //     DB::table('carts')->delete($delete_carts);
            // }
            
             DB::table('abs_cart')->where('user_id', $request->user_id)->delete();
            
            
            
            
            $notification=array(
                'messege'=>'Order Placed SuccessFully',
                'alert-type'=>'success'
                 );
                 
              return Redirect()->back()->with($notification);
            
    		//return 'Cash On Delivery Under Construction';
        }
        
    

    }
    
     public function searchOrder(Request $request){
            
            $products =  DB::table('products')->
                    join('categories', 'products.category_id','categories.id')
                    ->select('products.*','categories.category_name')
                    ->where('product_name', $request->search)
                    ->first();
                    
                    $test = $products->price;
                    //dd($test);
                    
                    //dd($products);
                    
                    $product_id = $products->id;
                     //dd($product_id);
            
            if($products){
                $data = array();
                $data['order_id'] = $request->order_id;
                $data['product_id'] =$product_id;
                $data['user_id'] = $request->user_id;
                
                DB::table('add_medicines')->insert($data);
                
                  $notification=array(
		          'messege'=>'Product Added SuccessFully!',
		          'alert-type'=>'success'
		        );
            
        return redirect()->back()->with($notification);
                
            }
            
    }
    
    public function makeOrder(Request $request){
        
        $test = $request->id;
        
         $data['prescription_id'] = $request->id;
        $data['user_id'] = $request->user_id;
       $data['created_at']           = Carbon::now();
      $data['updated_at']         = Carbon::now();
        
         $products = array();
   
      $product_name = $request->product_name;
      $product_price = $request->product_price;
   
	  $number_of_entries = count($product_price);

		 for($i = 0; $i <= $number_of_entries; $i++){

        if(@$product_name[$i] != "" && @$product_price[$i] != ""){

            @$new_entry =   array('name' => $product_name[$i], 'price' => $product_price[$i]);
            @array_push($products, $new_entry);

        }

     }

    		 @$data['product_name'] = json_encode($products);
    		 
    	$data['total'] = $request->total;
    	//dd($data);
        
        DB::table('add_prescriptions')->insert($data);
        
        
        
        DB::table('prescriptions')->where('id',$test)->update([
            
                'verified' => 2
            
            ]);
            
        $notification=array(
		          'messege'=>'Order Created SuccessFully!',
		          'alert-type'=>'success'
		        );
        
        return redirect()->route('admin.prescription.request')->with($notification);
       
    }
    
    public function ProcessDeleivery(){
        
         $data = DB::table('prescriptions')
                   ->join('users', 'prescriptions.user_id','users.id')
                   ->select('prescriptions.*', 'users.name', 'users.email','users.phone')
                   ->where('verified',2)
                   ->latest()->paginate();
                   
        return view('admin.prescriptions.process_delivery',compact('data'));
    }
    
    public function ViewPrescriptionsOrders($id){
        
        $orders = DB::table('add_prescriptions')
                  ->join('prescriptions', 'add_prescriptions.prescription_id', 'prescriptions.id')
                  ->join('users', 'add_prescriptions.user_id', 'users.id')
                  ->select('add_prescriptions.*', 'prescriptions.image','prescriptions.verified', 'users.name','users.email','users.phone')
                  ->where('prescription_id',$id)
                  ->first();
                  
                 // dd($orders);
                  
        return view('admin.prescriptions.process_delivery_view',compact('orders'));
        
    }
    
    public function OrdersShipped($id){
        
        DB::table('prescriptions')->where('id', $id)->update([
                
                'verified' => 3
                
            ]);
            
         $notification=array(
		          'messege'=>'Order Shipped SuccessFully!',
		          'alert-type'=>'success'
		        );
        
        return redirect()->route('admin.prescription.request')->with($notification);
        
    }
    
    public function FinalDeleivery(){
        
        $data = DB::table('prescriptions')
                   ->join('users', 'prescriptions.user_id','users.id')
                   ->select('prescriptions.*', 'users.name', 'users.email','users.phone')
                   ->where('verified',3)
                   ->latest()->paginate();
                   
        return view('admin.prescriptions.final_delivery',compact('data'));
    }
    
    public function UpdateDelivery($id){
        
        DB::table('prescriptions')->where('id', $id)->update([
                
                'verified' => 4
                
            ]);
            
         $notification=array(
		          'messege'=>'Order Deleiverd SuccessFully!',
		          'alert-type'=>'success'
		        );
        
        return redirect()->route('admin.prescription.request')->with($notification);
        
        
    }
    
    public function SuccessDeleivery(){
        
        $data = DB::table('prescriptions')
                   ->join('users', 'prescriptions.user_id','users.id')
                   ->select('prescriptions.*', 'users.name', 'users.email','users.phone')
                   ->where('verified',4)
                   ->latest()->paginate();
                   
        return view('admin.prescriptions.success_delivery',compact('data'));
        
    }
    
    public function CancelDeleivery($id){
        
        DB::table('prescriptions')->where('id', $id)->update([
                
                'verified' => 5
                
            ]);
                   
        $notification=array(
		          'messege'=>'Order Cancel SuccessFully!',
		          'alert-type'=>'success'
		        );
        
        return redirect()->route('admin.prescription.request')->with($notification);
        
    }
    
    public function orderCancel(){
        
        $data = DB::table('prescriptions')
                   ->join('users', 'prescriptions.user_id','users.id')
                   ->select('prescriptions.*', 'users.name', 'users.email','users.phone')
                   ->where('verified',5)
                   ->latest()->paginate();
                   
        return view('admin.prescriptions.cancel_delivery',compact('data'));
        
    }
    
    
        
}

