<template>
    <div>
     
  		   <!--========== ADMIN SIDE MENU one ========-->
      <div class="_1side_menu">
       <div class="_1side_menu_logo">
          <div class="main_logo">
              <a href="/" >
                <span>Ever</span>Foodie
              </a>
        </div>
          <!--<img src="/img/logo.jpg" style="width: 108px;margin-left: 68px;"/>-->
        </div>

          <!--~~~~~~~~ MENU CONTENT ~~~~~~~~-->
        <div class="_1side_menu_content">
          <div class="_1side_menu_img_name">
            <img class="_1side_menu_img" src="assets/admin_img/admin.jpg" alt="" title="">

            <p class="_1side_menu_name">{{ authUser.name}}</p>
          </div>

            <!--~~~ MENU LIST ~~~~~~-->
        <div class="_1side_menu_list">
          <ul class="_1side_menu_list_ul">
            <li class="_1side_menu_list_li" :class=" $route.path == '/admin' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin">
                <Icon type="ios-speedometer" /> Dashboard 
              </router-link> 
            </li>
            <li class="_1side_menu_list_li" :class=" $route.path == '/admin/city' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin/city">
                <Icon type="logo-twitch" /> City 
              </router-link> 
            </li>
            <li class="_1side_menu_list_li" :class=" $route.path == '/admin/area' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin/area">
                <Icon type="ios-pie" /> Area 
              </router-link> 
            </li>
            <li class="_1side_menu_list_li" :class=" $route.path == '/admin/category' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin/category">
                <Icon type="ios-snow" /> Category 
              </router-link> 
            </li>
            <li class="_1side_menu_list_li" :class=" $route.path == '/admin/admin_restaurant' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin/admin_restaurant">
               <Icon type="ios-restaurant" /> Restaurant 
              </router-link> 
            </li>
            <li class="_1side_menu_list_li" :class=" $route.path == '/admin/food' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin/food">
                <Icon type="md-pizza" /> Food 
              </router-link> 
            </li>
             <li class="_1side_menu_list_li" :class=" $route.path == '/admin/user' ?'_1side_menu_list_ul_active': ''">
              <router-link to="/admin/user">
                <Icon type="md-person" /> User List 
              </router-link> 
            </li>
          </ul>
        </div>
        </div>
      </div>
        <!--========== ADMIN SIDE MENU ========--> 

        <!--========= HEADER ==========-->
      <div class="header">
        <div class="_2menu  _box_shadow">
          <div class="admin_info">
              <Dropdown>
                <a href="javascript:void(0)" class="admin_info_title">
                    {{ authUser.name}}
                    <Icon type="ios-arrow-down"></Icon>
                </a>
                <DropdownMenu slot="list" class="admin_info_list">
                    <DropdownItem>
                      <router-link to="/admin/change_password">
                        Change Password
                        </router-link> 
                    </DropdownItem>
                    <DropdownItem><a href="/logout" >Logout </a></DropdownItem>
                </DropdownMenu>
            </Dropdown>
          </div>
        </div>
      </div>
            <!--========= HEADER ==========-->
    	<router-view/>
    </div>
</template>



<script>
export default {
 data(){
     return{
         //activeName:'/admin'
     }
 },
  created(){
     //this.activeName = this.$route.path
     this.$store.commit('setAuthuser', (window.authUser));
     console.log(this.authInfo)
  },

}
</script>>
