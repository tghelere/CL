<template>
    <b-row class="mt-5">
        <b-col md="3" v-for="(post, index) in posts" :key='index'>
            <a class="link-post-cat" :href="'/blog/post/' + post.slug" :title="post.title" >
                <div class="item-post">
                    <img :src="'/storage/images/posts/' + post.id + '/' +  post.image" :alt="post.title" class="img-fluid" >
                    <div class="text">
                        <h4>{{post.title}}</h4>
                        <p class="tipo2">{{post.description}}</p>
                        <!-- <ul class="list-inline list-unstyled">
                            <li class="list-inline-item mr-3 text-uppercase" v-for="(cat, index) in post.categories" :key="index" >
                                {{cat.name}}
                            </li>
                        </ul> -->
                    </div>
                </div>
            </a>
        </b-col>
    </b-row>
</template>

<script>
    
    import BootstrapVue from 'bootstrap-vue'        
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    Vue.use(BootstrapVue)

    export default {
        data () {
            return {
                posts: [],
            }
        },
        props: ['page'],
        created() {
            this.getPosts()
        },
        methods: {
            getPosts(){
                const action = `/api/posts/category/${this.page}/limit/4`
                axios.get(action).then(response => {
                    this.posts = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>
<style lang="sass" scoped>
a.link-post-cat
    &:hover
        text-decoration: none !important
    .item-post
        &:hover
            background-color: #f9f9f9    
            .imagem
                opacity: .8        
        .imagem
            height: 123px
            width: 100%
            background-size: cover
        h4
            color: #000
            margin: 12px 0
        p
            color: #707070
            margin: 5px 0 45px
        ul li
            font-size: 8px !important
            font-family: 'Open Sans', sans-serif
            color: #17a2b8
</style>