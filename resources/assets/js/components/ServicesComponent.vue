<template>
    <div class="componente" v-show="services.length > 0">
        <h3 v-if="page == 'home'" class="text-uppercase text-center">Serviços</h3>
        <ul class="row justify-content-center">
            <li v-for="(service, index) in services" :key="index" class="text-uppercase text-center col-md-2">
                <a :href="service.url" :title="service.title" :class="service.slug">
                    <span>{{ service.title }}</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            page: {
                type: String,
                required: true
            },
        },
        data () {
            return {
                services: [],
            }
        },
        created () {
            this.getServices()
        },
        methods: {
            getServices () {
                const action = '/api/services'
                axios.get(action).then(response => {
                    this.services = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>
.componente
    margin-bottom: 100px
    h3
        margin: 80px auto 50px
    ul
        padding: 0 !important
        margin-bottom: 0
        li
            list-style: none
            width: 150px
            display: block
            a
                display: inline-block
                color: #000
                height: 80px
                width: 100px
                &.servicos-limpeza
                    background: url(/img/icons/services/servicos-limpeza.png) no-repeat top center
                &.servicos-portaria
                    background: url(/img/icons/services/servicos-portaria.png) no-repeat top center
                &.servicos-jardinagem
                    background: url(/img/icons/services/servicos-jardinagem.png) no-repeat top center
                &.servicos-recepcao
                    background: url(/img/icons/services/servicos-recepcao.png) no-repeat top center
                &.servicos-controladoria-de-acesso
                    background: url(/img/icons/services/servicos-controladoria-de-acesso.png) no-repeat top center
                &:hover
                    background-position-y: -81px
                span
                    padding-top: 90px
                    display: block
                    margin: 0 auto
</style>