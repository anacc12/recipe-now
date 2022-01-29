import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: {
            status: false,
            username: "",
            id: "",
        },
        userRecipe: {
            user_id: "",
        },
    },
    getters:{},
    actions: {},
    mutations: {
        setUserLoginStatus(state, data) {
            console.log(data);
            state.user.status = data;
            if (data.firstName) {
                state.user.username = data.firstName;
                state.user.id = data.id;
            }
        },
        setUserRecipe(state, data) {
            state.userRecipe.user_id = data;
        }, 
    },

});

export default store;