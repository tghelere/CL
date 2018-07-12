<template>
    <div class="componente" v-show="solutions.length > 0">
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <ul class="list-unstyled">
            <li v-for="(solution, index) in solutions" :key='index' class="border" :class="solution.slug">
                <a :href="'/solucoes/' + solution.slug" 
                    @mouseover="selectedPost(solution.slug); changeSelected(solution.title)"
                    :title="solution.title">
                    <h5>{{ solution.title }}</h5>
                </a>
            </li>
        </ul>
        <div class="post">
            <h3>{{selected}}</h3>
            <text-content :page="'home-solutions'"></text-content>
            <hr>
            <div v-if="last[0].title">
                <h3>{{last[0].title}}</h3>
                <p class="tipo2">{{last[0].description}}</p>
                <a title="Leia mais" class="text-uppercase tipo3" :href="'/blog/post/' + last[0].slug">Leia mais</a>
            </div>
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
                lastPosts: [],
                last: [{
                    title: '',
                    description: '',
                    slug: ''
                }],
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
            selectedPost(slug) {
                this.last = this.lastPosts.filter(last => {return last.category == slug})
            },
            getSolutions(){
                setTimeout(() => {
                    const action = '/api/solutions'
                    axios.get(action).then(response => {
                        this.solutions = response.data.data
                        this.selected = this.solutions[0].title
                        this.getLastPosts()
                    }).catch(error => {
                        console.error(error)
                    })
                }, 300)
            },
            getLastPosts(){
                this.isLoading = true
                const solutions = [...this.solutions.map(solution => ( 
                    solution.slug
                ))]

                solutions.forEach(element => {
                    setTimeout(() => {
                    const action = '/api/post/category/' + element
                    axios.get(action).then(response => {
                        if (response.data == '') {
                            this.resetPost()
                            this.isLoading = false
                        }else{
                            response.data.data.category = element
                            this.lastPosts.push(response.data.data)
                            this.isLoading = false
                        }
                    }).catch(error => {
                        this.resetPost()
                        console.error(error)
                        this.isLoading = false
                    })}, 500)
                });
            },
            resetPost() {
                this.post = {
                    title: '',
                    description: '',
                    slug: ''
                }
            },
        },
        components: {
            Loading
        },
    }
</script>