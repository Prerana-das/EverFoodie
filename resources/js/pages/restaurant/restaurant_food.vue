<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                         <div class="dashboard-food">
                        <Button class="_mar_b30" type="primary" @click="modal1 = true">Add Food</Button>
                            <Modal
                                v-model="modal1"
                                title="Add a new food"
                                :mask-closable="false"
                                :closable="false"
                            >
                                <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="_3login_input_group">
                                                <label class="form_label">Food Name</label>
                                                <Input v-model="formItem.name" placeholder="Enter food name..."></Input>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="_3login_input_group">
                                                <label class="form_label">Description</label>
                                                <Input v-model="formItem.description" placeholder="Enter description..."></Input>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                             <div class="_3login_input_group">
                                                <label class="form_label">Price</label>
                                                <Input type="number" v-model="formItem.price" placeholder="Enter price..."></Input>
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
                                        <div class="col-12 col-md-12">
                                            <label class="form_label">Select Category</label>
                                            <Select v-model="formItem.category_id"  >
                                                <Option v-for="item in category" :value="item.id" :key="item.name">
                                                    {{ item.name }}
                                                </Option>
                                            </Select> 
                                        </div>
                                        <!-- <div class="col-12 col-md-12">
                                        <Input v-model="formItem.res_id" placeholder="Enter description..."></Input>
                                        </div> -->
                                    </div>
                                    <div slot="footer">
                                        <Button type="default" @click="modal1=false">Close</Button>
                                        <Button type="primary" @click="add_food">Add Food</Button>
                                    </div>
                                </Modal>
                                <template v-if="pagination.total == 0">
                                    <Alert class="text-center _padd15">
                                        <strong>No Data available</strong>
                                    </Alert>
                                </template>
                                <template v-else>
                                    <div class="_overflow _table_div order_table ">
                                        <table class="_table">
                                                <!-- TABLE TITLE -->
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Discount Price</th>
                                                <th>Action</th>
                                            </tr>
                                                <!-- TABLE TITLE -->


                                                <!-- ITEMS -->
                                            
                                            <!-- <tr v-for="(item,index) in food" :key="index" v-if="item.res_id == item.restaurant.id"> -->

                                            <tr v-for="(item,index) in food" :key="index">
                                    
                                                <td>{{ item.id }}</td>
                                                <td class="_table_name">
                                                    {{ item.name }}
                                                </td>
                                                <td> {{ item.description }}</td>
                                                <td>{{ item.price }}</td>
                                                <td>
                                                    <span v-if="item.category">
                                                    {{ item.category.name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <img :src="item.image" alt="image">
                                                </td>
                                                <td>{{ item.discount_price }}</td>
                                                <td>
                                                    <template>
                                                        <button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
                                                        <button class=" _btn _action_btn make_btn1" @click="food_delete(item.id,index)" >Delete</button>
                                                    </template>
                                                </td>
                                            </tr>
                                                
                                                <!-- ITEMS -->
                                        </table>
                                    </div>
                                     <div style="text-align:center;" class="pagination_div _mar_t30">
										<Page :current="pagination.current_page" :total="pagination.total" @on-change="getpaginate" :page-size="parseInt(pagination.per_page)" />
									</div>
                                 </template>
                                   
                                <!-- </template> -->
                                <Modal
                                v-model="editModal"
                                :mask-closable="false"
                                :closable="false"
                                title="Edit Food"
                                >
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <div class="_3login_input_group">
                                            <label class="form_label">Food Name</label>
                                            <Input v-model="edit_form.name" placeholder="Enter Area Name..."></Input>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="_3login_input_group">
                                            <label class="form_label">Description</label>
                                            <Input v-model="edit_form.description" placeholder="Enter description..."></Input>
                                        </div>
                                    </div>
                                        <div class="col-12 col-md-12">
                                            <div class="_3login_input_group">
                                                <label class="form_label">Price</label>
                                                <Input type="number" v-model="edit_form.price" placeholder="Enter price..."></Input>
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
                                     <div class="col-12 col-md-12">
                                         <div class="_3login_input_group">
                                            <label class="form_label"> Discount Price</label>
                                            <Input type="number" v-model="edit_form.discount_price" placeholder="Enter price..."></Input>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form_label">Select Category</label>
                                        <Select v-model="edit_form.category_id"  >
                                            <Option v-for="item in category" :value="item.id" :key="item.id">
                                                {{ item.name }}
                                            </Option>
                                        </Select> 
                                    </div>
                                </div>
                                <div slot="footer">
                                    <Button type="default" @click="editModal=false">Close</Button>
                                    <Button type="primary" @click="updateFood">Update</Button>
                                </div>
                            </Modal>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================  ================ -->
    </div>
</template>





<script>
    export default {
        data () {
            return {
				food:[],
				modal1: false,
				editModal:false,
				formItem: {
                    name: '',
                    description:'',
                    price:'',
                    image:'',
                    category_id:'',
                    res_id:'',
				},
				edit_form:{
                    name: '',
                    description:'',
                    price:'',
                    image:'',
                    discount_price:'',
                    category_id:'',
                    id:''
                },
                imageUrl:'',			
                listMethod:true,
				isEdit:false,
				editIndex:-1,
                category:[],
                page: 1,
                total:"5",
                pagination:{},
			}
        },
        methods: {
            async getpaginate(page = 1){
                const res  = await this.callApi('get',`all_food_of_this_res?restaurant=${this.authUser.id}&page=${page}&total=${ parseInt(this.total)}`)
                if(res.status == 200){
                    this.food = res.data.data
                    this.pagination = res.data
                }
                else{
                    this.swr()
                }
            },
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
			async add_food(){
                if(this.formItem.name.trim() == '') return this.i("Food Name is empty!");
                if(this.formItem.description.trim() == '') return this.i("Food description is empty!");
                if(this.formItem.price == '') return this.i("Food price is empty!");
                if(this.formItem.image == '') return this.i("Food image is empty!");  
                this.formItem.res_id=this.authUser.id;

				const res = await this.callApi('post','add_food',this.formItem)
				if(res.status == 200){
					this.food.push(res.data)
					this.s("New Food Added !");
					this.modal1=false
				}
				else{
					this.swr();
				}
            },
            
			async updateFood(){
				if(this.edit_form.name == '') return this.i("Food Name is empty!");
                if(this.edit_form.description == '') return this.i("Food description is empty!");
                if(this.edit_form.price == '') return this.i("Food price is empty!");
                if(this.edit_form.image == '') return this.i("Food image is empty!");  

				const res = await this.callApi('post','edit_food',this.edit_form)
				if(res.status == 200){
                    this.editModal=false
                    // this.food[this.editIndex] = _.clone(this.edit_form) 
                    this.food[this.editIndex] = res.data
					this.s("Food Updated  !")
					// let ob ={
					// 	name:'',
					// 	id:'',
					// }
					// this.edit_form = ob 
					this.editIndex = -1
					
				}
				else{
					this.swr();
				}
            },
            

			async food_delete(id,index){
				if(!confirm("Are you sure to delete this Food")){
					return;
				}
				let ob = {
					id:id
				}
				const res = await this.callApi('post','delete_food',ob)
				if(res.status == 200){
					this.i(' Area have been successfully Deleted!')
					this.food.splice(index,1)
				}
			},


			isEditOn(item,index){
                // this.edit_form = _.clone(item) 
                this.edit_form.id=this.food[index].id
                this.edit_form.name=this.food[index].name
                this.edit_form.category_id=this.food[index].category_id
                this.edit_form.description=this.food[index].description
                this.edit_form.price=this.food[index].price
                this.edit_form.image=this.food[index].image 
				this.editIndex = index
				this.editModal = true
        	}
		

		},
		
		 async created(){
            const [res1, res2] = await Promise.all([ 
            this.callApi('get','all_category'),
            this.callApi('get',`all_food_of_this_res?restaurant=${this.authUser.id}&&total=${this.total}`)
            ])
            if(res1.status == 200 && res2.status == 200) {
                this.category = res1.data
                this.food= res2.data.data
                this.pagination= res2.data
            }
            else{
                this.swr()
            }
    	}
    }
</script>




			