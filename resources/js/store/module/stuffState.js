import appService from "../../services/appService.js";

export const stuff = {
    namespaced: true,
    state : {
        lists: [],
        pagination: [],
        show: {},
    }, 
    getters : {
        lists : function (state) {
            return state.lists;
        },
        paginate : function (state) {
            return state.pagination;
        },
        show : function (state) {
            return state.show;
        }
    },
    actions : {
        lists: function (context, payload) {
            return new Promise((resolve, reject) => {
                let url = `/stuff`;
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
    },
    mutations : {
        
    }
}