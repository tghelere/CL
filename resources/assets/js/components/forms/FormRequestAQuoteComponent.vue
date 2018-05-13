<template>
    <div>
        <a v-b-modal.modal1 class="link-quote" href="#" title="Solicite um orçamento"><span>Solicite um orçamento</span></a>

        <!-- Modal Component -->
        <b-modal id="modal1" hide-footer >
            <h4>Solicitação de orçamento</h4>
            <p>Agradecemos pelo seu interesse em nossos serviços. Preencha os campos abaixo para que possamos conhecer suas necessidades.</p>
            <b-form @submit="onSubmit">
                <b-form-group>
                    <b-form-select id="segment" :options="solutions" required v-model="form.segment">
                        <template slot="first">
                            <option :value="null" disabled>Segmento de atuação *</option>
                        </template>
                    </b-form-select>
                </b-form-group>

                <b-form-group label="Número de colaboradores">
                    <b-form-radio-group id="contributors" v-model="form.contributors" required>
                        <b-form-radio value="1 a 10">1 a 10</b-form-radio>
                        <b-form-radio value="10 a 20">10 a 20</b-form-radio>
                        <b-form-radio value="20 a 30">20 a 30</b-form-radio>
                        <b-form-radio value="acima de 30">acima de 30</b-form-radio>
                    </b-form-radio-group>
                </b-form-group>

                <b-form-group label="Modalidade de serviço (selecione uma ou mais)">
                    <b-form-checkbox-group id="modality" v-model="form.modality" :options="services"></b-form-checkbox-group>
                </b-form-group>

                <b-form-group>
                    <b-form-input id="name" type="text" v-model="form.name" required placeholder="Pessoa para contato *"></b-form-input>
                </b-form-group>
                
                <b-form-group>
                    <b-form-input id="email" type="email" v-model="form.email" required placeholder="Email *"></b-form-input>
                </b-form-group>
                                
                <b-row>
                    <b-col md="6">
                        <b-form-group>
                            <b-form-input id="phone" type="tel" v-model="form.phone" required placeholder="Telefone para contato *"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col md="2">
                        <b-form-group>
                            <b-form-select @input="getCities(form.state)" id="states" required v-model="form.state" :options="states">
                                <template slot="first">
                                    <option :value="null" disabled>UF *</option>
                                </template>
                            </b-form-select>
                        </b-form-group>
                    </b-col>
                    <b-col md="4">
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
                        <b-button class="float-right mt-5" type="submit" variant="primary">Enviar</b-button>
                    </b-col>
                </b-row>
            </b-form>
        </b-modal>
    </div>
</template>

<script>

    import BootstrapVue from 'bootstrap-vue'        
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    Vue.use(BootstrapVue)

    export default {
        data () {
            return {
                solutions: [],
                services: [],
                states: [],
                cities: [],
                form: {
                    segment: null,
                    contributors: '',
                    modality: [],
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
            this.getServices(),
            this.getStates()
        },
        methods: {
            onSubmit (evt) {
                evt.preventDefault();
                console.log(this.form);
            },            
            getSolutions(){
                const action = '/api/solutions-titles'
                axios.get(action).then(response => {
                    this.solutions = response.data
                }).catch(error => {
                    console.error(error)
                })
            },
            getServices(){
                const action = '/api/services-titles'
                axios.get(action).then(response => {
                    this.services = response.data
                }).catch(error => {
                    console.error(error)
                })
            },
            getStates(){
                const action = '/api/states'
                axios.get(action).then(response => {
                    this.states = response.data.data.map(state => ({ value: state.id, text: state.abbr }))
                }).catch(error => {
                    console.error(error)
                })
            },
            getCities(id){
                const action = '/api/cities/state/' + id                
                axios.get(action).then(response => {
                    this.cities = [...response.data.data.map(city => ({ value: city.id, text: city.name }))]
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>
.link-quote
    background: url(/img/bot_orcamento.png) no-repeat top center
    height: 110px
    width: 150px
    display: block
    position: fixed
    bottom: 100px
    right: 10px
    z-index: 10
    &:hover
        background-position-y: -110px
    &:focus
        outline: 0
    span
        display: none
</style>