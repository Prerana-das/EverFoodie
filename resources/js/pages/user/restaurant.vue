<template>
    <div>

    	<!-- ===================== Search Area Start ======================= -->
		<div class="search_res_area _padd_tb60 _padd_t100">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<form action="#">
							<div class="search_restaurant _box_shadow">
								<div class="search">
									<span>
										<i class="fas fa-search"></i>
										<input type="text" v-model="search" placeholder="Search Restaurant">
									</span>
								</div>
								<!-- <div class="filter">
									<span>
										filter <i class="fas fa-chevron-down"></i>
									</span>

									<div class="filter_cont">
										<form action="#">
											<div class="filter_input_box">
												<label for="">BUDGET</label>
											</div>
											<div class="filter_input_box">
												<label for="">OFFERS</label>
											</div>
											<div class="filter_input_box">
												<label for="">CUISINES</label>
											</div>
										</form>
									</div>
								</div> -->
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
		<!-- ===================== Search Area end ======================= -->

		<!-- ===================== Best  Rated Restaurant Area Start ======================= -->
		<!-- <div class="best_restaurant_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section_title_area _mar_b30">
							<h1 class="section_title">Best rated</h1>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="restaurant_slider owl-carousel">
						
							<div class="single_restaurant _mar_b30">
								<a href="singlerestaurant.html">
									<div class="restaurant_img _mar_b10">
										<img src="assets/img/res1.jpg" alt="restaurant">
										<span class="freedelivery">Free Delivery</span>
										<span class="deliverytime">25min</span>
									</div>
									<h4 class="restaurant_title">Kababia</h4>
									<span class="restaurant_rating">
										<i class="fas fa-star"></i>4/5(4)
									</span>
									<p class="restaurant_sub">beef,chicken, noodles, rice, set menukabab & grillasian.</p>
								</a>
							</div>
							<div class="single_restaurant _mar_b30">
								<a href="singlerestaurant.html">
									<div class="restaurant_img _mar_b10">
										<img src="assets/img/res1.jpg" alt="restaurant">
										<span class="freedelivery">Free Delivery</span>
										<span class="deliverytime">25min</span>
									</div>
									<h4 class="restaurant_title">Kababia</h4>
									<span class="restaurant_rating">
										<i class="fas fa-star"></i>4/5(4)
									</span>
									<p class="restaurant_sub">beef,chicken, noodles, rice, set menukabab & grillasian.</p>
								</a>
							</div>
							<div class="single_restaurant _mar_b30">
								<a href="singlerestaurant.html">
									<div class="restaurant_img _mar_b10">
										<img src="assets/img/res1.jpg" alt="restaurant">
										<span class="freedelivery">Free Delivery</span>
										<span class="deliverytime">25min</span>
									</div>
									<h4 class="restaurant_title">Kababia</h4>
									<span class="restaurant_rating">
										<i class="fas fa-star"></i>4/5(4)
									</span>
									<p class="restaurant_sub">beef,chicken, noodles, rice, set menukabab & grillasian.</p>
								</a>
							</div>
							<div class="single_restaurant _mar_b30">
								<a href="singlerestaurant.html">
									<div class="restaurant_img _mar_b10">
										<img src="assets/img/res1.jpg" alt="restaurant">
										<span class="freedelivery">Free Delivery</span>
										<span class="deliverytime">25min</span>
									</div>
									<h4 class="restaurant_title">Kababia</h4>
									<span class="restaurant_rating">
										<i class="fas fa-star"></i>4/5(4)
									</span>
									<p class="restaurant_sub">beef,chicken, noodles, rice, set menukabab & grillasian.</p>
								</a>
							</div>
							<div class="single_restaurant _mar_b30">
								<a href="singlerestaurant.html">
									<div class="restaurant_img _mar_b10">
										<img src="assets/img/res1.jpg" alt="restaurant">
										<span class="freedelivery">Free Delivery</span>
										<span class="deliverytime">25min</span>
									</div>
									<h4 class="restaurant_title">Kababia</h4>
									<span class="restaurant_rating">
										<i class="fas fa-star"></i>4/5(4)
									</span>
									<p class="restaurant_sub">beef,chicken, noodles, rice, set menukabab & grillasian.</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- ===================== Best Rated Restaurant Area End ======================= -->


		<!-- ===================== All Restaurant Area Start ======================= -->
		<div class="restaurant_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section_title_area _mar_b30">
							<h1 class="section_title">All restaurants</h1>
						</div>
					</div>
				</div>
				<div class="row">

					<!-- ITEM -->
					<template v-if="restaurant.length>0">
					<div v-for="(item,index) in filterrestaurant" :key="index" class="col-md-3" v-if="item.request_status=='Approved'">				
						<router-link :to="`/singlerestaurant/${item.id}`">
							<div class="single_restaurant _mar_b30">
								<a href="singlerestaurant.html">
									<div class="restaurant_img _mar_b10">
										<img v-if="item.image" :src="item.image" >
										<span class="freedelivery">Free Delivery</span>
										<span class="deliverytime">25min</span>
									</div>
									<h4 class="restaurant_title">{{ item.name }}</h4>
									<!-- <span class="restaurant_rating">
										<i class="fas fa-star"></i>4/5(4)
									</span> -->
									<p class="restaurant_sub">{{ item.description }}</p>

									
								</a>
							</div>
						</router-link>
					</div>
					<!-- ITEM -->
					</template>
					<template v-else>
						 <Alert show-icon>No restaurants found in this location</Alert>
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
				search:'',
				res_result:true
			}
        },
        methods: {
		
		},
		
		 async created(){

			 ///Search
			 if(this.$route.query.location){
				 console.log(this.$route.query.location)
				
			 }
			const res1 = await this.callApi('get',`getDataBySearch?location=${this.$route.query.location}`)

				if(res1.status == 200){
					this.restaurant = res1.data

				}

	
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
