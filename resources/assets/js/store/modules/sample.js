/**
 * Created by shigeru on 17/03/14.
 */
import * as types from '../mutation-types'
import axios from 'axios'

const state = {
  receive_response: false,
  response_contents: 'Please wait Response...'
};

const getters = {
  receiveResponse: state => state.receive_response,
  responseContents: state => state.response_contents
};

const actions = {
  [types.TOGGLE_STATE] ({commit}, target){
    commit(types.TOGGLE_STATE,target);
  },
  [types.SEND_REQUEST] ({commit}, url){
    console.log("SEND REQUEST:" + url);
    axios.get(url).then(response => {
      console.log("CATCH RESPONSE:" + url);
      commit(types.CHANGE_CONTENTS, {target:'response_contents', contents:response[0]})
      commit(types.TOGGLE_STATE, 'receive_response')
    })
    .catch(error => {
      console.log(error)
    });
  }
};

// mutations
const mutations = {
  [types.TOGGLE_STATE] (state, target){
    state[target] = !state[target];
  },
  [types.CHANGE_CONTENTS] (state, {target, contents}){
    state[target] = contents;
  }
};

export default {
  state,
  getters,
  actions,
  mutations
}