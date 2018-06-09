require('./bootstrap');

window.Vue = require('vue');

import VueAwesomeSwiper from 'vue-awesome-swiper'
import 'swiper/dist/css/swiper.css'

Vue.use(VueAwesomeSwiper)

Vue.component('home-banners', require('./components/home/BannersComponent.vue'));
Vue.component('home-solutions', require('./components/home/SolutionsComponent.vue'));
Vue.component('home-two-posts', require('./components/home/TwoPostsComponent.vue'));
Vue.component('home-testimonies', require('./components/home/TestimoniesComponent.vue'));

Vue.component('services', require('./components/ServicesComponent.vue'));
Vue.component('text-content', require('./components/TextComponent.vue'));
Vue.component('banner', require('./components/BannerComponent.vue'));

Vue.component('form-request-a-quote', require('./components/forms/FormRequestAQuoteComponent.vue'));
Vue.component('form-candidates', require('./components/forms/FormCandidatesComponent.vue'));
Vue.component('form-ombuds', require('./components/forms/FormOmbudsComponent.vue'));
Vue.component('form-contact', require('./components/forms/FormContactComponent.vue'));
Vue.component('form-newsletter', require('./components/forms/FormNewsletterComponent.vue'));

Vue.component('blog-all-posts', require('./components/blog/BlogAllPostsComponent.vue'));
Vue.component('blog-post', require('./components/blog/BlogPostComponent.vue'));

const app = new Vue({
    el: '#app'
});
