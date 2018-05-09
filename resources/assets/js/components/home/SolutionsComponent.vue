<template>
    <div v-show="solutions.length > 0">
        <ul class="list-unstyled">
            <li v-for="(solution, index) in solutions" :key='index' class="border" :class="solution.slug">
                <a href="" :title="solution.title">
                    <span class="text-uppercase">
                        {{ solution.title }}
                    </span>
                </a>
            </li>
        </ul>
        <div class="post">
            <h3>Industrias</h3>
            <h5>Soluções Centrallimp para Industrias</h5>
            <hr>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non quos consectetur obcaecati odio molestias repellat. Aut odit corporis voluptas, quia nisi totam quam accusamus illum, perspiciatis inventore consequatur qui nesciunt.</p>
            <a title="Leia mais" class="text-uppercase" href="">Leia mais</a>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                solutions: [],
            }
        },
        created () {
            this.getTitles()
        },
        methods: {
            getTitles(){
                const action = '/api/solutions'
                axios.get(action).then(response => {
                    this.solutions = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            }
        },
    }
</script>
<style lang="sass" scoped>

ul
    display: flex
    flex-direction: column
    justify-content: flex-start
    flex-wrap: wrap
    max-height: 560px
    width: 420px
    // width: 560px
    float: left
    li
        width: 175px
        height: 175px
        float: left
        margin: 5px
        // padding: 10px
        text-align: center        
                
        &.solucoes-industrias
            background: url(/img/thumbs/solutions/industry.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(67, 64, 65, 0.6)
                &:hover
                    background-color: rgba(67, 64, 65, 0.3)
        &.solucoes-comercio
            background: url(/img/thumbs/solutions/comercio.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(242, 158, 33, 0.6)
                &:hover
                    background-color: rgba(242, 158, 33, 0.3)
        &.solucoes-orgaos-publicos
            background: url(/img/thumbs/solutions/porteiro.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(69, 163, 104, 0.6)
                &:hover
                    background-color: rgba(69, 163, 104, 0.3)
        &.solucoes-condominios
            background: url(/img/thumbs/solutions/condominios.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(0, 161, 162, 0.6)
                &:hover
                    background-color: rgba(0, 161, 162, 0.3)
        &.solucoes-clinicas-e-hospitais
            background: url(/img/thumbs/solutions/hospital.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(152, 191, 19, 0.6)
                &:hover
                    background-color: rgba(152, 191, 19, 0.3)
        &.solucoes-escolas-e-universidades
            background: url(/img/thumbs/solutions/escola.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(61, 121, 151, 0.6)
                &:hover
                    background-color: rgba(61, 121, 151, 0.3)
        &.solucoes-escritorios-e-ambientes-corporativos
            background: url(/img/thumbs/solutions/escritorio.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(0, 137, 192, 0.6)
                &:hover
                    background-color: rgba(0, 137, 192, 0.3)
        a
            display: flex
            align-items: center
            justify-content: center            
            padding: 10px
            height: 100%
            width: 100%
            text-decoration: none
            span
                color: #fff
                font-weight: bold
                font-size: 13px

.post
    width: 400px
    float: left
    margin-top: 230px
    h3
        font-weight: bold
    a
        color: #000
        font-weight: bold





</style>
