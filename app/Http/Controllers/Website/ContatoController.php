<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContatoController extends Controller
{
    public function index(){
    	$title = "Contato";
    	return view('website.contato', compact('title'));
    }
    public function post(){}
}
