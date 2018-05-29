<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        
        <b-form @submit.prevent="onSubmit" class="m50 candidate" enctype="multipart/form-data" > 
            <b-row class="justify-content-center">
                <b-col md="10">
                    <b-row>
                        <b-col md="6">
                            <b-form-group>
                                <b-form-input id="name" type="text" v-model="form.name" required placeholder="Nome *"></b-form-input>
                            </b-form-group>
                            <b-form-group>
                                <b-form-input id="email" type="email" v-model="form.email" required placeholder="Email *"></b-form-input>
                            </b-form-group>
                            <b-form-group>
                                <b-form-input id="phone" type="tel" v-model="form.phone" required placeholder="Telefone *"></b-form-input>
                            </b-form-group>
                            <b-row>                   
                                <b-col md="4">
                                    <b-form-group>
                                        <b-form-select @input="getCities(form.state.id)" id="states" required v-model="form.state" :options="states">
                                            <template slot="first">
                                                <option :value="null" disabled>UF *</option>
                                            </template>
                                        </b-form-select>
                                    </b-form-group>
                                </b-col>
                                <b-col md="8">
                                    <b-form-group>
                                        <b-form-select id="cities" :disabled="form.state == null" required v-model="form.city" :options="cities">
                                            <template slot="first">
                                                <option :value="null" disabled>Cidade *</option>
                                            </template>
                                        </b-form-select>
                                    </b-form-group>
                                </b-col>
                            </b-row>
                            <div class="borda">
                                <b-form-group label="Interesse (selecione uma ou mais alternativas) *" >
                                    <b-form-checkbox-group id="interest" v-model="form.interest" :options="services"></b-form-checkbox-group>
                                </b-form-group>
                            </div>
                        </b-col>
                        <b-col md="6">
                            <b-form-group>
                                <b-form-textarea id="description" required v-model="form.description" placeholder="Breve Apresentação *" :rows="5" :max-rows="6"></b-form-textarea>                            
                            </b-form-group>
                            <div class="borda">
                                <b-form-group label="Anexar curriculo * (Formatos: *.pdf / *.doc / *.docx)">
                                    <b-form-file id="curriculum" required v-model="form.curriculum" class="mt-3" accept=".docx, .doc, .pdf" :state="Boolean(form.curriculum)" placeholder="Nenhum arquivo selecionado..." ></b-form-file>
                                </b-form-group>
                            </div>
                            <b-row>
                                <b-col md="12">
                                    <b-button class="float-right mt-5" type="submit" variant="primary">Enviar</b-button>
                                </b-col>
                            </b-row>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-form>
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
                services: [],
                states: [],
                cities: [],
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    state: null,
                    city: null,
                    interest: [],
                    description: '',
                    curriculum: null,
                },                
            }
        },
        created () {
            this.getServices(),
            this.getStates()
        },        
        methods: {
            onSubmit () {

                this.isLoading = true

                const action1 = '/api/candidate/'
                const action2 = '/trabalhe-conosco/'

                const fd = new FormData()
                fd.append('name', this.form.name)
                fd.append('email', this.form.email)
                fd.append('phone', this.form.phone)
                fd.append('state', this.form.state)
                fd.append('city', this.form.city.id)
                fd.append('interest', this.form.interest.join(', '))
                fd.append('description', this.form.description)
                fd.append('curriculum', this.form.curriculum)

                const config = { headers: { 'Content-Type': 'multipart/form-data' } }
                
                axios.post(action1, fd, config).then(response => {

                    this.form.filename = response.data.data.file_name

                    axios.post(action2, this.form).then(response => {
                        if (response.data.type  == 'error') {
                            this.isLoading = false
                            this.$snotify.error('Falha ao enviar sua inscrição! Tente novamente após alguns minutos.', { timeout: 5000 })
                        }else{
                            this.resetForm()
                            this.isLoading = false
                            this.$snotify.success('Sua inscrição foi enviada com sucesso!', { timeout: 5000 })
                        }
                    }).catch(error => {
                        this.isLoading = false
                        this.$snotify.error('Falha ao enviar sua inscrição!', { timeout: 5000 })
                        throw new Error(error)
                    })
                }).catch(error => {
                    this.isLoading = false
                    console.error(error.message)
                })

            },
            getServices(){
                const action = '/api/services'
                axios.get(action).then(response => {
                    this.services = [...response.data.data.map(service => (service.title))]
                }).catch(error => {
                    console.error(error)
                })
            },
            getStates(){
                const action = '/api/states'
                axios.get(action).then(response => {
                    this.states = response.data.data.map(state => ({ value: {id: state.id, name: state.name}, text: state.abbr}))
                }).catch(error => {
                    console.error(error)
                })
            },
            getCities(id){
                this.isLoading = true
                const action = '/api/cities/state/' + id                
                axios.get(action).then(response => {
                    this.cities = [...response.data.data.map(city => ({ value: {id: city.id, name: city.name}, text: city.name }))]
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            resetForm () {
                this.form = {
                    name: '',
                    email: '',
                    phone: '',
                    state: null,
                    city: null,
                    interest: [],
                    description: '',
                    curriculum: null,
                }
            },
        },
        components: {
            Loading
        },
    }
</script>

<style lang="sass" scoped>

</style>