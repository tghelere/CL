<template>
    <div v-if="solutions.length > 0">
        <ul class="list-unstyled">
            <li v-for="(solution, index) in solutions" :key='index' class="border" :class="solution.slug">
                <a href="" :title="solution.title">
                    <span class="text-uppercase">
                        {{ solution.title }}
                    </span>
                </a>
            </li>
        </ul>
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
                const action = 'api/solutions'
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
    li
        width: 175px
        height: 175px
        float: left
        margin: 5px
        // padding: 10px
        text-align: center
                
        &.solucoes-industrias
            background-color: rgba(24, 74, 99, 0.5)
        &.solucoes-comercio
            background-color: rgba(61, 121, 151, 0.5)
        &.solucoes-orgaos-publicos
            background-color: rgba(68, 151, 0, 0.5)
        &.solucoes-condominios
            background-color: rgba(63, 96, 113, 0.5)
        &.solucoes-clinicas-e-hospitais
            background-color: rgba(0, 183, 101, 0.5)
        &.solucoes-escolas-e-universidades
            background-color: rgba(61, 121, 151, 0.5)
        &.solucoes-escritorios-e-ambientes-corporativos
            background-color: rgba(51, 135, 90, 0.5)
        a
            display: flex
            align-items: center
            justify-content: center
            padding: 10px
            height: 100%
            width: 100%
            span
                color: #fff
                font-weight: bold
                font-size: 13px

</style>
