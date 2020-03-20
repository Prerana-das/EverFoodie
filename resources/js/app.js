

require('./bootstrap');

window.Vue = require('vue');

import common from './common';
Vue.mixin(common);
import router from './router'
import iView from 'iview';
import { createToken, Card } from 'vue-stripe-elements-plus';
import 'iview/dist/styles/iview.css';
import locale from 'iview/dist/locale/en-US';
Vue.use(iView, { locale });
import Vue from 'vue';


import store from './store'
import Vuex from 'vuex';
Vue.use(Vuex);
 


Vue.component('master', require('./layout/master.vue').default);
Vue.component('admin_master', require('./layout/admin_master.vue').default);
Vue.component('restaurant_master', require('./layout/restaurant_master.vue').default);
Vue.component('checkout_master', require('./layout/checkout_master.vue').default);

Vue.component('master_header', require('./layout/master_header.vue').default);
Vue.component('master_footer', require('./layout/master_footer.vue').default);


const app = new Vue({
	router,
	store, 
  el: '#app'
  
});
