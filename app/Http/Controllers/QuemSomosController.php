<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuemSomosController extends Controller
{
    public function index(){
    	$title = "Quem somos";
    	return view('website.quem-somos', compact('title'));
    }
}
