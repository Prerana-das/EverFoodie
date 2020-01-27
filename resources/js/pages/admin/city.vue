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
							<Input v-model="formItem.input" placeholder="Enter something..."></Input>
						</FormItem>
						<FormItem label="Input">
							<Input v-model="formItem.input" placeholder="Enter something..."></Input>
						</FormItem>
						 <FormItem>
							<Button type="primary">Submit</Button>
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
							<tr>
								<td>25-05-19</td>
								<td class="_table_name">Name</td>
								<td>Economy</td>
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
				modal1: false,
				formItem: {
                    input: ''
                }
            }
        },
        methods: {
    
        }
    }
</script>




			