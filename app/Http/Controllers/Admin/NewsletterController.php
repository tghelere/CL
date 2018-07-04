<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function index(){
    	$text = 'Newsletter';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.' . $data['page'], compact('data'));
    }
}
