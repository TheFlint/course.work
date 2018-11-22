import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

new Vue({
    el: '#app',
    data() {
      return {
        info: null
      };
    },
    mounted() {
      axios
        .POST('http://mvcrest.loc/product/read')
        .then(response => (this.info = response));
    }
  });