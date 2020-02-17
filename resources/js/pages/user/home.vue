<template>
    <div>
        <!-- ===================== Banner Area Start ======================= -->
        <div class="banner_area">
            <div class="container">
                <div class="row">
                    <div class="main_banner">
                        <h1 class="main_title _mar_b20">Order Takeaway or Delivery Food</h1>
                        <div class="main_search">
                            <form action="#" class="main_search_form">
                                <div class="search_location">
                                    <input type="text" placeholder="Enter Your Address">
                                    <img src="assets/img/location_search.png" alt="">
                                </div>
                                <router-link :to="`/restaurant`">
                                    <input type="submit"  value="Search Restaurant">
                                </router-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== Banner Area End ======================= -->

        <!-- ===================== Partner Area Start ======================= -->
        <div class="partner_area _mar_tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title_area partner_section_title _mar_b30">
                            <h1 class="section_title">You prepare the food, we handle the rest</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="partner_cont">
                            <h2 class="_mar_b10">List your restaurant on everfoodie</h2>
                            <p class="_mar_b15">Would you like thousands of new customers to taste your amazing food? So would we!.</p>
                            <p class="_mar_b15">It's simple: we list your menu online, help you process orders, pick them up, and deliver them to hungry pandas - in a heartbeat!</p>
                            <router-link :to="`/partner`">
                                <button class="block_btn">Get Started</button>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== Partner Area End ======================= -->

        <!-- ===================== City Area Start ======================= -->
        <div class="city_area _padd_tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title_area _mar_b30">
                            <h1 class="section_title">Find Us With City</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Item -->
                    <div class="col-md-3" v-for="(item,index) in city" :key="index">
                        <router-link :to="`/city_restaurant/${item.id}`">
                            <div class="single_city _mar_b30">
                                <a href="restaurant.html">
                                    <div class="city_img">
                                        <img :src="item.image" alt="city">
                                    </div>
                                    <div class="city_title_area">
                                        <h3 class="city_title">{{ item.name }}</h3>
                                    </div>
                                    <div class="city_link">
                                        <a href="#"><i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </a>
                            </div>
                        </router-link>
                    </div>
                    <!-- Item -->
                </div>
            </div>
        </div>
        <!-- ===================== City Area End ======================= -->

        <!-- ===================== Office Area Start ======================= -->
        <div class="office_area _mar_tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_title_area office_section_title _mar_b30">
                            <h1 class="section_title">Take your office out to lunch</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="office_cont">
                            <h2 class="_mar_b10">Foodpanda for business</h2>
                            <p class="_mar_b15">Order lunch, fuel for meetings or late-night deliveries to the office. Your favorite restaurants coming to a desk near you.</p>
                            <a href="#" class="block_btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== Office Area End ======================= -->


        <!-- ===================== About Area Start ======================= -->
        <div class="home_about_area _mar_tb60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home_about">
                            <h2 class="home_about_title _mar_b30">Order food from the best restaurants with everfoodie Bangladesh</h2>
                            <p>Are you hungry? Did you have a long and stressful day? Interested in getting a cheesy pizza delivered to your home or office? Then everfoodie Bangladesh is the right destination for you! everfoodie offers you a long and detailed list of the best restaurants and local favourites near you to help satisfy your hunger through our online food delivery service. Cuisines are diverse: whether you fancy a juicy burger from Takeout, fresh sushi from Samdado or peri peri chicken from Nando's, everfoodie Bangladesh has a wide range of 2000+ restaurants available from Dhaka, to Chittagong through to Sylhet. From a healthy lunch to evening snacks to a hearty dinner, everfoodie provides you with the means to satisfy your cravings throughout the day. Sit back and relax - let everfoodie Bangladesh take the pressure off your shoulders.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== About Area End ======================= -->

    </div>
</template>



<script>
    export default {
        data () {
            return {
				city:[]
            }
        },
        methods: {
			
			async all_city(){
				const res = await this.callApi('get','all_city')
				if(res.status == 200){
					this.city = res.data
				}
			}
			
			
			




		},
		created(){
			this.all_city();
		}
    }
</script>


