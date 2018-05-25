<footer>
  <div class="footer-above">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="/img/logomono.png" width="200" alt="{{ config('app.name') }}">
        </div>
        <div class="col-md-5 font-italic">
          <text-content :page="'footer'" :classe="'footer-text'"></text-content>
        </div>
      </div>
      <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-2">
                <h4 class="text-uppercase">Institucional</h4>
                <ul class="list">
                  <li><a title="Quem Somos" href="{{ route('quem-somos') }}">Quem Somos</a></li>
                  {{-- <li><a title="Blog" href="{{ route('blog') }}">Blog</a></li> --}}
                  <li><a title="Trabalhe Aqui" href="{{ route('trabalhe-conosco') }}">Trabalhe Aqui</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h4 class="text-uppercase">Serviços</h4>
                <ul class="list">
                  <li><a title="Limpeza" href="{{ route('servicos-limpeza') }}">Limpeza</a></li>
                  <li><a title="Portaria" href="{{ route('servicos-portaria') }}">Portaria</a></li>
                  <li><a title="Jardinagem" href="{{ route('servicos-jardinagem') }}">Jardinagem</a></li>
                  <li><a title="Recepção" href="{{ route('servicos-recepcao') }}">Recepção</a></li>
                  <li><a title="Controladoria de acesso" href="{{ route('servicos-controladoria-de-acesso') }}">Controladoria de acesso</a></li>
                </ul>
              </div>
              <div class="col-md-5">
                <h4 class="text-uppercase">Soluções</h4>
                <ul class="list">
                  <li><a title="Indústrias" href="{{ route('solucoes-industrias') }}">Indústrias</a></li>
                  <li><a title="Varejo" href="{{ route('solucoes-varejo') }}">Varejo</a></li>
                  <li><a title="Orgãos públicos" href="{{ route('solucoes-orgaos-publicos') }}">Orgãos públicos</a></li>
                  <li><a title="Condomínios" href="{{ route('solucoes-condominios') }}">Condomínios</a></li>
                  <li><a title="Clínicas e Hospitais" href="{{ route('solucoes-clinicas-e-hospitais') }}">Clínicas e Hospitais</a></li>
                  <li><a title="Escolas e Universidades" href="{{ route('solucoes-escolas-e-universidades') }}">Escolas e Universidades</a></li>
                  <li><a title="Escritórios e Ambientes Corporativos" href="{{ route('solucoes-escritorios-e-ambientes-corporativos') }}">Escritórios e Ambientes Corporativos</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4">
               {{-- <a class="align-middle" href="">Ebook</a> --}}
          </div>
        
       
      </div>
      <div class="row">
        <div class="col-md-8">
          <h4 class="text-uppercase">Contato</h4>
          <ul class="phone">
            <li><a title="Fone: {{ config('app.phone_f') }}" href="tel:{{ config('app.phone') }}">{{ config('app.phone_f') }}</a></li>
            <li><u><a class="whats" title="Whatsapp: {{ config('app.celphone_f') }}" target="_blank" href="https://api.whatsapp.com/send?phone={{ config('app.celphone') }}">{{ config('app.celphone_f') }}</a></u></li>
          </ul>
          <p class="address">Rua Augusto Severo, 203, Aeroporto - Cep: 86039-650 - Londrina-PR <u><a target="_black" class="mapa text-uppercase" title="Mapa" href="https://goo.gl/maps/HhdbvX2dABG2">Ver no Mapa</a></u></p>
        </div>
        <div class="col-md-4">
          <h4 class="text-uppercase">Social</h4>
          <ul class="social">
            <li><a class="facebook" title="Facebook" href="" target="_blank"><span>Facebook</span></a></li>
            <li><a class="gplus" title="GPlus" href="" target="_blank"><span>GPlus</span></a></li>
            <li><a class="linkedIn" title="LinkedIn" href="" target="_blank"><span>LinkedIn</span></a></li>
            <li><a class="youtube" title="Youtube" href="" target="_blank"><span>Youtube</span></a></li>
            <li><a class="whatsapp" title="Whatsapp" href="" target="_blank"><span>Whatsapp</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-below">
    <div class="container copyright">
      <div class="row">
        <div class="col-md-12 text-center">
        <a title="{{ config('app.name') }}" href="{{ route('home') }}">{{ config('app.name') }}</a> - Todos os Direitos Reservados
        </div>
      </div>
    </div>
  </div>
</footer>