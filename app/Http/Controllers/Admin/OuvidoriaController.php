<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OuvidoriaController extends Controller
{
    public function index(){
    	return view('admin.ouvidoria');
    }
    public function read(){
    	return view('admin.ouvidoria-mensagens');
    }
}
