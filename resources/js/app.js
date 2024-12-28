import './bootstrap';
import '../css/app.css';

import {createApp} from "vue";
import router from './router';
import DefaultComponent from "@/components/Index.vue";
import store from './store';
import axios from 'axios';
import ENV from "./config/env.js";

const API_URL = ENV.API_URL;
axios.defaults.baseURL = API_URL + "/api";

const app = createApp(DefaultComponent);
app.use(router)
app.use(store)
app.mount('#app');
