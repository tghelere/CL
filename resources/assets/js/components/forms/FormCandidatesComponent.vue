<template>
    <div>
        <b-form @submit="onSubmit" class="m50"> 
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
                                <!-- <b-form-select @select="getCities(form.state)" id="states" required v-model="form.state" :options="states"> -->
                                        <b-form-select @input="getCities(form.state)" id="states" required v-model="form.state" :options="states">
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
                            <div class="border border-dark">
                                <b-form-group label="Interesse (selecione uma ou mais alternativas) *" >
                                    <b-form-checkbox-group id="interest" v-model="form.interest" :options="services"></b-form-checkbox-group>
                                </b-form-group>
                            </div>
                        </b-col>
                        <b-col md="6">
                            <b-form-group>
                                <b-form-textarea id="description" required v-model="form.description" placeholder="Breve Apresentação *" :rows="5" :max-rows="6"></b-form-textarea>                            
                            </b-form-group>
                            <div class="border border-dark">
                                <b-form-group label="Anexar curriculo * (Formatos: *.pdf / *.doc / *.docx)">
                                    <b-form-file id="curriculum" required v-model="form.curriculum" class="mt-3" ></b-form-file>
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
    Vue.use(BootstrapVue)

    export default {
        data () {
            return {
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
                    curriculum: {},
                },                
            }
        },
        created () {
            this.getServices(),
            this.getStates()
        },        
        methods: {
            onSubmit (evt) {
                evt.preventDefault();
                console.log(this.form);
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
                    this.states = response.data.data.map(estado => ({ value: estado.id, text: estado.abbr }))
                }).catch(error => {
                    console.error(error)
                })
            },
            getCities(id){
                const action = '/api/cities/state/' + id                
                axios.get(action).then(response => {
                    this.cities = [...response.data.data.map(cidade => ({ value: cidade.id, text: cidade.name }))]
                }).catch(error => {
                    console.error(error)
                })
            },
        },
    }
</script>

<style lang="sass" scoped>

</style>