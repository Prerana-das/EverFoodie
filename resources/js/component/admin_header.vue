<template>
    <div>
      <div v-if="!isMainSite">

     
  		   <!--========== ADMIN SIDE MENU one ========-->
      <div class="_1side_menu" v-if="flag==1">
       <div class="_1side_menu_logo">
          <div class="main_logo">
              <router-link to="/">
                  <!-- <img src="assets/img/logo.jpg" alt="logo"> -->
                  <span>Ever</span>Foodie
                </router-link>
          </div>
          <!--<img src="/img/logo.jpg" style="width: 108px;margin-left: 68px;"/>-->
        </div>

          <!--~~~~~~~~ MENU CONTENT ~~~~~~~~-->
        <div class="_1side_menu_content">
          <div class="_1side_menu_img_name">
            <img class="_1side_menu_img" src="assets/admin_img/admin.jpg" alt="" title="">

            <p class="_1side_menu_name">Admin</p>
          </div>

            <!--~~~ MENU LIST ~~~~~~-->
        <div class="_1side_menu_list">
          <ul class="_1side_menu_list_ul">
            <li :class="(tab==1)?'_1side_menu_list_ul_active':''" @click="tab=1"><router-link :to="{ name: 'adminNewsOverveiw'}"><Icon type="ios-speedometer" /> Overview </router-link></li>
            
            <li :class="(tab==2)?'_1side_menu_list_ul_active':''" @click="tab=2"><router-link :to="{ name: 'adminMyNews'}"><Icon type="ios-paper-outline" /> City </router-link></li>

            <li :class="(tab==3)?'_1side_menu_list_ul_active':''" @click="tab=3"><router-link :to="{ name: 'adminPostNews'}"><Icon type="md-paper" /> Restaurant </router-link></li>

            <li :class="(tab==4)?'_1side_menu_list_ul_active':''" @click="tab=4"><router-link :to="{ name: 'adminFeatureNews'}"><Icon type="md-copy" /> Food </router-link></li>

            <li :class="(tab==5)?'_1side_menu_list_ul_active':''" @click="tab=5"><router-link :to="{ name: 'adminCardNews'}"><Icon type="md-list-box" />Reviews</router-link></li>


          </ul>
        </div>
        </div>
      </div>
        <!--========== ADMIN SIDE MENU ========--> 

        <!--========= HEADER ==========-->
      <div class="header">
        <div class="_2menu  _box_shadow">
          <div class="_2menu_logo">
            <ul class="open_button">
              <li ><Icon type="ios-list" /></li>
              <!--<li><Icon type="ios-albums" /></li>-->
            </ul>
          </div>

           <ul class="_2menu_main_ul_list_ul">
              <li>
                <p>City</p>
              </li> 
              <li>
                <p>Restaurant</p>
              </li>
              <li>
                <p>Food</p>
              </li> 
              <li>
                <p>Reviews</p>
              </li>
            </ul>


        </div>
      </div>
            <!--========= HEADER ==========-->
    	<!-- <router-view/> -->
    </div>
    </div>
</template>



<script>
export default {
   data(){
     return {
        flag:1,
       isAdmin: true, 
       tab:1,
       isMainSite: false
     }
   },
   created(){
     
   }
}
</script>
