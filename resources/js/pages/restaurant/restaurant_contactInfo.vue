<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="desh-user-info">
                            <form action="#">
                                <label >Location:</label>
                                <input type="text" placeholder="Location" value="St,California, United States">
                                <label >Phone:</label>
                                <input type="text" placeholder="Phone" value="+1111264447667">
                                <label >Email:</label>
                                <input type="email" placeholder="Email" value="demo@gmail.com">
                                <button class="block-btn2">Save Change</button>
                            </form>
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
                    category_id:'',
                    id:'',
                },
                imageUrl:'',			
                listMethod:true,
                
				isEdit:false,
				editIndex:-1,
				category:[]
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


			async all_food_of_this_res(){
				const res = await this.callApi('get',`all_food_of_this_res/${authUser.id}`)
				if(res.status == 200){
					this.food = res.data
				}
        	},
			async add_food(){
                if(this.formItem.name == '') return this.i("Food Name is empty!");
                if(this.formItem.description == '') return this.i("Food description is empty!");
                if(this.formItem.price == '') return this.i("Food price is empty!");
                if(this.formItem.image == '') return this.i("Food image is empty!");  
                this.formItem.res_id=this.authUser.id;

				const res = await this.callApi('post','add_food',this.formItem)
				if(res.status == 201){
					this.food.push(res.data)
					this.s("New Food Added !")
					this.modal1 = false
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
					this.food[this.editIndex] = _.clone(this.edit_form) 
					this.s("Food Updated  !")
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
				this.edit_form = _.clone(item) 
				this.editIndex = index
				this.editModal = true
        	}
		

		},
		
		 async created(){
			this.all_food_of_this_res();
	
			const res = await this.callApi('get','all_category')
			if(res.status == 200){
				this.category = res.data
			}
			else{
				this.swr()
			}
    	}
    }
</script>

