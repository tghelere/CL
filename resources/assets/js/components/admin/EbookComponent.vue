<template>
    <div class="p-3 bg-white rounded box-shadow">
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <h5 class="border-bottom border-gray pb-2 mb-4">Ebook</h5>
        <b-container>
            <b-row>
                <b-col md="6" class="mx-auto">
                    <a 
                        :href="ebook.url" 
                        target="_blank" 
                        :title="ebook.title"
                        class="ebook"
                        :style="ebook.image != '' ? 'background: url(/storage/images/ebooks/' + ebook.image +') no-repeat center center; background-size: contain;' : ''"
                    ></a>
                </b-col>
            </b-row>
            <b-row>
                <b-col md="12" class="my-3" >
                    <b-button 
                        @click.prevent="resetForm; modalTitle = 'Edição de e-book'; modalFormEbook = ebook" 
                        :variant="'primary'" 
                        v-b-modal.modalFormEbook 
                        class="font-weight-bold d-block mx-auto" 
                    >
                        <i class="fa fa-plus-circle fa-1" aria-hidden="true"></i>
                        Alterar e-book
                    </b-button>
                </b-col>
            </b-row>
            <b-modal 
                id="modalFormEbook" 
                size="md" 
                hide-footer 
                @bv::modal::hidden="resetForm"
                :title="modalTitle">
                <b-form 
                    @submit.prevent="putEbook(modalFormEbook)"
                    @input="changeButton">
                    <b-row>
                        <b-col md="12">
                            <b-form-group label="Título">
                                <b-form-input id="title" type="text" v-model="modalFormEbook.title" placeholder="Título"></b-form-input>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col md="12">
                            <b-form-group label="Link">
                                <b-form-input id="url" type="text" v-model="modalFormEbook.url" placeholder="Link"></b-form-input>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col md="12">
                            <b-form-group label="Imagem" description="(Tamanho da imagem: 480x290px)">
                                <img class="d-block mx-auto mt-3 mb-3 form-img" v-if="typeof(modalFormEbook.image) == 'string'" :src="'/storage/images/ebooks/' + modalFormEbook.image" fluid alt="Erro ao exibir imagem">
                                <b-form-file accept="image/jpeg, image/png, image/gif" v-model="modalFormEbook.image" placeholder="Clique para escolher uma imagem"></b-form-file>
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
                ebook: {
                    title: '',
                    url: '',
                    image: '',
                },
                saveButton: false,
                isLoading: false,
                modalTitle: '',
                modalFormEbook: {},
            }
        },
        created () {
            this.getEbook()
        },
        methods: {
            getEbook(){
                this.isLoading = true
                const action = '/api/ebooks'
                axios.get(action).then(response => {
                    this.ebook = response.data.data
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            changeButton(){
                this.saveButton = true
            },
            resetForm(){
                this.modalFormEbook = {
                    id: null,
                    title: '',
                    url: '',
                    image: '',
                }
            },
            putEbook(form) {
                this.isLoading = true
                const fd = new FormData()
                    fd.append('id', form.id)
                    fd.append('title', form.title)
                    fd.append('url', form.url)
                    fd.append('image', form.image)
                const action = '/api/ebook'
                axios.post(action, fd).then(response => {
                        this.$root.$emit('bv::hide::modal', 'modalFormEbook')
                        this.getEbook()
                        this.isLoading = false
                        this.$snotify.success('Ebook alterado com sucesso!', { timeout: 3000 })
                }).catch(error => {
                    // console.error(error)
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
                    this.$snotify.error('Houve um erro ao tentar alterar este ebook!', { timeout: 3000 })
                })
            },
        },
        components: {
            Loading,
        },
    }
</script>
<style lang="sass" scoped>
a.ebook
    display: block
    width: 350px
    height: 350px
    margin: 0 auto
</style>
