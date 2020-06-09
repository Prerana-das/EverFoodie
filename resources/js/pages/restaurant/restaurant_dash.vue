<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-default" id="desh-default">
                            <div class="row">
                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="dashboard-item ">
                                        <h3 class="dashboard-item-title">Total </h3>
                                        <ul class="dashboard-item-list">
                                           <li>{{ allOrder.total }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="dashboard-item">
                                        <h3 class="dashboard-item-title">Total Order</h3>
                                        <ul class="dashboard-item-list">
                                            <li>{{ allOrder.total }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="dashboard-item">
                                        <h3 class="dashboard-item-title">Average Review</h3>
                                        <ul class="dashboard-item-list">
                                            <li>{{ user[0].avgreview.avgRating}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="dashboard-item">
                                        <h3 class="dashboard-item-title">Total Review</h3>
                                        <ul class="dashboard-item-list">
                                           <li>{{ allReview.total }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                user:[],
                allOrder:[],
                allReview:[],
                total:"7",
				 
			}
        },
        methods: {
		},
		
		 async created(){
            const [res1, res2,res3,res4,res5] = await Promise.all([ 
            this.callApi('get',`restaurant_user?res_id=${this.authUser.id}`),
            this.callApi('get',`get_all_order?restaurant=${this.authUser.id}&&total=${this.total}`),
            this.callApi('get',`all_review?total=${this.total}`),
            this.callApi('get',`all_restaurant_pagi?total=${this.total}`),
            this.callApi('get',`total_user?total=${this.total}`),
            ])
            if(res1.status == 200 && res2.status == 200 && res3.status == 200 && res4.status == 200 && res5.status == 200) {
                this.user = res1.data
                this.allOrder= res2.data
                this.allReview= res3.data
                // this.totalRestaurant= res4.data
                // this.totalRestaurantList= res4.data.data
                // this.totalUser= res5.data
            }
            else{
                this.swr()
            }
	
    	}
    }
</script>



