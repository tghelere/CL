<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Ouvidoria;

class OuvidoriaController extends Controller
{    
    protected $data;

    public function index(){
        
        $data = [
            'page' => 'ouvidoria',
            'title' => 'Ouvidoria',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.ouvidoria', compact('data'));
    }

    public function post(Request $request){
        
        $this->data = [
            'title' => 'Ouvidoria',
            'type' => $request->json('complaint'),
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'phone' => $request->json('phone'),
            'state' => $request->json('state.name'),
            'city' => $request->json('city.name'),
            'message' => $request->json('message'),
        ];

        try {
            Mail::to(config('app.ombuds_mail'))->send(new Ouvidoria($this->data));
            return ['type' => 'success'];
        } catch (\Exception $e) {
            return ['type' => 'error', 'message' => 'Error - '.$e];return ['type' => 'error', 'message' => 'Error - '.$e];
        }

    }
}
