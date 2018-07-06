<template>
    <div v-show="banners.length > 0">        
        <swiper :options="swiperOption" v-show="banners.length > 0">
            <swiper-slide v-for="(banner, index) in banners" :key='index' :style="img(banner.image)">
                <div v-if="banner.title != null" class="text container" :style="cor(banner.colorbox)">
                    <h2 v-show="banner.title != null">{{ banner.title }}</h2>
                    <p v-show="banner.description != null">{{ banner.description }}</p>
                    <a v-show="banner.link != null" :href="banner.link" class="leia text-uppercase" title="Leia Mais">Leia Mais</a>
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
                swiperOption: {
                    // loop: true,
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
        props: ['height'],
        methods: {
            getBanners(){
                const action = '/api/banners/home'
                axios.get(action).then(response => {
                    this.banners = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
            img(img) {
                return 'background: url(/storage/images/banners/' + img + ') no-repeat center center; background-size: cover; height:' + this.height + 'px;'
            },
            cor(cor) {
                return 'background-color: ' + cor + ';'
            },
        },
    }
</script>