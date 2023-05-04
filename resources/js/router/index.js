import {createWebHistory, createRouter} from "vue-router";

import Home from '../components/Home.vue';
import Register from '../components/Register.vue';
import Login from '../components/Login.vue';
import Dashboard from '../components/Dashboard.vue';
import Tickets from '../components/Tickets.vue';
import AddTicket from '../components/AddTicket.vue';
import EditTicket from '../components/EditTicket.vue';
import Purchase from '../components/Purchase.vue';
import Entradas from '../components/Entradas.vue';
import Politics from '../components/Politics.vue';
import Cookies from '../components/Cookies.vue';
import Warning from '../components/Warning.vue';
import Park from '../components/Park.vue';
import Horarios from '../components/Horarios.vue';
import Profile from '../components/Profile.vue';

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
    name: 'tickets',
    path: '/tickets',
    component: Tickets
   },
   {
    name: 'addticket',
    path: '/tickets/add',
    component: AddTicket
   },
   {
    name: 'editticket',
    path: '/tickets/edit',
    component: EditTicket
   },
   {
    name: 'purchase',
    path: '/purchase',
    component: Purchase
    },
    {
    name: 'entradas',
    path: '/entradas',
    component: Entradas
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
    {
        name: 'park',
        path: '/park',
        component: Park
    },
    {
        name: 'horarios',
        path: '/horarios',
        component: Horarios
        },
    {
        name: 'profile',
        path: '/profile',
        component: Profile
    },

];

const router = createRouter({
  history:createWebHistory(),
  routes: routes,
});

export default router;
