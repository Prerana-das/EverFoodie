<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-user">
                            <div class="_overflow _table_div _mar_t30">
                                <table class="_table">
                                        <!-- TABLE TITLE -->
                                    <tr>
                                        <th>ID</th>
                                        <th>Total Price</th>
                                        <th>All Item</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                        <!-- TABLE TITLE -->


                                        <!-- ITEMS -->
                                    <tr v-for="(item, i) in order" :key="i">
                                        <td>{{item.id}}</td>
                                        <td>{{item.total_price}}</td>
                                        <td v-if="item.order_details">
                                            <span v-for="(neww, i) in item.order_details" :key="i">
                                                {{ neww.food.name }} <span>({{ neww.quantity }})</span>
                                            </span>
                                        </td>
                                        <td v-if="item.order_details">
                                            <span v-for="(neww, inn) in item.order_details" :key="inn">
                                                {{  neww.payment_method }} 
                                            </span>
                                        </td>
                                        <td>
                                            <button class="_btn _action_btn view_btn1" type="button" @click="viewDetails(item, i)">View Details</button>
                                            <Button type="error" size="small" @click="cancel_order(item, i)">Cancel</Button>			
                                        </td>
                                    </tr>
                                        <!-- ITEMS -->
                                </table>
                            </div>
                            <div style="text-align:center;" class="pagination_div _mar_t30">
                                <Page :current="pagination.current_page" :total="pagination.total" @on-change="getpaginate" :page-size="parseInt(pagination.per_page)" />
                            </div>
                         </div>
                          <Modal
                            v-model="orderDetails"
                            title="Product Details"
                            :mask-closable="false"
                            width="80%"
                            :closable="false"
                            >
                            <div class="_table_responsive _table_div">
                                <table class="_table" rpv="content">
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th> 
                                        <th>Email</th>
                                        <th>Phone</th> 
                                        <th>Special note</th> 
                                    </tr>
                                    <tr>
                                        <td>{{dataDetails.id}}</td>
                                        <td v-if="dataDetails.user">{{dataDetails.user.name}}</td>
                                        <td v-if="dataDetails.user">{{dataDetails.user.email}}</td>
                                        <td v-if="dataDetails.user">{{dataDetails.user.phone}}</td>
                                        <td>{{dataDetails.order_description}}</td>
                                   
                                    </tr>
                                </table>
                                </div>
                            <div slot="footer">
                                <Button type="default" @click="orderDetails=false">Close</Button>
                            </div>
                        </Modal>
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
                formItem:{
					cost:authUser.cost,
                    description:authUser.description,
                    delivery_time:authUser.delivery_time,
                    id:authUser.id
                },
                user:[],
                order:[],
                restaurant:'',
                page:1,
                total:"10",
                pagination: {},
                orderDetails:false,
                dataDetails:{}
				 
			}
        },
        methods: {
			async updateUser(){
				//if(this.user_name == '') return this.i("User Type is empty!");
				const res = await this.callApi('post','edit_user',this.formItem)
				if(res.status == 200){
					this.user[this.editIndex] = _.clone(this.formItem) 
					this.s("User Updated  !")
				}
				else{
					this.swr();
				}
            },
            async getpaginate(page = 1){
                const res  = await this.callApi('get',`get_all_order?page=${page}&restaurant=${this.authUser.id}&total=${ parseInt(this.total)}`)
                if(res.status == 200){
                    this.order = res.data.data
                    this.pagination = res.data
                }
                else{
                    this.swr()
                }
            },
            async cancel_order(item,i){
                if(!confirm("Are you sure to cancel this Order")){
					return;
				}
				let ob = {
                    id:item.id,
                    user_id:item.user_id
				}
				const res = await this.callApi('post','cancel_order',ob)
				if(res.status == 200){
					this.i(' Order have been successfully Canceled!')
					this.order.splice(i,1)
				}
				else{
					this.swr();
				}
            },
            viewDetails(item, i){
                this.dataDetails=item
                this.orderDetails=true
            }

		

		},
		
		 async created(){
			const [res1, res2] = await Promise.all([ 
                this.callApi('get',`restaurant_user?res_id=${this.formItem.id}`),
                this.callApi('get',`get_all_order?restaurant=${this.authUser.id}&&total=${this.total}`) 
                ])
                if(res1.status == 200 && res2.status == 200){
                    this.user = res1.data
                    this.order= res2.data.data
                    this.pagination = res2.data
                }
                else{
                    this.swr()
                }
            },
    }
</script>




