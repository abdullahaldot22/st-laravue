import appService from "../../services/appService.js";

export const employee = {
    namespaced: true,
    state: {
        lists: [],
        pagination: [],
        show: {}
    },
    getters: {
        lists: function (state) {
            return state.lists;
        },
        pagination: function (state) {
            return state.pagination;
        },
        show: function (state) {
            return state.show;
        },
    },
    actions: {
        lists: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = `/employee`;
                if (payload) {
                    url = url + appService.requestHandler(payload);                    
                }

                axios.get(url).then(response => {
                    context.commit("lists", response.data.data);
                    context.commit('pagination', response.data);
                    resolve(response);
                }).catch(error => {
                    reject(error)
                })
            });
        },
        show: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = `/employee/show/${payload}`;
                axios.get(url).then(response => {
                    context.commit("show", response.data.data);
                    resolve(response);
                }).catch(error => {
                    reject(error);
                })
            });
        }
    },
    mutations: {
        lists: function (state, payload) {
            state.lists = payload;
        },
        pagination: function (state, payload) {
            state.pagination = payload;
        },
        show: function (state, payload) {
            state.show = payload;
        },
    }
}