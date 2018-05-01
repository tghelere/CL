<template>
    <div v-show="text.length > 0" class="text">
        {{ text[0].content }}
    </div>
</template>

<script>
    export default {
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
                const action = 'api/contents/home'
                axios.get(action).then(response => {
                    this.text = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>
.text
    text-align: center
    font-size: 14px
    line-height: 18px
    margin: 30px 0
</style>