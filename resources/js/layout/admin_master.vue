
<template>
	<div>

    <h1>hello</h1>
    <headerSection/>
  		<transition name="component-fade" mode="out-in">
          <router-view :key="$route.fullPath"></router-view>
      </transition>
   
   
 
	</div>


</template>


<script>
  import headerSection from '../component/admin_header.vue'


export default {
   components:{
      headerSection
        },
  created(){
   
  },

}
</script>







<style>

.component-fade-enter-active, .component-fade-leave-active {
  transition: opacity .5s ease;
}
.component-fade-enter, .component-fade-leave-to
/* .component-fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.progress-linear {
    
    position: absolute;
    top: -15px;
   
}
</style>