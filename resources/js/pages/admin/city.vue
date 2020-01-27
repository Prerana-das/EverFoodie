<template>
	<div>
		<div class="content">
			<div class="container">
				

				<Button class="_mar_b30" type="primary" @click="modal1 = true">Add City</Button>
				 <Modal
					v-model="modal1"
					title="Common Modal dialog box title">
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
									<Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
									<p>Click or drag image here to upload Product Image</p>
								</div>
							</Upload>
							<Card  span="10" offset="1">
                            <div style="text-align:center">
                                <img  style="width: 100%;height: auto;" v-if="imageUrl" :src="imageUrl" >
                            </div>
                        </Card>
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
								<td class="_table_name">{{item.name}}</td>
								<td><img :src="item.image" alt="image"></td>
								<td>
									<button class="_btn _action_btn view_btn1" type="button">View</button>
									<button class="_btn _action_btn edit_btn1" type="button">Edit</button>
									<button class="_btn _action_btn make_btn2" type="button">Remove Features</button>
									<button class="_btn _action_btn make_btn1" type="button">Delete</button>
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
                listMethod:true
            }
        },
        methods: {
			 handleSuccess(res, file){
                console.log(res);
                this.imageUrl=res.imageUrl
                this.formItem.image = res.imageUrl;
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
			}

		},
		created(){
			this.all_city();
		}
    }
</script>




			