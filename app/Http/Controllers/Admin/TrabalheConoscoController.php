<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrabalheConoscoController extends Controller
{
    public function index(){
    	return view('admin.trabalhe-conosco');
    }
    public function read(){
    	return view('admin.trabalhe-conosco-recrutamento');
    }
}
