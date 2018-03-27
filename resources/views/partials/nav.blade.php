<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" id="navbarNavDropdown">
            <!-- <ul class="navbar-nav mr-auto">

            </ul> -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{{ (Request::is('quem-somos') ? 'active' : '') }}}"><a class="nav-link" href="{{ route('quem-somos') }}">Quem Somos</a></li>
                <li class="nav-item dropdown {{{ (Request::is('servicos') ? 'active' : '') }}}"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Serviços</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a title="Limpeza" class="dropdown-item" href="{{ route('servicos-limpeza') }}">Limpeza</a></li>
                        <li><a title="Serviços Gerais" class="dropdown-item" href="{{ route('servicos-servicos-gerais') }}">Serviços Gerais</a></li>
                        <li><a title="Portaria" class="dropdown-item" href="{{ route('servicos-portaria') }}">Portaria</a></li>
                        <li><a title="Jardinagem" class="dropdown-item" href="{{ route('servicos-jardinagem') }}">Jardinagem</a></li>
                        <li><a title="Recepção" class="dropdown-item" href="{{ route('servicos-recepcao') }}">Recepção</a></li>
                        <li><a title="Controladoria de acesso" class="dropdown-item" href="{{ route('servicos-controladoria-de-acesso') }}">Controladoria de acesso</a></li>
                    </ul>
                    </li>
                <li class="nav-item dropdown {{{ (Request::is('solucoes') ? 'active' : '') }}}"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Soluções</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a title="Indústrias" class="dropdown-item" href="{{ route('solucoes-industrias') }}">Indústrias</a></li>
                        <li><a title="Comércio" class="dropdown-item" href="{{ route('solucoes-comercio') }}">Comércio</a></li>
                        <li><a title="Orgãos públicos" class="dropdown-item" href="{{ route('solucoes-orgaos-publicos') }}">Orgãos públicos</a></li>
                        <li><a title="Condomínios" class="dropdown-item" href="{{ route('solucoes-condominios') }}">Condomínios</a></li>
                        <li><a title="Clínicas e Hospitais" class="dropdown-item" href="{{ route('solucoes-clinicas-e-hospitais') }}">Clínicas e Hospitais</a></li>
                        <li><a title="Escolas e Universidades" class="dropdown-item" href="{{ route('solucoes-escolas-e-universidades') }}">Escolas e Universidades</a></li>
                        <li><a title="Escritórios e Ambientes Corporativos" class="dropdown-item" href="{{ route('solucoes-escritorios-e-ambientes-corporativos') }}">Escritórios e Ambientes Corporativos</a></li>
                    </ul>
                </li>
                <li class="nav-item {{{ (Request::is('blog') ? 'active' : '') }}}"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                <li class="nav-item {{{ (Request::is('trabalhe-conosco') ? 'active' : '') }}}"><a class="nav-link" href="{{ route('trabalhe-conosco') }}">Trabalhe Conosco</a></li>
                <li class="nav-item {{{ (Request::is('ouvidoria') ? 'active' : '') }}}"><a class="nav-link" href="{{ route('ouvidoria') }}">Ouvidoria</a></li>
                <li class="nav-item {{{ (Request::is('contato') ? 'active' : '') }}}"><a class="nav-link" href="{{ route('contato') }}">Contato</a></li>
            </ul>

            <!-- <ul class="navbar-nav ml-auto">
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul> -->
        </div>
    </div>
</nav>