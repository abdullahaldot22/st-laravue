import appService from "../../services/appService.js";

export const user = {
    namespaced: true,
    state: {
        lists: [],
        pagination: [],
        show: {},
        temp: {
            temp_id: null,
            isEditing: false,
        },
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
                let url = `/user`;
                if (payload) {
                    url = url + appService.requestHandler(payload);
                }

                axios.get(url).then(response => {
                    context.commit("lists", response.data.data);
                    context.commit("pagination", response.data);
                    resolve(response);
                }).catch(error => {
                    reject(error)
                })
            });
        },
        save: function (context, payload) {
            let method = axios.post;
            let url    = "/user";
            if (context.state.temp.isEditing) {
                method = axios.put;
                url    = `/user/update/${context.state.temp.temp_id}`;
            }

            return new Promise((resolve, reject) => {
                method(url, payload.form).then(res => {
                    context.dispatch('lists', payload.search).then().catch();
                    context.dispatch('reset').then().catch();
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                })
            })
        },
        delete : function (context, payload) {
            let method = axios.delete;
            let url    = `/user/delete/${payload}`;
            
            return new Promise((resolve, reject) => {
                method(url, payload.form).then(res => {
                    context.dispatch('lists', payload.search).then().catch();
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                })
            })
        },
        temp: function (context, payload) {
            context.state.temp.temp_id   = payload;
            context.state.temp.isEditing = true;
        },
        reset: function (context) {
            context.state.temp.temp_id   = null;
            context.state.temp.isEditing = false;
        },
        show: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = `/user/show/${payload}`;
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