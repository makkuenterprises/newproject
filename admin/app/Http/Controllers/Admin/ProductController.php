<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('auth:admin');
    }    
    //
    public function index(){
        $products = DB::table('products')->
                    join('categories', 'products.category_id','categories.id')
                    ->select('products.*','categories.category_name')
                    ->latest()->paginate(10);
        
        
        return view('admin.products.index',compact('products'));
    }
    
    public function searchProduct(Request $request){
            
            $products =  DB::table('products')->
                    join('categories', 'products.category_id','categories.id')
                    ->select('products.*','categories.category_name')
                    ->where('product_name', $request->search)
                    ->first();
                    
                    //dd($products);
            
            if($products){
                return view('admin.products.search',compact('products'));
            }
            
    }
    
     public function getSearchCities( string $term)
    {
        // rooms.object.photos  for json mobile
        
        
        return DB::table('products')
                ->select('*')
                ->where('product_name', 'LIKE', $term . '%')->get();
    } 
    
    public function searchAutoCities($request)
    {
        $term = $request->input('term');

        $results = array();

        $queries = $this->getSearchCities($term);

        foreach ($queries as $query)
        {
            $results[] = ['id' => $query->id, 'value' => $query->product_name];
        }

        return $results;
    } 
    
    public function autoComplete(Request $request)
    {

        $results = $this->searchAutoCities($request);

        return response()->json($results);
    }
    

    
    
    public function getEmployees(Request $request){

     
     $draw = $request->get('draw');
     $start = $request->get("start");
     $rowperpage = $request->get("length"); // Rows display per page

     $columnIndex_arr = $request->get('order');
     $columnName_arr = $request->get('columns');
     $order_arr = $request->get('order');
     $search_arr = $request->get('search');

     $columnIndex = $columnIndex_arr[0]['column']; // Column index
     $columnName = $columnName_arr[$columnIndex]['data']; // Column name
     $columnSortOrder = $order_arr[0]['dir']; // asc or desc
     $searchValue = $search_arr['value']; // Search value

     // Total records
     
     $totalRecords = DB::table('products')->select('count(*) as allcount')->count();
    
     $totalRecordswithFilter = DB::table('products')->select('count(*) as allcount')->where('product_name', 'like', '%' .$searchValue . '%')->count();

     // Fetch records
    
       
        $records = DB::table('products')->orderBy($columnName,$columnSortOrder)
       ->where('employees.name', 'like', '%' .$searchValue . '%')
       ->select('employees.*')
       ->skip($start)
       ->take($rowperpage)
       ->get();

     $data_arr = array();
     
     foreach($records as $record){
        $id = $record->id;
        $username = $record->product_name;
        $name = $record->product_description;
        $email = $record->product_size;

        $data_arr[] = array(
          "id" => $id,
          "username" => $username,
          "name" => $name,
          "email" => $email
        );
     }

     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordswithFilter,
        "aaData" => $data_arr
     );

     echo json_encode($response);
     exit;
   }
    
    
    
    public function viewProduct($id){
        
        $product = DB::table('products')
                  ->join('categories','products.category_id','categories.id')
                  ->select('products.*','categories.category_name')
                  ->where('products.id',$id)
                  ->first();
                  
        return view('admin.products.show',compact('product'));
        
        
    }
    
    public function addProduct(){
        $categories = DB::table('categories')->get();
        return view('admin.products.add_product',compact('categories'));
    }
    
    public function storeProduct(ProductRequest $request){
        
        
        
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['price'] = $request->price;
        $data['discount_price'] = $request->discount_price;
        $data['product_size'] = $request->product_size;
        $data['product_description'] = $request->product_description;
        $data['prescription_required'] = $request->prescription_required;
        $data['created_at'] = Carbon::now();
        
        $image = $request->file('product_thumbnail');
        if($image){
            
            $image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.' .$ext;
    		$upload_path = '../4med.in/public/assets/images/product/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);

    		$data['product_thumbnail'] = 'https://4med.in/public/assets/images/product/'.$image_full_name;
    		//dd($data);
    		$brand = DB::table('products')->insert($data);
    		$notification=array(
		          'messege'=>'Product Inserted SuccessFully With Image!',
		          'alert-type'=>'success'
		        );
        	return Redirect()->route('list.product')->with($notification);
        	
        } else {
            
            $brand = DB::table('products')->insert($data);
    		$notification=array(
		          'messege'=>'Product Inserted SuccessFully Without Photo!',
		          'alert-type'=>'success'
		        );
          return Redirect()->route('list.product')->with($notification);
            
            
        }
        
    }
    
    public function editProduct($id){
        
        $product = DB::table('products')->where('id',$id)->first();
        $category =  DB::table('categories')->get();
        return view('admin.products.edit_product',compact('product','category'));
        
    }
    
    public function updateProduct(Request $request,$id){
        
       $product_image = DB::table('products')->where('id',$id)->first();
        
        $old_one = $request->old_logo;
        //dd($old_one);
        $whatIWant = substr($old_one, strpos($old_one, "o") + 6);  
        //dd($whatIWant);
        
        $test = '../4med.in/public/assets/images/product/'.$whatIWant;
        //dd($test);
        
         $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['price'] = $request->price;
        $data['discount_price'] = $request->discount_price;
        $data['product_size'] = $request->product_size;
        $data['product_description'] = $request->product_description;
        $data['prescription_required'] = $request->prescription_required;
        $data['created_at'] = Carbon::now();
        
        //dd($data);
        
        $image = $request->file('product_thumbnail');
        if($image){
            
            if($product_image->product_thumbnail == NULL){
                
               
                $image_name = date('dmy_H_s_i');
        		$ext = strtolower($image->getClientOriginalExtension());
        		$image_full_name = $image_name. '.' .$ext;
        		$upload_path = '../4med.in/public/assets/images/product/';
        		$image_url = $upload_path.$image_full_name;
        		$success = $image->move($upload_path,$image_full_name);
    
        		$data['product_thumbnail'] = 'https://4med.in/public/assets/images/product/'.$image_full_name;
        		//dd($data);
        		$brand = DB::table('products')->where('id',$id)->update($data);
        		$notification=array(
    		          'messege'=>'Product Updated SuccessFully With Image!',
    		          'alert-type'=>'success'
    		        );
    		        
            return Redirect()->back()->with($notification);
                
                
            } else {
                
                 unlink($test);
                 $image_name = date('dmy_H_s_i');
        		$ext = strtolower($image->getClientOriginalExtension());
        		$image_full_name = $image_name. '.' .$ext;
        		$upload_path = '../4med.in/public/assets/images/product/';
        		$image_url = $upload_path.$image_full_name;
        		$success = $image->move($upload_path,$image_full_name);
    
        		$data['product_thumbnail'] = 'https://4med.in/public/assets/images/product/'.$image_full_name;
        		//dd($data);
        		$brand = DB::table('products')->where('id',$id)->update($data);
        		$notification=array(
    		          'messege'=>'Product Updated SuccessFully With Image!',
    		          'alert-type'=>'success'
    		        );
    		        
            	return Redirect()->back()->with($notification);
                
                
            }
            
            
        	
        } else {
            
            $brand = DB::table('products')->where('id',$id)->update($data);
    		$notification=array(
		          'messege'=>'Product Updated SuccessFully Without Photo!',
		          'alert-type'=>'success'
		        );
          return Redirect()->back()->with($notification);
            
            
        }
        
        
        
    }
    
    public function removeProduct($id){
        
        $data =  DB::table('products')->where('id',$id)->first();
        $image = $data->product_thumbnail;
        $whatIWant = substr($image, strpos($image, "o") + 6);
        //dd($whatIWant);
        $test = '../4med.in/public/assets/images/product/'.$whatIWant;
        
        if($image == NULL){
            $brand = DB::table('products')->where('id', $id)->delete();
        	$notification=array(
    		          'messege'=>'Data Deleted SuccessFully!',
    		          'alert-type'=>'success'
    		        );
            return Redirect()->back()->with($notification);
        } else {
            unlink($test);
            $brand = DB::table('products')->where('id', $id)->delete();
        	$notification=array(
    		          'messege'=>'Data Deleted SuccessFully!',
    		          'alert-type'=>'success'
    		        );
            return Redirect()->back()->with($notification);
        }
        
        
        
        
        
    }
    
    public function activateProduct($id){
        
        DB::table('products')->where('id',$id)->update(['status' => 0]);
        $notification=array(
	          'messege'=>'Product Inactivate SuccessFully!',
	          'alert-type'=>'success'
	   );
	   
	   return Redirect()->back()->with($notification); 
        
    }
    
    public function unactivateProduct($id){
            
            DB::table('products')->where('id',$id)->update(['status' => 1]);
        $notification=array(
	          'messege'=>'User Activate SuccessFully!',
	          'alert-type'=>'success'
	   );
	   
	   return Redirect()->back()->with($notification); 
            
            
    }
        
    }
    
    

