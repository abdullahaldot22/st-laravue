import { createStore } from "vuex";
import { user } from "./module/userState.js";
import { employee } from "./module/employeeState.js";
import { stuff } from "./module/stuffState.js";

export default new createStore({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        user,
        employee,
        stuff,
    }
})