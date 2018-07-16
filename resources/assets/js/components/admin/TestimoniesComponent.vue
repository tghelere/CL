<template>
    <b-container>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <b-row class="blue">
            <b-col md="8" class="mx-auto">
                <swiper class="testimonies-custom" :options="swiperOption" style="height: auto">
                    <swiper-slide v-for="(testimony, index) in testimonies" :key='index'>                    
                        <div class="testimonies">
                            <div v-html="testimony.testimony"></div>
                            <hr>
                            <p class="text-center nome">{{ testimony.name }}</p>                        
                            <p class="text-center font-italic instituto">{{ testimony.institute }}</p>
                        </div>
                    </swiper-slide>
                    <div class="swiper-button-prev swiper-button-black" slot="button-prev"></div>
                    <div class="swiper-button-next swiper-button-black" slot="button-next"></div>
                </swiper>
            </b-col>
        </b-row>
        <b-row>
            <b-col md="12" class="my-3" >
                <b-button @click.prevent="resetForm; modalTitle = 'Inserção de depoimento'" :variant="'primary'" v-b-modal.modalFormTestimonies class="font-weight-bold" >
                    <i class="fa fa-plus-circle fa-1" aria-hidden="true"></i>
                    Inserir Depoimento
                </b-button>
            </b-col>
        </b-row>
        <b-row>
            <b-table striped hover small
                :items="testimonies"  
                :fields="fields"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
            >
                <template slot="actions" slot-scope="row">
                    <b-button 
                        size="sm"
                        v-b-modal.modalFormTestimonies 
                        @click.prevent="modalFormTestimonies = Object.assign({}, row.item); modalTitle = 'Edição do depoimento id: '+ row.item.id" 
                        class="mr-1 fa fa-pencil-square" 
                        title="Editar banner"
                        :variant="'outline-primary'">
                    </b-button>
                    <b-button 
                        size="sm" 
                        v-b-modal.modalConfirm 
                        @click="itemToRemove = row.item.id"  
                        class="mr-1 fa fa-trash"
                        :variant="'outline-danger'"
                        title="Remover">
                    </b-button>
                </template>
            </b-table>
        </b-row>
        <b-modal id="modalConfirm" 
            @ok="remove(itemToRemove)" 
            title="Atenção!">
            Tem certeza de que deseja remover este depoimento?
        </b-modal>
        <b-modal 
            id="modalFormTestimonies" 
            size="lg" 
            hide-footer 
            @bv::modal::hidden="resetForm"
            :title="modalTitle">
            <b-form 
                @submit.prevent="modalFormTestimonies.id > 0 ? putTestimony(modalFormTestimonies) : postTestimony(modalFormTestimonies)"
                @input="changeButton">
                <b-row>
                    <b-col md="4">
                        <b-form-group label="Nome">
                            <b-form-input id="name" type="text" v-model="modalFormTestimonies.name" placeholder="Nome"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col md="6">
                        <b-form-group label="Descrição">
                            <b-form-input id="institute" type="text" v-model="modalFormTestimonies.institute" placeholder="Descrição"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col md="2">
                        <b-form-group label="Ordem">
                            <b-form-input id="sequence" type="number" v-model="modalFormTestimonies.sequence" placeholder="Ordem"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col md="12">
                        <b-form-group label="Depoimento">
                            <quill-editor v-model="modalFormTestimonies.testimony" :options="editorOption" placeholder="Depoimento"></quill-editor>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row v-show="saveButton">
                    <hr>
                    <b-col md="12">
                        <b-button  class="float-right mt-5" type="submit" variant="primary">Salvar</b-button>
                    </b-col>
                </b-row>
            </b-form>
        </b-modal>
    </b-container>
</template>

<script>
    import 'quill/dist/quill.snow.css'
    import { quillEditor } from 'vue-quill-editor'

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
                testimonies: [],
                swiperOption: {
                    loop: false,
                    autoHeight: true,
                    centeredSlides: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                saveButton: false,
                isLoading: false,
                modalTitle: '',
                sortBy: 'sequence',
                sortDesc: false,
                modalFormTestimonies: {},
                fields: [
                    {key: 'id', sortable: true, 'class': 'text-center'},
                    {key: 'name', sortable: true, label: 'Nome'},
                    {key: 'institute', sortable: true, label: 'Descrição'},
                    {key: 'sequence', sortable: true, label: 'Ordem'},
                    {key: 'created_at', sortable: true, label: 'Criado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'updated_at', sortable: true, label: 'Alterado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'actions', sortable: false, label: 'Ações', 'class': 'text-center' },
                ],
                editorOption: {
                    placeholder: 'Depoimento',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', /*'code-block'*/],
                            [{ 'header': 1 }, { 'header': 2 }],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            [{ 'script': 'sub' }, { 'script': 'super' }],
                            [{ 'indent': '-1' }, { 'indent': '+1' }],
                            // [{ 'direction': 'rtl' }],
                            [{ 'size': ['small', false, 'large', 'huge'] }],
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            // [{ 'font': [] }],
                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'align': [] }],
                            ['clean'],
                            ['link', 'image', 'video']
                        ],
                    }
                },
            }
        },
        created () {
            this.getTestimonies()
        },
        methods: {
            getTestimonies(){
                this.isLoading = true
                setTimeout(() => {
                    const action = '/api/testimonies'
                    axios.get(action).then(response => {
                        this.testimonies = response.data.data
                        this.isLoading = false
                    }).catch(error => {
                        console.error(error)
                        this.isLoading = false
                    })
                }, 1000)
            },
            remove(id){
                this.isLoading = true
                const action = '/api/testimony/' + id
                axios.delete(action).then(response => {
                    this.getTestimonies()
                    this.$snotify.success('Depoimento removido com sucesso!', { timeout: 3000 })
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.$snotify.error('Houve um erro ao tentar remover este depoimento!', { timeout: 3000 })
                    this.isLoading = false
                })
            },
            changeButton(){
                this.saveButton = true
            },
            resetForm(){
                this.modalFormTestimonies = {
                    id: null,
                    name: '',
                    institute: '',
                    sequence: '',
                    testimony: '',
                }
            },
            putTestimony(form){
                this.isLoading = true
                const action = '/api/testimony/'
                axios.put(action, form).then(response => {
                    this.$root.$emit('bv::hide::modal', 'modalFormTestimonies')
                    this.resetForm()
                    this.getTestimonies()
                    this.isLoading = false
                    this.$snotify.success('Depoimento alterado com sucesso!', { timeout: 3000 })
                }).catch(error => {
                    if (error.response) {
                        console.log(error.response.data)
                        console.log(error.response.status)
                        console.log(error.response.headers)
                    } else if (error.request) {
                        console.log(error.request)
                    } else {
                        console.log('Error', error.message)
                    }
                    console.log(error.config)
                    this.isLoading = false
                    this.$snotify.error('Houve um erro ao tentar alterar este depoimento!', { timeout: 3000 })
                })
            },
            postTestimony(form){
                this.isLoading = true
                const action = '/api/testimony/'
                axios.post(action, form).then(response => {
                    this.$root.$emit('bv::hide::modal', 'modalFormTestimonies')
                    this.resetForm()
                    this.getTestimonies()
                    this.isLoading = false
                    this.$snotify.success('Depoimento criado com sucesso!', { timeout: 3000 })
                }).catch(error => {
                    if (error.response) {
                        console.log(error.response.data)
                        console.log(error.response.status)
                        console.log(error.response.headers)
                    } else if (error.request) {
                        console.log(error.request)
                    } else {
                        console.log('Error', error.message)
                    }
                    console.log(error.config)
                    this.isLoading = false
                    this.$snotify.error('Houve um erro ao criar este depoimento!', { timeout: 3000 })
                })
            },
        },
        components: {
            Loading,
            quillEditor,
        },
    }
</script>