
<template>
	<div>
    <headerSection/>
      
      
     

      <bannerSection/>
  	  <sidebarSection/>

       <transition name="component-fade" mode="out-in">
          <router-view :key="$route.fullPath"></router-view>
      </transition>

      

    
 
	</div>
</template>


<script>
  import headerSection from '../component/header.vue';
  import bannerSection from '../component/restaurant_banner.vue';
  import sidebarSection from '../component/restaurant_sidebar.vue';

export default {
   components:{
      headerSection,
      bannerSection,
      sidebarSection,

        },


  created(){
     this.$store.commit('setAuthuser', (window.authUser));
  },

}
</script>







<style>
</style>