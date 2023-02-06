require('../bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import {routes} from './routes';
import store from '../store'
import VueSocialSharing from 'vue-social-sharing'

Vue.use(VueSocialSharing);
// import VueMeta from 'vue-meta'

// Vue.use(VueMeta, {
//     keyName: 'head'
//   })

window.Reload = new Vue();
const router = new VueRouter({
  routes,
  mode: 'history'
})
const app = new Vue({
    el: '#app',
    router,
    store
});
