<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Orcamento;

class ContatoController extends Controller
{
    public function index(){
        
        $data = [
            'page' => 'contato',
            'title' => 'Contato',
            'h1' => 'Fale Conosco',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.contato', compact('data'));
    }
}
