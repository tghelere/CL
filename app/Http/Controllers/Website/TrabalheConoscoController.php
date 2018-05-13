<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrabalheConoscoController extends Controller
{
    public function index(){
          
        $data = [
            'page' => 'trabalheconosco',
            'title' => 'Trabalhe conosco',
            'h1' => 'Recrutamento e Seleção',
            'keywords' => '',
            'description' => '',            
        ];
        
    	return view('website.trabalhe-conosco', compact('data'));
    }
    public function post(){

    }
}
