<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OuvidoriaController extends Controller
{
    public function index(){
    	$text = 'Ouvidoria';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
    public function read(){
    	return view('admin.ouvidoria-mensagens');
    }
}
