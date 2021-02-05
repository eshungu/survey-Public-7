require('./bootstrap');

window.Vue = require('vue');
window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;

import moment from "moment";

import ViewMaChartsAndComments from './components/ViewMaChartsAndComments.vue'
import resultSumChart from './components/resultSumChart.vue'
import comments from './components/comments.vue'

Vue.use(VueRouter, VueAxios, Axios, moment);

const routes = new VueRouter({

    routes: [
        {
            name: 'ViewMaChartsAndComments',
            path: "/",
            component: ViewMaChartsAndComments
        },
        {
            name: 'resultSumChart',
            path: "/resultSumChart/:id",
            component: resultSumChart
        },
        {
            name: 'comments',
            path: "/comments/:id",
            component: comments
        }
    ]

});

console.log('>>> inside ViewMaChartsAndComments.js');

const primus = new Vue({

    el: '#football',
    router: routes,

});

