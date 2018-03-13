<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function getContato(){
    	$title = "Contato";
    	return view('website.contato', compact('title'));
    }
    public function postContato(){}
}
