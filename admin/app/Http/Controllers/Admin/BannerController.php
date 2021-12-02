<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BannerController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    
    public function index(){
        $banners = DB::table('banner')->get();
        return view('admin.banners.index',compact('banners'));
    }
    
    public function addBanner(){
        return view('admin.banners.create');
    }
    
    public function storeBanner(Request $request){
        
        $validateData = $request->validate([

            
             'thumbnail' => 'required',
            
            'thumbnail.*' => 'mimes:jpeg,jpg,png,gif',

        ]);
        
        $image =  $request->file('thumbnail');
        
         foreach($image as $multipic){
             
             $data = array();
             $data['alt'] = 'geetanjali';
            
            $image_name = date('dmy_H_s_i');
    		$ext = strtolower($multipic->getClientOriginalExtension());
    		$image_full_name = $image_name. '.' .$ext;
    		$upload_path = '../4med.in/public/assets/images/banner/';
    		$image_url = $upload_path.$image_full_name;
    		$success = $multipic->move($upload_path,$image_full_name);

    		$data['thumbnail'] = 'https://4med.in/public/assets/images/banner/'.$image_full_name;
    		//dd($data);
    		$brand = DB::table('banner')->insert($data);

        }
        	$notification=array(
		          'messege'=>'Banner Inserted SuccessFully!',
		          'alert-type'=>'success'
		        );
        
         return redirect()->route('list.banner')->with($notification);
        
        
    }
    
    public function removeBanner($id){
        
         $data =  DB::table('banner')->where('id',$id)->first();
        $image = $data->thumbnail;
      // dd($image);
        $whatIWant = substr($image, strpos($image, "r") + 2);
        //dd($whatIWant);
        $test = '../4med.in/public/assets/images/banner/'.$whatIWant;
        unlink($test);
        
        $brand = DB::table('banner')->where('id', $id)->delete();
    	$notification=array(
		          'messege'=>'Banner Deleted SuccessFully!',
		          'alert-type'=>'success'
		        );
        return Redirect()->back()->with($notification);
        
    }
}
