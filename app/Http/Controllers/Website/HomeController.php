<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
          
        $data = [
            'page' => 'home',
            'title' => 'Home',
            'keywords' => '',
            'description' => '',            
        ];
        
    	return view('website.home', compact('data'));
    }    
}
