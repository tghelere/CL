<template>
    <div class="row">
       {{post.title}}
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

<style scoped>

</style>