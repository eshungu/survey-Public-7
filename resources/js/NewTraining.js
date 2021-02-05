require('./bootstrap');

window.Vue = require('vue');
window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;

import NewTraining from './components/NewTraining.vue'
import Home from './components/Home.vue'

import SimpleVueValidation from 'simple-vue-validator';

Vue.use(VueRouter, VueAxios, Axios, SimpleVueValidation);

const Validator = SimpleVueValidation.Validator;

const routes = new VueRouter({

    routes: [
        {
            name: 'NewTraining',
            path: "/",
            component: NewTraining
        },

        {
            name: 'Home',
            path: "/home",
            component: Home
        }
    ]

});

console.log('>>> inside ViewMaResult.js');

const primus = new Vue({

    el: '#santos',
    router: routes,

});

