<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabalheConoscoController extends Controller
{
    public function getTrabalheConosco(){
    	$title = "Trabalhe conosco";
    	return view('website.trabalhe-conosco', compact('title'));
    }
    public function postTrabalheConosco(){

    }
}
