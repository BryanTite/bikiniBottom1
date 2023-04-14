import {createWebHistory, createRouter} from "vue-router";

import Home from '../components/Home.vue';
import Register from '../components/Register.vue';
import Login from '../components/Login.vue';
import Dashboard from '../components/Dashboard.vue';
import Posts from '../components/Posts.vue';
import AddPost from '../components/AddPost.vue';
import EditPost from '../components/EditPost.vue';
import Purchase from '../components/Purchase.vue';
import Tickets from '../components/Tickets.vue';
import Politics from '../components/Politics.vue';
import Cookies from '../components/Cookies.vue';
import Warning from '../components/Warning.vue';

export const routes = [
   {
       name: 'home',
       path: '/',
       component: Home
   },
   {
       name: 'register',
       path: '/register',
       component: Register
   },
   {
       name: 'login',
       path: '/login',
       component: Login
   },
   {
       name: 'dashboard',
       path: '/dashboard',
       component: Dashboard
   },
   {
    name: 'posts',
    path: '/posts',
    component: Posts
   },
   {
    name: 'addpost',
    path: '/posts/add',
    component: AddPost
   },
   {
    name: 'editpost',
    path: '/posts/edit',
    component: EditPost
   },
   {
    name: 'purchase',
    path: '/purchase',
    component: Purchase
    },
    {
    name: 'tickets',
    path: '/tickets',
    component: Tickets
    },
    {
        name: 'politics',
        path: '/politics',
        component: Politics
    },
    {
        name: 'cookies',
        path: '/cookies',
        component: Cookies
    },
    {
        name: 'warning',
        path: '/warning',
        component: Warning
    },
];

const router = createRouter({
  history:createWebHistory(),
  routes: routes,
});

export default router;
