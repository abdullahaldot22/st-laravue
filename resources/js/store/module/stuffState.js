import appService from "../../services/appService.js";

export const user = {
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
        pagination : function (state) {
            return state.pagination;
        },
        show : function (state) {
            return state.show;
        }
    },
    actions : {

    },
    mutations : {
        
    }
}