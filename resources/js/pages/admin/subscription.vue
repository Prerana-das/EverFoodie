<template>
	<div>
		<div class="content">
			<div class="container">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">All Subscription</p>

						<div class="_overflow _table_div">
							<table class="_table">
									<!-- TABLE TITLE -->
								<tr>
									<th>#</th>
									<th>Email</th>
								</tr>
									<!-- TABLE TITLE -->


									<!-- ITEMS -->
								<tr v-for="(item,index) in subscription" :key="index" v-if="item.id">
									<td>{{item.id}}</td>
									<td class="_table_name">
										<span>{{item.email}}</span>
									</td>
									<!-- <td>
										<template>
											<button class="_btn _action_btn edit_btn1" @click="editCity(item,index)" >Edit</button>
											<button class=" _btn _action_btn make_btn1" @click="city_delete(item.id,index)" >Delete</button>
										</template>
									</td> -->
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
    export default {
        data () {
            return {
				subscription:[],
				 page: 1,
				 total:"6",
         		 pagination:{},
            }
        },
        methods: {
		
          async getpaginate(page = 1){
			const res  = await this.callApi('get',`all_subscription?page=${page}&total=${ parseInt(this.total)}`)
			if(res.status == 200){
				this.subscription = res.data.data
				this.pagination = res.data
			}
			else{
				this.swr()
			}
		}, 

		},
		async created(){
			const res = await this.callApi('get',`all_subscription?total=${this.total}`)
			if(res.status == 200){
				this.subscription = res.data.data
				this.pagination = res.data

			}
			else{
				this.swr()
			}
		}
    }
</script>




			