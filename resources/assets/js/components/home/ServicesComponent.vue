<template>
    <div class="col-md-10" v-if="services.length > 0">        
        <h3 class="text-uppercase text-center">Serviços</h3>
        <ul>
            <li v-for="(service, index) in services" :key="index" class="text-uppercase text-center">
                <a href="" :title="service.title">
                    <img :src="'/img/icons/services/' + service.icon" :alt="service.title" height="80" width="80">
                    <span>{{ service.title }}</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                services: [],
            }
        },
        created () {
            this.getServices()
        },
        methods: {
            getServices () {
                const action = 'api/services'
                axios.get(action).then(response => {
                    this.services = response.data.data
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>
ul
    width: 100%
    display: flex
    justify-content: space-between
    margin: 40px 0
    li
        list-style: none
        width: 150px
        display: block
        a
            display: block
            color: #000
            img
                margin: 0 2px 10px
            span
                width: 150px
        
        

</style>