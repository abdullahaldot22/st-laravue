import './bootstrap';
import '../css/app.css';

import {createApp} from "vue";
import router from './router';
import DefaultComponent from "@/components/Index.vue";

const app = createApp(DefaultComponent);
app.use(router)
app.mount('#app');
