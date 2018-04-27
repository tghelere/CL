<?php

Route::namespace('Website')->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('quem-somos', 'QuemSomosController@index')->name('quem-somos');
	Route::get('blog', 'BlogController@index')->name('blog');
	Route::group(['prefix' => 'servicos'], function(){
		Route::redirect('/', 'servicos/limpeza');
		Route::get('limpeza', 'ServicosController@index')->name('servicos-limpeza');
		Route::get('servicos-gerais', 'ServicosController@index')->name('servicos-servicos-gerais');
		Route::get('portaria', 'ServicosController@index')->name('servicos-portaria');
		Route::get('jardinagem', 'ServicosController@index')->name('servicos-jardinagem');
		Route::get('recepcao', 'ServicosController@index')->name('servicos-recepcao');
		Route::get('controladoria-de-acesso', 'ServicosController@index')->name('servicos-controladoria-de-acesso');
		// Route::get('limpeza', 'ServicosController@limpeza')->name('servicos-limpeza');
		// Route::get('servicos-gerais', 'ServicosController@servicosGerais')->name('servicos-servicos-gerais');
		// Route::get('portaria', 'ServicosController@portaria')->name('servicos-portaria');
		// Route::get('jardinagem', 'ServicosController@jardinagem')->name('servicos-jardinagem');
		// Route::get('recepcao', 'ServicosController@recepcao')->name('servicos-recepcao');
		// Route::get('controladoria-de-acesso', 'ServicosController@controladoriaDeAcesso')->name('servicos-controladoria-de-acesso');
	});
	Route::group(['prefix' => 'solucoes'], function(){
		Route::redirect('/', 'solucoes/industrias');
		Route::get('industrias', 'SolucoesController@index')->name('solucoes-industrias');
		Route::get('comercio', 'SolucoesController@index')->name('solucoes-comercio');
		Route::get('orgaos-publicos', 'SolucoesController@index')->name('solucoes-orgaos-publicos');
		Route::get('condominios', 'SolucoesController@index')->name('solucoes-condominios');
		Route::get('clinicas-e-hospitais', 'SolucoesController@index')->name('solucoes-clinicas-e-hospitais');
		Route::get('escolas-e-universidades', 'SolucoesController@index')->name('solucoes-escolas-e-universidades');
		Route::get('escritorios-e-ambientes-corporativos', 'SolucoesController@index')->name('solucoes-escritorios-e-ambientes-corporativos');	
		// Route::get('industrias', 'SolucoesController@industrias')->name('solucoes-industrias');
		// Route::get('comercio', 'SolucoesController@comercio')->name('solucoes-comercio');
		// Route::get('orgaos-publicos', 'SolucoesController@orgaosPublicos')->name('solucoes-orgaos-publicos');
		// Route::get('condominios', 'SolucoesController@condominios')->name('solucoes-condominios');
		// Route::get('clinicas-e-hospitais', 'SolucoesController@clinicasHospitais')->name('solucoes-clinicas-e-hospitais');
		// Route::get('escolas-e-universidades', 'SolucoesController@escolasUniversidades')->name('solucoes-escolas-e-universidades');
		// Route::get('escritorios-e-ambientes-corporativos', 'SolucoesController@escritoriosAmbientesCorporativos')->name('solucoes-escritorios-e-ambientes-corporativos');	
	});
	Route::get('trabalhe-conosco', 'TrabalheConoscoController@index')->name('trabalhe-conosco');
	Route::post('trabalhe-conosco', 'TrabalheConoscoController@post')->name('trabalhe-conosco');
	Route::get('contato', 'ContatoController@index')->name('contato');
	Route::post('contato', 'ContatoController@post')->name('contato');
	Route::get('ouvidoria', 'OuvidoriaController@index')->name('ouvidoria');
	Route::post('ouvidoria', 'OuvidoriaController@post')->name('ouvidoria');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'AdminController@index')->name('index-Admin');
	Route::get('home', 'HomeController@index')->name('home-Admin');
	Route::get('quem-somos', 'QuemSomosController@index')->name('quem-somos-Admin');
	Route::get('blog', 'BlogController@index')->name('blog-Admin');
	Route::group(['prefix' => 'servicos'], function(){
		Route::redirect('/', 'servicos/limpeza');
		Route::get('limpeza', 'ServicosController@limpeza')->name('servicos-limpeza-Admin');
		Route::get('servicos-gerais', 'ServicosController@servicosGerais')->name('servicos-servicos-gerais-Admin');
		Route::get('portaria', 'ServicosController@portaria')->name('servicos-portaria-Admin');
		Route::get('jardinagem', 'ServicosController@jardinagem')->name('servicos-jardinagem-Admin');
		Route::get('recepcao', 'ServicosController@recepcao')->name('servicos-recepcao-Admin');
		Route::get('controladoria-de-acesso', 'ServicosController@controladoriaDeAcesso')->name('servicos-controladoria-de-acesso-Admin');
	});
	Route::group(['prefix' => 'solucoes'], function(){
		Route::redirect('/', 'solucoes/industrias');
		Route::get('industrias', 'SolucoesController@industrias')->name('solucoes-industrias-Admin');
		Route::get('comercio', 'SolucoesController@comercio')->name('solucoes-comercio-Admin');
		Route::get('orgaos-publicos', 'SolucoesController@orgaosPublicos')->name('solucoes-orgaos-publicos-Admin');
		Route::get('condominios', 'SolucoesController@condominios')->name('solucoes-condominios-Admin');
		Route::get('clinicas-e-hospitais', 'SolucoesController@clinicasHospitais')->name('solucoes-clinicas-e-hospitais-Admin');
		Route::get('escolas-e-universidades', 'SolucoesController@escolasUniversidades')->name('solucoes-escolas-e-universidades-Admin');
		Route::get('escritorios-e-ambientes-corporativos', 'SolucoesController@escritoriosAmbientesCorporativos')->name('solucoes-escritorios-e-ambientes-corporativos-Admin');	
	});
	Route::get('trabalhe-conosco/pagina', 'TrabalheConoscoController@index')->name('trabalhe-conosco-Admin');
	Route::get('trabalhe-conosco/recrutamento', 'TrabalheConoscoController@read')->name('trabalhe-conosco-read-Admin');
	Route::get('contato/pagina', 'ContatoController@index')->name('contato-Admin');
	Route::get('contato/mensagens', 'ContatoController@read')->name('contato-read-Admin');
	Route::get('ouvidoria/pagina', 'OuvidoriaController@index')->name('ouvidoria-Admin');
	Route::get('ouvidoria/mensagens', 'OuvidoriaController@read')->name('ouvidoria-read-Admin');
	Route::get('newsletter', 'NewsletterController@index')->name('newsletter-Admin');
	Route::get('orcamento', 'OrcamentoController@index')->name('orcamento-Admin');
});
