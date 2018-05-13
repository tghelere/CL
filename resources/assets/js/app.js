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

Vue.component('banner', require('./components/BannerComponent.vue'));

Vue.component('form-request-a-quote', require('./components/forms/FormRequestAQuoteComponent.vue'));
Vue.component('form-candidates', require('./components/forms/FormCandidatesComponent.vue'));
Vue.component('form-ombuds', require('./components/forms/FormOmbudsComponent.vue'));

const app = new Vue({
    el: '#app'
});
