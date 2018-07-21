<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <b-container fluid>
            <b-row class="my-3" align-h="end">
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
                    :items="newsletters"  
                    :fields="fields"
                    :sort-by.sync="sortBy"
                    :sort-desc.sync="sortDesc"
                    :current-page="currentPage"
                    :per-page="perPage"
                    :filter="filter"
                    @filtered="onFiltered"
                >
                    <template slot="actions" slot-scope="row">
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
                Tem certeza de que deseja remover este e-mail?
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
                isLoading: false,
                sortBy: 'created_at',
                sortDesc: true,
                newsletters: [],
                fields: [
                    {key: 'id', sortable: true, 'class': 'text-center'},
                    {key: 'name', sortable: true, label: 'Nome'},
                    {key: 'email', sortable: true, label: 'E-mail'},
                    {key: 'created_at', sortable: true, label: 'Data', formatter: (value) => { return this.$moment( value ).fromNow()}, 'class': 'text-center'},
                    {key: 'actions', sortable: false, label: 'Ações', 'class': 'text-center' },
                ],
                currentPage: 1,
                perPage: 10,
                totalRows: 0,
                filter: null,
            }
        },
        created () {
            this.getNewsletters()
        },
        methods: {
            getNewsletters() {
                this.isLoading = true
                const action = '/api/newsletters'
                axios.get(action).then(response => {
                    this.newsletters = response.data.data
                    this.totalRows = this.newsletters.length
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.isLoading = false
                })
            },
            remove(id) {
                this.isLoading = true
                const action = '/api/newsletter/' + id
                axios.delete(action).then(response => {
                    this.getNewsletters()
                    this.$snotify.success('E-mail removido com sucesso!', { timeout: 3000 })
                    this.isLoading = false
                }).catch(error => {
                    console.error(error)
                    this.$snotify.error('Houve um erro ao tentar remover este e-mail!', { timeout: 3000 })
                    this.isLoading = false
                })
            },
            onFiltered(filteredItems) {
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
        },
        components: {
            Loading,
        },
    }
</script>