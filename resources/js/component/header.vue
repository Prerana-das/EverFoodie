<template>
    <div>
        <!-- ================== Header Area Start ================== -->
        <div class="header_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header_cont">
                            <div class="main_logo">
                                <router-link to="/">
                                    <span>Ever</span>Foodie
                                 </router-link>
                            </div>
                            <div class="login">
                                <ul class="login_list">
                                    <li v-if="isLoggedIn">
                                        <a href="/logout" >Logout</a>
                                    </li>
                                    <li v-else>
                                        <router-link to="/login">
                                            <img src="assets/img/login.png" alt=""> Login 
                                        </router-link>
                                        <router-link to="/register">
                                            <img src="assets/img/login.png" alt=""> register 
                                        </router-link>
                                    </li>
                                </ul>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== Header Area End ======================= -->  
    </div>
</template>

<script>


export default {
  
  created(){
     
  },

}
</script>