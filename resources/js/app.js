import './bootstrap';




import {createApp} from 'vue';
import App from './App.vue';
import axios from 'axios';
import router from './router';
import PrimeVue from 'primevue/config';
import Calendar from "primevue/calendar"

import "primevue/resources/themes/lara-light-blue/theme.css";
import "primevue/resources/primevue.min.css";



const app = createApp(App);

app.config.globalProperties.$axios = axios;
app.use(router);
app.use(PrimeVue);
app.component('Calendar', Calendar);
app.mount('#app');

