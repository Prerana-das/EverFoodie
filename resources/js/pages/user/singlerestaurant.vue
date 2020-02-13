<template>
    <div>

    	<div class="container">
			<div class="div">
			<!-- ===================== Restaurant Area Start ======================= -->
			<div class="restaurant_details_banner_area ">
			
				<div class="restaurant_details_banner _padd_t100">
					<img :src="restaurant.image" alt="">
				</div>
				<div class="restaurant_details_title_area">
					<div class="container _padd_0">
						<div class="row">
							<div class="col-md-12">
								<div class="restaurant_details_title_cont">
									<h1 class="restaurant_details_title">{{ restaurant.name }}</h1>
									<span class="block_item">20% Off</span>
									<ul class="restaurant_details_item_list">
										<li>Kabab & Grill</li>
										<li>Asian</li>
										<li>Chicken</li>
										<li>Noodles</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="res_details_discount_area">
					<div class="container _padd_0">
						<div class="row">
							<div class="col-md-12">
								<h1 class="res_details_discount">20% OFF</h1>
								<p>Enjoy 20% Discount on Full Menu</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ===================== Restaurant Area end ======================= -->
			
			<!-- ===================== Restaurant Details Meal Start ======================= -->
			<div class="restaurant_details_meal">
				<div class="container _padd_0">
					<div class="row">
						<div class="col-md-12">
							<ul class="restaurant_details_meal_menu">
								<li>Kabab & Grill</li>
								<li>Asian</li>
								<li>Chicken</li>
								<li>Noodles</li>
								<li>Chicken</li>
								<li>Noodles</li>
							</ul>
							
							<!-- ITem -->
							<ul class="restaurant_details_meal_list">
								<!-- <label class="restaurant_meal_list_label">BREAKFAST</label> -->
								<li class="restaurant_details_meal_item" v-for="(item,index) in restaurant.food" :key="index">
									<div class="restaurant_meal_title">
										{{ item.name }}
									</div>
									<div class="restaurant_meal_price_area">
										<div class="restaurant_meal_price">
											<span class="restaurant_meal_new">BDT {{ item.price }}</span>
											<span class="restaurant_meal_old"><strike>BDT 120.00</strike></span>
										</div>
										<div class="addtocart_option">
											<!-- <ul class="addtocart_option_list">
												<li v-on:click="a--">-</li>
												<li> 
													<span>
													{{ addToA }}
													</span>
												</li>
												<li v-on:click="a++">+</li>
											</ul> -->

											<ul class="addtocart_option_list">
												<li>+</li>
											</ul>
										</div>
									</div>
								</li>
								

								<!-- Payment Modal Start  -->
								<div class="addtocart_area_overlay">
									<div class="addtocart_area">
										<span class="addtocart_toggle">
											<i class="fas fa-times"></i>
										</span>
										<h3 class="addtocart_title">Khichuri, Egg Curry & Water</h3>
										<p class="addtocart_price">BDT 120</p>
										<form action="#">
											<div class="form-box">
												<h3>Special instructions</h3>
												<p>You can write down here any special instructions</p>
												<textarea cols="30" rows="3"></textarea>
											</div>
											<div class="form-box">
												<p class="addcard">
													<span class="card_add">-</span>1 
													<span class="card_minus">+</span>
												</p>
											</div>
											<div class="form-box">
												<button class="block_btn">Place Order</button>
											</div>
										</form>	
									</div>
								</div>
								<!-- Payment Modal End  -->
							</ul>
							<!-- ITem -->

						</div>
					</div>
				</div>
			</div>
			<!-- ===================== Restaurant Details Meal end ======================= -->
			</div>
		</div>

		<!-- ===================== Restaurant checkout end ======================= -->
		<div class="single_restaurant_sidebar _box_shadow">
			<!-- Chcekout -->
			<div class="checkout_area ">
				<div class="checkout_cont">
					<span class="checkout_cont_deliverytime">20 min</span>
					<h3 class="checkout_cont_title">Your order Kababia</h3>
					<p class="checkout_cont_sub">You haven’t added anything to your cart yet! Start adding your favourite dishes</p>
				</div>
				<div class="addcart_items">
					<!-- Item -->
					<ul class="addcart_items_list" v-for="(item,index) in restaurant.food" :key="index" >
						<template>
						<!-- <template v-if="addToA > 0"> -->
						<li>
							<div class="addtocart_option">
								<!-- <ul class="addtocart_option_list">
									<li v-on:click="a--">-</li>
									<li> 
										<span>
										{{ addToA }}
										</span>
									</li>
									<li v-on:click="a++">+</li>
								</ul> -->
							</div>
						</li>
						<li>
							<div class="addcart_items_title">
								<h3>{{ item.name }} </h3>
							</div>
						</li>
						<li>
							<h5 class="addcart_items_price">BDT 120</h5>
						</li>
						</template>
					</ul>
					<!-- Item -->
					
				</div>
				<div class="checkout_list _mar_t20">
					<ul>
						<li class="checkout_list_item">
							<div class="checkout_list_left">
								<p>Subtotal</p>
							</div>
							<div class="checkout_list_right">
								<span>BDT 120</span>
							</div>
						</li>
						<li class="checkout_list_item">
							<div class="checkout_list_left">
								<p>Delivery fee</p>
							</div>
							<div class="checkout_list_right">
								<span>BDT 120</span>
							</div>
						</li>
						<li class="checkout_list_item">
							<div class="checkout_list_left">
								<p><b>Total</b></p>
							</div>
							<div class="checkout_list_right">
								<span>BDT 120</span>
							</div>
						</li>
					</ul>
				</div>
				<button class="block_btn checkout_btnnn">Checkout</button>

			</div>
<!-- 
			<div class="sidebar_bottom_area">
				<div class="sidebar_bottom_item">
					<h3>Opening Hours</h3>
					<h4>11:45AM - 10:30PM</h4>
				</div>
				<div class="sidebar_bottom_item">
					<h3>Everfoodie Hotline</h3>
					<h4>123456789, 05-8837681</h4>
				</div>
			</div> -->

		</div>
		<!-- ===================== Restaurant checkout end ======================= -->


    </div>
 </template>

 <script>
export default {
    data(){
        return{
			restaurant:{},
			food:[],
			// defaultValue:0,
			// a:0,
			carts:[],
			cartadd:{
				id:'',
				name:'',
				price:'',
				amount:'',
			},
			badge:'0',
			quantity:'1',
			totalprice:'0',

        }
    },
    methods :{
        async single_restaurant(){
            const res = await this.callApi('get',`restaurant/${this.$route.params.id}`)
            if(res.status == 200){
                this.restaurant = res.data
            }
		},
		
		// viewCart(){

		// },
		// addCart(){
			
		// },
		// removeCart(){
			
		// },
	},
	
	 computed: {
        // addToA: function(){
		// 	console.log('addToA');
		// 	if('a++'== true){
		// 		return this.defaultValue - this.a;
		// 	}
		// 	else{
		// 		return this.a + this.defaultValue;
		// 	}
            
		// }
	 },

    created(){
        
		this.single_restaurant();
		
		// const res = await this.callApi('get','all_food')
		// 	if(res.status == 200){
		// 		this.food = res.data
		// 	}
		// 	else{
		// 		this.swr()
		// 	}

		this.viewCart();



    }
}
</script>