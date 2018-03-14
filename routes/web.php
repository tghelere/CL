<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('Website')->group(function () {

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('quem-somos', 'QuemSomosController@index')->name('quem-somos');

	Route::get('blog', 'BlogController@index')->name('blog');

	Route::group(['prefix' => 'servicos'], function(){
		Route::redirect('/', 'servicos/limpeza');
		Route::get('limpeza', 'ServicosController@limpeza')->name('servicos-limpeza');
		Route::get('servicos-gerais', 'ServicosController@servicosGerais')->name('servicos-servicos-gerais');
		Route::get('portaria', 'ServicosController@portaria')->name('servicos-portaria');
		Route::get('jardinagem', 'ServicosController@jardinagem')->name('servicos-jardinagem');
		Route::get('recepcao', 'ServicosController@recepcao')->name('servicos-recepcao');
		Route::get('controladoria-de-acesso', 'ServicosController@controladoriaDeAcesso')->name('servicos-controladoria-de-acesso');
	});

	Route::group(['prefix' => 'solucoes'], function(){
		Route::redirect('/', 'solucoes/industrias');
		Route::get('industrias', 'SolucoesController@industrias')->name('solucoes-industrias');
		Route::get('comercio', 'SolucoesController@comercio')->name('solucoes-comercio');
		Route::get('orgaos-publicos', 'SolucoesController@orgaosPublicos')->name('solucoes-orgaos-publicos');
		Route::get('condominios', 'SolucoesController@condominios')->name('solucoes-condominios');
		Route::get('clinicas-e-hospitais', 'SolucoesController@clinicasHospitais')->name('solucoes-clinicas-e-hospitais');
		Route::get('escolas-e-universidades', 'SolucoesController@escolasUniversidades')->name('solucoes-escolas-e-universidades');
		Route::get('escritorios-e-ambientes-corporativos', 'SolucoesController@escritoriosAmbientesCorporativos')->name('solucoes-escritorios-e-ambientes-corporativos');	
	});

	Route::get('trabalhe-conosco', 'TrabalheConoscoController@getTrabalheConosco')->name('trabalhe-conosco');
	Route::post('trabalhe-conosco', 'TrabalheConoscoController@postTrabalheConosco')->name('trabalhe-conosco');
	Route::get('contato', 'ContatoController@getContato')->name('contato');
	Route::post('contato', 'ContatoController@postContato')->name('contato');
	Route::get('ouvidoria', 'OuvidoriaController@getOuvidoria')->name('ouvidoria');
	Route::post('ouvidoria', 'OuvidoriaController@postOuvidoria')->name('ouvidoria');
});