<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add Area</Button>
				 <Modal
					v-model="modal1"
					title="Add New Area">
					<!-- ===========Form================ -->
					<Form :model="formItem" :label-width="80">
						<FormItem label="Input">
							<Input v-model="formItem.name" placeholder="Enter something..."></Input>
						</FormItem>
						<FormItem label="Input">
							 <Select v-model="formItem.city_id"  >
								<Option v-for="(item,index) in city" :value="item.id" :key="item.id">
									<div v-if="index == city.length > 1">
										{{ item.name }}
									</div>
								</Option>
							</Select>
						</FormItem>
						 <FormItem>
							<Button type="primary"  @click="add_area">Add</Button>
							<Button style="margin-left: 8px">Cancel</Button>
						</FormItem>
					</Form>

				</Modal>
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">Area</p>

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
							<tr v-for="(item,index) in area" :key="index">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<template  v-if="isEdit && index == editIndex">  <Input v-model="edit_form.name" placeholder="Enter Category..."/></template>
									<span v-else>{{item.name}}</span>
								</td>
								<td>
									<template   v-if="isEdit && index == editIndex">
										<button class="_btn _action_btn view_btn1" @click="updateArea" >Save</button>
										<button class="_btn _action_btn edit_btn1" @click="isEdit = false">Cancel</button>
									</template>
									<template v-else>
										<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
										<button class=" _btn _action_btn make_btn1" @click="area_delete(item.id,index)" >Delete</button>
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
				area:[],
				modal1: false,
				formItem: {
					name: '',
					city_id:''
				},
				edit_form:{
                name:'',
                id:'',
				},
				isEdit:false,
				editIndex:-1,
				city:[]
			}
        },
        methods: {

			async all_areas(){
				const res = await this.callApi('get','all_area')
				if(res.status == 200){
					this.area = res.data
				}
        	},
			async add_area(){
				if(this.formItem.name == '') return this.i("Area Name is empty!");
				const res = await this.callApi('post','add_area',this.formItem)
				if(res.status == 201){
					this.area.push(res.data)
					this.s("New Area Added !")
					this.formItem.name = ''
				}
				else{
					this.swr();
				}
			},
			async updateArea(){
				if(this.edit_form.name == '') return this.i("Area Name is empty!");
				const res = await this.callApi('post','edit_area',this.edit_form)
				if(res.status == 200){
					this.area[this.editIndex] = _.clone(this.edit_form) 
					this.s("Area Updated  !")
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
			async area_delete(id,index){
				if(!confirm("Are you sure to delete this Area")){
					return;
				}
				let ob = {
					id:id
				}
				const res = await this.callApi('post','delete_area',ob)
				if(res.status == 200){
					this.i(' Area have been successfully Deleted!')
					this.area.splice(index,1)
				}
			},
			isEditOn(item,index){
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.isEdit = true
        	}
		

		},
		
		 async created(){
			this.all_areas();
	
			const res = await this.callApi('get','all_city')
			if(res.status == 200){
				this.city = res.data
			}
			else{
				this.swr()
			}
    	}
    }
</script>




			