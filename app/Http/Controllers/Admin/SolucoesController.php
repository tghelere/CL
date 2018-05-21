<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolucoesController extends Controller
{
    public function industrias(){
    	$title = 'Soluçoes > industrias';
    	return view('admin.solucoes', compact('title'));
    }
    public function varejo(){
    	$title = 'Soluçoes > varejo';
    	return view('admin.solucoes', compact('title'));
    }
    public function orgaosPublicos(){
    	$title = 'Soluçoes > orgaosPublicos';
    	return view('admin.solucoes', compact('title'));
    }
    public function condominios(){
    	$title = 'Soluçoes > condominios';
    	return view('admin.solucoes', compact('title'));
    }
    public function clinicasHospitais(){
    	$title = 'Soluçoes > clinicasHospitais';
    	return view('admin.solucoes', compact('title'));
    }
    public function escolasUniversidades(){
    	$title = 'Soluçoes > escolasUniversidades';
    	return view('admin.solucoes', compact('title'));
    }
    public function escritoriosAmbientesCorporativos(){
    	$title = 'Soluçoes > escritoriosAmbientesCorporativos';
    	return view('admin.solucoes', compact('title'));
    }
}
