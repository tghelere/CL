
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home-banners', require('./components/HomeBannersComponent.vue'));
Vue.component('home-solutions', require('./components/HomeSolutionsComponent.vue'));
// Vue.component('home-two-posts', require('./components/HomeTwoPostsComponent.vue'));
// Vue.component('home-services', require('./components/HomeServicesComponent.vue'));
// Vue.component('home-testimonies', require('./components/HomeTestimoniesComponent.vue'));

const app = new Vue({
    el: '#app'
});
