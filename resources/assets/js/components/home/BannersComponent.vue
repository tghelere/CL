<template>
    <div v-show="banners.length > 0">    
        <swiper :options="swiperOption">
            <swiper-slide v-for="(banner, index) in banners" :key='index'>
                <img :src="'/img/banners/home/' + banner.image" :alt="banner.title">
                <div class="text container">
                    <h4>{{ banner.title }}</h4>
                    <p>{{ banner.description }}</p>
                    <a :href="banner.link" class="leia text-uppercase" title="Leia Mais">Leia Mais</a>
                </div>
            </swiper-slide>
            <!-- <div class="swiper-pagination" slot="pagination"></div> -->
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
                swiperOption: {
                    loop: true,
                    // effect: 'fade',
                    centeredSlides: true,
                    autoplay: {
                        delay: 6000,
                        disableOnInteraction: true
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
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
    max-height: 550px    
    .text
        z-index: 5
        position: absolute
        width: 410px
        height: 200px
        padding: 20px 25px
        bottom: 95px
        left: 20%
        background-color: rgba(24, 74, 99, 0.85)
        color: #fff
        h4
            font-size: 24px
            line-height: 27px
            font-weight: bold
        p
            font-size: 18px
            line-height: 23px
        a.leia
            background-color: rgba(24, 74, 99, 1)
            padding: 5px 10px
            color: #fff
            font-weight: bold
            position: absolute
            bottom: 0
            right: 0


</style>