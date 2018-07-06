require('./bootstrap.admin')

window.Vue = require('vue')

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'

Vue.use(VueAwesomeSwiper)

const moment = require('moment')
require('moment/locale/pt-br')

Vue.use(require('vue-moment'), {
    moment
})

// Admin components
    Vue.component('admin-form-text-content', require('./components/admin/forms/TextContentComponent.vue'))
    Vue.component('admin-contact-messages', require('./components/admin/lists/ContactMessagesComponent.vue'))
    Vue.component('admin-ombud-messages', require('./components/admin/lists/OmbudMessagesComponent.vue'))
    Vue.component('admin-budgets', require('./components/admin/lists/BudgetsComponent.vue'))
    Vue.component('admin-candidate-messages', require('./components/admin/lists/CandidateMessagesComponent.vue'))
    Vue.component('admin-newsletters', require('./components/admin/lists/NewslettersComponent.vue'))
    Vue.component('admin-blog-posts', require('./components/admin/blog/PostsComponent.vue'))
    Vue.component('admin-banners-home', require('./components/admin/banners/BannersHomeComponent.vue'))
    Vue.component('admin-banner', require('./components/admin/banners/BannerComponent.vue'))
    
const app = new Vue({
    el: '#app',
    data: {
        moment: moment
    },
})
