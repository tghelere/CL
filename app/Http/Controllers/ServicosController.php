<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function limpeza(){
    	$title = 'Servicos > Limpeza';
    	return view('website.servicos', compact('title'));
    }
    public function servicosGerais(){
    	$title = 'Servicos > Serviços Gerais';
    	return view('website.servicos', compact('title'));
    }
    public function portaria(){
    	$title = 'Servicos > Portaria';
    	return view('website.servicos', compact('title'));
    }
    public function jardinagem(){
    	$title = 'Servicos > Jardinagem';
    	return view('website.servicos', compact('title'));
    }
    public function recepcao(){
    	$title = 'Servicos > Recepcao';
    	return view('website.servicos', compact('title'));
    }
    public function controladoriaDeAcesso(){
    	$title = 'Servicos > controladoria de acesso';
    	return view('website.servicos', compact('title'));
    }    
}
