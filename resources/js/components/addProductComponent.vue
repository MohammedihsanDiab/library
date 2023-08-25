<template>
    <div class="crm_body_bg">


        <div>


            <div class="bg container">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-sm-12">
                        <h2 class="title text-center my-5 text-dark ">Add a new <span style="color: #44b89d;">Book</span>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <div class="status alert alert-success" style="display: none;"></div>

                            <form id="main-contact-form"  method="post" name="contact-form" class="contact-form row"
                                enctype="multipart/form-data">
                                <div class="form-group col-md-6 mb-3"><input type="text" v-model="data.name" name="name"
                                    :class="['form-control', errors.name ? 'is-invalid' : '']" required="" placeholder="name">
                                    <span v-if="errors.name" class="bg-danger text-white p-1 rounded d-inline-block my-1 ">{{ errors.name[0]}}</span>
                                </div>
                                        
                                <div class="form-group col-md-6 mb-3"><input type="number" v-model="data.numpages" name="number"
                                         :class="['form-control', errors.numpages ? 'is-invalid' : '']" required="" placeholder="number of pages">
                                        <span v-if="errors.numpages" class="bg-danger text-white p-1 rounded d-inline-block my-2 ">{{ errors.numpages[0]}}</span>
                                    </div>

                                <div class="form-group col-md-6 mb-3"><input @change="chooseimge" type="file" name="img"
                                        :class="['form-control', errors.img ? 'is-invalid' : '']" required="" placeholder="img">
                                        <span v-if="errors.img" class="bg-danger text-white p-1 rounded d-inline-block my-2 ">{{ errors.img[0]}}</span>
                                    </div>

                                <div class="form-group col-md-6 mb-3"><input v-model="data.date" type="date" name="date"
                                        :class="['form-control', errors.date ? 'is-invalid' : '']" required="" placeholder="date">
                                        <span v-if="errors.date" class="bg-danger text-white p-1 rounded d-inline-block my-2 ">{{ errors.date[0]}}</span>
                                    </div>

                                <div class="form-group col-md-12 my-3"><textarea name="message" v-model="data.title"
                                        id="message" required="" :class="['form-control', errors.title ? 'is-invalid' : '']" rows="8"
                                        placeholder="Titel"></textarea>
                                        <span v-if="errors.title" class="bg-danger text-white p-1 rounded d-inline-block my-2 ">{{ errors.title[0]}}</span>
                                    </div>

                                <div class="form-group col-md-12 my-4"><input type="button" @click="add()" name="button"
                                        class="btn pull-left btn_1" value="Add Book"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</template>


<script>

export default (await import('vue')).defineComponent({
    name: "add_product",
    created() {
        if (this.$store.state.token) {
            console.log(this.$store.state.token);
        }else{
            this.$router.push({ path: '/login' });
        }
        
        
    },
    data() {
        return {
            data: {
                name: '',
                numpages: '',
                title: '',
                date: '',
                img: ''
            },
            errors:[],
        }
    },
    methods: {
        chooseimge(event) {
            this.data.img = event.target.files[0];
        },
        add() {
            const t = this;
            var data = new FormData();
            data.append('name', t.data.name);
            data.append('numpages', t.data.numpages);
            data.append('title', t.data.title);
            data.append('date', t.data.date);
            data.append('img', t.data.img);

            axios.post('/api/add', data)
                .then(function (response) {
                    console.log(response.data.message);
                    if (response.data.data.errors) {
                        t.errors = response.data.data.errors;
                        console.log(t.errors);
                    } else {
                        Toast.fire({
                        icon: 'success',
                        title: response.data.message
                    })
                    t.$router.push({ path: '/Dashboard' });
                    }
                    
                })
                .catch(function (error) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Book created failed'
                    })
                    console.log(error);
                });
        }
    }

})
</script>
