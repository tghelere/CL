<template>
<b-container fluid>
    <loading :active.sync="isLoading" :can-cancel="false"></loading>
    <b-row>
        <b-col md="9">
            <b-row>
                <b-col md="4" v-for="(post, index) in postsPaged" :key='index' :current-page="currentPage" :per-page="perPage">
                    <a class="link-post" :href="'/blog/post/' + post.slug" :title="post.title" >
                        <div class="item-post">
                            <img :src="'/storage/images/posts/' + post.id + '/' +  post.image" :alt="post.title" class="img-fluid" >
                            <div class="text">
                                <h3>{{post.title}}</h3>
                                <p class="tipo2">{{post.description}}</p>
                                <ul class="list-inline list-unstyled">
                                    <li class="list-inline-item mr-3 text-uppercase" v-for="(cat, index) in post.categories" :key="index" >
                                        {{cat.name}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </b-col>
            </b-row>
            <b-row>
                <b-col class="my-1">
                    <b-pagination align="center" :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
                </b-col>
            </b-row>
        </b-col>
        
        <b-col md="3">
            <b-row class="search">
                <b-col>
                    <input type="text" v-model="filter" placeholder="Buscar conteúdo">
                </b-col>
            </b-row>
            <div class="row newsletter">
                <div class="col-md-12">
                    <form-newsletter></form-newsletter>
                </div>
            </div>
            <div class="row filter">
                <div class="col-md-12">
                    <div class="border">
                        <h5 class="text-uppercase text-center">Filtrar por assuntos</h5>
                        <ul class="categories list-unstyled">
                            <li v-for="(cat, index) in categoriesCount" :key='index'>
                                <a @click.prevent="filterSubject(cat.slug)" :class="{ active: categorySelected == cat.slug}" href="#" >{{cat.name}} ({{cat.posts_count}})</a>
                            </li>
                            <!-- <li>
                                <a href="">Todas as categorias</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </b-col>
    </b-row>
</b-container>
</template>

<script>
    // Vue.component('pagination', require('laravel-vue-pagination'))

    import BootstrapVue from 'bootstrap-vue'        
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    Vue.use(BootstrapVue)

    import Loading from 'vue-loading-overlay'
    import 'vue-loading-overlay/dist/vue-loading.min.css'

    export default {
        data () {
            return {
                allPosts: [],
                currentPage: 1,
                perPage: 6,
                // totalRows: 0,
                categoriesCount: {},
                categorySelected: '',
                // search: '',
                isLoading: false,
                filter: '',
            }
        },
        computed: {
            postsPaged(){
                return this.filtered.slice((this.currentPage - 1) * this.perPage,this.currentPage * this.perPage)
            },
            filtered(){
                return this.allPosts.filter((post) => {
                    return post.title.toLowerCase().match(this.filter.toLowerCase()) || post.description.toLowerCase().match(this.filter.toLowerCase()) || post.body.toLowerCase().match(this.filter.toLowerCase())
                })
            },
            totalRows(){
                return this.filtered.length
            }
        },
        created() {
            this.getAllPosts(),
            this.getCategoriesCount()
        },
        methods: {
            getAllPosts(){
                this.isLoading = true
                const action = '/api/posts'
                axios.get(action).then(response => {
                    this.allPosts = response.data.data
                    // this.totalRows = this.allPosts.length
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            getCategoriesCount(){
                this.isLoading = true
                const action = '/api/posts/categories/'
                axios.get(action).then(response => {
                    this.categoriesCount = response.data.data
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            filterSubject(slug){
                this.isLoading = true
                const action = '/api/posts/category/' + slug
                axios.get(action).then(response => {
                    this.categorySelected = slug
                    this.allPosts = response.data.data
                    // this.totalRows = this.allPosts.length
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            // onFiltered(filteredItems) {
            //     this.totalRows = filteredItems.length
            //     this.currentPage = 1
            // },
            // getSearch(search){
            //     const action = '/api/posts/search/' + search
            //     axios.get(action).then(response => {
            //         this.allPosts = response.data
            //     }).catch(error => {
            //         console.error(error)
            //     })
            // },
        },
        components: {
            Loading,
        },
    }
</script>