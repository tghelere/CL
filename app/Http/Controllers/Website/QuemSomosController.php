<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuemSomosController extends Controller
{
    
    public function index(){
          
        $data = [
            'page' => 'quemsomos',
            'title' => 'Quem somos',
            'keywords' => '',
            'description' => '',            
        ];
        
    	return view('website.quem-somos', compact('data'));
    }
}
