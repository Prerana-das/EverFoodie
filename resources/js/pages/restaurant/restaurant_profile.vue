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

	




		},
		created(){
			this.all_city();
		}
    }
</script>




			