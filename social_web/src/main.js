// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from "axios";
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.config.productionTip = false
Vue.prototype.$http = axios;
Vue.prototype.$ApiUrl = 'http://127.0.0.1:8000/';

const store = new Vuex.Store({
  state: {
    user: sessionStorage.getItem("user") ? JSON.parse(sessionStorage.getItem("user")) : null
  },
  getters:{
    getUser: state => {
      return state.user
    },
    getToken: state => {
      return state.token
    }
  },
  mutations: {
    setUser(state,n){
      state.user = n
    }
  }
})


/* eslint-disable no-new */
new Vue({
  el: '#app',
  store:store,
  router,
  components: { App },
  template: '<App/>'
})
