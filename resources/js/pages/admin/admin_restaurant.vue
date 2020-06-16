<template>
	<div>
		<div class="content">
			<div class="container">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">All Restaurant</p>

					<div class="_overflow _table_div res_table">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Address</th>
								<!-- <th>Description</th> -->
								<th>Phone</th>
								<th>Image</th>
								<th>Avg Cost</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in user" :key="index">
								<template v-if="item.user_type=='Restaurant'">
									<td>{{item.id}}</td>
									<td class="_table_name">
										<span>{{item.name}}</span>
									</td>
									<td>
										<span>{{item.address}}</span>
									</td>
									<!-- <td>
										<span>{{item.description}}</span>
									</td> -->
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
									</td>
									<td>
										<span v-if="item.request_status == 'Pending'">
											<button class="_btn _btn_outline_success _btn_sm" @click="previewEdit(item,index)">Mark Approved</button>
										</span>
										<span v-if="item.request_status == 'Approved'">
											<button class="_btn _btn_outline_dark _btn_sm" @click="previewEdit(item,index)">Mark Pending</button>
										</span>
										<button class=" _btn _action_btn make_btn1" @click="restaurant_delete(item.id,index)" >Delete</button>
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
    export default {
        data () {
            return {
				user:[],
				status_list: [
                    {
                        value: 'Pending',
                        label: 'Pending'
                    },
                    {
                        value: 'Approved',
                        label: 'Approved'
                    }
				],
				page: 1,
				total:"7",
				pagination:{},
				edit_data: {
					request_status: "",
				},
			}
        },
        methods: {
		
		async getpaginate(page = 1){
			const res  = await this.callApi('get',`all_restaurant_pagi?page=${page}&total=${ parseInt(this.total)}`)
			if(res.status == 200){
				this.user = res.data.data
				this.pagination = res.data
			}
			else{
				this.swr()
			}
		}, 
			async restaurant_delete(id,index){
				if(!confirm("Are you sure to delete this Restaurant")){
					return;
				}
				let ob = {
					id:id
				}
				const res = await this.callApi('post','delete_user',ob)
				if(res.status == 200){
					this.i(' User have been successfully Deleted!')
					this.user.splice(index,1)
				}
			},
			 async previewEdit(item,index){
				this.edit_data.id=item.id
				if(item.request_status == 'Pending'){
				  this.edit_data.request_status = 'Approved'
				}else{
				  this.edit_data.request_status = 'Pending'
				}
			
			const res = await this.callApi('post', 'update_res_status',this.edit_data)
			if (res.status == 200) {
				this.user[index].request_status = this.edit_data.request_status
				// this.reservationData[this.statusIndes].status = this.edit_data.status
				}
				else{
					this.swr();
				}        
			},
		
			
		},
		
		 async created(){
			const res = await this.callApi('get',`all_restaurant_pagi?total=${this.total}`)
			if(res.status == 200){
				this.user = res.data.data
				this.pagination = res.data

			}
			else{
				this.swr()
			}
	
    	}
    }
</script>




			