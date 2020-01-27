<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add Category</Button>
				 <Modal
					v-model="modal1"
					title="Add New Category">
					<!-- ===========Form================ -->
					<Form :model="formItem" :label-width="80">
						<FormItem label="Input">
							<Input v-model="formItem.name" placeholder="Enter something..."></Input>
						</FormItem>
						 <FormItem>
							<Button type="primary"  @click="add_category">Add</Button>
							<Button style="margin-left: 8px">Cancel</Button>
						</FormItem>
					</Form>

				</Modal>
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">Category</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>Date</th>
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
				 <Page :total="100" />

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
				formItem: {
                    name: ''
				},
				edit_form:{
                name:'',
                id:'',
				},
				isEdit:false,
				editIndex:-1,
			}
        },
        methods: {

			async all_products(){
				const res = await this.callApi('get','all_category')
				if(res.status == 200){
					this.category = res.data
				}
        	},
			async add_category(){
				if(this.formItem.name == '') return this.i("Category Name is empty!");
				const res = await this.callApi('post','add_category',this.formItem)
				if(res.status == 201){
					this.category.push(res.data)
					this.s("New Category Added !")
					this.formItem.name = ''
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
					this.isEdit = false
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
			},
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.isEdit = true
        	}
		

		},
		
		 created(){
        	this.all_products();
    	}
    }
</script>




			