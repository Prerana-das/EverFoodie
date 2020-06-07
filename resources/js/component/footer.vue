<template>
    <div>
        <!-- ===================== Footer Area Start ======================= -->
         <div class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer_col">
                                <p class="_mar_b10">It is a business that prepares and serves food and drinks to customers.
                                    Providing food and drink services all over the country.
                                </p>
                                <p>Sat - Fri 8:00AM - 12:00AM (No offday)</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_col">
                                <h4>GET IN TOUCH</h4>
                                <ul class="footer_contact">
                                    <li>
                                        <a href="https://www.google.com/maps/place/Sylhet" target=”_blank”>
                                            35 ABC road, Sylhet
                                        </a>
                                    </li>
                                    <li><a href="tel:+012 549 594">+012 549 594</a></li>
                                    <li><a target=”_blank” href="mailto:everfoodie@gmail.com">everfoodie@gmail.com</a></li>
                                    <li><a target=”_blank” href="mailto:supporteverfoodie@gmail.com">supporteverfoodie@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <div class="footer_col">
                                <h4>Services</h4>
                                <ul class="footer_service">
                                    <li><a href="/">Home</a></li>
                                    <li>
                                        <router-link :to="`/partner`">
                                            Partner
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link :to="`/all_restaurants`">
                                            Restaurants
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer_col">
                                <h4>newsletter</h4>
                                <form action="">
                                    <input type="email" placeholder="enter your email"/>
                                    <input type="submit" value="subscribe"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
                            <div class="footer_bottom_con">
                                <p>&copy; Prerana | All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
         <!-- ===================== Footer Area End ======================= -->  
    </div>
</template>

<script>


export default {
  
  created(){
     
  },

}
</script>