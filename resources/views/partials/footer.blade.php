<footer>
  <div class="footer-above">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <h2>{{ config('app.name') }}</h2>
        </div>
        <div class="col-md-4">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo assumenda adipisci ratione.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <h4>Institucional</h4>
          <ul>
            <li><a title="Quem Somos" href="{{ route('quem-somos') }}">Quem Somos</a></li>
            <li><a title="Blog" href="{{ route('blog') }}">Blog</a></li>
            <li><a title="Trabalhe Aqui" href="{{ route('trabalhe-conosco') }}">Trabalhe Aqui</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h4>Serviços</h4>
          <ul>
            <li><a title="Limpeza" href="{{ route('servicos-limpeza') }}">Limpeza</a></li>
            <li><a title="Serviços Gerais" href="{{ route('servicos-servicos-gerais') }}">Serviços Gerais</a></li>
            <li><a title="Portaria" href="{{ route('servicos-portaria') }}">Portaria</a></li>
            <li><a title="Jardinagem" href="{{ route('servicos-jardinagem') }}">Jardinagem</a></li>
            <li><a title="Recepção" href="{{ route('servicos-recepcao') }}">Recepção</a></li>
            <li><a title="Controladoria de acesso" href="{{ route('servicos-controladoria-de-acesso') }}">Controladoria de acesso</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h4>Soluções</h4>
          <ul>
            <li><a title="Indústrias" href="{{ route('solucoes-industrias') }}">Indústrias</a></li>
            <li><a title="Comércio" href="{{ route('solucoes-comercio') }}">Comércio</a></li>
            <li><a title="Orgãos públicos" href="{{ route('solucoes-orgaos-publicos') }}">Orgãos públicos</a></li>
            <li><a title="Condomínios" href="{{ route('solucoes-condominios') }}">Condomínios</a></li>
            <li><a title="Clínicas e Hospitais" href="{{ route('solucoes-clinicas-e-hospitais') }}">Clínicas e Hospitais</a></li>
            <li><a title="Escolas e Universidades" href="{{ route('solucoes-escolas-e-universidades') }}">Escolas e Universidades</a></li>
            <li><a title="Escritórios e Ambientes Corporativos" href="{{ route('solucoes-escritorios-e-ambientes-corporativos') }}">Escritórios e Ambientes Corporativos</a></li>
          </ul>
        </div>
        <div class="col-md-6 text-center">
          <a class="align-middle" href="">Ebook</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <h4>Contato</h4>
          <ul>
            <li><a title="" href="">Fone1</a></li>
            <li><a title="" href="">Fone2</a></li>
          </ul>
          <p>Endereço... <a title="" href="">Mapa</a></p>
        </div>
        <div class="col-md-4">
          <h4>Social</h4>
          <ul>
            <li><a title="Facebook" href="">Facebook</a></li>
            <li><a title="GPlus" href="">GPlus</a></li>
            <li><a title="LinkedIn" href="">LinkedIn</a></li>
            <li><a title="Youtube" href="">Youtube</a></li>
            <li><a title="Whatsapp" href="">Whatsapp</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-below">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
        <a title="{{ config('app.name') }}" href="{{ route('home') }}">{{ config('app.name') }}</a> - Todos os Direitos Reservados
        </div>
      </div>
    </div>
  </div>
</footer>