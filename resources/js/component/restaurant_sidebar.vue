<template>
    <div>
        <!-- ================== Restaurant Sidebar ================== -->
        
                <div class="dashboard-left">
                    <h2 class="desh-main-title">My Dashboard</h2>
                    <ul class="dashboard-list">
                        <li class="acc acc-dash" :class=" $route.path == '/restaurantProfile/restaurant_dash' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_dash">
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
                                <i class="fab fa-rev"></i> 
                                Food 
                            </router-link>
                        </li>
                        <li class="acc acc-review" :class=" $route.path == '/restaurantProfile/restaurant_review' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_review">
                                <i class="fab fa-rev"></i> 
                                Review List
                            </router-link>
                        </li>
                        <li class="acc acc-contact" :class=" $route.path == '/restaurantProfile/restaurant_contactInfo' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_contactInfo">
                                <i class="far fa-address-card"></i> 
                                Contact Info
                            </router-link>
                        </li>
                        <li class="acc acc-contact" :class=" $route.path == '/restaurantProfile/restaurant_others' ?'dash-active': ''">
                            <router-link to="/restaurantProfile/restaurant_others">
                                <i class="far fa-address-card"></i> 
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