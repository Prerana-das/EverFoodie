<template>
    <div>
       
        

       

         <div class="restaurant_banner ">

            
            <div class="banner_img">
                 <img :src="authUser.image" alt="restaurant">
                
            </div>
            <h1 class="banner_title">{{ authUser.name }}</h1>
        </div>

    </div>
</template>

<script>


export default {
  
  created(){
     
  },

}
</script>