<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OuvidoriaController extends Controller
{    
    public function index(){
        
        $data = [
            'page' => 'ouvidoria',
            'title' => 'Ouvidoria',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.ouvidoria', compact('data'));
    }
}
