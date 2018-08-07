<template>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-capitalize">{{post.title}}</h2>
            <ul class="list-inline list-unstyled tags">
                <li class="list-inline-item text-uppercase" v-for="(cat, index) in post.categories" :key='index'>
                    <u>{{cat.name}}</u>
                </li>
            </ul>
            <div class="blog-post-body" v-html="post.body"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                post: {},
            }
        },
        created() {
            this.getPost()
        },
        props: {
            slug: {
                type: String,
                required: true
            },
        },
        methods: {
            getPost(){
                const action = '/api/post/' + this.slug
                axios.get(action).then(response => {
                    this.post = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>
h1, ul
    padding-left: 0
ul.tags 
    margin-bottom: 25px
    li
        margin-right: 15px
        font-family: 'Open Sans', sans-serif !important
        color: #17a2b8
        font-size: 8px !important
        font-weight: 200 !important
</style>