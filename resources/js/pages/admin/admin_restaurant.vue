<template>
	<div>
		<div class="content">
			<div class="container">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
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
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in user" :key="index">
								<template v-if="item.user_type=='Restaurant'">
									<td>{{item.id}}</td>
									<td class="_table_name">
										<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.name" /></template>
										<span>{{item.name}}</span>
									</td>
									<td>
										<!-- <template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.Address" /></template> -->
										<span>{{item.address}}</span>
									</td>
									<td>
										<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.description" /></template>
										<span>{{item.description}}</span>
									</td>
									<td>
										<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.phone" /></template>
										<span>{{item.phone}}</span>
									</td>

									<td>
										<template  v-if="isEdit && index == editIndex">  
											<Upload
												ref="upload"
												type="drag"
												name="image"
												:show-upload-list="listMethod" 
												:with-credentials="true"
												:data="{id:1}"
												:on-success="handleSuccessedit"
												:format="['jpg','jpeg','png']"
												:max-size="2048"
												action="/app/upload">
												<div>
													<Icon type="ios-cloud-upload" size="22" style="color: #3399ff"></Icon>
													<p>Upload Image</p>
												</div>
											</Upload>
												<div class="preview_upload_img">
													<img  style="width: 100%;height: auto;" v-if="imageUrl" :src="imageUrl" >
												</div>
										</template>
										<div class="_1table_img">
											<img :src="item.image" alt="image">
										</div>
									</td>
									<td>
										<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.cost" /></template>
										<span>{{item.cost}}</span>
									</td>
									<td>
										
										<span>{{item.request_status}}</span>
										<template  v-if="isEdit && index == editIndex">
											<Select v-model="edit_form.request_status" class="user_type_select" >
												<Option v-for="item in status_list" :value="item.value" :key="item.value">{{ item.label }}</Option>
											</Select>
										</template>

										<!-- <span v-if="item.request_status=='Pending'"><button @click="changeIt(item,index)">Approve</button></span>
										<span v-if="item.request_status=='Approved'"><button @click="changeIt(item,index)">Pending</button></span> -->
									</td>
									<td>
										<template   v-if="isEdit && index == editIndex">
											<button class="_btn _action_btn view_btn1" @click="updateRestaurant" >Save</button>
											<button class="_btn _action_btn edit_btn1" @click="isEdit = false">Cancel</button>
										</template>
										<template v-else>
											<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
											<button class=" _btn _action_btn make_btn1" @click="restaurant_delete(item.id,index)" >Delete</button>
										</template>
									</td>
								</template>
							</tr>
								<!-- ITEMS -->

						</table>
					</div>


					<Modal
						v-model="editModal"
							:mask-closable="false"
							:closable="false"
							title="Edit City"
							>
							<div class="row">
								<div class="col-6 col-md-6">
									<div class="_3login_input_group">
										<label class="form_label">Name</label>
										<Input type="text" v-model="edit_form.name" placeholder=" Name"/>
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="_3login_input_group">
										<label class="form_label"> Address</label>
										<Input type="text" v-model="edit_form.address" placeholder="Address"/>
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="_3login_input_group">
										<label class="form_label">Description</label>
										<Input type="text" v-model="edit_form.description" placeholder="Description"/>
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="_3login_input_group">
										<label class="form_label">Phone</label>
										<Input type="text" v-model="edit_form.phone" placeholder="Phone"/>
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="_3login_input_group">
										<label class="form_label">Avg Cost</label>
										<Input type="text" v-model="edit_form.cost" placeholder="Phone"/>
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="_3login_input_group">
										<label class="form_label">Status</label>
										<template>
											<Select v-model="edit_form.request_status" class="user_type_select" >
												<Option v-for="item in status_list" :value="item.value" :key="item.value">{{ item.label }}</Option>
											</Select>
										</template>
									</div>
								</div>
								<div class="col-12 col-md-12">
									<div class="_3login_input_group">
										<label class="form_label">Image</label>			
										<template>	
											<Upload
											ref="upload"
											type="drag"
											name="image"
											:with-credentials="true"
											:data="{id:1}"
											:on-success="handleSuccessedit"
											:format="['jpg','jpeg','png']"
											:max-size="2048"
											action="/app/upload">				
											<div style="padding: 20px 0">
												<Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
												<p>Click or drag files here to upload</p>
											</div>
											</Upload>
											<Card  span="10" offset="1">
												<div style="text-align:center">
													<img  style="width: 100%;height: auto;" v-if="edit_form.image" :src="edit_form.image" >
												</div>
											</Card>
										</template> 
									</div>
								</div>
							</div>
							<div slot="footer">
								<Button type="default" @click="editModal=false">Close</Button>
								<Button type="primary" @click="updateRestaurant">Update</Button>
							</div>
						</Modal>
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
					name:'',
					address:'',
					description:'',
					phone:'',
					id:'',
					image:'',
					request_status:''
				},
				editModal:false,
				// isEdit:false,
				editIndex:-1,
				imageUrl:'',			
				listMethod:true,
				

				status_list: [
                    {
                        value: 'Pending',
                        label: 'Pending'
                    },
                    {
                        value: 'Approved',
                        label: 'Approve'
                    }
				],
				page: 1,
				total:"7",
				pagination:{},
				isEdit:''
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
		//  async changeIt(item,index){
		// 	  	this.editIndex = index;
		// 		this.edit_status.id = item.id;
			
        //         this.edit_status.request_status = item.request_status;
        //         if (this.edit_status.request_status !== 'Pending') this.edit_status.request_status = 'approve';
        //         if (this.edit_status.request_status == 'Pending') this.edit_status.request_status = 'pending';
        
        //         return this.callApi('post', 'changeIt', this.edit_status);
			
		// 		 if (res.status == 200) {
		// 				this.user[this.editIndex].request_status = this.edit_status.request_status;
		// 				this.s('res status changed');
		// 				this.editIndex = -1
		// 		}else{
		// 			this.swr();
		// 		}
		// 	},

			async updateRestaurant(){
				if(this.edit_form.name == '') return this.i("Restaurant Name is empty!");
				if(this.edit_form.address == '') return this.i("Restaurant Address is empty!");
				if(this.edit_form.description == '') return this.i("Restaurant description is empty!");
				if(this.edit_form.phone == '') return this.i("Restaurant Phone Number is empty!");
				if(this.edit_form.image == '') return this.i("Restaurant image is empty!");
				if(this.edit_form.request_status == '') return this.i("Request status is empty!");
				const res = await this.callApi('post','edit_user',this.edit_form)
				if(res.status == 200){
					this.user[this.editIndex] = _.clone(this.edit_form) 
					this.s("Restaurant Updated  !")
					let ob ={
						name:'',
						id:'',
					}
					this.edit_form = ob 
					this.editIndex = -1
					this.editModal= false
				}
				else{
					this.swr();
				}
			},


			 handleSuccessedit(res, file){
                if (res) {
				this.edit_form.image = res
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
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.editModal = true
				// this.isEdit=true
			}
			

		

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




			