<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
    	$title = 'Blog';
    	return view('website.blog', compact('title'));
    }
}
