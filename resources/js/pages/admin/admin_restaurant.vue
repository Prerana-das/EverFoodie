<template>
	<div>
		<div class="content">
			<div class="container">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">Restaurant</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>Description</th>
								<th>Image</th>
								<th>Avg Cost</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in restaurant" :key="index">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.name" /></template>
									<span>{{item.name}}</span>
								</td>
								<td>
									<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.description" /></template>
									<span>{{item.description}}</span>
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
									<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.request_status" /></template>
									<span>{{item.request_status}}</span>
									<button @click="changeIt(item,index)">Approved</button>
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
							</tr>
								<!-- ITEMS -->

								<p>{{ request_status}}</p>

						</table>
					</div>
				</div>
				 <Page :total="100" />

			</div>
		</div>
	</div>
</template>



<script>
    export default {
        data () {
            return {
				restaurant:[],
				edit_form:{
					name:'',
                	id:'',
				},
				isEdit:false,
				editIndex:-1,
				imageUrl:'',			
				listMethod:true,
				request_status:'pending',
				 edit_data: {
					request_status:''
				}
			}
        },
        methods: {


		 async changeIt(item,index){
			this.editIndex = index
			
			//this.edit_data.id = item.id
			
			// if(this.edit_data.request_status == 'pending') this.edit_data.request_status = '2'
			// if(this.edit_data.request_status == 'completed') this.edit_data.request_status = '1'
			
			if(this.request_status == 'pending') this.request_status = 'completed'
			
			
            const response = await this.callApi('post', 'changeIt')
            if (response.request_status == 200) {
                this.data[this.editIndex].request_status = response.data.request_status
                this.s('Order status changed')
                this.editIndex = -1
            }else{
                this.swr();
            }
        },

		
			async all_restaurant(){
				const res = await this.callApi('get','all_restaurant')
				if(res.status == 200){
					this.restaurant = res.data
				}
			},
			async updateRestaurant(){
				if(this.edit_form.name == '') return this.i("Restaurant Name is empty!");
				const res = await this.callApi('post','edit_restaurant',this.edit_form)
				if(res.status == 200){
					this.restaurant[this.editIndex] = _.clone(this.edit_form) 
					this.s("Restaurant Updated  !")
					let ob ={
						name:'',
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
			 handleSuccessedit(res, file){
                console.log(res);
                this.imageUrl=res.imageUrl
                this.edit_form.image = res.imageUrl;
			},

			async restaurant_delete(id,index){
				if(!confirm("Are you sure to delete this Restaurant")){
					return;
				}
				let ob = {
					id:id
				}
				const res = await this.callApi('post','delete_restaurant',ob)
				if(res.status == 200){
					this.i(' Restaurant have been successfully Deleted!')
					this.restaurant.splice(index,1)
				}
			},
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.isEdit = true
			}
			

		

		},
		
		 async created(){
			this.all_restaurant();
	
			// const res = await this.callApi('get','all_restaurant')
			// if(res.status == 200){
			// 	this.city = res.data
			// }
			// else{
			// 	this.swr()
			// }
    	}
    }
</script>




			