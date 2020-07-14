<template>
    <div>

    	<!-- ===================== Banner Area Start ======================= -->
        <div class="banner_area">
            <div class="container">
                <div class="row">
                    <div class="main_banner">
                        <h1 class="main_title _mar_b20">
							All Restaurants On Everfoodie				
						</h1>
						
                        <!-- <div class="main_search">
                            <form action="#" class="main_search_form">
                                <div class="search_location">
                                    <input type="text" placeholder="Enter Your Address">
                                    <img src="assets/img/location_search.png" alt="">
                                </div>
                                <input type="submit" value="Search Restaurant">
                            </form>
                        </div> -->

						<div class="search_restaurant _box_shadow">
							<div class="search">
								<span>
									<i class="fas fa-search"></i>
									<input type="text" v-model="search" placeholder="Search  Restaurant">
								</span>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===================== Banner Area End ======================= -->


		<!-- ===================== All Restaurant Area Start ======================= -->
		<div class="restaurant_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section_title_area _mar_b30">
							<h1 class="section_title">All Restaurants</h1>
						</div>
					</div>
				</div>
				<div class="row">

					<!-- ITEM -->
					<template v-if="filterrestaurant.length>0">
						<div v-for="(item,index) in filterrestaurant" :key="index" class="col-md-3" v-if="item.request_status=='Approved' && item.user_type=='Restaurant'">				
							<router-link :to="`/singlerestaurant/${item.id}`">
								<div class="single_restaurant _mar_b30">
									<!-- <a href="singlerestaurant.html"> -->
										<div class="restaurant_img _mar_b10">
											<img v-if="item.image" :src="item.image" >
											<span class="freedelivery">Free Delivery</span>
											<span class="deliverytime" v-if="item.delivery_time!=null">{{ item.delivery_time }} min</span>
										</div>
										<div class="restaurant_cont">
											<h4 class="restaurant_title">{{ item.name }}</h4>
											<span class="restaurant_rating">
												<i class="fas fa-star"></i>
												<span v-if="item.avgreview">
													{{ item.avgreview.avgRating }} / 5
												</span>
											</span>
											<p class="restaurant_sub">{{ item.description }}</p>
										</div>
									<!-- </a> -->
								</div>
							</router-link>
						</div>
					</template>
					<template v-else>
						<Alert class="text-center res_alert">
							There're no available Restaurants.
						</Alert>
					</template>
				</div>
			</div>
		</div>
		<!-- ===================== All Restaurant Area End ======================= -->

    </div>
</template>

<script>
    export default {
        data () {
            return {
				restaurant:[],
				city:[],
				search:''
			}
        },
        methods: {
			

			async all_restaurant(){
				const res = await this.callApi('get','all_restaurant')
				if(res.status == 200){
					this.restaurant = res.data
				}
			}, 

		},
		
		 async created(){
	
			const res = await this.callApi('get','all_city')
			if(res.status == 200){
				this.city = res.data
			}
			else{
				this.swr()
			}

			this.all_restaurant();
		},
		computed:{
			filterrestaurant: function(){
				return this.restaurant.filter((item)=>{
					//return item.name.match(this.search);  // this is case-sensetive
					return item.name.toLowerCase().match(this.search.toLowerCase());
					//return item.description.match(this.search);
				});
			}
		}
    }
</script>


