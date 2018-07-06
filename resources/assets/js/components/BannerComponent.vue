<template>
    <div v-show="banners.length > 0" class="banner">    
        <swiper :options="swiperOption">
            <swiper-slide v-for="(banner, index) in banners" :key='index' :style="img(banner.image)"></swiper-slide>
        </swiper>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                banners : [],
                swiperOption: {
                    centeredSlides: true,
                },
            }
        },
        props: ['page', 'height'],
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
            },
            img(img) {
                return 'background: url(/storage/images/banners/' + img + ') no-repeat center center; background-size: cover !important; height:' + this.height + 'px;'
            },
        },
    }
</script>