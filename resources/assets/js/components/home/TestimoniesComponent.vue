<template>
    <div class="row">
        <div class="col-md-6 text">
            <h3 class="text-uppercase text-center">Opiniões de Clientes</h3>
            <p>
                <text-content :page="'home-testimonies'"></text-content>
            </p>
        </div>
        <div class="col-md-6">
            <swiper :options="swiperOption" style="height: auto">
                <swiper-slide v-for="(testimony, index) in testimonies" :key='index'>                    
                    <div class="testimonies">
                        <p>{{ testimony.testimony }}</p> 
                        <!-- <iframe src="https://www.youtube-nocookie.com/embed/FW6TUm1OUYk?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                        <hr>
                        <p class="text-center font-weight-bold">{{ testimony.name }}</p>                        
                        <p class="text-center font-italic">{{ testimony.institute }}</p>                        
                    </div>
                </swiper-slide>
                <!-- <div class="swiper-pagination" slot="pagination"></div> -->
                <div class="swiper-pagination swiper-pagination-black" slot="pagination"></div>
                <div class="swiper-button-prev swiper-button-black" slot="button-prev"></div>
                <div class="swiper-button-next swiper-button-black" slot="button-next"></div>
            </swiper>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                testimonies: [],
                swiperOption: {
                    loop: true,
                    autoHeight: true,
                    // effect: 'fade',
                    centeredSlides: true,
                    // autoplay: {
                    //     delay: 6000,
                    //     disableOnInteraction: true
                    // },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
            }
        },
        created () {
            this.getTestimonies()
        },
        methods: {
            getTestimonies(){
                const action = '/api/testimonies'
                axios.get(action).then(response => {
                    this.testimonies = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            }
        },
    }
</script>

<style lang="sass" scoped>
.text
    padding: 10px 10px
.testimonies
    padding: 10px 50px 50px

.testimonies
    hr, p
        margin-bottom: 0
    iframe
        width: 100%
        height: 270px
        padding: 8px
</style>