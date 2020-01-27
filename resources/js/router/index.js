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


//Admin
import category from '../pages/admin/category.vue'
import city from '../pages/admin/city.vue'
import food from '../pages/admin/food.vue'
import overview from '../pages/admin/overview.vue'
import admin_restaurant from '../pages/admin/admin_restaurant.vue'
import review from '../pages/admin/review.vue'


// import auth from '../middleware/auth'
// import log from '../middleware/log'


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
      component: singlerestaurarnt,
      meta: {
          title: 'singlerestaurarnt',
      }
    },


    //admin
    {
      path: '/admin/food',
      name: 'food',
      component: food,
      meta: {
          title: 'food',
          // middleware: log,
      }
    },
    {
      path: '/admin/category',
      name: 'category',
      component: category,
      meta: {
          title: 'category',
      }
    },
    {
      path: '/admin/city',
      name: 'city',
      component: city,
      meta: {
          title: 'city',
      }
    },

    {
      path: '/admin/overview',
      name: 'overview',
      component: overview,
      meta: {
          title: 'overview',
      }
    },

    {
      path: '/admin/admin_restaurant',
      name: 'admin_restaurant',
      component: admin_restaurant,
      meta: {
          title: 'admin_restaurant',
      }
    },
     {
      path: '/admin/review',
      name: 'review',
      component: review,
      meta: {
          title: 'review',
      }
    },
   
  ],

});
