<template>
	<div>
	

		<div id="myProduct">

		
    	<div class="container">
			<div class="row">
				<div class="col-md-8">
					<Modal
						v-model="modal6"
						title="Your Cart"
						>
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Name</th>
								<th scope="col">Price</th>
								<th scope="col">quantity</th>
								<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(cart,n) in carts" :key="n">
								<th scope="row">{{ cart.name }}</th>
								<td>{{ cart.amount*cart.price }}</td>
								<td>
									<template v-if="editQuantity">
										<template>
											<InputNumber :min="1" v-model="cart.amount"></InputNumber>
										</template>
									</template>
									<template v-else>{{cart.amount}}</template>
								</td>
								<td>
									<Button type="info" @click="edit">Edit</Button>
									<template v-if="editQuantity">
										<Button type="success"  @click="editOff">Save</Button>
									</template>
									<Button type="error" @click="removeCart(n)">Remove</Button>
								</td>
								</tr>
							</tbody>
						</table>
						<div slot="footer">
							<h3 class="_mar_b20">
								Total Price: BDT {{ totalprice }}
							</h3>
							<router-link :to="`/checkout/${restaurant.id}`" >
								<button class="block_btn" @click="modal6 = false">Make your order</button>
							</router-link>
			
						<!-- <Button type="default" @click="modal6 = false">Close</Button> -->
						
						</div>
					</Modal>
					<!-- ===================== Restaurant Area Start ======================= -->
					<div class="restaurant_details_banner_area ">
					
						<div class="restaurant_details_banner _padd_t80">
							<img :src="restaurant.image" alt="">
						</div>
						<div class="restaurant_details_title_area">
							<div class="container _padd_0">
								<div class="row">
									<div class="col-md-12">
										<div class="restaurant_details_title_cont">
											<h1 class="restaurant_details_title">{{ restaurant.name }}</h1>
											<span class="block_item" v-if="restaurant.res_discount!=null">{{restaurant.res_discount}}% Off</span>
											<!-- <ul class="restaurant_details_item_list">
												<li>Kabab & Grill</li>
												<li>Asian</li>
												<li>Chicken</li>
												<li>Noodles</li>
											</ul> -->
										</div>
										<p class="restaurant_description">{{ restaurant.description }}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="res_details_discount_area" v-if="restaurant.res_discount!=null">
							<div class="container _padd_0">
								<div class="row">
									<div class="col-md-12">
										<h1 class="res_details_discount">{{restaurant.res_discount}}% OFF</h1>
										<p>Enjoy {{restaurant.res_discount}}% Discount on Full Menu</p>
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
									<!-- <ul class="restaurant_details_meal_menu">
										<li>Kabab & Grill</li>
										<li>Asian</li>
										<li>Chicken</li>
										<li>Noodles</li>
										<li>Chicken</li>
										<li>Noodles</li>
									</ul> -->
									
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
													<!-- <span class="restaurant_meal_old"><strike>BDT 120.00</strike></span> -->
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
										<!-- <div class="addtocart_area_overlay">
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
										</div> -->
										<!-- Payment Modal End  -->
									</ul>
									<!-- ITem -->

								</div>
							</div>
						</div>
					</div>
					<!-- ===================== Restaurant Details Meal end ======================= -->
				
		
						
					<div class="reviews_area">
						<template>
							<Tabs :animated="false">
								<TabPane label="Review">
									<div class="give_review">
										<!-- Give Reviews -->
											<div class="_give_reviews">
												<p class="_reviews_title">Give Your Review</p>
												<div class="_1rating">
													<ul class="_1rating_list">
														<li class="_give_reviews_text">Your Rating</li>
														<li :class="(review_form.rating > 0)? '_1rating_list_active' : ''" @click="review_form.rating = 1" ><i class="fas fa-star"></i></li>
														<li :class="(review_form.rating > 1)? '_1rating_list_active' : ''" @click="review_form.rating = 2" ><i class="fas fa-star"></i></li>
														<li :class="(review_form.rating > 2)? '_1rating_list_active' : ''" @click="review_form.rating = 3" ><i class="fas fa-star"></i></li>
														<li :class="(review_form.rating > 3)? '_1rating_list_active' : ''" @click="review_form.rating = 4" ><i class="fas fa-star"></i></li>
														<li :class="(review_form.rating > 4)? '_1rating_list_active' : ''" @click="review_form.rating = 5" ><i class="fas fa-star"></i></li>
													</ul>
												</div>

												<div class="_give_reviews_form">
													<p class="_give_label">Your Review</p>

													<div class="_give_text_area_main">
														<textarea class="_textarea_int" v-model="review_form.description" ></textarea>
													</div>

													<button class="block_btn _mar_t20" type="button" @click="insertReview" >SUBMIT</button>
												</div>
											</div>
											<!-- Give Reviews -->
									</div>
								</TabPane>
								<TabPane label="All Review">
									<h2 class="_1title _text_center">ALL Reviews</h2>
									<div class="_comm_re_details" v-if="review_data.length>0"   >
									
										<div class="_comments_items _flex_row _border_color" v-for="(item,index) in review_data" :key="index">
											<div class="_comments_items_pic">
												<img class="_comments_items_img" src="/assets/img/user_img.png" alt="" title="">
											</div>

											<div class="_comments_items_details">
												<p class="_comments_items_name">{{item.user.name}}</p>
											
												<div class="_comments_items_rating">
													<div class="_1rating">
														<ul class="_1rating_list">
															<li :class="(item.rating > 0)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
															<li :class="(item.rating > 1)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
															<li :class="(item.rating > 2)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
															<li :class="(item.rating > 3)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
															<li :class="(item.rating > 4)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
															
														</ul>
													</div>
												</div>
												<p class="_comments_items_status _text">{{item.description}}
												</p>
											</div>

											<div class="_comments_items_date">
												<p class="_comments_items_date_text">{{item.created_at}} </p>
											</div>
										</div>
									</div>
								</TabPane>
							</Tabs>
						</template>
					</div>
				</div>

				<div class="col-md-4">
					<div class="single_restaurant_sidebar _box_shadow">
						
						<!-- Chcekout -->
						<div class="checkout_area ">
							<div class="checkout_cont">
								<span class="checkout_cont_deliverytime">{{restaurant.delivery_time}} min</span>
								<h3 class="checkout_cont_title">Your order from {{ restaurant.name }}</h3>
								<p class="checkout_cont_sub">Start adding your favourite dishes!</p>
							</div>
							<button class="_mar_t15 cart_btn" @click="modal6 = true">
								<i class="fas fa-shopping-cart"></i>
								<span class="badge badge-light">{{ badge }}</span>
							</button>
							<template v-if="carts.length>0">
								<p @click="closeSidebar" class="closeCart" v-if="this.closeClass==false">
									<span>
										Close <i class="fas fa-shopping-cart"></i>
									</span>
								</p>
								<p @click="closeSidebar" class="closeCart" v-if="this.closeClass==true">
									<span>
										Open <Icon type="md-return-right" />
									</span>
								</p>
							</template>
							<template v-if="this.closeClass==false">
								<div class="addcart_items">
									<!-- Item -->
									<ul class="addcart_items_list" >
										<li>
											<!-- <div class="table-wrapper-scroll-y my-custom-scrollbar"> -->
											<table class="table table-striped">
												<tbody>
													<tr v-for="(cart,cartItem) in carts" :key="cartItem">
														<td class="addcart_items_title">{{ cart.name }}</td>
														<td class="addcart_items_price">{{ cart.amount*cart.price }}</td>
														<!-- <td>
															<input type="text" readonly class="form-control" v-model="quantity">
														</td> -->
														<td>
															<div class="addtocart_option">
																<ul class="addtocart_option_list">
																	<li @click="cart_plus(cartItem)">
																		<Icon type="ios-add" />
																		<Icon type="ios-remove" />
																	</li>
																</ul>
																<input type="number" v-model="cart.amount" min=1>
																<span class="cart_cancel" @click="removeCart(cartItem)">
																	<Icon type="md-close" />
																</span>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
											
											<!-- </div> -->
										</li>
									</ul>
									<!-- Item -->
									
								</div>
							</template>
							<!-- <div class="checkout_list _mar_t20">
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
							<button class="block_btn checkout_btnnn">Checkout</button> -->

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ===================== Restaurant checkout end ======================= -->
		
		<!-- ===================== Restaurant checkout end ======================= -->
		</div>
	</div>
</template>

<script>
export default {
	data(){
		return { 
			restaurant:[],
			food:[],
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
			editQuantity: false,
			review_form:{
				rating:0,
				description:'',
			},
			avgRating:0,
			review_data:[],
			single_review:[],
			review_all_data:[],
			modal6:false,
			closeClass:false,
		}
	},

	methods : {
		async insertReview(){
			if(this.review_form.rating == 0){
				return this.i("Please give a rating !")
			}
			if(this.review_form.description == ''){
				return this.i("Please write something  !")
			}
			if(!this.isLoggedIn){
				return this.i("Please Login first  !")
			}
			this.review_form.user_id = authUser.id
			this.review_form.res_id = this.$route.params.id
			const res = await this.callApi('post','reviews',this.review_form)
			if(res.status == 201){
				this.review_data.push(res.data)
				this.s("Review posted Successfully !")
				this.review_form.rating = 0
				this.review_form.description = ''
			} else if (res.status == 401){
				this.e('You are not Login ! Please Login ...')
			}
			else if (res.status == 422){
				this.e('Please Login As a User ...')
			} else{
				this.swr()
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
					
						//this.cart_plus(item);
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
			// console.log('firsttime');
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
		cart_plus(item){
			//console.log(item);
			let parsed = JSON.stringify(this.carts);
			localStorage.setItem('carts',parsed);
			this.viewCart();
		},
		edit(){
			this.editQuantity = true
		},
		editOff(){
			
			//localStorage.setItem('localcart', JSON.stringify(this.carts[0]))
			let parsed = JSON.stringify(this.carts);
			localStorage.setItem('carts',parsed);
			this.editQuantity = false
			this.viewCart();
					
		},
		 async single_restaurant(){
            const res = await this.callApi('get',`restaurant/${this.$route.params.id}`)
            if(res.status == 200){
				this.restaurant = res.data
				 this.review_data = res.data.review
            }
		}, 
		closeSidebar(){
			if(this.closeClass == true) this.closeClass = false
        	else this.closeClass = true
		}
			
	}, 

	created(){
		this.single_restaurant();
		this.viewCart();
	},
	
	
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