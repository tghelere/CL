<template>
    <div class="componente" v-show="services.length > 0">
        <h3 v-if="page == 'home'" class="text-uppercase text-center">Serviços</h3>
        <ul class="row justify-content-center">
            <li v-for="(service, index) in services" :key="index" class="text-uppercase text-center col-md-2">
                <a :href="service.url" :title="service.title" >
                    <div class="img" :class="service.slug"></div>
                    <h5>{{ service.title }}</h5>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            page: {
                type: String,
                required: true
            },
        },
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
                setTimeout(() => {
                    const action = '/api/services'
                    axios.get(action).then(response => {
                        this.services = response.data.data
                    }).catch(error => {
                        console.error(error)
                    })
                }, 1000)
            },
        },
    }
</script>