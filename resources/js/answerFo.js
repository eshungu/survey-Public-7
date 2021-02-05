require('./bootstrap');

window.Vue = require('vue');
window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;

import Survey from './components/Survey.vue'
import Survey1 from './components/Survey1.vue'
import Survey2 from './components/Survey2.vue'


import SurveyIdentification from './components/SurveyIdentification.vue'
import Home from './components/Home.vue'

import SimpleVueValidation from 'simple-vue-validator';


Vue.use(VueRouter, VueAxios, Axios, SimpleVueValidation);

const routes = new VueRouter({

    routes: [
        
        {
            name: 'Home',
            path: "/",
            component: Home
        },
        {
            name: 'Survey',
            path: "/survey",
            component: Survey
        },
        {
            name: 'Survey1',
            path: "/survey1",
            component: Survey1
        },
        {
            name: 'Survey2',
            path: "/survey2",
            component: Survey2
        },     
        {
            name: 'Survey',
            path: "/survey/:id",
            component: Survey
        },
        
        {
            name: 'SurveyIdentification',
            path: "/SurveyIdentification/:id",
            component: SurveyIdentification
        }

    ]

});

console.log('>>> inside answerFo.js');

const primus = new Vue({

    el: '#brochette',
    router: routes,

});

// const mutzig = new Vue({

//     el: '#kata',
//     router: routes,
//     components: {
//         Survey
//     },
//     template: '<Survey />'

// });