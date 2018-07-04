<footer class="shadow">
  <div class="footer-above">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="/img/logocolor.png" width="220" alt="{{ config('app.name') }}">
        </div>
        <div class="col-md-5">
          <text-content :page="'footer'" :classe="'footer-text'"></text-content>
        </div>
      </div>
      <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-2">
                <h5 class="text-uppercase">Institucional</h5>
                <ul class="list tipo3">
                  <a title="Quem Somos" href="{{ route('quem-somos') }}"><li>Quem Somos</li></a>
                  <a title="Blog" href="{{ route('blog') }}"><li>Blog</li></a>
                  <a title="Trabalhe Aqui" href="{{ route('trabalhe-conosco') }}"><li>Trabalhe Aqui</li></a>
                </ul>
              </div>
              <div class="col-md-3">
                <h5 class="text-uppercase">Serviços</h5>
                <ul class="list tipo3">
                  <a title="Limpeza" href="{{ route('servicos-limpeza') }}"><li>Limpeza</li></a>
                  <a title="Portaria" href="{{ route('servicos-portaria') }}"><li>Portaria</li></a>
                  <a title="Jardinagem" href="{{ route('servicos-jardinagem') }}"><li>Jardinagem</li></a>
                  <a title="Recepção" href="{{ route('servicos-recepcao') }}"><li>Recepção</li></a>
                  <a title="Controladoria de acesso" href="{{ route('servicos-controladoria-de-acesso') }}"><li>Controladoria de acesso</li></a>
                </ul>
              </div>
              <div class="col-md-5">
                <h5 class="text-uppercase">Soluções</h5>
                <ul class="list tipo3">
                  <a title="Indústrias" href="{{ route('industrias') }}"><li>Indústrias</li></a>
                  <a title="Varejo" href="{{ route('varejo') }}"><li>Varejo</li></a>
                  <a title="Orgãos públicos" href="{{ route('orgaos-publicos') }}"><li>Orgãos públicos</li></a>
                  <a title="Condomínios" href="{{ route('condominios') }}"><li>Condomínios</li></a>
                  <a title="Clínicas e Áreas de Saúde" href="{{ route('clinicas-e-areas-de-saude') }}"><li>Clínicas e Áreas de Saúde</li></a>
                  <a title="Escolas e Universidades" href="{{ route('escolas-e-universidades') }}"><li>Escolas e Universidades</li></a>
                  <a title="Escritórios e Ambientes Corporativos" href="{{ route('escritorios-e-ambientes-corporativos') }}"><li>Escritórios e Ambientes Corporativos</li></a>
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
          <h5 class="text-uppercase">Contato</h5>
          <ul class="phone">
            <li><a class="phone" title="Fone: {{ config('app.phone_f') }}" href="tel:{{ config('app.phone') }}">{{ config('app.phone_f') }}</a></li>
            <li><a class="whats" title="Whatsapp: {{ config('app.celphone_f') }}" target="_blank" href="https://api.whatsapp.com/send?phone={{ config('app.celphone') }}">{{ config('app.celphone_f') }}</a></li>
          </ul>
          <p class="address">Rua Augusto Severo, 203, Aeroporto - Cep: 86039-650 - Londrina-PR <u><a target="_black" class="mapa text-uppercase" title="Mapa" href="https://goo.gl/maps/HhdbvX2dABG2">Ver no Mapa</a></u></p>
        </div>
        <div class="col-md-4">
          <h5 class="text-uppercase">Social</h5>
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
            <h6><a title="{{ config('app.name') }}" href="{{ route('home') }}">{{ config('app.name') }}</a> - Todos os Direitos Reservados</h6>
        </div>
      </div>
    </div>
  </div>
</footer>