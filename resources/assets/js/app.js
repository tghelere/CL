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
Vue.component('home-text', require('./components/home/TextComponent.vue'));

const app = new Vue({
    el: '#app'
});
