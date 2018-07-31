<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <b-container fluid>
            <b-row class="my-3">
                <b-col md="4">
                    <b-button @click.prevent="addPost" :variant="'primary'" class="font-weight-bold" >
                        <i class="fa fa-plus-circle fa-1" aria-hidden="true"></i>
                        Criar um novo Post
                    </b-button>
                </b-col>
                <!-- <b-col md="4">
                    filtrar por categoria
                </b-col> -->
                <b-col md="4">
                    <b-form-group class="mb-0">
                        <b-input-group>
                            <b-form-input v-model="filter" placeholder="Filtrar" />
                            <b-input-group-append>
                            <b-btn :disabled="!filter" @click="filter = ''">Limpar</b-btn>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </b-col>
            </b-row>
            <b-row>
                <b-table striped hover small
                    :items="posts"  
                    :fields="fields"
                    :sort-by.sync="sortBy"
                    :sort-desc.sync="sortDesc"
                    :current-page="currentPage"
                    :per-page="perPage"
                    :filter="filter"
                    @filtered="onFiltered"
                >
                    <template slot="status" slot-scope="row">
                        <b-badge v-if="row.value" variant="primary">Ativo</b-badge>
                        <b-badge v-else variant="secondary">Inativo</b-badge>
                    </template>
                    <template slot="actions" slot-scope="row">
                        <b-button 
                            size="sm"
                            :disabled="!row.item.status" 
                            :href="'/blog/post/'+ row.item.slug"
                            target="_blank" 
                            :variant="'outline-secondary'"
                            class="mr-1 fa fa-external-link-square" 
                            title="Abrir Post">
                        </b-button>
                        <b-button 
                            size="sm" 
                            @click.prevent="modalEdit(row.item)" 
                            class="mr-1 fa fa-pencil-square" 
                            :variant="'outline-success'"
                            title="Editar">
                        </b-button>
                        <b-button 
                            size="sm" 
                            @click.prevent="changeStatus(row.item)" 
                            class="mr-1" 
                            :title="row.item.status ? 'Desativar' : 'Ativar'"
                            :variant="row.item.status ? 'outline-warning' : 'outline-primary'"
                            :class="row.item.status ? 'fa fa-minus-square' : 'fa fa-plus-square'">
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
            <b-row>
                <b-col md="12" class="my-1">
                    <b-pagination align="center" :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="my-0" />
                </b-col>
            </b-row>
            <b-modal id="modalConfirm" 
                @ok="remove(itemToRemove)" 
                title="Atenção!">
                Tem certeza de que deseja remover este post?
            </b-modal>
            <b-modal id="modalForm" 
                size="lg" 
                :title="modalForm.modalTitle" 
                @hidden="resetForm"
                hide-footer >
                <b-form 
                    @submit.prevent="modalForm.id > 0 ? putPost(modalForm) : postPost(modalForm)"
                    @input="changeButton" 
                    enctype="multipart/form-data" 
                     >
                    <b-form-group label="Título">
                        <b-form-input id="title" type="text" v-model="modalForm.title" required placeholder="Título *"></b-form-input>
                    </b-form-group>
                    <b-form-group label="Descrição">
                        <b-form-input id="description" type="text" v-model="modalForm.description" required placeholder="Descrição *"></b-form-input>
                    </b-form-group>
                    <b-form-group label="Imagem de capa">
                        <img class="d-block mx-auto mt-3 mb-3 capa" v-if="typeof(modalForm.image) == 'string'" :src="'/storage/images/posts/'+ modalForm.id + '/' + modalForm.image" fluid alt="Sem imagem de capa">
                        <b-form-file accept="image/jpeg, image/png, image/gif" v-model="modalForm.image" placeholder="Alterar imagem de capa..."></b-form-file>
                        <p>*Use sempre imagens com a proporção 800 x 600 px.</p>
                    </b-form-group>
                    <b-form-group label="Status">
                        <b-form-radio-group 
                            id="status"
                            buttons
                            button-variant="outline-secondary"
                            v-model="modalForm.status"
                            :options="radios"
                            name="radioBtnOutline" />
                        </b-form-group>
                    <b-form-group label="Corpo">
                        <quill-editor v-model="modalForm.body" :options="editorOption" placeholder="Conteúdo do post"></quill-editor>
                    </b-form-group>
                    <b-form-group label="Categorias">
                        <b-form-checkbox-group v-model="modalForm.selectedCategories" name="categories" :options="fcategories" stacked buttons>
                        </b-form-checkbox-group>
                    </b-form-group>
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
                saveButton: false,
                isLoading: false,
                sortBy: 'updated_at',
                sortDesc: true,
                postToRemove: '',
                posts: [],
                categories: [],
                fields: [
                    {key: 'id', sortable: true, 'class': 'text-center'},
                    {key: 'title', sortable: true, label: 'Título'},
                    {key: 'status', sortable: true, label: 'Status', 'class': 'text-center'},
                    {key: 'created_at', sortable: true, label: 'Criado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'updated_at',sortable: true, label: 'Alterado', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'actions', sortable: false, label: 'Ações', 'class': 'text-center' },
                ],
                // categoriesOptions: this.fcategories
                currentPage: 1,
                perPage: 10,
                totalRows: 0,
                filter: null,
                modalForm: {},
                radios: [
                    { text: 'Inativo', value: '0' },
                    { text: 'Ativo', value: '1' },
                ],
                editorOption: {
                    placeholder: 'Conteúdo do post',
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
            this.getPosts()
            this.getCategories()
        },
        computed: {
            fcategories () {
                return [...this.categories.map(category => ({ 
                    value: category.slug, 
                    text: category.name,
                    id: category.id,
                    name: category.name,
                    slug: category.slug,
                }))]
            },
        },
        methods: {
            getPosts() {
                this.isLoading = true
                const action = '/api/posts'
                axios.get(action).then(response => {
                    this.posts = response.data.data
                    this.totalRows = this.posts.length
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            getCategories() {
                this.isLoading = true
                const action = '/api/categories'
                axios.get(action).then(response => {
                    this.categories = response.data.data
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            remove(id) {
                this.isLoading = true
                const action = '/api/post/' + id
                axios.delete(action).then(response => {
                    this.getPosts()
                    this.$snotify.success('Post removido com sucesso!', { timeout: 3000 })
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.$snotify.error('Houve um erro ao tentar remover este post!', { timeout: 3000 })
                    this.isLoading = false
                })
            },
            changeStatus(item){
                item.status = !item.status
                item.action = 'changeStatus'
                const action = '/api/post/update/'
                axios.post(action, item).then(response => {
                    this.getPosts()
                    this.$snotify.success('Status do post alterado com sucesso!', { timeout: 3000 })
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.$snotify.error('Houve um erro ao tentar alterar o status deste post!', { timeout: 3000 })
                    this.isLoading = false
                })
            },
            changeButton() {
                this.saveButton = true
            },
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            resetForm() {
                this.modalForm = {
                    id: null,
                    title: '',
                    description: '',
                    body: '',
                    slug: '',
                    image: null,
                    status: null, //0 ou 1
                    updated_at: null,
                    categories: [],
                    selectedCategories: [],
                }
            },
            addPost(){
                this.saveButton = false
                this.resetForm()
                this.modalForm.modalTitle = 'Novo post'
                this.$root.$emit('bv::show::modal', 'modalForm')
            },
            postPost(form) {
                this.isLoading = true
                const selectedCategoriesId = [...this.fcategories.filter((category) => {return form.selectedCategories.indexOf(category.slug) != -1})].map(cat => cat.id)
                const fd = new FormData()
                    fd.append('title', form.title)
                    fd.append('description', form.description)
                    fd.append('body', form.body)
                    fd.append('image', form.image)
                    fd.append('status', form.status)
                    fd.append('cat', JSON.stringify(selectedCategoriesId))
                const action = '/api/post/'
                axios.post(action, fd).then(response => {
                    this.$root.$emit('bv::hide::modal', 'modalForm')
                    this.resetForm()
                    this.getPosts()
                    this.isLoading = false
                    this.$snotify.success('Post criado com sucesso!', { timeout: 3000 })
                }).catch(error => {
                    console.error(error)
                    // this.$root.$emit('bv::hide::modal', 'modalForm')
                    this.isLoading = false
                    this.$snotify.error('Houve um erro ao criar este post!', { timeout: 3000 })
                })
            },
            selecteds (array1, array2) {
                const otherIds = new Set(array2.map(({ id }) => id))
                return array1.filter(({ id }) => otherIds.has(id))
            },
            modalEdit(item) {
                this.saveButton = false
                this.resetForm()
                this.modalForm = item
                this.modalForm.selectedCategories = this.selecteds(this.fcategories, item.categories).map(cat => cat.slug)
                this.modalForm.modalTitle = 'Edição do post ID: ' + this.modalForm.id
                this.$root.$emit('bv::show::modal', 'modalForm')
            },
            putPost(form) {
                this.isLoading = true
                    const selectedCategoriesId = [...this.fcategories.filter((category) => {return form.selectedCategories.indexOf(category.slug) != -1})].map(cat => cat.id)
                    form.updated_at = this.$moment().format('YYYY-MM-DD HH:mm:ss')
                const fd = new FormData()
                    fd.append('id', form.id)
                    fd.append('title', form.title)
                    fd.append('description', form.description)
                    fd.append('body', form.body)
                    fd.append('image', form.image)
                    fd.append('status', form.status)
                    fd.append('categories', JSON.stringify(selectedCategoriesId))
                    fd.append('updated_at', form.updated_at)
                const action = '/api/post/update/'
                axios.post(action, fd).then(response => {
                        this.$root.$emit('bv::hide::modal', 'modalForm')
                        this.getPosts()
                        this.isLoading = false
                        this.$snotify.success('Post alterado com sucesso!', { timeout: 3000 })
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
                    this.$snotify.error('Houve um erro ao tentar alterar este post!', { timeout: 3000 })
                })
            },
        },
        components: {
            Loading,
            quillEditor
        },
    }
</script>