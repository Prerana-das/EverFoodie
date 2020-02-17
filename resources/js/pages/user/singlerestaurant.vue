<template>
    <div>
		<div id="myProduct">

		
    	<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="col-md-2 text-right">
						<div class="modal fade" id="cart">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h2>Your Cart</h2>
										<button class="close" data-dismiss="modal">Close</button>
									</div>
									<div class="modal-body">
										<table>
											<tbody>
												<tr v-for="(cart,n) in carts" :key="n">
													<td>{{ cart.name }}</td>
													<td>{{ cart.price }}</td>
													<td>
														<input type="text" readonly class="form-control" v-model="cart.amount">
													</td>
													<td>
														<button @click="removeCart(n)">Remove</button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="modal-footer">
										totalprice:{{ totalprice }}
										<!-- <button data-dismiss="modal" class="btn btn-success">Checkout</button> -->
										<router-link to="/checkout/single_res_checkout" data-dismiss="modal">
											Checkout
										</router-link>
										<a href="/checkout">
											Checkout
										</a>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



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
											<input type="hidden" v-model="quantity">
											<ul class="addtocart_option_list">
												<li @click="addCart(item)">+</li>
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
				<button class="_mar_t15 cart_btn" data-toggle="modal" data-target="#cart">
					<i class="fas fa-shopping-cart"></i>
					<span class="badge badge-light">{{ badge }}</span>
				</button>
				<div class="addcart_items">
					<!-- Item -->
					<ul class="addcart_items_list" >
						<li>
							<div class="table-wrapper-scroll-y my-custom-scrollbar">
							<table class="table table-striped">
								<tbody>
									<tr v-for="(cart,cartItem) in carts" :key="cartItem">
										<td class="addcart_items_title">{{ cart.name }}</td>
										<td class="addcart_items_price">{{ cart.price }}</td>
										<!-- <td>
											<input type="text" readonly class="form-control" v-model="quantity">
										</td> -->
										<td>
											<!-- <div class="addtocart_option">
												<ul class="addtocart_option_list">
													<li @click="removeCart(cartItem)">-</li>
													<li> 
														<span>
															<input type="text" readonly class="form-control" v-model="cart.amount">
														</span>
													</li>
													<li>+</li>
												</ul>
											</div> -->
											<div class="addtocart_option">
												<ul class="addtocart_option_list">
													<li @click="removeCart(cartItem)">-</li>

													<li @click="storeCartUpdate(cartItem.quantity)">+</li>
												</ul>
												<input type="number" v-model="quantity">
												
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							
							</div>
						</li>
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
								<span>BDT {{ totalprice }}</span>
							</div>
						</li>
						<li class="checkout_list_item">
							<div class="checkout_list_left">
								<p>Delivery fee</p>
							</div>
							<div class="checkout_list_right">
								<span>BDT 00</span>
							</div>
						</li>
						<li class="checkout_list_item">
							<div class="checkout_list_left">
								<p><b>Total</b></p>
							</div>
							<div class="checkout_list_right">
								<span>BDT {{ totalprice }}</span>
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
		
		viewCart(){
			if(localStorage.getItem('carts'))
			{
				this.carts=JSON.parse(localStorage.getItem('carts'));
				this.badge =this.carts.length;
				this.totalprice = this.carts.reduce((total,item)=>{
					// return total + this.quantity * item.price;

					return total + item.amount * item.price;
				},0);
			}
		},
		addCart(item){
			//console.log('addCart');
			let cartadd={}
			cartadd.id= item.id;
			cartadd.name= item.name;
			cartadd.price=item.price;
			cartadd.amount=this.quantity;

			// this.carts.push(this.cartadd);
			// 	//this.cartadd = {};
			// 	this.storeCart();


			let flag = false;
			if(this.carts.length > 0){
				for (let i of this.carts) {     //'in' get only index but 'of' get the full obj
					if( i.id==item.id){
						flag = true
						break;
						//this.storeCartUpdate();
					}
				}
				if(flag == false){
					this.carts.push(cartadd);
					this.storeCart();
				}
		}
		else{
			this.carts.push(cartadd);
			this.storeCart();
			console.log('firsttime');
		}
		},
		removeCart(pro){
			this.carts.splice(pro,1);
			this.storeCart();
		},
		storeCart(pro)
		{
			let parsed = JSON.stringify(this.carts);
			localStorage.setItem('carts',parsed);
			this.viewCart();

			
		},
		storeCartUpdate(item){
			console.log(item);
		}

	},
	
	 computed: {
    
	 },

    created(){
        
		this.single_restaurant();
		
		this.viewCart();

		console.log(this.carts);

    }
}
</script>


<style scoped>
	#myProduct{
		margin-top:50px;
	}

	.cart_btn{
		background-color: #eb2f06;
		color: #fff;
		padding: 6px 15px;
		border: 1px solid #eb2f06;
		border-radius: 2px;
		font-size: 16px;
	}
</style>