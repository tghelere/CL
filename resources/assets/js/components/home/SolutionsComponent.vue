<template>
    <div class="componente" v-show="solutions.length > 0">
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <ul class="list-unstyled">
            <li v-for="(solution, index) in solutions" :key='index' class="border" :class="solution.slug">
                <a href="" @click.prevent="selectSolution(solution.slug); changeSelected(solution.title);" :title="solution.title">
                    <span class="text-uppercase">
                        {{ solution.title }}
                    </span>
                </a>
            </li>
        </ul>
        <div class="post">
            <h3>{{selected}}</h3>
            <text-content :page="'home-solutions'"></text-content>
            <hr>
            <h5>{{post.title}}</h5>
            <p>{{post.description}}</p>
            <a title="Leia mais" class="text-uppercase" :href="'/blog/post/' + post.slug">Leia mais</a>
        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay'
    import 'vue-loading-overlay/dist/vue-loading.min.css'
    export default {
        data () {
            return {
                isLoading: false,
                solutions: [],
                post: {},
                selected: ''
            }
        },
        created () {
            this.getSolutions()
        },
        methods: {
            changeSelected(solution){
                this.selected = solution
            },
            selectSolution(slug){
                this.isLoading = true
                const action = '/api/post/category/' + slug
                axios.get(action).then(response => {
                    this.post = response.data.data
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            getSolutions(){
                const action = '/api/solutions'
                axios.get(action).then(response => {
                    this.solutions = response.data.data
                    this.selected = this.solutions[0].title
                    this.selectSolution(this.solutions[0].slug)
                }).catch(error => {
                    console.error(error)
                })
            }
        },
        components: {
            Loading
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
    margin-bottom: 0
    // width: 560px
    float: left
    li
        width: 175px
        height: 175px
        float: left
        margin: 5px
        // padding: 10px
        text-align: center        
                
        &.industrias
            background: url(/img/thumbs/solutions/industry.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(67, 64, 65, 0.6)
                &:hover
                    background-color: rgba(67, 64, 65, 0.3)
        &.varejo
            background: url(/img/thumbs/solutions/varejo.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(242, 158, 33, 0.6)
                &:hover
                    background-color: rgba(242, 158, 33, 0.3)
        &.orgaos-publicos
            background: url(/img/thumbs/solutions/porteiro.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(69, 163, 104, 0.6)
                &:hover
                    background-color: rgba(69, 163, 104, 0.3)
        &.condominios
            background: url(/img/thumbs/solutions/condominios.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(0, 161, 162, 0.6)
                &:hover
                    background-color: rgba(0, 161, 162, 0.3)
        &.clinicas-e-hospitais
            background: url(/img/thumbs/solutions/hospital.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(152, 191, 19, 0.6)
                &:hover
                    background-color: rgba(152, 191, 19, 0.3)
        &.escolas-e-universidades
            background: url(/img/thumbs/solutions/escola.jpg) no-repeat top center
            background-size: cover
            a
                background-color: rgba(61, 121, 151, 0.6)
                &:hover
                    background-color: rgba(61, 121, 151, 0.3)
        &.escritorios-e-ambientes-corporativos
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
        hr
            margin: 40px 0
        a
            color: #000
            font-weight: bold





</style>
