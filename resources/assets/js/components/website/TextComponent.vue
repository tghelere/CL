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
                setTimeout(() => {
                    const action = '/api/contents/' + this.page
                    axios.get(action).then(response => {
                        this.text = response.data.data
                    }).catch(error => {
                        console.error(error)
                    })
                }, 200)
            },
        },
    }
</script>

<style lang="sass" scoped>
.home-text
    text-align: center
    line-height: 25px
    margin: 60px 0 100px
</style>