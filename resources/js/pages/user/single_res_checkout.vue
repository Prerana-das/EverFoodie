<template>
    <div>

		
    	<div class="container">
			<div class="row _mar_t100">
				<div class="col-md-8 ">
					<template v-if="delivery_details_area">
						<!-- ========== One ======== -->
						<div class="delivery_details_1 _box_shadow _padd20 _mar_b30">
							<div class="delivery_details_1_title _mar_b10">
								<span class="delivery_details_no">1</span>
								<h3>
									Delivery Details
								</h3>
							</div>
							<div class="delivery_details_1time _mar_b10">
								<h3 class="delivery_details_subtitle">
									Delivery time
									<span class="delivery_time">
									20mins
									</span>
								</h3>
							</div>
							<div class="delivery_details_1address_area _mar_b10">
								<h3 class="delivery_details_subtitle">
									Delivery Address
								</h3>
								
								<div class="delivery_details_1address">
									<ul class="personal_details_list">
										<li class="personal_details_name">
											<span>
												Address:
											</span>
											{{ authUser.address }}
										</li>
										<li>
											<span>
												Note to rider:
											</span>
											Note something
										</li>
									</ul>
									<div class="deliver_details_1edit">
										<Icon type="ios-create-outline" />
									</div>
								</div>
							</div>	
						</div>
						<!-- ========== Two ======== -->
						<div class="delivery_details_2 _box_shadow _padd20 _mar_b30">
							<div class="delivery_details_1_title _mar_b10">
								<span class="delivery_details_no">2</span>
								<h3>
									Personal Details
								</h3>
							</div>
							<div class="personal_details">
								<ul class="personal_details_list">
									<li class="personal_details_name">
										<span>
											Name:
										</span>
										{{ authUser.name }}
									</li>
									<li>
										<span>
											Email:
										</span>
										{{ authUser.email }}
									</li>
									<li>
										<span>
											Phone:
										</span>
										{{ authUser.phone}}
									</li>
								</ul>
							</div>
						</div>
						<!-- ========== Three ======== -->
						<div class="delivery_details_3 _box_shadow _padd20 _mar_b30">
							<div class="delivery_details_1_title _mar_b10">
								<span class="delivery_details_no">2</span>
								<h3>
									Payment
								</h3>
							</div>
							<div class="payment_area">
								<template>
									<Tabs :animated="false">
										<TabPane label="Credit Or Debit Card">
											<div class="payment_img">
												<img src="assets/img/stripe.png" alt="">
											</div>

											<a href="/checkout/stripe">Checkout With Stripe</a>
											<button class="block_btn _mar_t20">Place Order</button>
										</TabPane>
										<TabPane label="Cash On Delivery">
											<p>Simply pay the driver, when he delivers the food to your doorstep.</p>
											
												<!--<FormItem label="Input">
													<Input v-model="formItem.total_price" placeholder="Enter something..."></Input>
												</FormItem> -->
												<button @click="placeOrder" class="block_btn _mar_t20"> Place Order</button>
	
										</TabPane>
									</Tabs>
								</template>
							</div>
						</div>
					</template>

					<template v-else>
						<div class="preparing_food _box_shadow _padd20 _mar_b30">
							<div class="preparing_food_title _mar_b10">
								<p>Estimated Delivery time</p>
								<h3>
									30 mins
								</h3>
							</div>
							<div class="preparing_food_img _mar_b10">
								<img src="assets/img/prepare_food.jpg" alt="">
							</div>
							<p>Preparing your food....</p>
						</div>
					</template>
				</div>
				<div class="col-md-4">
					<div class="order_details_table">
						<div class="table-responsive order_item_table">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th scope="col">Item</th>
										<th scope="col">Name</th>
										<th scope="col">Price</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="cart in carts" v-bind:key="cart.id">
										<th scope="row">{{cart.id}}</th>
										<td>{{ cart.name }}</td>
										<td>{{ cart.price }}</td>
									</tr>
									<tr class="order_item_price">
										<td colspan="2">
										</td>
										<td >
											<ul class="order_item_price_list">
												<li>
													<span>Subtotal: </span>
													<span> BDT {{ total }}</span>
												</li>
												<li>
													<span>Delivery fee: </span>
													<span > BDT 0.00</span>
												</li>
												<li>
													<span>Total: </span>
													<span> BDT {{ total }}</span>
												</li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>



						
					</div>
				</div>
			</div>

		</div>
    </div>
 </template>

 <script>
export default {
    data(){
        return{
			carts:[],
			total:'0',
			formItem: {
				user_id:'',
				total_price: ''
			},
			delivery_details_area:true,
			order:[]

        }
	},
	

    methods :{
        // async single_restaurant(){
        //     const res = await this.callApi('get',`restaurant/${this.$route.params.id}`)
        //     if(res.status == 200){
        //         this.restaurant = res.data
        //     }
		// }, 

		viewCart(){
			if(localStorage.getItem('carts')){
				this.carts=JSON.parse(localStorage.getItem('carts'));
				this.total=this.carts.reduce((total,item)=>{
					return total + item.amount * item.price;
				}, 0);

				localStorage.setItem('total',this.total);
			}
		},

		async placeOrder(){
		
				this.formItem.user_id=authUser.id
				this.formItem.total_price=this.total

				const res = await this.callApi('post','place_order',this.formItem)

			if(res.status == 200){
				//this.order=res.data.order
				 this.order.push(res.data) //prb--you should also check if "this.order" is really defined

				this.s("Order Successful !")
				this.formItem = {}
				this.listMethod=false

				this.delivery_details_area=false
				


			}
			else{
				this.swr();
			}
		}
		
	
	},
	

    created(){
        
		// this.single_restaurant();
		this.viewCart();
		



    }
}
</script>


<style scoped>
.personal_details_name{
	font-weight: 500;
	    text-transform: capitalize;
}


</style>