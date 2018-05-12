require('./bootstrap');

window.Vue = require('vue');

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'

Vue.use(VueAwesomeSwiper)

Vue.component('home-banners', require('./components/home/BannersComponent.vue'));
Vue.component('home-solutions', require('./components/home/SolutionsComponent.vue'));
Vue.component('home-two-posts', require('./components/home/TwoPostsComponent.vue'));
Vue.component('home-services', require('./components/home/ServicesComponent.vue'));
Vue.component('home-testimonies', require('./components/home/TestimoniesComponent.vue'));
Vue.component('text-content', require('./components/TextComponent.vue'));
Vue.component('request-a-quote', require('./components/RequestAQuoteComponent.vue'));
Vue.component('form-candidates', require('./components/FormCandidatesComponent.vue'));
Vue.component('banner', require('./components/BannerComponent.vue'));

const app = new Vue({
    el: '#app'
});
