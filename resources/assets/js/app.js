import router from './routes.js';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Vue Extensions
import VueRouter from 'vue-router';
import VueScrollTo from 'vue-scrollto';

Vue.use(VueRouter);
Vue.use(VueScrollTo, {
    offset: 60
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('splash', require('./components/Splash.vue'));
Vue.component('about', require('./components/About.vue'));
Vue.component('blog', require('./components/Blog.vue'));
Vue.component('contact', require('./components/Contact.vue'));
Vue.component('mainnav', require('./components/MainNav.vue'));
Vue.component('bloglist', require('./components/blog/List.vue'));
Vue.component('blognav', require('./components/blog/BlogNav.vue'));
Vue.component('fullpost', require('./components/blog/Post.vue'));
Vue.component('taglist', require('./components/blog/Tags.vue'));

const app = new Vue({
    el: '#app',
    router
}).$mount('#app');
