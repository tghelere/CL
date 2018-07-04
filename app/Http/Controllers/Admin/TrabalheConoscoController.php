<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrabalheConoscoController extends Controller
{
    public function index(){
        $text = 'Trabalhe Conosco';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
    public function read(){
    	$text = 'Trabalhe Conosco - Recrutamento';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
}
