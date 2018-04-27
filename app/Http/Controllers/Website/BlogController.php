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
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.blog', compact('data'));
    }    
}
