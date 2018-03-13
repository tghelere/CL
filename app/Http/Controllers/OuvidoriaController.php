<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OuvidoriaController extends Controller
{
    public function getOuvidoria(){
    	$title = "Ouvidoria";
    	return view('website.ouvidoria', compact('title'));
    }
    public function postOuvidoria(){}
}
