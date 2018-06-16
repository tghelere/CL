<template>
    <div>
        <vue-snotify></vue-snotify>
        <loading :active.sync="isLoading" :can-cancel="false"></loading>
        <div class="p-3 bg-white rounded box-shadow">
            <h5 class="border-bottom border-gray pb-2 mb-4">{{title}}</h5>
            <quill-editor v-if="content.content != ''" @change="changeButton" v-model="content.content" :options="editorOption"></quill-editor>
            <div class="row">
                <div class="col-md-12">
                    <button v-show="button" class="btn btn-primary float-right m-4" @click.prevent="sendContent(content)" >Salvar</button>
                </div>
            </div>
        </div>
        <ul class="list-inline text-right">
            <li class="list-inline-item small mr-4">Criado: {{content.created_at | moment("calendar")}}</li>
            <li class="list-inline-item small mr-4" v-if="content.created_at !== content.updated_at">Última atualização: {{content.updated_at | moment("from", "now")}}</li>
        </ul>
    </div>
</template>

<script>
import 'quill/dist/quill.snow.css'
import { quillEditor } from 'vue-quill-editor'

import 'vue-loading-overlay/dist/vue-loading.min.css'
import Loading from 'vue-loading-overlay'

import 'vue-snotify/styles/material.css'
import Snotify, { SnotifyPosition } from 'vue-snotify'

const options = {
  toast: {
    position: SnotifyPosition.centerTop
  }
}

Vue.use(Snotify, options)
export default {
  data() {
    return {
      button: false,
      isLoading: false,
      content: {
          content: '',
          created_at: '',
          updated_at: '',
      },
      editorOption: {
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
      }
    }
  },
  props: ['title', 'page'],
  components: {
    Loading,
    quillEditor
  },
  methods: {
      getContent () {
        this.isLoading = true
        const action = '/api/contents/' + this.page
        axios.get(action).then(response => {
          this.content = response.data.data
          this.isLoading = false
        }).catch(error => {
          console.error(error)
          this.isLoading = false
        })
      },
      sendContent(content) {
        this.isLoading = true
        const action = '/api/content/'
        axios.put(action, content).then(response => {
            this.content = response.data.data
            this.button = false
            this.isLoading = false
            this.$snotify.success('Alteração concluída com sucesso', { timeout: 5000 })
        }).catch(error => {
            this.isLoading = false
            this.$snotify.error(error.response.data.message, { timeout: 5000 })
            console.error(error)
        })
      },
      changeButton() {
          this.button = true
      }
    },
    created () {
        this.getContent()
    },
}
</script>