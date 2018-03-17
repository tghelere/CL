<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicosController extends Controller
{
    public function limpeza(){
    	$title = 'Servicos > Limpeza';
    	return view('admin.servicos', compact('title'));
    }
    public function servicosGerais(){
    	$title = 'Servicos > Serviços Gerais';
    	return view('admin.servicos', compact('title'));
    }
    public function portaria(){
    	$title = 'Servicos > Portaria';
    	return view('admin.servicos', compact('title'));
    }
    public function jardinagem(){
    	$title = 'Servicos > Jardinagem';
    	return view('admin.servicos', compact('title'));
    }
    public function recepcao(){
    	$title = 'Servicos > Recepcao';
    	return view('admin.servicos', compact('title'));
    }
    public function controladoriaDeAcesso(){
    	$title = 'Servicos > controladoria de acesso';
    	return view('admin.servicos', compact('title'));
    }
}
