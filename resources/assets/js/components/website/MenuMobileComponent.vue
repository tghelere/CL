<template>
    <div :class="modalShow ? '' : 'closed'" class="d-inline">
        <li class="list-inline-item  mobile1"><a class="mobile Menu" title="Menu" @click.prevent="modalShow = !modalShow"><span>Menu</span></a></li>
        <!-- <a @click="modalShow = !modalShow" v-show="!modalShow" class="link-quote" title="Solicite um orçamento"><span>Solicite um orçamento</span></a> -->
        <b-modal ref="menuMobile" v-model="modalShow" hide-footer hide-header id="modal">
            <div id="menu_mobile">
                <b-link class="close-btn" @click="hideModal"></b-link>
                <b-row>
                    <b-col md="5"><b-img class="modal_logo mt-1 mb-3" src="/img/logocolor.png" alt="Centrallimp" height="50" /></b-col>
                </b-row>
                <b-row>
                    <a href="/" title="Home" class="text-uppercase link_menu tipo2">Home</a>
                </b-row>
                <b-row>
                    <a v-b-toggle.institucional class="text-uppercase link_menu tipo2 clps">Institucional</a>
                    <b-collapse id="institucional" accordion="menu_mobile_accordion" role="mobile_accordion">
                        <ul class="list-unstyled text-uppercase ">
                            <li><a class="tipo3" title="Quem Somos" href="/quem-somos">Quem Somos</a></li>
                            <li><a class="tipo3" title="Trabalhe Conosco" href="/trabalhe-conosco">Trabalhe Conosco</a></li>
                            <li><a class="tipo3" title="Ouvidoria" href="/ouvidoria">Ouvidoria</a></li>
                        </ul>
                    </b-collapse>
                </b-row>
                <b-row>
                    <a v-b-toggle.solucoes class="text-uppercase link_menu tipo2 clps">Soluções</a>
                    <b-collapse id="solucoes" accordion="menu_mobile_accordion" role="mobile_accordion">
                        <ul class="list-unstyled text-uppercase ">
                            <li><a class="tipo3" title="Indústrias" href="/solucoes/industrias">Indústrias</a></li>
                            <li><a class="tipo3" title="Varejo" href="/solucoes/varejo">Varejo</a></li>
                            <li><a class="tipo3" title="Orgãos públicos" href="/solucoes/orgaos-publicos">Orgãos públicos</a></li>
                            <li><a class="tipo3" title="Condomínios" href="/solucoes/condominios">Condomínios</a></li>
                            <li><a class="tipo3" title="Clínicas e Áreas de Saúde" href="/solucoes/clinicas-e-areas-de-saude">Clínicas e Áreas de Saúde</a></li>
                            <li><a class="tipo3" title="Escolas e Universidades" href="/solucoes/escolas-e-universidades">Escolas e Universidades</a></li>
                            <li><a class="tipo3" title="Escritórios e Ambientes Corporativos" href="/solucoes/escritorios-e-ambientes-corporativos">Escritórios e Ambientes Corporativos</a></li>
                        </ul>
                    </b-collapse>
                </b-row>
                <b-row>
                    <a v-b-toggle.servicos class="text-uppercase link_menu tipo2 clps">Serviços</a>
                    <b-collapse id="servicos" accordion="menu_mobile_accordion" role="mobile_accordion">
                        <ul class="list-unstyled text-uppercase ">
                            <li><a class="tipo3" title="Limpeza" href="/servicos/limpeza">Limpeza</a></li>
                            <li><a class="tipo3" title="Portaria" href="/servicos/portaria">Portaria</a></li>
                            <li><a class="tipo3" title="Jardinagem" href="/servicos/jardinagem">Jardinagem</a></li>
                            <li><a class="tipo3" title="Recepção" href="/servicos/recepcao">Recepção</a></li>
                            <li><a class="tipo3" title="Controladoria de acesso" href="/servicos/controladoria-de-acesso">Controladoria de acesso</a></li>
                        </ul>
                    </b-collapse>
                </b-row>
                <b-row>
                    <a href="/blog" title="Blog" class="text-uppercase link_menu tipo2">Blog</a>
                </b-row>
                <b-row>
                    <a href="/contato" title="Contato" class="text-uppercase link_menu tipo2">Contato</a>
                </b-row>
                <b-row>
                    <a href="tel:+554333210367" title="Fone: 43 3321-0367" class="text-uppercase link_menu tipo2 phone">43 3321-0367</a>
                </b-row>
                <b-row>
                    <a href="https://api.whatsapp.com/send?phone=5543991897965" target="_blank" title="Whatsapp: 43 99189-7965" class="text-uppercase link_menu tipo2 whats">43 99189-7965</a>
                </b-row>
                <b-row>
                    <a href="mailto:" title="E-mail" class="text-uppercase link_menu tipo2 mail">E-mail</a>
                </b-row>
            </div>
            <b-row class="mt-3 barra">
                <b-col cols="8" class="cinza">
                    <p class="tipo3 mb-2 text-uppercase">Centrallimp</p>
                    <p class="tipo3">R. Augusto Severo, 203 - Aeroporto</p>
                    <p class="tipo3">CEP: 86039-650 - Londrina/PR</p>
                </b-col>
                <b-col cols="4" class="verde">
                    <a href="https://www.google.com.br/maps/place/Centrallimp+Limpeza+e+Conserva%C3%A7%C3%A3o/@-23.3261945,-51.1453449,17z/data=!3m1!4b1!4m5!3m4!1s0x94eb4373cec23045:0x1fddb7c12bf6fc63!8m2!3d-23.3261994!4d-51.1431562" target="_blank" class="text-uppercase">Ir</a>
                </b-col>
            </b-row>
            <b-row class="py-4 barra-azul">
                <ul class="list-unstyled list-inline social">
                    <li class="list-inline-item"><a class="facebook" title="Facebook" href="https://www.facebook.com/centrallimp/" target="_blank"><span>Facebook</span></a></li>
                    <li class="list-inline-item"><a class="linkedIn" title="LinkedIn" href="https://www.linkedin.com/company/centrallimp" target="_blank"><span>LinkedIn</span></a></li>
                    <li class="list-inline-item"><a class="youtube" title="Youtube" href="https://www.youtube.com/channel/UC-yNSUpwOWEdIato2PHwZeQ" target="_blank"><span>Youtube</span></a></li>
                    <li class="list-inline-item"><a class="whatsapp" title="Whatsapp" href="https://api.whatsapp.com/send?phone=5543991897965" target="_blank"><span>Whatsapp</span></a></li>
                </ul>
            </b-row>
        </b-modal>
    </div>
</template>

<script>
    import BootstrapVue from 'bootstrap-vue'        
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    Vue.use(BootstrapVue)
    export default {
        data () {
            return {
                modalShow: false,
            }
        },
        methods: {
            hideModal () {
                this.$refs.menuMobile.hide()
            },
        },
    }
</script>