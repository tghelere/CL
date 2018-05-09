<template>
    <div v-show="services.length > 0">        
        <ul class="row">
            <li v-for="(service, index) in services" :key="index" class="text-uppercase text-center col-md-2">
                <a :href="service.url" :title="service.title">
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
                const action = '/api/services'
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
    // width: 100%
    // display: flex
    // justify-content: space-between
    // margin: 40px 0
    padding: 0 !important
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
                // width: 150px
                display: block
        
        

</style>