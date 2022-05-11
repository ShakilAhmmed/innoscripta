import Vue from "vue";
import router from './router';

require('./bootstrap');

window.Vue = require('vue').default;

const app = new Vue({
    el: '#app',
    router,
});
