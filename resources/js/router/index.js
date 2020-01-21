import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)


import home from '../pages/user/home.vue'
import login from '../pages/user/login.vue'
import register from '../pages/user/register.vue'
import forgot_password from '../pages/user/forgot_password.vue'
import partner from '../pages/user/partner.vue'
import restaurant from '../pages/user/restaurant.vue'
import singlerestaurarnt from '../pages/user/singlerestaurarnt.vue'

let Admin = ['Admin'];


export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: home,
      meta: {
          title: 'Home',
      }
    },

    {
      path: '/login',
      name: 'login',
      component: login,
      meta: {
          title: 'login',
      }
    },

    {
      path: '/register',
      name: 'register',
      component: register,
      meta: {
          title: 'register',
      }
    },

    {
      path: '/forgot_password',
      name: 'forgot_password',
      component: forgot_password,
      meta: {
          title: 'forgot_password',
      }
    },

    {
      path: '/partner',
      name: 'partner',
      component: partner,
      meta: {
          title: 'partner',
      }
    },

    {
      path: '/restaurant',
      name: 'restaurant',
      component: restaurant,
      meta: {
          title: 'restaurant',
      }
    },
     {
      path: '/singlerestaurarnt',
      name: 'singlerestaurarnt',
      component: restaurant,
      meta: {
          title: 'singlerestaurarnt',
      }
    },
   
  ],

});
