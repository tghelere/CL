<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Contato;

class ContatoController extends Controller
{
    protected $data;

    public function index(){
        
        $data = [
            'page' => 'contato',
            'title' => 'Contato',
            'h1' => 'Fale Conosco',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.contato', compact('data'));
    }

    public function post(Request $request){

        $this->data = [
            'title' => 'Fale Conosco',
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'phone' => $request->json('phone'),
            'state' => $request->json('state.name'),
            'city' => $request->json('city.name'),
            'message' => $request->json('message'),
        ];

        try {
            Mail::to(config('app.contact_mail'))->send(new Contato($this->data));
            return ['type' => 'success'];
        } catch (\Exception $e) {
            return ['type' => 'error', 'message' => 'Error - '.$e];
        }

    }
}
