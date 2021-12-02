<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationUIController extends Controller
{
    //
    public function forms(){
    	return view('admin.forms');
    }

    public function simpleTable(){
    	return view('admin.simple_table');
    }

    public function dataTable(){
    	return view('admin.datatables');
    }

    public function login(){
    	return view('admin.login');
    }

    public function register(){
    	return view('admin.register');
    }
}
