require('./bootstrap.admin')

window.Vue = require('vue')

// import VueAwesomeSwiper from 'vue-awesome-swiper'
// import 'swiper/dist/css/swiper.css'

// Vue.use(VueAwesomeSwiper)

const moment = require('moment')
require('moment/locale/pt-br')

Vue.use(require('vue-moment'), {
    moment
})

// Admin components
    Vue.component('admin-form-text-content', require('./components/admin/forms/TextContentComponent.vue'))

const app = new Vue({
    el: '#app'
})
