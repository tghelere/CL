<template>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4" v-for="(post, index) in allPosts.data" :key='index'>
                    <a class="link-post" :href="'/blog/post/' + post.slug" :title="post.title" >
                        <div class="item-post">
                            <img :src="post.image" :alt="post.title" class="img-fluid img-thumbnail" >
                            <h4>{{post.title}}</h4>
                            <p>{{post.description}}</p>
                            <ul class="list-inline list-unstyled">
                                <li class="list-inline-item mr-3 blue text-uppercase" v-for="(cat, index) in post.categories" :key="index" >
                                    {{cat.name}}
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <pagination :data="allPosts" :limit="1" @pagination-change-page="getAllPosts"></pagination>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="row search">
                <div class="col-md-12">
                    <input type="text" v-model="search" @keyup.enter="getSearch(search)" placeholder="Buscar conteúdo">
                </div>
            </div>
            <div class="row newsletter">
                <div class="col-md-12">
                    <form-newsletter :page="'blog'" ></form-newsletter>
                </div>
            </div>
            <div class="row filter">
                <div class="col-md-12">
                    <div class="border">
                        <p class="text-uppercase text-center">Filtrar por assuntos</p>
                        <ul class="categories list-unstyled">
                            <li v-for="(cat, index) in categoriesCount" :key='index'>
                                <a @click.prevent="filterSubject(cat.slug)" :class="{ active: categorySelected == cat.slug}" href="#" >{{cat.name}} ({{cat.posts_count}})</a>
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
                allPosts: {},
                categoriesCount: {},
                categorySelected: '',
                search: '',
            }
        },
        created() {
            this.getAllPosts(),
            this.getCategoriesCount()
        },
        methods: {
            getAllPosts(page = 1){
                const action = '/api/posts?page=' + page
                axios.get(action).then(response => {
                    this.allPosts = response.data
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
                    this.categorySelected = slug
                    this.allPosts = response.data
                }).catch(error => {
                    console.error(error)
                })
            },
            getSearch(search){
                const action = '/api/posts/search/' + search
                axios.get(action).then(response => {
                    this.allPosts = response.data
                }).catch(error => {
                    console.error(error)
                })
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
        padding-left: 10px
        margin-bottom: 10px
.search input
    border: 0
    border-bottom: 1px solid #000
    &:focus
        outline: none
    &::placeholder
        text-transform: uppercase 
.filter
    p
        margin-top: 20px        
        font-size: 14px
    ul.categories
        padding-left: 10px
        li
            a
                &.active
                    font-weight: bold
.blue
    color: #0056b3
    font-size: 11px

</style>