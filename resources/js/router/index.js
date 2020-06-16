import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)


import home from '../pages/user/home.vue'
//import login from '../pages/user/login.vue'
//import register from '../pages/user/register.vue'
// import forgot_password from '../pages/user/forgot_password.vue'
import partner from '../pages/user/partner.vue' 
import restaurant from '../pages/user/restaurant.vue'
import singlerestaurant from '../pages/user/singlerestaurant.vue'
import city_restaurant from '../pages/user/city_restaurant.vue'
import all_restaurants from '../pages/user/all_restaurants.vue'
import profile from '../pages/user/profile.vue'



//Admin
import category from '../pages/admin/category.vue'
import city from '../pages/admin/city.vue'
import area from '../pages/admin/area.vue'
import food from '../pages/admin/food.vue'
import overview from '../pages/admin/overview.vue'
import admin_restaurant from '../pages/admin/admin_restaurant.vue'
import review from '../pages/admin/review.vue'
import user from '../pages/admin/user.vue'
import change_password from '../pages/admin/change_password.vue'
import admin_home from '../pages/admin/admin_home.vue'
import subscription from '../pages/admin/subscription.vue'



//Restaurant
import restaurant_dash from '../pages/restaurant/restaurant_dash.vue'
import restaurant_contactInfo from '../pages/restaurant/restaurant_contactInfo.vue'
import restaurant_profile from '../pages/restaurant/restaurant_profile.vue'
import restaurant_review from '../pages/restaurant/restaurant_review.vue'
import restaurant_food from '../pages/restaurant/restaurant_food.vue'
import restaurant_others from '../pages/restaurant/restaurant_others.vue'
import restaurant_order from '../pages/restaurant/restaurant_order.vue'


//checkout payment_vue
import single_res_checkout from '../pages/user/single_res_checkout.vue'

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

    // {
    //   path: '/login',
    //   name: 'login',
    //   component: login,
    //   meta: {
    //       title: 'login',
    //   }
    // },

    // {
    //   path: '/register',
    //   name: 'register',
    //   component: register,
    //   meta: {
    //       title: 'register',
    //   }
    // },

    // {
    //   path: '/forgot_password',
    //   name: 'forgot_password',
    //   component: forgot_password,
    //   meta: {
    //       title: 'forgot_password',
    //   }
    // },

    {
      path: '/partner',
      name: 'partner',
      component: partner,
      meta: {
          title: 'partner',
      }
    },
    {
      path: '/all_restaurant',
      name: 'restaurant',
      component: restaurant,
      meta: {
          title: 'restaurant',
      }
    },
    {
      path: '/all_restaurants',
      name: 'all_restaurants',
      component: all_restaurants,
      meta: {
          title: 'all_restaurants',
      }
    },
     {
      path: '/singlerestaurant/:id',
      name: 'singlerestaurant',
      component: singlerestaurant,
      meta: {
          title: 'singlerestaurant',
      }
    },
    {
      path: '/city_restaurant/:id',
      name: 'city_restaurant',
      component: city_restaurant,
      meta: {
          title: 'city_restaurant',
      }
    },
    {
      path: '/profile',
      name: 'profile',
      component: profile,
      meta: {
          title: 'profile',
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
      path: '/admin/area',
      name: 'area',
      component: area,
      meta: {
          title: 'area',
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
    {
      path: '/admin/user',
      name: 'user',
      component: user,
      meta: {
          title: 'user',
      }
    },
    {
      path: '/admin/change_password',
      name: 'change_password',
      component: change_password,
      meta: {
          title: 'change_password',
      }
    },
    {
      path: '/admin/subscription',
      name: 'subscription',
      component: subscription,
      meta: {
          title: 'subscription',
      }
    },
    {
      path: '/admin',
      name: 'admin_home',
      component: admin_home,
      meta: {
          title: 'admin_home',
      }
    },
    //restaurant
    {
      path: '/restaurantProfile',
      name: 'restaurant_dash',
      component: restaurant_dash,
      meta: {
          title: 'restaurant_dash',
      }
    },
    {
      path: '/restaurantProfile/restaurant_contactInfo',
      name: 'restaurant_contactInfo',
      component: restaurant_contactInfo,
      meta: {
          title: 'restaurant_contactInfo',
      }
    },
    {
      path: '/restaurantProfile/restaurant_profile',
      name: 'restaurant_profile',
      component: restaurant_profile,
      meta: {
          title: 'restaurant_profile',
      }
    },
    {
      path: '/restaurantProfile/restaurant_review',
      name: 'restaurant_review',
      component: restaurant_review,
      meta: {
          title: 'restaurant_review',
      }
    },

    {
      path: '/restaurantProfile/restaurant_food',
      name: 'restaurant_food',
      component: restaurant_food,
      meta: {
          title: 'restaurant_food',
      }
    },
    {
      path: '/restaurantProfile/restaurant_others',
      name: 'restaurant_others',
      component: restaurant_others,
      meta: {
          title: 'restaurant_others',
      }
    },
    {
      path: '/restaurantProfile/restaurant_order',
      name: 'restaurant_order',
      component: restaurant_order,
      meta: {
          title: 'restaurant_order',
      }
    },
    {
      path: '/checkout/:id',
      name: 'single_res_checkout',
      component: single_res_checkout,
      meta: {
          title: 'single_res_checkout',
      }
    },

    

   
  ],

});
