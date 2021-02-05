require('./bootstrap');

window.Vue = require('vue');
window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;

import ViewRatings from './components/ViewRatings.vue'

Vue.use(VueRouter, VueAxios, Axios);

const routes = new VueRouter({

    routes: [
        {
            name: 'ViewRatings',
            path: "/",
            component: ViewRatings
        }
    ]

});

console.log('>>> inside ViewMaResult.js');

const primus = new Vue({

    el: '#ibijumba',
    router: routes,

});

