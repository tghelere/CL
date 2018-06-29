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
    // Vue.component('admin-data-tables', require('./components/admin/lists/DataTablesComponent.vue'))
    Vue.component('admin-blog-posts', require('./components/admin/blog/PostsComponent.vue'))
    
const app = new Vue({
    el: '#app',
    data: {
        moment: moment
    }
})
