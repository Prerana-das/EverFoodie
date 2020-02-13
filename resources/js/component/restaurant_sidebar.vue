<template>
    <div>
        <!-- ================== Restaurant Sidebar ================== -->
        
                <div class="dashboard-left">
                    <h2 class="desh-main-title">My Dashboard</h2>
                    <ul class="dashboard-list">
                        <li class="acc acc-dash dash-active">
                            <router-link to="/restaurantProfile/restaurant_dash">
                                <i class="fas fa-tachometer-alt"></i>
                                Account Dashboard
                            </router-link>
                        </li>
                        <li class="acc acc-user">
                            <router-link to="/restaurantProfile/restaurant_profile">
                                <i class="fas fa-user"></i> 
                                User Profile
                            </router-link>
                        </li>
                        <li class="acc acc-review">
                            <router-link to="/restaurantProfile/restaurant_food">
                                <i class="fab fa-rev"></i> 
                                Food 
                            </router-link>
                        </li>
                        <li class="acc acc-review">
                            <router-link to="/restaurantProfile/restaurant_review">
                                <i class="fab fa-rev"></i> 
                                Review List
                            </router-link>
                        </li>
                        <li class="acc acc-contact">
                            <router-link to="/restaurantProfile/restaurant_contactInfo">
                                <i class="far fa-address-card"></i> 
                                Contact Info
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