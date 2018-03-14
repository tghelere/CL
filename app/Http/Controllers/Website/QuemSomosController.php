<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuemSomosController extends Controller
{
    public function index(){
    	$title = "Quem somos";
    	return view('website.quem-somos', compact('title'));
    }
}
