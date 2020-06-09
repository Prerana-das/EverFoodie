<template>
    <div>
        <!-- ================== Restaurant Sidebar ================== -->
        
                <div class="dashboard-left">
                    <div class="dash_profile">
                        <div class="dash_profile_img">
                            <img :src="authUser.image" alt="restaurant">
                        </div>
                       
                       <h1 class="dash_profile_title">{{ authUser.name }}</h1>
                    </div>
                    <ul class="dashboard-list">
                        <li class="acc acc-dash" :class=" $route.path == '/restaurantProfile' ?'dash-active': ''">
                            <router-link to="/restaurantProfile">
                                <i class="fas fa-tachometer-alt"></i>
                                Account Dashboard
                            </router-link>
                        </li>
                        <li class="acc acc-user" :class=" $route.path == '/restaurantProfile/restaurant_profile' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_profile">
                                <i class="fas fa-user"></i> 
                                User Profile
                            </router-link>
                        </li>
                        <li class="acc acc-review" :class=" $route.path == '/restaurantProfile/restaurant_food' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_food">
                                <Icon type="ios-restaurant" />
                                Food 
                            </router-link>
                        </li>
                        <li class="acc acc-review" :class=" $route.path == '/restaurantProfile/restaurant_review' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_review">
                               <Icon type="md-list" />
                                Review List
                            </router-link>
                        </li>
                        <li class="acc acc-contact" :class=" $route.path == '/restaurantProfile/restaurant_contactInfo' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_contactInfo">
                                <Icon type="ios-mail" /> 
                                Contact Info
                            </router-link>
                        </li>
                        <li class="acc acc-contact" :class=" $route.path == '/restaurantProfile/restaurant_order' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_order">
                                <Icon type="ios-folder-open" /> 
                                All Order
                            </router-link>
                        </li>
                        <li class="acc acc-contact" :class=" $route.path == '/restaurantProfile/restaurant_others' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_others">
                                <Icon type="md-copy" />
                                Others
                            </router-link>
                        </li>
                    </ul>
                </div>
        
        <!-- ===================== Restaurant Sidebar ======================= -->  
    </div>
</template>

<script>


export default {
 data(){
     return{
         
     }
 },
  created(){
   
  },

}
</script>