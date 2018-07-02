<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolucoesController extends Controller
{
    public function industrias(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Indústrias',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
    public function varejo(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Varejo',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
    public function orgaosPublicos(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Orgãos Públicos',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
    public function condominios(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Condomínios',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
    public function clinicasHospitais(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Clínicas e Áreas de Saúde',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
    public function escolasUniversidades(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Escolas e Universidades',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
    public function escritoriosAmbientesCorporativos(){
    	$data = [
            'page' => 'solucoes',
            'title-category' => 'Soluções',
            'title' => 'Escritórios e Ambientes Corporativos',
            'keywords' => '',
            'description' => '',            
        ];
        return view('website.solucoes', compact('data'));
    }
}
