<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OuvidoriaController extends Controller
{
    public function getOuvidoria(){
    	$title = "Ouvidoria";
    	return view('website.ouvidoria', compact('title'));
    }
    public function postOuvidoria(){}
}
