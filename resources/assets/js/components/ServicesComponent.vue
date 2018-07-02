<template>
    <div class="componente" v-show="services.length > 0">
        <h3 v-if="page == 'home'" class="text-uppercase text-center">Serviços</h3>
        <ul class="row justify-content-center">
            <li v-for="(service, index) in services" :key="index" class="text-uppercase text-center col-md-2">
                <a :href="service.url" :title="service.title" >
                    <div class="img" :class="service.slug"></div>
                    <h5>{{ service.title }}</h5>
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
        margin: 80px auto 5px
    ul
        padding: 0 !important
        margin-bottom: 0
        li
            list-style: none
            padding: 0
            margin: 0 2px
            // width: 30%
            display: block
            background-size: 30px
            
            a
                display: inline-block
                color: #000
                padding: 20px 2px
                height: 100%
                width: 100%
                .img
                    margin: 40px auto 0
                    width: 80px
                    height: 80px
                    &.servicos-limpeza
                        background: url(/img/icons/services/home_limpeza_180px.png) no-repeat top center
                    &.servicos-portaria
                        background: url(/img/icons/services/home_portaria80px.png) no-repeat top center
                    &.servicos-jardinagem
                        background: url(/img/icons/services/home_jardinagem_180px.png) no-repeat top center
                    &.servicos-recepcao
                        background: url(/img/icons/services/home_recepcao_180px.png) no-repeat top center
                    &.servicos-controladoria-de-acesso
                        background: url(/img/icons/services/home_controladoria80px.png) no-repeat top center
                &:hover
                    background-color: #0089c0
                    text-decoration: none
                    color: #fff
                    .img
                        background-position-y: -80px

                h5
                    padding-top: 15px
                    display: block
                    margin: 0 auto
                    
</style>