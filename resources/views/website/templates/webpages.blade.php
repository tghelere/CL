<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
</head>
<body>
	<ul>
		<li><a href="/">home</a></li>
		<li><a href="/quem-somos">quem-somos</a></li>
		<li><a href="/servicos">servicos</a>
			<ul>
				<li><a href="/servicos/limpeza">limpeza</a></li>
				<li><a href="/servicos/servicos-gerais">servicos-gerais</a></li>
				<li><a href="/servicos/portaria">portaria</a></li>
				<li><a href="/servicos/jardinagem">jardinagem</a></li>
				<li><a href="/servicos/recepcao">recepcao</a></li>
				<li><a href="/servicos/controladoria-de-acesso">controladoria-de-acesso</a></li>
			</ul>
		</li>
		<li><a href="/blog">blog</a></li>
		<li><a href="/solucoes">solucoes</a>
			<ul>
				<li><a href="/solucoes/industrias">industrias</a></li>
				<li><a href="/solucoes/comercio">comercio</a></li>
				<li><a href="/solucoes/orgaos-publicos">orgaos-publicos</a></li>
				<li><a href="/solucoes/condominios">condominios</a></li>
				<li><a href="/solucoes/clinicas-e-hospitais">clinicas-e-hospitais</a></li>
				<li><a href="/solucoes/escolas-e-universidades">escolas-e-universidades</a></li>
				<li><a href="/solucoes/escritorios-e-ambientes-corporativos">escritorios-e-ambientes-corporativos</a></li>
			</ul>
		</li>
		<li><a href="/trabalhe-conosco">trabalhe-conosco</a></li>
		<li><a href="/contato">contato</a></li>
		<li><a href="/ouvidoria">ouvidoria</a></li>
	</ul>
	@yield('content')
	@stack('scripts')
</body>
</html>