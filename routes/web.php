<?php

Route::namespace('Website')->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('quem-somos', 'QuemSomosController@index')->name('quem-somos');
    Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('blog/post/{post}', 'BlogController@post')->name('blog-post');

	Route::group(['prefix' => 'servicos'], function(){
		Route::redirect('/', 'servicos/limpeza');
		Route::get('limpeza', 'ServicosController@limpeza')->name('servicos-limpeza');		
		Route::get('portaria', 'ServicosController@portaria')->name('servicos-portaria');
		Route::get('jardinagem', 'ServicosController@jardinagem')->name('servicos-jardinagem');
		Route::get('recepcao', 'ServicosController@recepcao')->name('servicos-recepcao');
		Route::get('controladoria-de-acesso', 'ServicosController@controladoriaDeAcesso')->name('servicos-controladoria-de-acesso');
	});
	Route::group(['prefix' => 'solucoes'], function(){
		Route::redirect('/', 'solucoes/industrias');        
		Route::get('industrias', 'SolucoesController@industrias')->name('industrias');
		Route::get('varejo', 'SolucoesController@varejo')->name('varejo');
		Route::get('orgaos-publicos', 'SolucoesController@orgaosPublicos')->name('orgaos-publicos');
		Route::get('condominios', 'SolucoesController@condominios')->name('condominios');
		Route::get('clinicas-e-areas-de-saude', 'SolucoesController@clinicasHospitais')->name('clinicas-e-areas-de-saude');
		Route::get('escolas-e-universidades', 'SolucoesController@escolasUniversidades')->name('escolas-e-universidades');
		Route::get('escritorios-e-ambientes-corporativos', 'SolucoesController@escritoriosAmbientesCorporativos')->name('escritorios-e-ambientes-corporativos');	
	});
	Route::get('trabalhe-conosco', 'TrabalheConoscoController@index')->name('trabalhe-conosco');
	Route::post('trabalhe-conosco', 'TrabalheConoscoController@post')->name('trabalhe-conosco-post');
	Route::get('contato', 'ContatoController@index')->name('contato');
	Route::post('contato', 'ContatoController@post')->name('contato-post');
	Route::get('ouvidoria', 'OuvidoriaController@index')->name('ouvidoria');
    Route::post('ouvidoria', 'OuvidoriaController@post')->name('ouvidoria-post');
    Route::post('orcamento', 'OrcamentoController@post')->name('orcamento-post');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'AdminController@index')->name('index-Admin');
	Route::get('home', 'HomeController@index')->name('home-Admin');
	Route::get('quem-somos', 'QuemSomosController@index')->name('quem-somos-Admin');
	Route::get('blog/pagina', 'BlogController@index')->name('blog-Admin');
	Route::get('blog/posts', 'BlogController@posts')->name('blog-Admin-posts');
	Route::group(['prefix' => 'servicos'], function(){
		Route::redirect('/', 'servicos/limpeza');
		Route::get('limpeza', 'ServicosController@limpeza')->name('servicos-limpeza-Admin');
		Route::get('portaria', 'ServicosController@portaria')->name('servicos-portaria-Admin');
		Route::get('jardinagem', 'ServicosController@jardinagem')->name('servicos-jardinagem-Admin');
		Route::get('recepcao', 'ServicosController@recepcao')->name('servicos-recepcao-Admin');
		Route::get('controladoria-de-acesso', 'ServicosController@controladoriaDeAcesso')->name('servicos-controladoria-de-acesso-Admin');
	});
	Route::group(['prefix' => 'solucoes'], function(){
		Route::redirect('/', 'solucoes/industrias');
		Route::get('industrias', 'SolucoesController@industrias')->name('solucoes-industrias-Admin');
		Route::get('varejo', 'SolucoesController@varejo')->name('solucoes-varejo-Admin');
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
	Route::get('rodape', 'RodapeController@index')->name('rodape-Admin');
});
