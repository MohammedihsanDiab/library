<template>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
               
                    
                        <div class="col-md-5">
                            <div class="row justify-content-center">
                            <div class="form-block">
                                <div class="mb-4">
                                    <h3>Sign In </h3>

                                </div>

                                <form id="main-contact-form" method="post" name="contact-form" class="contact-form row justify-content-center "
                                    enctype="multipart/form-data">
                                    <div class="form-group first my-3 col-md-12"><input type="text" v-model="user.name" name="name"
                                            :class="['form-control', errors.name ? 'is-invalid' : '']" required=""
                                            placeholder="name">
                                        <span v-if="errors.name"
                                            class="text-danger d-inline-block my-1">*{{
                                                errors.name[0] }}</span>
                                    </div>
                                    <br>
                                    <div class="form-group first my-3 col-md-12"><input type="email" v-model="user.email"
                                            name="email" :class="['form-control', errors.email ? 'is-invalid' : '']"
                                            required="" placeholder="email">
                                        <span v-if="errors.email"
                                            class="text-danger d-inline-block my-1 ">*{{
                                                errors.email[0] }}</span>
                                    </div>

                                    <div class="form-group first my-3 col-md-12"><input type="password" v-model="user.password"
                                            name="name" :class="['form-control', errors.password ? 'is-invalid': '' ]"
                                            required="" placeholder="password">
                                        <span v-if="errors.password"
                                            class="text-danger d-inline-block my-1 ">*{{
                                                errors.password[0] }}</span>
                                    </div>
                                    <input style="margin-top: 60px;" @click="regester()" type="button" value="Sign In "
                                        class="btn btn-pill btn-block btn-primary text-dark col-md-11 ">
                                </form>
                                <!-- <span class="d-block text-center my-4 text-muted"> or sign in with</span>

                                    <div class="social-login text-center">
                                        <a href="#" class="facebook">
                                            <span class="icon-facebook mr-3"></span>
                                        </a>
                                        <a href="#" class="twitter">
                                            <span class="icon-twitter mr-3"></span>
                                        </a>
                                        <a href="#" class="google">
                                            <span class="icon-google mr-3"></span>
                                        </a>
                                    </div> -->
                                
                                </div>
                            </div>
                        </div>
                    </div>

              

            </div>
        </div>

</template>
<script>
export default (await import('vue')).defineComponent({
    name: "regester",
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: ''
            },
            errors: [],
        }
    },
    methods: {
        regester() {
            const t = this;
            axios.post('/api/register', t.user)
                .then(function (response) {
                    if (response.data.data) {
                        t.errors = response.data.data;
                        console.log(t.errors);
                    }
                    if (response.data.status == true) {
                        t.$router.push({ path: '/login' });
                        Toast.fire({
                        icon: 'success',
                        title: response.data.message
                        });
                    }
                    
                })
                .catch(function (error) {
                    Toast.fire({
                    icon: 'error',
                    title: 'Registered failed'
                    });
                    console.log(error);
                });
        }
    }

})
</script>
