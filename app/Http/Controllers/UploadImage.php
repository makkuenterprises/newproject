<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UploadImage extends Controller
{
    //upload image
    public function upload(Request $request)
    {
        
       $image = $request->image->getClientOriginalName();       
       $request->image->storeAs('public/images',$image);
       return redirect('/');
    }
}
