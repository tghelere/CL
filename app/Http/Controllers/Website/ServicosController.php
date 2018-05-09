<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicosController extends Controller
{
    public function limpeza(){
    	$data = [
            'page' => 'servicos',
            'title-category' => 'Serviços',
            'title' => 'Limpeza',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }
    public function servicosGerais(){
    	$data = [
            'page' => 'servicos',
            'title-category' => 'Serviços',
            'title' => 'Serviços Gerais',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }
    public function portaria(){
    	$data = [
            'page' => 'servicos',
            'title-category' => 'Serviços',
            'title' => 'Portaria',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }
    public function jardinagem(){
    	$data = [
            'page' => 'servicos',
            'title-category' => 'Serviços',
            'title' => 'Jardinagem',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }
    public function recepcao(){
    	$data = [
            'page' => 'servicos',
            'title-category' => 'Serviços',
            'title' => 'Recepção',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }
    public function controladoriaDeAcesso(){
    	$data = [
            'page' => 'servicos',
            'title-category' => 'Serviços',
            'title' => 'Controladoria de Acesso',
            'keywords' => '',
            'description' => '',            
        ];
        
        return view('website.servicos', compact('data'));
    }

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
