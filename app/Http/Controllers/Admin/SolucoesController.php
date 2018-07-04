<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolucoesController extends Controller
{
    public function industrias(){
        $text = 'Soluções - Indústrias';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function varejo(){
        $text = 'Soluções - Varejo';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function orgaosPublicos(){
        $text = 'Soluções - Órgãos Públicos';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function condominios(){
        $text = 'Soluções - Condomínios';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function clinicasHospitais(){
        $text = 'Soluções - Clínicas e Áreas de Saúde';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function escolasUniversidades(){
        $text = 'Soluções - Escolas e Universidades';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function escritoriosAmbientesCorporativos(){
        $text = 'Soluções - Escritórios e Ambientes Corporativos';
        $page = explode(' - ', $text);
        $data = [
            'title' => $text,
            'page' => str_slug($page[1]),
        ];
    	return view('admin.solucoes', compact('data'));
    }
}
