import './bootstrap';

import {createApp} from "vue";
import DefaultComponent from "./components/DefaultComponent.vue";
import router from './router';
import store from "./store/index.js";
import ENV from './config/env';


const API_URL = ENV.API_URL;
axios.defaults.baseURL = API_URL +'/api';

const app = createApp(DefaultComponent);
app.use(router)
app.use(store)
app.mount('#app');

