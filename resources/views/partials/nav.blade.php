
    <nav class="navbar navbar-expand-md navbar-light sticky-top">
        <div class="container" id="top-bar">
            <a class="navbar-brand logo" title="{{ config('app.name') }}" href="{{ route('home') }}">
                <span>{{ config('app.name') }}</span>
            </a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="collapse navbar-collapse menu-h" id="navbarSupportedContent" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto menu">
                    <li class="nav-item dropdown @if( Route::is('quem-somos') || Route::is('trabalhe-conosco') || Route::is('ouvidoria')) {{'active'}} @endif"><a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5 class="root">Institucional</h5></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a title="Quem Somos" class="dropdown-item" href="{{ route('quem-somos') }}"><h5>Quem Somos</h5></a></li>
                            <li><a title="Trabalhe Conosco" class="dropdown-item" href="{{ route('trabalhe-conosco') }}"><h5>Trabalhe Conosco</h5></a></li>
                            <li><a title="Ouvidoria" class="dropdown-item" href="{{ route('ouvidoria') }}"><h5>Ouvidoria</h5></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{ (preg_match("/^solucoes-[a-z\-]+$/", Route::currentRouteName()) ? 'active' : '') }}"><a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5 class="root">Soluções</h5></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a title="Indústrias" class="dropdown-item" href="{{ route('solucoes-industrias') }}"><h5>Indústrias</h5></a></li>
                            <li><a title="Varejo" class="dropdown-item" href="{{ route('solucoes-varejo') }}"><h5>Varejo</h5></a></li>
                            <li><a title="Orgãos públicos" class="dropdown-item" href="{{ route('solucoes-orgaos-publicos') }}"><h5>Orgãos públicos</h5></a></li>
                            <li><a title="Condomínios" class="dropdown-item" href="{{ route('solucoes-condominios') }}"><h5>Condomínios</h5></a></li>
                            <li><a title="Clínicas e Áreas de Saúde" class="dropdown-item" href="{{ route('solucoes-clinicas-e-areas-de-saude') }}"><h5>Clínicas e Áreas de Saúde</h5></a></li>
                            <li><a title="Escolas e Universidades" class="dropdown-item" href="{{ route('solucoes-escolas-e-universidades') }}"><h5>Escolas e Universidades</h5></a></li>
                            <li><a title="Escritórios e Ambientes Corporativos" class="dropdown-item" href="{{ route('solucoes-escritorios-e-ambientes-corporativos') }}"><h5>Escritórios e Ambientes Corporativos</h5></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown {{ (preg_match("/^servicos-[a-z\-]+$/", Route::currentRouteName()) ? 'active' : '') }}"><a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h5 class="root">Serviços</h5></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a title="Limpeza" class="dropdown-item" href="{{ route('servicos-limpeza') }}"><h5>Limpeza</h5></a></li>
                            <li><a title="Portaria" class="dropdown-item" href="{{ route('servicos-portaria') }}"><h5>Portaria</h5></a></li>
                            <li><a title="Jardinagem" class="dropdown-item" href="{{ route('servicos-jardinagem') }}"><h5>Jardinagem</h5></a></li>
                            <li><a title="Recepção" class="dropdown-item" href="{{ route('servicos-recepcao') }}"><h5>Recepção</h5></a></li>
                            <li><a title="Controladoria de acesso" class="dropdown-item" href="{{ route('servicos-controladoria-de-acesso') }}"><h5>Controladoria de acesso</h5></a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ (Route::is('blog') ? 'active' : '') }} {{ (preg_match("/^blog[a-z\-]+$/", Route::currentRouteName()) ? 'active' : '') }}"><a class="nav-link" href="{{ route('blog') }}"><h5 class="root">Blog</h5></a></li>
                    <li class="nav-item {{ (Route::is('contato') ? 'active' : '') }}"><a class="nav-link" href="{{ route('contato') }}"><h5 class="root">Contato</h5></a></li>
                    
                    <li class="nav-item"><a class="nav-link phone" title="Fone: {{ config('app.phone_f') }}" href="tel:{{ config('app.phone') }}"><h5 class="root">{{ config('app.phone_f') }}</h5></a></li>
                    <li class="nav-item"><a class="nav-link whats" title="Whatsapp: {{ config('app.celphone_f') }}" target="_blank" href="https://api.whatsapp.com/send?phone={{ config('app.celphone') }}"><h5 class="root">{{ config('app.celphone_f') }}</h5></a></li>
                </ul>

                {{-- <ul class="navbar-nav ml-auto">
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                </ul> --}}
            </div>

            <div class="icons_mobile only_mobile">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item mobile1"><a class="mobile Fone" title="Fone: {{ config('app.phone_f') }}" href="tel:{{ config('app.phone') }}"><span>Fone</span></a></li>
                    <li class="list-inline-item mobile1"><a class="mobile Whatsapp" title="Whatsapp: {{ config('app.celphone_f') }}" target="_blank" href="https://api.whatsapp.com/send?phone={{ config('app.celphone') }}"><span>Whatsapp</span></a></li>
                    
                    {{-- class="only_mobile" --}}
                    <menu-mobile></menu-mobile>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mobile-home-screen">
    @if($data['page'] != 'home')
    </div>
    @endif