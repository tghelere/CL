<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Recrutamento;

class TrabalheConoscoController extends Controller
{
    protected $data;

    public function index(){
          
        $data = [
            'page' => 'trabalheconosco',
            'title' => 'Trabalhe conosco',
            'h1' => 'Recrutamento e Seleção',
            'keywords' => '',
            'description' => '',            
        ];
        
    	return view('website.trabalhe-conosco', compact('data'));
    }

    public function post(Request $request){

        $this->data = [
            'title' => 'Recrutamento',
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'phone' => $request->json('phone'),
            'state' => $request->json('state.name'),
            'city' => $request->json('city.name'),
            'interest' => implode(', ', $request->json('interest')),
            'description' => $request->json('description'),
            'curriculum' => config('app.url') . "/storage/curriculums/" . $request->json('filename'),
        ];

        // return $this->data;

        try {
            Mail::to(config('app.dev_mail'))->send(new Recrutamento($this->data));
            return ['type' => 'success'];
        } catch (\Exception $e) {
            return ['type' => 'error', 'message' => 'Error - '.$e];
        }
        
    }
}
