let layout = require('./components/layouts/layout.vue').default;
let blanklayout = require('./components/layouts/blanklayout.vue').default;


let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;

let readPost = require('./components/posts/readPost.vue').default;
let categoryPost = require('./components/categoryPost.vue').default;

let home = require('./components/home.vue').default;
let PageNotFound = require('./components/404.vue').default;


let prefix = '/'
export const routes = [
    { path:  `${prefix}`, component: home, name:'home',meta: { layout: layout } },
    { path: `${prefix}login`, component: login, name:'/login',meta: { layout: blanklayout } },
    { path:  `${prefix}register`, component: register, name:'register',meta: { layout: blanklayout } },
    { path:  `${prefix}forget`, component: forget, name:'forget',meta: { layout: blanklayout } },

    { path:  `${prefix}read/post/:id/:slug`, component: readPost, name:'readPost',meta: { layout: layout } },

    { path:  `${prefix}category/:cat`, component: categoryPost, name:'categoryPost',meta: { layout: layout } },
    { path:  `${prefix}category/:cat/:cat2`, component: categoryPost, name:'categoryPost2',meta: { layout: layout } },

  { path: "*", component: PageNotFound }

]

