<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add City</Button>
				<Modal
					v-model="modal1"
					title="Add a new City"
					:mask-closable="false"
					:closable="false"
				>
					<div class="row">
						<div class="col-6 col-md-6">
							<div class="_3login_input_group">
								<label class="form_label">City Name</label>
								<Input v-model="formItem.name" placeholder="Enter City Name..."></Input>
							</div>
						</div>
						<div class="col-12 col-md-12">
							<div class="_3login_input_group">
								<label class="form_label">Image</label>
							</div>
							<template>
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
								<Card  span="10" offset="1">
									<div style="text-align:center">
										<img  style="width: 100%;height: auto;" v-if="formItem.image" :src="formItem.image" >
									</div>
								</Card>
							</template> 
						</div>
					</div>
					<div slot="footer">
						<Button type="default" @click="modal1=false">Close</Button>
						<Button type="primary" @click="add_city">Add City</Button>
					</div>
				</Modal>
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">City</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in city" :key="index" v-if="item.id">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<span>{{item.name}}</span>
								</td>
								<td>
									<div class="_1table_img">
										<img :src="item.image" alt="image">
									</div>								
								</td>
								<td>
									<template>
										<button class="_btn _action_btn edit_btn1" @click="editCity(item,index)" >Edit</button>
										<button class=" _btn _action_btn make_btn1" @click="city_delete(item.id,index)" >Delete</button>
									</template>
								</td>
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
										<label class="form_label">City Name</label>
										<Input type="text" v-model="edit_form.name" placeholder="Menu Name"/>
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
								<Button type="primary" @click="updateCity">Update</Button>
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
				city:[],
				modal1: false,
				editModal: false,
				formItem: {
					name: '',
					image:''
				},
				imageUrl:'',			
				listMethod:true,
				edit_form:{
					name:'',
					id:'',
					image:''
				},
				isEdit:false,
				editIndex:-1,
				 page: 1,
				 total:"6",
         		 pagination:{},
            }
        },
        methods: {
			 handleSuccess(res, file){
            
				if (res) {
				this.formItem.image = res
				}
			},

			 handleSuccessedit(res, file){
				if (res) {
				this.edit_form.image = res
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

					this.formItem = {}
					this.listMethod=false
					this.modal1=false
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
						image:'',
						id:'',
					}
					this.edit_form = ob 
					this.editIndex = -1
					this.editModal = false
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
			editCity(item,index){
				this.edit_form = _.cloneDeep(item)
				this.editIndex = index
				this.editModal = true
			},
          async getpaginate(page = 1){
			const res  = await this.callApi('get',`all_city?page=${page}&total=${ parseInt(this.total)}`)
			if(res.status == 200){
				this.city = res.data.data
				this.pagination = res.data
			}
			else{
				this.swr()
			}
		}, 

		},
		async created(){
			const res = await this.callApi('get',`all_city?total=${this.total}`)
			if(res.status == 200){
				this.city = res.data.data
				this.pagination = res.data

			}
			else{
				this.swr()
			}
		}
    }
</script>




			