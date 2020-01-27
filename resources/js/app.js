

require('./bootstrap');

window.Vue = require('vue');

import common from './common';
Vue.mixin(common);
import router from './router'
import iView from 'iview';
import 'iview/dist/styles/iview.css';
import locale from 'iview/dist/locale/en-US';
Vue.use(iView, { locale });
import Vue from 'vue';


import store from './store'
import Vuex from 'vuex';
Vue.use(Vuex);
 


Vue.component('master', require('./layout/master.vue').default);
Vue.component('admin_master', require('./layout/admin_master.vue').default);

const app = new Vue({
	router,
	store, 
  el: '#app'
  
});
