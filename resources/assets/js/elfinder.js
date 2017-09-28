window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('elfinder', require('./components/elfinder.vue'));
Vue.component('elfinder-preview', require('./components/elfinder-preview.vue'));
Vue.component('elfinder-button', require('./components/elfinder-button.vue'));
Vue.component('elfinder-controls', require('./components/elfinder-controls.vue'));

const app = new Vue({
    el: '.content'
});
