<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolucoesController extends Controller
{
    public function industrias(){
    	$title = 'Soluçoes > industrias';
    	return view('website.solucoes', compact('title'));
    }
    public function comercio(){
    	$title = 'Soluçoes > comercio';
    	return view('website.solucoes', compact('title'));
    }
    public function orgaosPublicos(){
    	$title = 'Soluçoes > orgaosPublicos';
    	return view('website.solucoes', compact('title'));
    }
    public function condominios(){
    	$title = 'Soluçoes > condominios';
    	return view('website.solucoes', compact('title'));
    }
    public function clinicasHospitais(){
    	$title = 'Soluçoes > clinicasHospitais';
    	return view('website.solucoes', compact('title'));
    }
    public function escolasUniversidades(){
    	$title = 'Soluçoes > escolasUniversidades';
    	return view('website.solucoes', compact('title'));
    }
    public function escritoriosAmbientesCorporativos(){
    	$title = 'Soluçoes > escritoriosAmbientesCorporativos';
    	return view('website.solucoes', compact('title'));
    }
}
