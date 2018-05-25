<template>
    <div v-show="banners.length > 0" class="banner">    
        <swiper>
            <swiper-slide v-for="(banner, index) in banners" :key='index'>
                <img :src="'/img/banners/' + banner.image" :alt="banner.title" height="400">
            </swiper-slide>
        </swiper>
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
                banners : [],                
            }
        },
        created () {
            this.getBanners()
        },
        methods: {
            getBanners(){
                const action = '/api/banners/' + this.page
                axios.get(action).then(response => {
                    this.banners = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            }
        },
    }
</script>

<style lang="sass" scoped>
.banner
    height: 400px
</style>