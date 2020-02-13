<template>
    <div>
    <div class="res_profile_bg">
        <!-- ================  ================ -->
        <!-- DESHBOARD USER PROFILE START  -->
        <div class="container">
             <div class="row justify-content-end">
                <div class="col-md-8">
                    <div class="dashboard-user" id="desh-user">
                        <!-- <div class="desh-user-info">
                            <div class="desh-user-img">
                                <img src="assets/img/res1.jpg" alt="restaurant">
                                <div class="change-btn">
                                    <span class="change-img">Change</span>
                                    <input type="file" style="display: none">
                                </div>
                            </div>						
                           
                        </div> -->



                        <Form ref="formCustom" :label-width="80">
                            <FormItem label="Image">
                                <img :src="authUser.image" alt="restaurant">
                            </FormItem>
                            <FormItem label="Name">
                                <Input type="text"></Input>
                            </FormItem>
                            <FormItem label="Email">
                               
                                <Input type="email" number ></Input>
                            </FormItem>
                            <FormItem label="Password">
                                <Input type="password"></Input>
                            </FormItem>
                            <FormItem>
                                <Button type="primary" @click="handleSubmit('formCustom')">Save Change</Button>
                            </FormItem>
                        </Form>

                    </div>
                </div>
            </div>
            <!-- DESHBOARD USER PROFILE END  -->
        </div>
        </div>
        <!-- ================  ================ -->
    </div>
</template>



<script>
    export default {
        data () {
            return {
               
            }
        },
        methods: {

			//  handleSuccessedit(res, file){
			// 	if (res) {
			// 	this.edit_form.image = res
			// 	}
			// },
			
			// async all_city(){
			// 	const res = await this.callApi('get','all_city')
			// 	if(res.status == 200){
			// 		this.city = res.data
			// 	}
			// },
			
			// async add_city(){
			// 	if(this.formItem.name == '') return this.i("City Name is empty!");
			// 	if(this.formItem.image == '') return this.i("City image is empty!");
			// 	const res = await this.callApi('post','add_city',this.formItem)
			// 	if(res.status == 201){
			// 		this.city.push(res.data)
			// 		this.s("New City Added !")
			// 		this.modal1=false
			// 	}
			// 	else{
			// 		this.swr();
			// 	}
			// },

			// async updateCity(){
			// 	if(this.edit_form.name == '') return this.i("City Name is empty!");
			// 	if(this.edit_form.image == '') return this.i("City image is empty!");
			// 	const res = await this.callApi('post','edit_city',this.edit_form)
			// 	if(res.status == 200){
			// 		this.city[this.editIndex] = _.clone(this.edit_form) 
			// 		this.s("City Updated  !")
			// 		let ob ={
			// 			name:'',
			// 			image:'',
			// 			id:'',
			// 		}
			// 		this.edit_form = ob 
			// 		this.editIndex = -1
			// 		this.editModal = false
			// 	}
			// 	else{
			// 		this.swr();
			// 	}
			// },
			// async city_delete(id,index){
			// 	if(!confirm("Are you sure to delete this City")){
			// 		return;
			// 	}
			// 	let ob = {
			// 		id:id
			// 	}
			// 	const res = await this.callApi('post','delete_city',ob)
			// 	if(res.status == 200){
			// 		this.i(' City have been successfully Deleted!')
			// 		this.city.splice(index,1)
			// 	}
			// },
		
			

			// editCity(item,index){
			// 	this.edit_form = _.cloneDeep(item)
			// 	this.editIndex = index
			// 	this.editModal = true
			// },




		},
		created(){
			this.all_city();
		}
    }
</script>




			