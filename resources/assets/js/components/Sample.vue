<template>
  <div>
    <div>HelloWorld</div>
    {{ this.responseContents }}
    <div v-if="this.receiveResponse"> Thank you! </div>
  </div>
</template>

<style>
  body {
    background-color: #ececec;
  }
</style>

<script>
  import {TOGGLE_STATE, SEND_REQUEST} from '../store/mutation-types';
  export default{
    mounted: function() {
      this.$store.dispatch(SEND_REQUEST, '/api/posts')
    },

    computed: {
      receiveResponse(){
        return this.$store.getters.receiveResponse
      },
      responseContents(){
        return this.$store.getters.responseContents
      }
    }
  }
</script>
