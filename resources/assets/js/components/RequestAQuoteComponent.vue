<template>
    <div>
        <a v-b-modal.modal1 class="link-quote" href="#" title="Solicite um orçamento"><span>Solicite um orçamento</span></a>

        <!-- Modal Component -->
        <b-modal id="modal1" hide-footer >
            <h4>Solicitação de orçamento</h4>
            <p>Agradecemos pelo seu interesse em nossos serviços. Preencha os campos abaixo para que possamos conhecer suas necessidades.</p>
            <b-form @submit="onSubmit" v-if="show">
                <b-form-group>
                    <b-form-select id="segmento" :options="solutions" required v-model="form.segmento">
                        <option :value="null" disabled>Segmento de atuação*</option>
                    </b-form-select>
                </b-form-group>

                <b-form-group label="Número de colaboradores">
                    <b-form-radio-group v-model="form.colaboradores">
                        <b-form-radio value="1 a 10">1 a 10</b-form-radio>
                        <b-form-radio value="10 a 20">10 a 20</b-form-radio>
                        <b-form-radio value="20 a 30">20 a 30</b-form-radio>
                        <b-form-radio value="acima de 30">acima de 30</b-form-radio>
                    </b-form-radio-group>
                </b-form-group>

                <b-form-group label="Modalidade de serviço (selecione uma ou mais)">
                    <b-form-checkbox-group v-model="form.modalidade" :options="services">
                        
                    </b-form-checkbox-group>
                </b-form-group>

                <b-form-group>
                    <b-form-input id="nome" type="text" v-model="form.nome" required placeholder="Pessoa para contato*">
                    </b-form-input>
                </b-form-group>
                <b-form-group>
                    <b-form-input id="email" type="email" v-model="form.email" required placeholder="Email*">
                    </b-form-input>
                </b-form-group>
                                
                <b-row>
                    <b-col md="6">
                        <b-form-group>
                            <b-form-input id="telefone" type="tel" v-model="form.telefone" required placeholder="Telefone para contato*">
                            </b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col md="2">
                        <b-form-group>
                            <b-form-select @change="getCities(form.estado)" id="estados" required v-model="form.estado" :options="estados">
                                <option :value="null" disabled>UF*</option>
                            </b-form-select>
                        </b-form-group>
                        <div>Selected: <strong>{{ form.estado }}</strong></div>
                    </b-col>
                    <b-col md="4">
                        <b-form-group>
                            <b-form-select id="cidades" :disabled="form.estado == null" required v-model="form.cidade" :options="cidades">
                                <option :value="null" disabled>Cidade*</option>
                            </b-form-select>
                        </b-form-group>
                    </b-col>
                </b-row>
                
                <b-button class="float-right" type="submit" variant="primary">Enviar</b-button>
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
                estados: [],
                cidades: [],
                form: {
                    email: '',
                    nome: '',
                    telefone: '',
                    segmento: null,
                    estado: null,
                    cidade: null,
                    colaboradores: '',
                    modalidade: [],
                },                
                show: true
            }
        },
        created () {
            this.getSolutions(),
            this.getServices(),
            this.getStates()
        },
        // watch: {
        //     estado: () {

        //     },
        // },
        methods: {
            onSubmit (evt) {
                evt.preventDefault();
                alert(JSON.stringify(this.form));
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
                    this.estados = response.data.data.map(estado => ({ value: estado.id, text: estado.abbr }))
                }).catch(error => {
                    console.error(error)
                })
            },
            getCities(id){
                const action = '/api/cities/state/' + id
                console.log(action);

                console.log(this.form.estado);
                
                axios.get(action).then(response => {
                    this.cidades = response.data.data.map(cidade => ({ value: cidade.id, text: cidade.name }))
                    console.log(this.cidades);                    
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