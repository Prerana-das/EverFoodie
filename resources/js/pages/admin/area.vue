<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add Area</Button>
				<Modal
					v-model="modal1"
					title="Add a new Area"
					:mask-closable="false"
					:closable="false"
				>
					<div class="row">
						<div class="col-6 col-md-6">
							<div class="_3login_input_group">
								<label class="form_label">Area Name</label>
								<Input v-model="formItem.name" placeholder="Enter Area Name..."></Input>
							</div>
						</div>
						<div class="col-12 col-md-12">
							<label class="form_label">Select City</label>
							<Select v-model="formItem.city_id"  >
								<Option v-for="item in city" :value="item.id" :key="item.name">
									{{ item.name }}
								</Option>
							</Select> 
						</div>
					</div>
					<div slot="footer">
						<Button type="default" @click="modal1=false">Close</Button>
						<Button type="primary" @click="add_area">Add Area</Button>
					</div>
				</Modal>
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">

					<p class="_title0">Area</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>#</th>
								<th>Area</th>
								<th>City</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in area" :key="index">
								<td>{{item.id}}</td>
								<td class="_table_name">
									<span>{{item.name}}</span>
								</td>
								<td v-if="item.city">
									<span>{{item.city.name}}</span>
								</td>
								<td>
									<template>
										<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
										<button class=" _btn _action_btn make_btn1" @click="area_delete(item.id,index)" >Delete</button>
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
						title="Edit Area"
						>
						<div class="row">
							<div class="col-6 col-md-6">
								<div class="_3login_input_group">
									<label class="form_label">Area Name</label>
									<Input type="text" v-model="edit_form.name" placeholder="Menu Name"/>
								</div>
							</div>
							<div class="col-6 col-md-6">
								<div class="_3login_input_group">
									<label class="form_label">City Name</label>
										<Select v-model="edit_form.city_id"  >
										<Option v-for="(item , index) in city" :value="item.id" :key="index">
											{{ item.name }}
										</Option>
									</Select> 
								</div>
							</div>
						</div>
						<div slot="footer">
							<Button type="default" @click="editModal=false">Close</Button>
							<Button type="primary" @click="updateArea">Update</Button>
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
				area:[],
				modal1: false,
				editModal:false,
				formItem: {
					name: '',
					city_id:'',
				},
				edit_form:{
					name:'',
					id:'',
					city_id:'',
				},
				// isEdit:false,
				editIndex:-1,
				city:[],
				page: 1,
				total:"7",
				pagination:{},
			}
        },
        methods: {
			async getpaginate(page = 1){
				const res  = await this.callApi('get',`all_area_list?page=${page}&total=${ parseInt(this.total)}`)
				if(res.status == 200){
					this.city = res.data.data
					this.pagination = res.data
				}
				else{
					this.swr()
				}
			},
			async add_area(){
				if(this.formItem.name == '') return this.i("Area Name is empty!");
				const res = await this.callApi('post','add_area',this.formItem)
				if(res.status == 201){
					this.area.push(res.data)
					this.s("New Area Added !")
					this.modal1 = false
					// this.formItem = {}
					// this.listMethod=false
				}
				else{
					this.swr();
				}
			},
			async updateArea(){
				if(this.edit_form.name == '') return this.i("Area Name is empty!");
				 if(this.edit_form.city_id == '') return this.i("City is empty!");
				const res = await this.callApi('post','edit_area',this.edit_form)
				if(res.status == 200){
					//this.area[this.editIndex] = _.clone(this.edit_form) 
					let ind =  this.city.findIndex( v => v.id == this.edit_form.city_id);
					this.area[this.editIndex] = this.edit_form	
					this.area[this.editIndex].city=this.city[ind]
					this.s("Area Updated  !")
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
				//separately clone item
				this.edit_form.id = item.id
				this.edit_form.name = item.name
				this.edit_form.city_id = item.city_id
				
				//this.edit_form=this.item.name
				this.editIndex = index
				this.editModal = true
        	}
		
		},
		 async created(){
			const [res1, res2] = await Promise.all([ 
			this.callApi('get','get_all_city'),
			this.callApi('get',`all_area_list?total=${this.total}`) 
			])
			if(res1.status == 200 && res2.status == 200){
				this.city = res1.data
				this.area = res2.data.data
				this.pagination = res2.data
			}
			else{
				this.swr()
			}
    	}
    }
</script>