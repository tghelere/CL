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
                  <li><a title="Quem Somos" href="{{ route('quem-somos') }}">Quem Somos</a></li>
                  <li><a title="Blog" href="{{ route('blog') }}">Blog</a></li>
                  <li><a title="Trabalhe Aqui" href="{{ route('trabalhe-conosco') }}">Trabalhe Aqui</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h5 class="text-uppercase">Serviços</h5>
                <ul class="list tipo3">
                  <li><a title="Limpeza" href="{{ route('servicos-limpeza') }}">Limpeza</a></li>
                  <li><a title="Portaria" href="{{ route('servicos-portaria') }}">Portaria</a></li>
                  <li><a title="Jardinagem" href="{{ route('servicos-jardinagem') }}">Jardinagem</a></li>
                  <li><a title="Recepção" href="{{ route('servicos-recepcao') }}">Recepção</a></li>
                  <li><a title="Controladoria de acesso" href="{{ route('servicos-controladoria-de-acesso') }}">Controladoria de acesso</a></li>
                </ul>
              </div>
              <div class="col-md-5">
                <h5 class="text-uppercase">Soluções</h5>
                <ul class="list tipo3">
                  <li><a title="Indústrias" href="{{ route('industrias') }}">Indústrias</a></li>
                  <li><a title="Varejo" href="{{ route('varejo') }}">Varejo</a></li>
                  <li><a title="Orgãos públicos" href="{{ route('orgaos-publicos') }}">Orgãos públicos</a></li>
                  <li><a title="Condomínios" href="{{ route('condominios') }}">Condomínios</a></li>
                  <li><a title="Clínicas e Áreas de Saúde" href="{{ route('clinicas-e-areas-de-saude') }}">Clínicas e Áreas de Saúde</a></li>
                  <li><a title="Escolas e Universidades" href="{{ route('escolas-e-universidades') }}">Escolas e Universidades</a></li>
                  <li><a title="Escritórios e Ambientes Corporativos" href="{{ route('escritorios-e-ambientes-corporativos') }}">Escritórios e Ambientes Corporativos</a></li>
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