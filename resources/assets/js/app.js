
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

Vue.component('network-chart', require('./components/NetworkChart.vue'));
Vue.component('boxer-chart', require('./components/BoxerChart.vue'));
Vue.component('history-chart', require('./components/HistoryChart.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function() {
    $('.aside-first-name-select').select2();
    $('.bside-first-name-select').select2();
});