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
                                        <a href="/login">
                                            <img src="assets/img/login.png" alt=""> Login 
                                        </a>
                                        <a href="/register">
                                            <img src="assets/img/login.png" alt=""> register 
                                        </a>
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