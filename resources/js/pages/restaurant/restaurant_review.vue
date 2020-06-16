<template>
    <div>
        <div class="res_profile_bg">
            <!-- ================  ================ -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="dashboard-review" id="desh-review">
                           <h2 class="_1title _text_center _mar_b30">ALL Reviews</h2>
							<div class="_comm_re_details"  >
								<template v-if="pagination.total == 0">
                                    <Alert class="text-center _padd15">
                                        <strong>No Data available</strong>
                                    </Alert>
                                </template>
								<template v-else>
									<div class="_comments_items _flex_row _border_color" v-for="(item,index) in review_all_data" :key="index">
										<div class="_comments_items_pic">
											<img class="_comments_items_img" src="/assets/img/user_img.png" alt="" title="">
										</div>

										<div class="_comments_items_details">
											<p class="_comments_items_name" v-if="item.user">{{item.user.name}}</p>
										
											<div class="_comments_items_rating">
												<div class="_1rating">
													<ul class="_1rating_list">
														<li :class="(item.rating > 0)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
														<li :class="(item.rating > 1)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
														<li :class="(item.rating > 2)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
														<li :class="(item.rating > 3)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
														<li :class="(item.rating > 4)? '_1rating_list_active' : ''"><i class="fas fa-star"></i></li>
														
													</ul>
												</div>
											</div>
											<p class="_comments_items_status _text">{{item.description}}
											</p>
										</div>

										<div class="_comments_items_date">
											<p class="_comments_items_date_text">{{item.created_at}} </p>
										</div>
									</div>
									<div style="text-align:center;" class="pagination_div _mar_t30">
										<Page :current="pagination.current_page" :total="pagination.total" @on-change="getpaginate" :page-size="parseInt(pagination.per_page)" />
									</div>
								 </template>
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
    data(){
        return{
			review_all_data:[],
			page: 1,
			total:"10",
			pagination:{},
        }
    },
    methods :{
       async getpaginate(page = 1){
			const res  = await this.callApi('get',`all_review?page=${page}&total=${ parseInt(this.total)}`)
			if(res.status == 200){
				this.review_all_data = res.data.data
				this.pagination = res.data
			}
			else{
				this.swr()
			}
		},
	},
    async created(){

        const res = await this.callApi('get',`all_review?restaurant=${this.authUser.id}&total=${this.total}`)
        if(res.status == 200){
			this.review_all_data = res.data.data
			this.pagination = res.data
        }
        else{
            this.swr()
        }
		

    }
}
</script>


<style scoped>

</style>