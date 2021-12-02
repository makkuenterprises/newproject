<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    //
    
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function store(Request $request){
        
        $validate = $request->validate([
                'category_name' => 'required|unique:categories',
                'category_alt' => 'required',
                'category_thumbnail' => 'required|mimes:jpeg,jpg,png',
                // 'category_thumbnail.*' => 'mimes:jpeg,jpg,png',
                
                // 'category_thumbnail' => 'required|mimes:jpg.jpeg,png|max:2000'
            ]);
            
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_alt'] = $request->category_alt;
        $data['created_at'] = Carbon::now();
        $image = $request->file('category_thumbnail');
        
        
       
    		$image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.' .$ext;
    		$upload_path = '../4med.in/public/assets/images/categories/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);

    		$data['category_thumbnail'] = 'https://4med.in/public/assets/images/categories/'.$image_full_name;
    		//dd($data);
    		$brand = DB::table('categories')->insert($data);
    		$notification=array(
		          'messege'=>'Category Inserted SuccessFully!',
		          'alert-type'=>'success'
		        );
        	return Redirect()->back()->with($notification);
    	
        
    }
    
    public function edit($id){
        
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin.edit_category',compact('category'));
        
    }
    
    public function update(Request $request, $id){
        
          $validate = $request->validate([
                'category_name' => 'required',
                'category_alt' => 'required',
                'category_thumbnail' => 'mimes:jpeg,jpg,png',
        ]);
        
        $old_image = $request->old_logo;
    	$data = array();
    	$data['category_name'] = $request->category_name;
        $data['category_alt'] = $request->category_alt;
        $data['created_at'] = Carbon::now();
        $image = $request->file('category_thumbnail');
        
        
         if($image){
           //unlink($old_image);
    		$image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name. '.' .$ext;
    		$upload_path = '../4med.in/public/assets/images/categories/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);

    		$data['category_thumbnail'] = 'https://4med.in/public/assets/images/categories/'.$image_full_name;
    		//dd($data);
    		$brand = DB::table('categories')->where('id',$id)->update($data);
    		$notification=array(
		          'messege'=>'Category Updated SuccessFully!',
		          'alert-type'=>'success'
		        );
        	return Redirect()->route('admin.category')->with($notification);
    	} else {
    		$brand =  DB::table('categories')->where('id',$id)->update($data);
    		$notification=array(
		          'messege'=>'Its Done!',
		          'alert-type'=>'success'
		        );
        	return Redirect()->route('admin.category')->with($notification);
    	}
        
        
    }
    
    public function remove($id){
        
    //     $data = DB::table('categories')->where('id', $id)->first();
    // 	$image = $data->category_thumbnail;
    // 	dd($image);
    // 	unlink($image);
        
        DB::table('categories')->where('id',$id)->delete();
        $notification=array(
		          'messege'=>'Category Deleted SuccessFully!',
		          'alert-type'=>'success'
		        );
        return Redirect()->back()->with($notification);
        
        
    }
}
