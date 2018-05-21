<template>
    <div v-if="typeof(text) != 'undefined'" class="text">
        <div :class="classe" v-html="text.content"></div>
    </div>
</template>

<script>
    export default {
        props: {
            page: {
                type: String,
                required: true
            },
            classe: {
                type: String
            }
        },
        data () {
            return {
                text: {},
            }
        },
        created () {
            this.getText()
        },
        methods: {
            getText () {                
                const action = '/api/contents/' + this.page
                axios.get(action).then(response => {
                    this.text = response.data.data[0]
                    
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>
.home-text
    text-align: center
    font-size: 14px
    line-height: 18px
    margin: 30px 0
// .home-testimonies
.footer-text
    margin-top: 2.8rem
    font-size: 10px
</style>