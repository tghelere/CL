<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function textos(){
        $text = 'Home - Textos';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
    public function banners(){
        $text = 'Home - Banners';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
    public function depoimentos(){
        $text = 'Home - Depoimentos';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
}
