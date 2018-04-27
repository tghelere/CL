<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContatoController extends Controller
{
   
    public function post(){}


    public function index(){
        
        $data = [
            'page' => 'contato',
            'title' => 'Contato',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.contato', compact('data'));
    }
}
