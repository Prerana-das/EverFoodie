<template>
	<div>
		<div class="content">
			<div class="container">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">All User</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Email</th>
								<th>User Type</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in user" :key="index">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<span>{{item.name}}</span>
								</td>
								<td>
									<span>{{item.address}}</span>
								</td>
								<td>
									<span>{{item.phone}}</span>
								</td>
								<td>
									<span>{{item.email}}</span>
								</td>
								<td>
									<span>{{item.user_type}}</span>
									<!-- <template  v-if="isEdit && index == editIndex">
										<Select v-model="edit_form.user_type" class="user_type_select" >
											<Option v-for="item in user_list" :value="item.value" :key="item.value">{{ item.label }}</Option>
										</Select>
									</template> -->
									<template  v-if="isEdit && index == editIndex">
										<Select v-model="edit_form.user_type" class="user_type_select" >
											<Option v-for="item in user_list" :value="item.value" :key="item.value">{{ item.label }}</Option>
										</Select>
									</template>
								</td>
								<td>
									<template   v-if="isEdit && index == editIndex">
										<button class="_btn _action_btn view_btn1" @click="updateUser" >Save</button>
										<button class="_btn _action_btn edit_btn1" @click="isEdit = false">Cancel</button>
									</template>
									<template v-else>
										<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
										<span v-if="item.user_type!=='Admin'">
											<button class=" _btn _action_btn make_btn1" @click="user_delete(item.id,index)" >Delete</button>
										</span>
									</template>
								</td>
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
				edit_form:{
					user_type:'',
                	id:'',
				},
				isEdit:false,
				editIndex:-1,
				imageUrl:'',			
				listMethod:true,
				edit_status:{
					id:'',
					request_status:''
				},
				user_list: [
                    {
                        value: 'User',
                        label: 'User'
                    },
                    {
                        value: 'Restaurant',
                        label: 'Restaurant'
                    }
				],
				page: 1,
				total:"7",
         		pagination:{},
			}
        },
        methods: {
			async getpaginate(page = 1){
				const res  = await this.callApi('get',`all_user_pagi?page=${page}&total=${ parseInt(this.total)}`)
				if(res.status == 200){
					this.user = res.data.data
					this.pagination = res.data
				}
				else{
					this.swr()
				}
			},
			async updateUser(){
				if(this.edit_form.user_type == '') return this.i("User Type is empty!");
				const res = await this.callApi('post','edit_user',this.edit_form)
				if(res.status == 200){
					this.user[this.editIndex] = _.clone(this.edit_form) 
					this.s("User Updated  !")
					let ob ={
						user_type:'',
						id:'',
					}
					this.edit_form = ob 
					this.editIndex = -1
					this.isEdit = false
				}
				else{
					this.swr();
				}
			},

			async user_delete(id,index){
				if(!confirm("Are you sure to delete this User")){
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
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.isEdit = true
			}
			

		},
		
		 async created(){
			const res = await this.callApi('get',`all_user_pagi?total=${this.total}`)
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




			