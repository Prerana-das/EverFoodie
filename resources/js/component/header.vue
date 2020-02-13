<template>
    <div>
        <!-- ================== Header Area Start ================== -->
        <div class="header_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header_cont">
                            <div class="main_logo">
                                 <a href="/" >
                                    <span>Ever</span>Foodie
                                 </a>
                            </div>
                            <div class="login">
                                <ul class="login_list">
                                    <li v-if="isLoggedIn">
                                        
                                        <Dropdown trigger="click">
                                            <a href="javascript:void(0)" class="login_list_dropdown_menu"> 
                                                <Icon type="md-person" /> 
                                                <span>{{ authUser.name}}</span>
                                                <Icon type="ios-arrow-down"></Icon>
                                            </a>
                                            <DropdownMenu slot="list" class="login_list_dropdown_list">
                                                <DropdownItem>
                                                    <template v-if=" authUser.user_type=='Restaurant'">
                                                        <a href="/restaurantProfile" >
                                                            Profile
                                                        </a>
                                                     </template>
                                                     <template v-if=" authUser.user_type=='User'">
                                                        <a href="/" >
                                                            Profile
                                                        </a>
                                                     </template>
                                                     <template v-if=" authUser.user_type=='Admin'">
                                                        <a href="/admin" >
                                                            Profile
                                                        </a>
                                                     </template>
                                                </DropdownItem>
                                                <DropdownItem>Bookmark</DropdownItem>
                                                <DropdownItem>Review</DropdownItem>
                                                <DropdownItem>
                                                    <a href="/logout" >Logout</a>
                                                </DropdownItem>
                                            </DropdownMenu>
                                        </Dropdown>
                                    </li>
                                    <li v-else>
                                        <div>
                                            <a href="/login" class="login_list_dropdown_menu">
                                               <Icon type="md-person" /> 
                                                <span>Login</span>
                                            </a>
                                        </div>
                                        <!-- <a href="/register">
                                            <img src="assets/img/login.png" alt=""> register 
                                        </a> -->
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
      this.$store.commit('setAuthuser', (window.authUser));
      console.log(this.authInfo)
  },

}
</script>