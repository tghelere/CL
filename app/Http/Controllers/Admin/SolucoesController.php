<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolucoesController extends Controller
{
    public function industrias(){
        $text = 'Soluções - Indústrias';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function varejo(){
        $text = 'Soluções - Varejo';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function orgaosPublicos(){
        $text = 'Soluções - Órgãos Públicos';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function condominios(){
        $text = 'Soluções - Condomínios';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function clinicasHospitais(){
        $text = 'Soluções - Clínicas e Hospitais';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function escolasUniversidades(){
        $text = 'Soluções - Escolas e Universidades';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
    public function escritoriosAmbientesCorporativos(){
        $text = 'Soluções - Escritórios e Ambientes Corporativos';
        $data = [
            'title' => $text,
            'page' => str_slug($text),
        ];
    	return view('admin.solucoes', compact('data'));
    }
}
