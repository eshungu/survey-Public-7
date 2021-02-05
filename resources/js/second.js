
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('example', require('./components/Example.vue'));
import Example from './components/Example.vue';

import itunda from './components/Apples.vue';

import Listposts from './components/Listposts.vue';
import Addposts from './components/Addposts.vue';
import Viewposts from './components/Viewposts.vue';
import Editposts from './components/Editposts.vue';
import Deleteposts from './components/Deleteposts.vue';

Vue.use(VueRouter,VueAxios,Axios);

//alert("Hello from second file")

const routes = new VueRouter({

  routes: [
    {
      
      name:'Listposts',
      path:'/',
      component: Listposts
      
    },

    {
      name:'Addposts',
      path:'/add-posts',
      component: Addposts
    },

    {
      name:'Editposts',
      path:'/edit/:id',
      component: Editposts
    },

    {
      name:'Deleteposts',
      path:'/post-delete/:id',
      component: Deleteposts
    },

    {
      name:'Viewposts',
      path:'/view/:id',
      component: Viewposts
    },

  ],
})


const paparazzi = new Vue({
    el: '#andromeda',
    router: routes,
    components: { itunda },
    template: '<itunda />'
});
