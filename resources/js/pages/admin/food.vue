<template>
	<div>
		<div class="content">
			<div class="container">
				
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Food Item</p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>#</th>
								<th>Restaurant Name</th>
								<th>Food Name</th>
								<th>Description</th>
								<th>Price</th>
								<th>Category</th>
								<th>Image</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(item,index) in food" :key="index">
								<td>{{ item.id }}</td>
								<td class="_table_name">
									{{ item.restaurant.name }}
								</td>
								<td class="_table_name">
									{{ item.name }}
								</td>
								<td> {{ item.description }}</td>
								<td>{{ item.price }}</td>
								<td v-if="item.category">{{ item.category.name }}</td>
								<td>
									<img :src="item.image" alt="image">
								</td>
								<!-- <td>
									<template>
										<button class="_btn _action_btn edit_btn1" @click="isEditOn(item,index)" >Edit</button>
										<button class=" _btn _action_btn make_btn1" @click="food_delete(item.id,index)" >Delete</button>
									</template>
								</td> -->
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
				food:[]
			}
        },
        methods: {

             handleSuccess(res, file){
				if (res) {
				this.formItem.image = res
				}
            },

		},
		 async created(){
			const res = await this.callApi('get','all_food')
			if(res.status == 200){
				this.food = res.data
			}
			else{
				this.swr()
			}
    	}
    }
</script>




			




			