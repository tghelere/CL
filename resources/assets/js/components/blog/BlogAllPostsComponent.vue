<template>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4" v-for="(post, index) in allPosts" :key='index'>
                    <div class="item-post">
                        <a :href="'/blog/post/' + post.slug" :title="post.title" >
                            <img :src="post.image" :alt="post.title" class="img-fluid img-thumbnail" >
                            <h4>{{post.title}}</h4>
                            <p>{{post.description}}</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <pagination class="" :data="pagination" :limit="1" @pagination-change-page="getAllPosts"></pagination>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row search">
                <div class="col-md-12">
                    <input type="text" v-model="search" placeholder="Buscar conteúdo">
                </div>
            </div>
            <div class="row newsletter">
                <div class="col-md-12">
                    Cadastre-se para receber atualizações semanais sobre ...
                    <form action="">
                        <input type="text" placeholder="Digite seu e-mail">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
            <div class="row filter">
                <div class="col-md-12">
                    <div class="border">
                        <p>Filtrar por assuntos</p>
                        <ul>
                            <li v-for="(cat, index) in categoriesCount" :key='index'>
                                <a @click.prevent="filterSubject(cat.slug)" href="#" >{{cat.name}} ({{cat.posts_count}})</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    Vue.component('pagination', require('laravel-vue-pagination'))
    export default {
        data () {
            return {
                allPosts: { 
                    data: [],
                    meta: {},
                },
                pagination: {
                    // current_page:1,
                    // from:1,
                    // last_page:10,
                    // path:"http://centrallimp.com.br/api/posts",
                    // per_page:6,
                    // to:6,
                    // total:60,
                },
                categoriesCount: {},
                search: '',
            }
        },
        created() {
            this.getAllPosts(),
            this.getCategoriesCount()
        },
        // computed: {
        //     filteredItems() {
        //         let filterItems = this.allPosts.data
        //         if (this.search.toLowerCase() > 0) {
        //             filterItems = filterItems.filter(post => {
        //                 return post.title.toLowerCase().indexOf(this.search.toLowerCase()) > -1
        //             })
        //         }
        //         console.log(filterItems);
                
        //         return filterItems
        //     }
        // },
        // watch: {
        //     filteredItems(items){
        //         this.updateMeta(items)
        //     }
        // },
        methods: {
            getAllPosts(){
                const action = '/api/posts/'
                axios.get(action).then(response => {
                    this.allPosts = response.data.data
                    this.pagination = response.data.meta
                }).catch(error => {
                    console.error(error)
                })
            },
            getCategoriesCount(){
                const action = '/api/posts/categories/'
                axios.get(action).then(response => {
                    this.categoriesCount = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
            filterSubject(slug){
                const action = '/api/posts/category/' + slug
                axios.get(action).then(response => {
                    this.allPosts = response.data
                }).catch(error => {
                    console.error(error)
                })
            },
            updateMeta(items){

            },
        },
    }
</script>
<style lang="sass" scoped>
.search, .newsletter, .filter
    padding: 5px 2px
    margin-bottom: 40px
    input, .border
        width: 100%
        padding-left: 5px
        margin-bottom: 10px
    button
        display: block
        margin: 0 auto
.filter
    p
        margin-top: 20px
        text-align: center
        font-size: 14px
        text-transform: uppercase
    ul
        li
            list-style: none
</style>