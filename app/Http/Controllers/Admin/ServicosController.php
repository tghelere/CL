<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicosController extends Controller
{
    public function limpeza(){
        $text = 'Serviços - Limpeza';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.servicos', compact('data'));
    }
    public function portaria(){
        $text = 'Serviços - Portaria';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.servicos', compact('data'));
    }
    public function jardinagem(){
        $text = 'Serviços - Jardinagem';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.servicos', compact('data'));
    }
    public function recepcao(){
        $text = 'Serviços - Recepção';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.servicos', compact('data'));
    }
    public function controladoriaDeAcesso(){
        $text = 'Serviços - Controladoria de acesso';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.servicos', compact('data'));
    }
}
