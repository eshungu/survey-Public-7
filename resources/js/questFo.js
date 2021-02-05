

require('./bootstrap');

window.Vue = require('vue');
window.router = require('router');
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios');
window.VueRouter = require('vue-router').default;


import AnotherLayout from './components/AnotherLayout.vue';
import bang from './components/questionInsert.vue';

Vue.use(VueRouter,VueAxios,Axios);

//alert("Hello from second file")

const routes = new VueRouter({

  routes: [

    {
      name:'bang',
      path:'/insert-question',
      component: bang
    },

  ],
})

console.log('>>> inside questFo.js');


const app = new Vue({
  el: '#ngozi',
  router: routes,
  components: { AnotherLayout },
  template: '<AnotherLayout />'
});

const punzer = new Vue({
    el: '#perfect',
    router: routes,
    components: { bang },
    template: '<bang />'
});
