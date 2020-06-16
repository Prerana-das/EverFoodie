<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add Category</Button>
				 <Modal
					v-model="modal1"
					title="Add a new Category"
					:mask-closable="false"
					:closable="false"
				>
					<div class="row">
						<div class="col-6 col-md-6">
							<div class="_3login_input_group">
								<label class="form_label">Category Name</label>
								<Input v-model="formItem.name" placeholder="Enter Category Name..."></Input>
							</div>
						</div>
					</div>
					<div slot="footer">
						<Button type="default" @click="modal1=false">Close</Button>
						<Button type="primary" @click="add_category">Add Category</Button>
					</div>
				</Modal>
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">Category</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in category" :key="index">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.name" placeholder="Enter Category..."/></template>
									<span v-else>{{item.name}}</span>
								</td>
								<td>
									<!-- <button class="_btn _action_btn edit_btn1" type="button">Edit</button>
									<button @click="category_delete(item.id,index)" class="_btn _action_btn make_btn1" type="button">Delete</button> -->
									<template   v-if="isEdit && index == editIndex">
										<button class="_btn _action_btn view_btn1" @click="updateCategory" >Save</button>
										<button class="_btn _action_btn edit_btn1" @click="isEdit = false">Cancel</button>
									</template>
									<template v-else>
										<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
										<button class=" _btn _action_btn make_btn1" @click="category_delete(item.id,index)" >Delete</button>
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
				 <!--~~~~~~~ TABLE ONE ~~~~~~~~~-->

				<Modal
					v-model="editModal"
					:mask-closable="false"
					:closable="false"
					title="Edit Category"
					>
					<div class="row">
						<div class="col-6 col-md-6">
							<div class="_3login_input_group">
								<label class="form_label">Category Name</label>
								<Input type="text" v-model="edit_form.name" placeholder="Category Name"/>
							</div>
						</div>
						<div class="col-12 col-md-12">
							
						</div>
					</div>
					<div slot="footer">
						<Button type="default" @click="editModal=false">Close</Button>
						<Button type="primary" @click="updateCategory">Update</Button>
					</div>
				</Modal>
			</div>
		</div>
	</div>
</template>



<script>
    export default {
        data () {
            return {
				category:[],
				modal1: false,
				editModal:false,
				formItem: {
                    name: ''
				},
				edit_form:{
					name:'',
					id:'',
				},
				isEdit:false,
				editIndex:-1,
				page: 1,
				total:"7",
				pagination:{},
			}
        },
        methods: {
			async getpaginate(page = 1){
				const res  = await this.callApi('get',`all_category_pagi?page=${page}&total=${ parseInt(this.total)}`)
				if(res.status == 200){
					this.category = res.data.data
					this.pagination = res.data
				}
				else{
					this.swr()
				}
			}, 
			async add_category(){
				if(this.formItem.name == '') return this.i("Category Name is empty!");
				const res = await this.callApi('post','add_category',this.formItem)
				if(res.status == 201){
					this.category.push(res.data)
					this.s("New Category Added !")
					this.modal1=false
					this.formItem = {}
					this.listMethod=false
				}
				else{
					this.swr();
				}
			},
			async updateCategory(){
				if(this.edit_form.name == '') return this.i("Category Name is empty!");
				const res = await this.callApi('post','edit_category',this.edit_form)
				if(res.status == 200){
					this.category[this.editIndex] = _.clone(this.edit_form) 
					this.s("Category Updated  !")
					let ob ={
						name:'',
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
			async category_delete(id,index){
				if(!confirm("Are you sure to delete this Category")){
					return;
				}
				let ob = {
					id:id
				}
				const res = await this.callApi('post','delete_category',ob)
				if(res.status == 200){
					this.i(' Category have been successfully Deleted!')
					this.category.splice(index,1)
				}
				else{
					this.swr();
				}
			},
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.editModal = true
        	}
		

		},
		
		 async created(){
        	const res = await this.callApi('get',`all_category_pagi?total=${this.total}`)
			if(res.status == 200){
				this.category = res.data.data
				this.pagination = res.data

			}
			else{
				this.swr()
			}
    	}
    }
</script>




			