<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$title = 'Home';
    	return view('website.home', compact('title'));
    }
}