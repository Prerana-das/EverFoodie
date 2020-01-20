

require('./bootstrap');

window.Vue = require('vue');

import common from './common';
Vue.mixin(common);
import router from './router'
import iView from 'iview';
import 'iview/dist/styles/iview.css';
import locale from 'iview/dist/locale/en-US';
Vue.use(iView, { locale });
import Vue from 'vue'
 


Vue.component('master', require('./layout/master.vue').default);

const app = new Vue({
	router,
  el: '#app'
});
