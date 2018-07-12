<template>
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-capitalize">{{post.title}}</h1>
            <ul class="list-inline list-unstyled">
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
ul li
    margin-right: 15px
    color: #0056b3
</style>