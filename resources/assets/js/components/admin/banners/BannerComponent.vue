<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <div class="p-3 mb-3 bg-white rounded box-shadow">
            <h5 class="border-bottom border-gray pb-2 mb-4">{{title}}</h5>
            <swiper :options="swiperOption" v-show="banners.length > 0">
                <swiper-slide v-for="(banner, index) in banners" :key='index' :style="img(banner.image)">
                </swiper-slide>
            </swiper>
            <b-row>
                <b-table striped hover small
                    :items="banners"  
                    :fields="fields"
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
                    </template>
                </b-table>
            </b-row>
            <b-modal 
                id="modalForm" 
                size="lg" 
                hide-footer 
                :title="'Edição de banner'">
                <b-form 
                    @submit.prevent="modalForm.id > 0 ? putBanner(modalForm) : postBanner(modalForm)"
                    @input="changeButton" 
                    enctype="multipart/form-data" 
                    >
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
                modalForm: {},
                fields: [
                    {key: 'id', sortable: false, 'class': 'text-center'},
                    {key: 'page', sortable: false, label: 'Página'},
                    {key: 'image', sortable: false, label: 'Imagem'},
                    {key: 'created_at', sortable: false, label: 'Criado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'updated_at', sortable: false, label: 'Alterado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'actions', sortable: false, label: 'Ações', 'class': 'text-center' },
                ],
            }
        },
        created () {
            this.getBanner()
        },
        props: ['height', 'page', 'title'],
        methods: {
            getBanner(){
                this.isLoading = true
                const action = '/api/banners/' + this.page
                axios.get(action).then(response => {
                    this.banners = response.data.data
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            img(img) {
                return 'background: url(/storage/images/banners/' + img + ') no-repeat center center; background-size: cover; height:' + this.height + 'px;'
            },
            changeButton() {
                this.saveButton = true
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
                        this.getBanner()
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
        },
        components: {
            Loading,
        },
    }
</script>