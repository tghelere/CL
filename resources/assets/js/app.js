require('./bootstrap')

window.Vue = require('vue')

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'

Vue.use(VueAwesomeSwiper)

// website components
    Vue.component('home-banners', require('./components/website/home/BannersComponent.vue'))
    Vue.component('home-solutions', require('./components/website/home/SolutionsComponent.vue'))
    Vue.component('home-two-posts', require('./components/website/home/TwoPostsComponent.vue'))
    Vue.component('home-testimonies', require('./components/website/home/TestimoniesComponent.vue'))

    Vue.component('services', require('./components/website/ServicesComponent.vue'))
    Vue.component('text-content', require('./components/website/TextComponent.vue'))
    Vue.component('banner', require('./components/website/BannerComponent.vue'))

    Vue.component('form-request-a-quote', require('./components/website/forms/FormRequestAQuoteComponent.vue'))
    Vue.component('form-candidates', require('./components/website/forms/FormCandidatesComponent.vue'))
    Vue.component('form-ombuds', require('./components/website/forms/FormOmbudsComponent.vue'))
    Vue.component('form-contact', require('./components/website/forms/FormContactComponent.vue'))
    Vue.component('form-newsletter', require('./components/website/forms/FormNewsletterComponent.vue'))

    Vue.component('blog-all-posts', require('./components/website/blog/BlogAllPostsComponent.vue'))
    Vue.component('blog-post', require('./components/website/blog/BlogPostComponent.vue'))
    
    Vue.component('menu-mobile', require('./components/website/MenuMobileComponent.vue'))
    // Vue.component('ebook', require('./components/website/footer/EbookComponent.vue'))

const app = new Vue({
    el: '#app'
})
