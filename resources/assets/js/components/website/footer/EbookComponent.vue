<template>
    <div id="ebook">
        <a 
            :href="ebook.url" 
            target="_blank" 
            :title="ebook.title"
            class="ebook"
            :style="ebook.image != '' ? 'background: url(/storage/images/ebooks/' + ebook.image +') no-repeat center center; background-size: contain;' : ''"
        ></a>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                ebook: {
                    title: '',
                    url: '',
                    image: '',
                },
            }
        },
        created () {
            this.getEbook()
        },
        methods: {
            getEbook(){
                setTimeout(() => {
                    const action = '/api/ebooks'
                    axios.get(action).then(response => {
                        this.ebook = response.data.data
                    }).catch(error => {
                        console.error(error)
                    })
                }, 1000)
            },
        },
    }
</script>

<style scoped lang="sass">
div#ebook
    height: 100%
    a.ebook
        display: block
        height: 100%
        margin: 0 auto
</style>