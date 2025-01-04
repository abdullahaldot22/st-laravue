import {createStore} from "vuex";
import {user} from "./module/user.js";
import { employee } from "./module/employee.js";

export default new createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        user,
        employee,
    }
})