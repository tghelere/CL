<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrabalheConoscoController extends Controller
{
    public function index(){
    	$title = "Trabalhe conosco";
    	return view('website.trabalhe-conosco', compact('title'));
    }
    public function post(){

    }
}
