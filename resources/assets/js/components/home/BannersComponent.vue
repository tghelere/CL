<template>
    <div v-if="banners.length > 0">    
        <swiper v-if="banners">
            <swiper-slide v-for="(banner, index) in banners" :key='index'>
                <!-- <img :src="'/img/banners/home/' + banner.image" :alt="banner.title"> -->
                <img src="/img/banners/home/banner.jpg" :alt="banner.title">
                <div class="text container">
                    <h4>{{ banner.title }}</h4>
                    <p>{{ banner.description }}</p>
                </div>
            </swiper-slide>
            <div class="swiper-pagination swiper-pagination-white" slot="pagination"></div>
            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
        </swiper>
    </div>
</template>

<script>    
    export default {  
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
                const action = 'api/banners/home'
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
.swiper-slide
    background-position: center
    background-size: cover
    // background-color: red
    // max-width: 1366px
    max-height: 550px
    // position: relative
    .text
        z-index: 5
        position: absolute
        width: 400px
        height: 200px
        padding: 20px 25px
        top: 300px
        left: 20%
        background-color: rgba(24, 74, 99, 0.85)
        color: #fff
        h4
            font-size: 15px
            font-weight: bold
        p
            font-size: 13px

</style>