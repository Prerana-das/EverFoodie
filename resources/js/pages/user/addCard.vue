<template>
	<div>
		<div class="_content_mix">
			<div class="container">
                <div class="row">
					<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
						<div class="cart-main-area">
							<div class="row">
								<div class="col-12">
									<div class="cart-product-top table-responsive-sm table-responsive-md">
										<table class="" style="width: 100%">
											<thead>
												<tr>
													<th class="product-image"></th>
													<th class="product-name">Product</th>
													<th class="product-price ">Price</th>
													<th class="product-quanity">Quantity</th>
													<th class="product-total">Total</th>
													<th class="product-remove pr-4"></th>
												</tr>
											</thead>
											<tbody>
												<tr class="product-item-details" v-for="(item,index) in cartItem" :key="index" >
													<!-- <td class="product-image">
														<a  class="mr-3" @click="$router.push(`/productDetails/${item.id}`)" >
															<img :src="item.image" alt="">
														</a>
													</td> -->
			
													<td class="product-name pr-4">
														<span class="pr-4">{{item.name}}</span>

														<div class="_1rating">
															<!-- <ul class="_1rating_list" v-if="item.avgreview == null" >
																<li ><i class="fas fa-star"></i></li>
																<li ><i class="fas fa-star"></i></li>
																<li ><i class="fas fa-star"></i></li>
																<li ><i class="fas fa-star"></i></li>
																<li><i class="fas fa-star"></i></li>
																<li class="_1rating_num">(4+)Reiews</li>
															</ul> -->
															<!-- <ul v-else class="_1rating_list">
																<li :class="(item.avgreview.averageRating> 0)? '_1rating_active' : ''"><i class="fas fa-star"></i></li>
																<li :class="(item.avgreview.averageRating> 1)? '_1rating_active' : ''"><i class="fas fa-star"></i></li>
																<li :class="(item.avgreview.averageRating> 2)? '_1rating_active' : ''"><i class="fas fa-star"></i></li>
																<li :class="(item.avgreview.averageRating> 3)? '_1rating_active' : ''"><i class="fas fa-star"></i></li>
																<li :class="(item.avgreview.averageRating> 4)? '_1rating_active' : ''"><i class="fas fa-star"></i></li>
																<li class="_1rating_num">(4+)Reiews</li>
															</ul> -->
														</div>
													</td>
			
													<td class="product-price">
														<template v-if="item.special_price> 0">
															<span class="pr-4 _price_del"> <del>{{item.price}}</del> </span>
															<br>
															<span class="pr-4 _price_withourdel">{{item.special_price}}</span>
														</template>
													
														<template v-else>
															<span class="pr-4">{{item.price}}</span>
														</template>
														
													</td>
			
													<td class="product-quantity">
														<div class="pr-4 product-input" style="width: 130px;">
															<span class="input-group-btn" @click="removeItemQuantity(item,index)" >
																<button class=" btn btn-plus-minus" type="button">
																	<i class="fas fa-minus"></i>
																</button>
															</span>
															<input type="text"  class="input-box-control form-control" @change="addItemQuantityIn(item,index)" placeholder="1" min="1" v-model="item.quantity"  >
															<span class="input-group-btn" @click="addItemQuantity(item,index)">
																<button class=" btn btn-plus-minus" type="button">
																		<i class="fas fa-plus"></i>
																</button>
															</span>
														</div>
													</td>
													<td class="product-total">
														<span v-if="item.special_price > 0">{{ (item.special_price*item.quantity) | toFixedNum}}</span>
														<span v-else>{{ (item.price*item.quantity) | toFixedNum}}</span>
													</td>
													<td class="product-remove" @click="removeCartItem(item.id,index)" >
														<a class="text-right pr-4">
															<i class="fas fa-trash"></i>
														</a>
													</td>
												</tr>
											</tbody>
											<!-- <thead class="d-block d-lg-none d-xl-none">
												<tr>
													<th class="product-image"></th>
													<th class="product-price">Price</th>
													<th class="product-quanity">Quantity</th>
												</tr>
											</thead>
											<tbody class="d-block d-lg-none d-xl-none">
												<tr>
													<td class="product-image"></td>
													<td class="product-price">
														<span class="pr-4">$1,099.00</span>
													</td>
													<td class="product-quanity">
														<div class="pr-4 product-input" style="width: 130px;">
															<span class="input-group-btn">
																<button class=" btn btn-plus-minus" type="button">
																	<i class="fas fa-minus"></i>
																</button>
															</span>
															<input type="text" name="" class="input-box-control form-control" placeholder="1" >
															<span class="input-group-btn">
																<button class=" btn btn-plus-minus" type="button">
																		<i class="fas fa-plus"></i>
																</button>
															</span>
														</div>
													</td>
												</tr>
											</tbody> -->
										</table>
									</div>
								</div>
							</div>
	
							<div class="row align-items-center pt-4">
								<div class="col-6">
									<!-- <div class="return-box">
										<router-link to="/" >
											<i class="fas fa-reply"></i>
											Return to shop
										</router-link>
									</div> -->
								</div>
								<div class="col-6 text-right">
									<button class="btn continue-shop">Continue to Shipping</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
						<div class="summery-main-area">
							<div class="row ">
								<div class="col-12 ">
									<div class="summery-tittle border-bottom">
										<div class="summery-tittle-head">
											<h3>Summery</h3>
										</div>
										<div class="product-quantity quantity-summery text-right">
											<span>{{cartItem.length}} Item</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="summery-body">
										<!-- <div class="summery-body-part-1 product-head-color">
											<div class="row">
												<div class="col-12 border-bottom">
													<div class="row">
														<div class="col-9">
															<h4>product</h4>
														</div>
														<div class="col-3 text-right">
															<h4>total</h4>
														</div>
													</div>
												</div>
											</div>
											<div class="row" v-for="(item,index) in cartItem" :key="index"   >
												<div class="col-9">
													<div class="product-name summery-pro-details">
														<span class="">{{item.name}}</span>
														<strong class="product-quantity">× {{item.quantity}}</strong>
													</div>
												</div>
												<div class="col-3 text-right">
													<div class="product-price summery-pro-details">
														<span v-if="item.special_price>0" >{{(item.special_price*item.quantity) | toFixedNum}}</span>
														<span v-else>{{(item.price*item.quantity) | toFixedNum}}</span>
													</div>
												</div>
											</div>
										</div> -->
										<!-- <div class="summery-body-part-2 product-head-color">
											<div class="row">
												<div class="col-12 border-bottom">
													<div class="row">
														<div class="col-9">
															<h4>Product shipping charge</h4>
														</div>
														<div class="col-3 text-right">
															<h4>amount</h4>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-9">
													<div class="product-name summery-pro-details">
														<span class="">iphone xs max Gold (64GB/128GB/256GB)</span>
														<strong class="product-quantity">× 1</strong>
													</div>
												</div>
												<div class="col-3 text-right">
													<div class="product-price summery-pro-details">
														<span>$1,099.00</span>
													</div>
												</div>
											</div>
										</div> -->
										<div class="summery-body-part-3">
											<div class="row">
												<div class="col-9">
													<span class="summery-amount-details">subtotal</span>
												</div>
												<div class="col-3 text-right">
													<span class="summery-amount-details"><strong>${{totalCost}}</strong></span>
												</div>
											</div>
											<div class="row">
												<div class="col-9">
													<span class="summery-amount-details">tax</span>
												</div>
												<div class="col-3 text-right">
													<span class="summery-amount-details letter-italic">$0.00</span>
												</div>
											</div>
											<div class="row">
												<div class="col-9">
													<span class="summery-amount-details">total shipping</span> 
												</div>
												<div class="col-3 text-right">
													<span class="summery-amount-details letter-italic">$0.00</span>
												</div>
											</div>
											<div class="row">
												<div class="col-9">
													<span class="summery-amount-details"><strong>total</strong></span>
												</div>
												<div class="col-3 text-right">
													<span class="summery-amount-details"><strong>${{totalCost}}</strong></span>
												</div>
											</div>
											<div class="col-6 text-right" >
												<button class="btn continue-shop_Green">Buy Now</button>
											</div>
											
										</div>
									</div>
								</div>
							</div>
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
			form:{
				discount_price:0,
				selling_price:0,
				total_price:0,
				shipping_price:0,
				sub_total:0,
			},
		
	
		
		}
	},
	methods:{
        addItemQuantity(item,index){
			
            this.addQuantity(item,index)  
        },
        addItemQuantityIn(item,index){
				
            this.addQuantity(item,index,item.quantity)  
        },
        removeItemQuantity(item,index){

            this.removeQuantity(item,index)
        },

        removeCartItem(id,index){
            this.removeItem(id,index)
        },
		// async placeOrder(){
		// 	if(!this.isLoggedIn){
		// 		this.i("Please Complete this step!")
		// 		return	this.$router.push('/signUp')
		// 	}
		// 	this.form.selling_price = this.totalCost
		// 	this.form.sub_total = this.totalCost
		// 	this.form.total_price = this.form.selling_price - this.form.discount_price
		// 	// Payment process
		// 	this.form.cartItem = this.cartItem
		// 	const res = await this.callApi('post','order',this.form)
		// 	if(res.status == 201){
		// 		this.s("order Submitted")
		// 		this.s("Please Clear the Payment")
		// 		this.removeAll();
		// 		console.log(res.data)
		// 		return this.$router.push(`/payment/${res.data.id}`)
		// 	}
		// 	else{
		// 		this.swr();
		// 	}
			
		// },
		   
	},
	computed:{
		totalCost(){
			let cost = 0;
			for(let d of this.cartItem){
				let price  = 0
				if(d.special_price >0){
					price = d.special_price*d.quantity
				}
				else price = d.price*d.quantity
				cost = cost + price
			}
			return  cost.toFixed(2)
		}
	},

	created(){
			this.$store.dispatch('user/setHeaderTxt', (-1));
	}
	
}
</script>

<style>
.ontinue-shop_user {
    color: white;
    background: #8cae39;
}
._price_withourdel{
	font-size: 16px;
}
</style>

