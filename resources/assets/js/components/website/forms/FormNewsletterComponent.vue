<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <div class="newsletter">
            <h3 class="text-uppercase text-center">Atualizações</h3>
            <p class="text-center">Cadastre-se para receber nossas atualizações de conteúdo</p>
            <b-form @submit.prevent="onSubmit"> 
                <b-form-group>
                    <b-form-input id="email" type="email" v-model="form.email" required placeholder="Digite seu e-mail"></b-form-input>
                </b-form-group>
                <b-button :class="classe" type="submit" variant="primary">Cadastrar</b-button>
            </b-form>
        </div>
    </div>
</template>

<script>

    import BootstrapVue from 'bootstrap-vue'        
    import 'bootstrap-vue/dist/bootstrap-vue.css'

    import Loading from 'vue-loading-overlay'
    import 'vue-loading-overlay/dist/vue-loading.min.css'

    import Snotify, { SnotifyPosition } from 'vue-snotify'
    import 'vue-snotify/styles/material.css'
    
    const options = {
        toast: {
            position: SnotifyPosition.centerTop
        }
    }

    Vue.use(Snotify, options)

    Vue.use(BootstrapVue)

    export default {
        data () {
            return {
                isLoading: false,
                form: {
                    email: '',
                },                
            }
        },
        props: ['page'],
        computed: {
            classe(){
                if (this.page == 'blog') {
                    return 'd-block mx-auto'    
                }
                return this.page
            }
        },
        methods: {
            onSubmit () {
                this.isLoading = true
                const action = '/api/newsletter/'
                axios.post(action, this.form).then(response => {
                    this.resetForm()
                    this.isLoading = false
                    this.$snotify.success('Email cadastrado com sucesso!', { timeout: 5000 })
                }).catch(error => {
                    this.isLoading = false
                    if (error.response.status == 409) {
                        this.$snotify.error(error.response.data.message, { timeout: 5000 })
                    }
                    console.error(error)
                })
               
            },
            resetForm () {
                this.form = {
                    email: '',
                }
            },
        },
        components: {
            Loading
        },
    }
</script>

<style lang="sass" scoped>
.newsletter
    // background-color: #272A2E
    padding: 5%
    // h3, p
    //     color: #fff
    form button
        &.blog-post
            padding: 4% 8%
            float: right
            margin-top: -60px
            margin-right: 18px
</style>