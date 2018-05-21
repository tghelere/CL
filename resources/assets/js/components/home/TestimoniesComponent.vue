<template>
    <div class="row componente">
        <div class="col-md-6 text">
            <div>
                <h3 class="text-uppercase text-center">Opiniões de Clientes</h3>
                <text-content :page="'home-testimonies'"></text-content>
            </div>
        </div>
        <div class="col-md-6">
            <swiper class="testimonies-custom" :options="swiperOption" style="height: auto">
                <swiper-slide v-for="(testimony, index) in testimonies" :key='index'>                    
                    <div class="testimonies">
                        <div v-html="testimony.testimony"></div>
                        <hr>
                        <p class="text-center nome">{{ testimony.name }}</p>                        
                        <p class="text-center font-italic instituto">{{ testimony.institute }}</p>
                    </div>
                </swiper-slide>
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
                    centeredSlides: true,
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
.componente
    margin-bottom: 80px
    .text
        padding: 10px 10px
    .testimonies
        padding: 10px 50px

    .testimonies
        hr, p
            margin-bottom: 0
        p.nome
            font-size: 12px
            color: #707070
        p.instituto
            font-size: 10px
            color: #707070
</style>