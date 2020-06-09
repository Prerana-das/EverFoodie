<template>
    <div>
       <div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-3">
						<div class="_1adminOverveiw_card _box_shadow _border_radious _mar_b30 _1adminOverveiw_bg_one">
							<div class="_1adminOverveiw_card_left">
								<p class="_1adminOverveiw_card_left_num">{{totalCity.total}}</p>

								<p class="_1adminOverveiw_card_left_title">Total City</p>
							</div>
							<div class="_1adminOverveiw_card_right">
								<Icon type="ios-paper" />
							</div>
						</div>
					</div>

					<div class="col-12 col-md-3">
						<div class="_1adminOverveiw_card _box_shadow _border_radious _mar_b30 _1adminOverveiw_bg_two">
							<div class="_1adminOverveiw_card_left">
								<p class="_1adminOverveiw_card_left_num">{{totalArea.total}}</p>

								<p class="_1adminOverveiw_card_left_title">Total Area</p>
							</div>
							<div class="_1adminOverveiw_card_right">
								<Icon type="ios-paper-outline" />
							</div>
						</div>
					</div>

					<div class="col-12 col-md-3">
						<div class="_1adminOverveiw_card _box_shadow _border_radious _mar_b30 _1adminOverveiw_bg_two">
							<div class="_1adminOverveiw_card_left">
								<p class="_1adminOverveiw_card_left_num">{{totalFood.total}}</p>

								<p class="_1adminOverveiw_card_left_title">Total Food</p>
							</div>
							<div class="_1adminOverveiw_card_right">
								<Icon type="md-copy" />
							</div>
						</div>
					</div>
					<div class="col-12 col-md-3">
						<div class="_1adminOverveiw_card _box_shadow _border_radious _mar_b30 _1adminOverveiw_bg_two">
							<div class="_1adminOverveiw_card_left">
								<p class="_1adminOverveiw_card_left_num">{{totalUser.total}}</p>

								<p class="_1adminOverveiw_card_left_title">Total User</p>
							</div>
							<div class="_1adminOverveiw_card_right">
								<Icon type="ios-people" />
							</div>
						</div>
					</div>
					<div class="col-12 col-md-3">
						<div class="_1adminOverveiw_card _box_shadow _border_radious _mar_b30 _1adminOverveiw_bg_two">
							<div class="_1adminOverveiw_card_left">
								<p class="_1adminOverveiw_card_left_num">{{totalRestaurant.total}}</p>

								<p class="_1adminOverveiw_card_left_title">Total Restaurant</p>
							</div>
							<div class="_1adminOverveiw_card_right">
								<Icon type="ios-flame" />
							</div>
						</div>
					</div>
				</div>	


				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">All Restaurant</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>Address</th>
								<th>Description</th>
								<th>Phone</th>
								<th>Image</th>
								<th>Avg Cost</th>
								<th>Status</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in totalRestaurantList" :key="index">
								<template>
									<td>{{item.id}}</td>
									<td class="_table_name">
										<span>{{item.name}}</span>
									</td>
									<td>
										<span>{{item.address}}</span>
									</td>
									<td>
										<span>{{item.description}}</span>
									</td>
									<td>
										<span>{{item.phone}}</span>
									</td>

									<td>

										<div class="_1table_img">
											<img :src="item.image" alt="image">
										</div>
									</td>
									<td>
										<span>{{item.cost}}</span>
									</td>
									<td>
										<span>{{item.request_status}}</span>

										<!-- <span v-if="item.request_status=='Pending'"><button @click="changeIt(item,index)">Approve</button></span>
										<span v-if="item.request_status=='Approved'"><button @click="changeIt(item,index)">Pending</button></span> -->
									</td>
								</template>
							</tr>
								<!-- ITEMS -->

						</table>
					</div>
				</div>
				  <div style="text-align:center;" class="pagination_div _mar_t30">
					<Page :current="pagination.current_page" :total="pagination.total" @on-change="getpaginate" :page-size="parseInt(pagination.per_page)" />
				</div>

			</div>
		</div>
    </div>
</template>


<script>
import {mapGetters} from 'vuex'
export default {
	data(){
		return { 
			totalCity:[],
			totalArea:[], 
			totalFood:[],
			totalRestaurant:[],
			totalRestaurantList:[],
			totalUser:[],
			page: 1,
			total:"7",
			pagination:{},
		}
	},

	methods : {
		async getpaginate(page = 1){
			const res  = await this.callApi('get',`all_restaurant_pagi?page=${page}&total=${ parseInt(this.total)}`)
			if(res.status == 200){
				this.totalRestaurant = res.data.data
				this.pagination = res.data
			}
			else{
				this.swr()
			}
		}, 	
	}, 

	async created(){
	const [res1, res2,res3,res4,res5] = await Promise.all([ 
		this.callApi('get',`all_city?total=${this.total}`),
		this.callApi('get',`all_area_list?total=${this.total}`),
		this.callApi('get',`all_food_pagi?total=${this.total}`),
		this.callApi('get',`all_restaurant_pagi?total=${this.total}`),
		this.callApi('get',`total_user?total=${this.total}`),
		])
		if(res1.status == 200 && res2.status == 200 && res3.status == 200 && res4.status == 200 && res5.status == 200) {
			this.totalCity = res1.data
			this.totalArea= res2.data
			this.totalFood= res3.data
			this.totalRestaurant= res4.data
			this.totalRestaurantList= res4.data.data
			this.totalUser= res5.data
		}
		else{
			this.swr()
		}
	}
	
}
</script>