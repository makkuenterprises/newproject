<?php

namespace App\Http\Controllers;

use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function add_address(Request $request)
    {
        
        if($request->session()->has('user'))
        {
         $data = array();
         $check = DB::table('addresses')
                ->select('*')
                ->where('user_id', Auth::User()->id)
                ->get();
                
        if($check->count() > 0)
        {
              
            $data['user_id'] = Auth::User()->id;
            $data['fullname'] = $request->fullname;
            $data['full_address'] = $request->full_address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['alternate_phone'] = $request->alternate_phone;
            $data['default'] = 0;
            $data['created_at'] = Carbon::Now();
            $data['updated_at'] = Carbon::Now();
            
            DB::table('addresses')->insert($data);
        }
        else
        {
            $data['user_id'] = Auth::User()->id;
            $data['fullname'] = $request->name;
            $data['full_address'] = $request->address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['pin_code'] = $request->pin_code;
            $data['alternate_phone'] = $request->altphone;
            $data['default'] = 1;
            $data['created_at'] = Carbon::Now();
            $data['updated_at'] = Carbon::Now();
            
            DB::table('addresses')->insert($data);
        }
        
        }else
        {
            return redirect('/login_register');
        }
        
        
        // if($req->session()->has('user'))
        // {
            
        //     $userid = $req->session()->get('user')['id'];
        //     $address= new address;
        
         
        //     $address->user_id=$req->session()->get('user')['id'];
        //     $address->fullname=$req->name;
        //     $address->full_address=$req->address;
        //     $address->city=$req->city;
        //     $address->state=$req->state;
        //     $address->pin_code=$req->pin_code;
        //     $address->alternate_phone=$req->altphone;
        //     $address->save();
            

        //   return redirect(url()->previous());
           
           
        // }
        // else
        // {
        //     return redirect('/login_register');
        // }
    }
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
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        //
    }
}
