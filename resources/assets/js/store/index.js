/**
 * Created by shigeru on 17/03/12.
 */
import Vue from 'vue'
import Vuex from 'vuex'
import sample from './modules/sample.js'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    // posts: {
    //   namespaced: true,
    //
    //   state: {},
    //   getters: {},
    //   actions: {},
    //   mutations: {},
    // }
    sample
  }
})