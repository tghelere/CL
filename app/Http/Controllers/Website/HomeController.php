<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $banners = []; //vem do banco
        $text = ''; //vem do banco
        $solutions = []; //vem do banco - ultimo post de cada subcategoria de soluções
        $posts = []; // vem do banco - 2 ultimos posts do blog
        $services = []; //vem do banco ?
        $testimonies = []; //vem do banco
        
        $data = [
            'page' => 'home',
            'title' => 'Home',
            'keywords' => '',
            'description' => '',
            'banners' => $banners,
            'text' => $text,
            'solutions' => $solutions,
            'posts' => $posts,
            'services' => $services,
            'testimonies' => $testimonies,
        ];
        
    	return view('website.home', compact('data'));
    }
}
