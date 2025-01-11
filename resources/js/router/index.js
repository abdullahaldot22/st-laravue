import ListComponent from "../components/user/ListComponent.vue";
import {createRouter, createWebHistory} from "vue-router";
import AddComponent from "../components/user/AddComponent.vue";
import ViewComponent from "../components/user/ViewComponent.vue";


const baseRoutes = [
    {
        path: "/",
        component: ListComponent,
        name: "user.list"
    },
    {
        path: "/user/add",
        component: AddComponent,
        name: "user.add"
    },
    {
        path: "/user/edit/:id",
        component: AddComponent,
        name: "user.edit"
    },
    {
        path: "/user/show/:id",
        component: ViewComponent,
        name: "user.view"
    }
]

const routes = baseRoutes.concat();


const router = createRouter({
    linkActiveClass: "active",
    mode: 'history',
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        return { left: 0, top: 0}
    }
});

export default router;
