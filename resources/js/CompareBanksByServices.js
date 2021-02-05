require('./bootstrap');

window.Vue = require('vue');
window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;

import moment from "moment";

import CompareBanksByServices from './components/CompareBanksByServices.vue'
import comparativeChart from './components/comparativeChart.vue'

Vue.use(VueRouter, VueAxios, Axios, moment);

const routes = new VueRouter({

    routes: [
        {
            name: 'CompareBanksByServices',
            path: "/",
            component: CompareBanksByServices
        },
        {
            name: 'comparativeChart',
            path: "/comparativeChart/:id",
            component: comparativeChart
        }
    ]

});

console.log('>>> inside ViewComparisons.js');

const amatunda = new Vue({

    el: '#nickyminaj',
    router: routes,

});

