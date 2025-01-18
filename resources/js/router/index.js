import {createRouter, createWebHistory} from "vue-router";

import Home from "@/components/pages/Home.vue";

import AboutRoute from "./modules/AboutRoute";
import EmployeeRoute from "./modules/EmployeeRoute";
import UserRoute from "./modules/UserRoute";
import StuffRoute from "./modules/StuffRoute";

const myRoutes = [
    {
        path : "/",
        name : "home",
        component : Home,
    },
];

const routes = myRoutes.concat(
    AboutRoute,
    EmployeeRoute,
    UserRoute,
    StuffRoute
);

const router = createRouter({
    linkActiveClass: "active",
    mode: 'history',
    routes,
    history: createWebHistory(),
    scrollBehavior() {
        return { left: 0, top: 0}
    }
});

export default router;
