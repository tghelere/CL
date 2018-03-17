<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuemSomosController extends Controller
{
    public function index(){
    	return view('admin.quem-somos');
    }
}
