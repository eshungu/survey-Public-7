
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import router from './router'

require('./bootstrap');

window.Vue = require('vue');

window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;


import Example from './components/Example.vue';

import Layout from './components/Layout.vue';



Vue.use(VueRouter,VueAxios,Axios);

const routes = new VueRouter({

  routes: [
 
  ],
})


