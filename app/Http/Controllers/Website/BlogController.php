<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(){
        
        $data = [
            'page' => 'blog',
            'title' => 'Blog',
            'h1' => 'Blog Centrallimp',
            'keywords' => '',
            'description' => '',            
        ];
        
    	return view('website.blog', compact('data'));
    }    
}
