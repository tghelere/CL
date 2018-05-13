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
            'h1' => 'Conheça a Centrallimp',
            'keywords' => '',
            'description' => '',            
        ];
        
    	return view('website.quem-somos', compact('data'));
    }
}
