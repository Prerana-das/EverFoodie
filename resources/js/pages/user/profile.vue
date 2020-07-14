<template>
    <div>

         <div class="profile_area _pad_tb80">
        <div class="container">
          <div class="row profile_info_area">
            <div class="col-md-6">
              <div class="profile_info">  
                <div class="profile_img">  
                    <img src="assets/img/user-image.png" alt="image" />

                     
                    <!-- <img src="assets/image/user-image.png" alt=""> -->
                </div>
                <div class="profile_cont"> 
                  <h3>{{authUser.name}}</h3>
                  <p>{{authUser.email}}</p>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="see_reports text-right">
                <button class="block_btn"> <router-link to="/report">
                                     See Your Reports
                                    </router-link></button>
              </div>
            </div> -->
          </div>
            <div class="row"> 
              <div class="col-md-6">
                <div class="edit_info_area _mar_t100">
                  <h3 class="_mar_b30 edit_info_title">Edit Information</h3>
                    <div class="edit_info_form">
                      Name:<input type="text" v-model="formItem.name" placeholder="Name">
                      Email:<input type="email" v-model="formItem.email" placeholder="Email">
                      Phone:<input type="text"  v-model="formItem.phone" placeholder="Contact Number">
                      Address:<input type="text"  v-model="formItem.address" placeholder="Address"><br>
                      <button @click="updateUser()" class="block_btn" type="submit" >Save</button>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="edit_info_area _mar_t100">
                  <h3 class="_mar_b30 edit_info_title">Change Password</h3>
                    <div class="edit_password">
                      <div class="form_item">
                        <label>Current Password:</label>
                        <input v-model="passFormItem.current_password" type="password">
                      </div>
                      <div class="form_item">
                        <label>New Password:</label>
                        <input v-model="passFormItem.new_password" type="password">
                      </div>
                      <div class="form_item">
                        <label>Confirm Password:</label>
                        <input v-model="passFormItem.confirm_password" type="password">
                      </div>
                      <button  @click="changePassword()" class="block_btn" type="submit" >Update</button>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="edit_info_area _mar_t100">
                  <h3 class="_mar_b30 edit_info_title"> All Order</h3>

                    <div class="appointment_list _box_shadow" v-for="(item, index) in order" :key="index">
                      <div class="appointment_list_cont">
                         <h3 class="appintment_l_day" v-if="item.order_details">
                            <span v-for="(neww, i) in item.order_details" :key="i">
                                {{ neww.food.name }} <span>({{ neww.quantity }})</span>
                            </span>  
                         </h3>
                          <p class="appintment_l_time">BDT {{item.total_price}}</p>
                         <!--  <p class="appintment_l_time">{{item.id}}</p> -->
                      </div>
                     <div class="appointment_list_cancel " @click="cancelOrder(item, index)">
                       <p>
                        <span><Icon type="md-close" /></span> Cancel 
                       </p>
                     </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                formItem:{
                    name:authUser.name,
                    email:authUser.email,
                    phone:authUser.phone,
                    address:authUser.address,
                    // image:authUser.image,
                    id:authUser.id
                },
                passFormItem: {
					current_password:'',
					new_password:'',
					confirm_password:'',
                },
                order:[],
                user:[],
				 
			}
        },
        methods: {

			async updateUser(){
				//if(this.user_name == '') return this.i("User Type is empty!");
				const res = await this.callApi('post','edit_user',this.formItem)
				if(res.status == 200){
					this.user[this.editIndex] = _.clone(this.formItem) 
					this.s("User Updated  !")
					this.$store.commit('setAuthuser',{
                        image: this.formItem.image
                        });
				}
				else{
					this.swr();
				}
            },
             async changePassword(){
                if(this.passFormItem.current_password.trim()=='' || this.passFormItem.new_password.trim()=='' ||  this.passFormItem.confirm_password.trim()=='' ){
                    
                    this.i("Password con't be empty!");
                    return;
                }
                const res = await this.callApi('post','changePassword',this.passFormItem)
                if(res.status===200){
                    this.s('Password changed successfully!')  
                    window.location = '/logout'
                }
                 else{
                    this.e(res.data.msg)
                }
            },
            async cancelOrder(item, index){
                if(!confirm(" Are you sure to cancel your Order ?")){
                            return;
                        }
                let ob = {
					id:this.order[index].id
				}
                // this.cancelndex = index
                // if(this.order[index].statuses == 'Processing') return this.i("Your order has been Processing. You can't cancel it anymore!!")
                const res = await this.callApi('post','user_order_cancel',ob);
                if (res.status == 200) {
                    this.order.splice(index, 1);
                    this.s('Order canceled successfully!') 
                    }
                },

	
		},
		
		 async created(){
            const [res1, res2] = await Promise.all([ 
                this.callApi('get','all_user'),
                this.callApi('get',`get_user_order?user=${this.authUser.id}`) 
                ])
                if(res1.status == 200 && res2.status == 200){
                    this.user = res1.data
                    this.order= res2.data
                }
                else{
                    this.swr()
                }
            },
	
    }
</script>
