<template>
    <div>
        <div class="row">
            <div class="col-md-12" v-for="(post, index) in posts" :key="index">
                <a class="link-post2" :href="'/blog/post/' + post.slug" :title="post.title">
                    <div class="post2">
                        <div class="imagem" :style="urlImg(post.id, post.image)"></div>
                        <h4>{{post.title}}</h4>
                        <p class="tipo2">{{post.description}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
            }
        },
        created () {
            this.getPosts()
        },
        methods: {
            getPosts(){
                setTimeout(() => {
                    const action = '/api/posts/limit/2'
                    axios.get(action).then(response => {
                        this.posts = response.data.data
                    }).catch(error => {
                        console.error(error)
                    })
                }, 1000)
            },
            urlImg(id, img) {
                return 'background: url(/storage/images/posts/' + id + '/' + img + ') no-repeat center center; background-size: cover;'
            },
        }
    }
</script>

<style lang="sass" scoped>
a.link-post2
    &:hover
        text-decoration: none !important
    .post2
        &:hover
            background-color: #f9f9f9    
            .imagem
                opacity: .8        
        .imagem
            height: 123px
            width: 100%
            background-size: cover
        p
            color: #707070
            margin: 5px 0 45px
        h4
            color: #000
            margin: 12px 0
</style>