<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicosController extends Controller
{
    // public function limpeza(){
    // 	$title = 'Servicos > Limpeza';
    // 	return view('website.servicos', compact('title'));
    // }
    // public function servicosGerais(){
    // 	$title = 'Servicos > Serviços Gerais';
    // 	return view('website.servicos', compact('title'));
    // }
    // public function portaria(){
    // 	$title = 'Servicos > Portaria';
    // 	return view('website.servicos', compact('title'));
    // }
    // public function jardinagem(){
    // 	$title = 'Servicos > Jardinagem';
    // 	return view('website.servicos', compact('title'));
    // }
    // public function recepcao(){
    // 	$title = 'Servicos > Recepcao';
    // 	return view('website.servicos', compact('title'));
    // }
    // public function controladoriaDeAcesso(){
    // 	$title = 'Servicos > controladoria de acesso';
    // 	return view('website.servicos', compact('title'));
    // }

    public function index(){
        
        $data = [
            'page' => 'servicos',
            'title' => 'Serviços',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }
}
