<template>
    <div>
        <a @click="modalShow = !modalShow" v-show="!modalShow" class="link-quote" title="Solicite um orçamento"><span>Solicite um orçamento</span></a>
        <vue-snotify></vue-snotify>
        
        <b-modal ref="reqAQuote" v-model="modalShow" hide-footer hide-header id="modal">
            <loading :active.sync="isLoading" :can-cancel="false"></loading>
            <b-link class="seta" @click="hideModal"></b-link>
            <b-row>
                <b-col md="5"><b-img class="" src="/img/logocolor.png" alt="Centrallimp" height="50" /></b-col>
                <b-col md="7"><h4 class="text-uppercase">Solicitação de orçamento</h4></b-col>
            </b-row>
            <p>Agradecemos pelo seu interesse em nossos serviços. Preencha os campos abaixo para que possamos conhecer suas necessidades.</p>
            <b-form @submit.prevent="onSubmit">
                <b-form-group>
                    <b-form-select id="segment" :options="solutions" required v-model="form.segment">
                        <template slot="first">
                            <option :value="null" disabled>Segmento de atuação *</option>
                        </template>
                    </b-form-select>
                </b-form-group>

                <b-form-group label="Número de colaboradores">
                    <b-form-radio-group id="contributors" v-model="form.contributors" required>
                        <b-form-radio value="1 a 5">1 a 5</b-form-radio>
                        <b-form-radio value="5 a 10">5 a 10</b-form-radio>
                        <b-form-radio value="10 a 20">10 a 20</b-form-radio>
                        <b-form-radio value="20 a 30">20 a 30</b-form-radio>
                        <b-form-radio value="acima de 30">acima de 30</b-form-radio>
                    </b-form-radio-group>
                </b-form-group>

                <!-- <b-form-group label="Modalidade de serviço (selecione uma ou mais)">
                    <b-form-checkbox-group id="modality" v-model="form.modality" :options="services"></b-form-checkbox-group>
                </b-form-group> -->
                <b-form-group>
                    <b-form-input id="modality" type="text" v-model="form.modality" required placeholder="Modalidade de serviço *"></b-form-input>
                </b-form-group>

                <b-form-group>
                    <b-form-input id="name" type="text" v-model="form.name" required placeholder="Pessoa para contato *"></b-form-input>
                </b-form-group>
                
                <b-form-group>
                    <b-form-input id="email" type="email" v-model="form.email" required placeholder="Email *"></b-form-input>
                </b-form-group>
                                
                <b-row>
                    <b-col md="5" class="no-pad-right">
                        <b-form-group>
                            <b-form-input id="phone" type="tel" v-model="form.phone" required placeholder="Telefone para contato *"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col md="2" class="no-pad-left no-pad-right">
                        <b-form-group>
                            <b-form-select @input="getCities(form.state.id)" id="states" required v-model="form.state" :options="states">
                                <template slot="first">
                                    <option :value="null" disabled>UF *</option>
                                </template>
                            </b-form-select>
                        </b-form-group>
                    </b-col>
                    <b-col md="5" class="no-pad-left">
                        <b-form-group>
                            <b-form-select id="cities" :disabled="form.state == null" required v-model="form.city" :options="cities">
                                <template slot="first">
                                    <option :value="null" disabled>Cidade *</option>
                                </template>
                            </b-form-select>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col md="12">
                        <b-button class="float-right" type="submit" variant="primary">Enviar</b-button>
                    </b-col>
                </b-row>
            </b-form>
        </b-modal>
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
                modalShow: false,
                solutions: [],
                // services: [],
                states: [],
                cities: [],
                form: {
                    segment: null,
                    contributors: '',
                    // modality: [],
                    modality: '',
                    name: '',
                    email: '',
                    phone: '',
                    state: null,
                    city: null,
                },
            }
        },
        created () {
            this.getSolutions(),
            // this.getServices(),
            this.getStates()
        },
        methods: {
            onSubmit () {

                this.isLoading = true

                const action1 = '/api/budget/'
                const action2 = '/orcamento/'

                axios.post(action1, this.form).then(response => {
                    axios.post(action2, this.form).then(response => {
                        this.resetForm()
                        this.isLoading = false
                        this.modalShow = false
                        this.$snotify.success('Solicitação de Orçamento enviada com sucesso!', { timeout: 5000 })
                    }).catch(error => {
                        this.isLoading = false
                        this.$snotify.error('Falha ao enviar a Solicitação de Orçamento!', { timeout: 5000 })
                        throw new Error(error)
                    })
                }).catch(error => {
                    this.isLoading = false
                    this.$snotify.error('Falha ao enviar a Solicitação de Orçamento!', { timeout: 5000 })
                    console.error(error.message)
                })

            },
            hideModal () {
                this.$refs.reqAQuote.hide()
            },
            getSolutions(){
                const action = '/api/solutions'
                axios.get(action).then(response => {
                    response.data.data.push( { id: '8', title: 'Outros', } )
                    this.solutions = [...response.data.data.map(solution => ({ value: {id: solution.id, name: solution.title}, text: solution.title }))]
                }).catch(error => {
                    console.error(error)
                })
            },
            // getServices(){
            //     const action = '/api/services'
            //     axios.get(action).then(response => {
            //         this.services = [...response.data.data.map(service => (service.title))]
            //     }).catch(error => {
            //         console.error(error)
            //     })
            // },
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
                    segment: null,
                    contributors: '',
                    // modality: [],
                    modality: '',
                    name: '',
                    email: '',
                    phone: '',
                    city: null,
                    state:  null
                }
            },
        },
        components: {
            Loading
        },
    }
</script>

<style lang="sass" scoped>
.link-quote
    background: url(/img/orcamento_azul.png) no-repeat top center
    height: 140px
    width: 150px
    display: block
    position: fixed
    bottom: 45vh
    right: 5px
    z-index: 5
    cursor: pointer
    &:hover
        background-position-y: -140px
    &:focus
        outline: 0
    span
        display: none
#modal
    h4
        line-height: 65px
        font-size: 16px
    p, input, select, label, checkbox, radio
        font-size: 0.8rem
    .seta
        height: 24px
        width: 8px
        background: url(/img/icons/seta.png) no-repeat top center
        display: block
        position: absolute
        top: 45%
        left: 10px
        &:hover
            background-position-y: -24px
    .no-pad-left
        padding-left: 5px
    .no-pad-right
        padding-right: 5px
</style>