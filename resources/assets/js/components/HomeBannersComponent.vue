<template>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">                
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox" v-for="(banner, index) in banners" :key='index'>
                <div class="carousel-item" :class="{active: index == 0}" >
                    <img class="d-block img-fluid" :src="'/img/banners/home/' + banner.image" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{ banner.title }}</h3>
                        <p>{{ banner.description }}</p>
                    </div>
                </div>                
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>
</template>

<script>
    import axios  from 'axios'

    export default {
        data () {
            return {
                banners : [],
                isActive: true,
            }
        },
        created: function () {
            this.getBanners()
        },
        methods: {
            getBanners(){
                const action = 'api/banners'
                axios.get(action).then(response => {
                    this.banners = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>