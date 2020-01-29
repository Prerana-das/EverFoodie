<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add City</Button>
				 <Modal
					v-model="modal1"
					title="Common Modal dialog box title" class="add_table">
					<!-- ===========Form================ -->
					<Form :model="formItem" :label-width="80">
						<FormItem label="Input">
							<Input v-model="formItem.name" placeholder="Enter something..."></Input>
						</FormItem>
						<!-- <FormItem label="Input"> -->
							<Upload
								ref="upload"
								type="drag"
								name="image"
								:show-upload-list="listMethod" 
								:with-credentials="true"
								:data="{id:1}"
								:on-success="handleSuccess"
								:format="['jpg','jpeg','png']"
								:max-size="2048"
								action="/app/upload">
								<div style="padding: 20px 0">
									<Icon type="ios-cloud-upload" size="32" style="color: #3399ff"></Icon>
									<p>Upload Image</p>
								</div>
							</Upload>
							<div style="text-align:center">
								<img  style="width: 100%;height: auto;" v-if="imageUrl" :src="imageUrl" >
							</div>
						<!-- </FormItem> -->
						 <FormItem>
							<Button type="primary"  @click="add_city">Submit</Button>
							<Button style="margin-left: 8px">Cancel</Button>
						</FormItem>
					</Form>

				</Modal>
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">City</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>Date</th>
								<th>Name</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in city" :key="index">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<template  v-if="isEdit && index == editIndex">  
										<Input v-model="edit_form.name" placeholder="Enter City..."/>
									</template>
									<span v-else>{{item.name}}</span>
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
									<template   v-if="isEdit && index == editIndex">
										<button class="_btn _action_btn make_btn2" @click="updateCity" >Save</button>
										<button class="_btn _action_btn edit_btn1" @click="isEdit = false">Cancel</button>
									</template>
									<template v-else>
										<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
										<button class=" _btn _action_btn make_btn1" @click="city_delete(item.id,index)" >Delete</button>
									</template>
								</td>
							</tr>
								<!-- ITEMS -->

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
				city:[],
				modal1: false,
				formItem: {
					name: '',
					image:''
				},
				imageUrl:'',			
				listMethod:true,
				edit_form:{
                name:'',
                id:'',
				},
				isEdit:false,
				editIndex:-1,
            }
        },
        methods: {
			 handleSuccess(res, file){
                console.log(res);
                this.imageUrl=res.imageUrl
                this.formItem.image = res.imageUrl;
			},

			 handleSuccessedit(res, file){
                console.log(res);
                this.imageUrl=res.imageUrl
                this.edit_form.image = res.imageUrl;
			},
			
			async all_city(){
				const res = await this.callApi('get','all_city')
				if(res.status == 200){
					this.city = res.data
				}
			},
			
			async add_city(){
				if(this.formItem.name == '') return this.i("City Name is empty!");
				if(this.formItem.image == '') return this.i("City image is empty!");
				const res = await this.callApi('post','add_city',this.formItem)
				if(res.status == 201){
					this.city.push(res.data)
					this.s("New City Added !")
					//this.$router.push('/')
					window.location='/admin/city'
				}
				else{
					this.swr();
				}
			},

			async updateCity(){
				if(this.edit_form.name == '') return this.i("City Name is empty!");
				if(this.edit_form.image == '') return this.i("City image is empty!");
				const res = await this.callApi('post','edit_city',this.edit_form)
				if(res.status == 200){
					this.city[this.editIndex] = _.clone(this.edit_form) 
					this.s("City Updated  !")
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
			async city_delete(id,index){
				if(!confirm("Are you sure to delete this City")){
					return;
				}
				let ob = {
					id:id
				}
				const res = await this.callApi('post','delete_city',ob)
				if(res.status == 200){
					this.i(' City have been successfully Deleted!')
					this.city.splice(index,1)
				}
			},
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.isEdit = true
        	}

		},
		created(){
			this.all_city();
		}
    }
</script>




			