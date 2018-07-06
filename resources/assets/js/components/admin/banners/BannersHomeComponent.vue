<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <swiper :options="swiperOption" v-show="banners.length > 0">
            <swiper-slide v-for="(banner, index) in banners" :key='index' :style="img(banner.image)">
                <div v-if="banner.title != null" class="text container" :style="cor(banner.colorbox)">
                    <h2 v-show="banner.title != null">{{ banner.title }}</h2>
                    <p v-show="banner.description != null">{{ banner.description }}</p>
                    <a v-show="banner.link != null" :href="banner.link" class="leia text-uppercase" title="Leia Mais">Leia Mais</a>
                </div>
            </swiper-slide>
            <div class="swiper-pagination swiper-pagination-white" slot="pagination"></div>
            <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
            <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
        </swiper>
        <b-row>
            <b-col md="12" class="my-3" >
                <b-button @click.prevent="resetForm" :variant="'primary'" v-b-modal.modalForm class="font-weight-bold" >
                    <i class="fa fa-plus-circle fa-1" aria-hidden="true"></i>
                    Inserir banner
                </b-button>
            </b-col>
        </b-row>
        <b-row>
            <b-table striped hover small
                :items="banners"  
                :fields="fields"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
            >
                <template slot="actions" slot-scope="row">
                    <b-button 
                        size="sm"
                        v-b-modal.modalForm 
                        @click.prevent="modalForm = Object.assign({}, row.item)" 
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
                Tem certeza de que deseja remover este banner?
            </b-modal>
            <b-modal 
                id="modalForm" 
                size="lg" 
                hide-footer 
                @bv::modal::hidden="resetForm"
                :title="'Edição de banner'">
                <b-form 
                    @submit.prevent="modalForm.id > 0 ? putBanner(modalForm) : postBanner(modalForm)"
                    @input="changeButton" 
                    enctype="multipart/form-data" 
                    >
                    <b-form-group label="Título">
                        <b-form-input id="title" type="text" v-model="modalForm.title" placeholder="Título"></b-form-input>
                    </b-form-group>
                    <b-form-group label="Descrição">
                        <b-form-input id="description" type="text" v-model="modalForm.description" placeholder="Descrição"></b-form-input>
                    </b-form-group>
                    <b-row>
                        <b-col md="6">
                            <b-form-group label="Link">
                                <b-form-input id="link" type="text" v-model="modalForm.link" placeholder="Exemplo: /blog/post/post-de-exemplo"></b-form-input>
                            </b-form-group>
                        </b-col>
                        <b-col md="6">
                            <b-form-group label="Cor do quadro de texto">
                                <b-form-input id="colorbox" type="text" v-model="modalForm.colorbox" placeholder="Exemplo: #defa2e"></b-form-input>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-form-group label="Imagem">
                        <img class="d-block mx-auto mt-3 mb-3 form-img" v-if="typeof(modalForm.image) == 'string'" :src="'/storage/images/banners/' + modalForm.image" fluid alt="Erro ao exibir imagem">
                        <b-form-file accept="image/jpeg, image/png, image/gif" v-model="modalForm.image" placeholder="Clique para escolher uma imagem para o banner"></b-form-file>
                    </b-form-group>
                    <b-row v-show="saveButton">
                        <hr>
                        <b-col md="12">
                            <b-button  class="float-right mt-5" type="submit" variant="primary">Salvar</b-button>
                        </b-col>
                    </b-row>
                </b-form>
            </b-modal>
    </div>
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
                banners : [],
                swiperOption: {
                    // loop: true,
                    centeredSlides: true,
                    autoplay: {
                        delay: 6000,
                        disableOnInteraction: true
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                saveButton: false,
                isLoading: false,
                sortBy: 'created_at',
                sortDesc: true,
                modalForm: {},
                fields: [
                    {key: 'id', sortable: true, 'class': 'text-center'},
                    {key: 'page', sortable: true, label: 'Página'},
                    {key: 'image', sortable: true, label: 'Imagem'},
                    {key: 'created_at', sortable: true, label: 'Criado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'updated_at', sortable: true, label: 'Alterado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'actions', sortable: false, label: 'Ações', 'class': 'text-center' },
                ],
            }
        },
        created () {
            this.getBanners()
        },
        props: ['height'],
        methods: {
            getBanners(){
                this.isLoading = true
                const action = '/api/banners/home'
                axios.get(action).then(response => {
                    this.banners = response.data.data
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            img(img) {
                return 'background: url(/storage/images/banners/' + img + ') no-repeat center center; background-size: cover !important; height:' + this.height + 'px;'
            },
            cor(cor) {
                return 'background-color: ' + cor + ';'
            },
            remove(id) {
                this.isLoading = true
                const action = '/api/banner/' + id
                axios.delete(action).then(response => {
                    this.getBanners()
                    this.$snotify.success('Banner removido com sucesso!', { timeout: 3000 })
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.$snotify.error('Houve um erro ao tentar remover este banner!', { timeout: 3000 })
                    this.isLoading = false
                })
            },
            changeButton() {
                this.saveButton = true
            },
            resetForm() {
                this.modalForm = {
                    id: null,
                    page: 'home',
                    image: null,
                    title: '',
                    description: '',
                    link: '',
                    colorbox: '',
                }
            },
            putBanner(form) {
                this.isLoading = true
                const fd = new FormData()
                    fd.append('id', form.id)
                    fd.append('page', form.page)
                    fd.append('image', form.image)
                    fd.append('title', form.title)
                    fd.append('description', form.description)
                    fd.append('link', form.link)
                    fd.append('colorbox', form.colorbox)
                const action = '/api/banner/update/'
                axios.post(action, fd).then(response => {
                        this.$root.$emit('bv::hide::modal', 'modalForm')
                        this.resetForm()
                        this.getBanners()
                        this.isLoading = false
                        this.$snotify.success('Banner alterado com sucesso!', { timeout: 3000 })
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
                    this.$snotify.error('Houve um erro ao tentar alterar este banner!', { timeout: 3000 })
                })
            },
            postBanner(form) {
                this.isLoading = true
                const fd = new FormData()
                    fd.append('page', form.page)
                    fd.append('image', form.image)
                    fd.append('title', form.title)
                    fd.append('description', form.description)
                    fd.append('link', form.link)
                    fd.append('colorbox', form.colorbox)

                    console.log(form);
                    
                const action = '/api/banner/'
                axios.post(action, fd).then(response => {
                    console.log(response);

                    // this.$root.$emit('bv::hide::modal', 'modalForm')
                    // this.resetForm()
                    this.getBanners()
                    this.isLoading = false
                    this.$snotify.success('Banner criado com sucesso!', { timeout: 3000 })
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
                    this.$snotify.error('Houve um erro ao criar este banner!', { timeout: 3000 })
                })
            },
        },
        components: {
            Loading,
        },
    }
</script>