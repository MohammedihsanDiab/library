<template>
    <div class="row justify-content-center">
        <div class="col-xl-11 my-4">
            <div class="white_box QA_section card_height_100 container">

                <div class="row justify-content-between container my-4">
                    <div class="main-title mb-sm-15">
                        <h3 class="m-0 nowrap" style="color:#063547">Books</h3>
                    </div>
                    <div class="message_send_field">
                        <router-link to="/addProduct"><button class="btn_1" type="submit">Add a
                                newBooks</button></router-link>
                    </div>
                </div>
                <div class="QA_table ">

                    <table class="table lms_table_active2">
                        <thead class="text-white" style="background: #44b89d;">
                            <tr>
                                <th scope="col">img</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Name</th>
                                <th scope="col">number of pages</th>
                                <th scope="col">Date</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in this.$store.state.search" :key="item.id">
                                <td><img :src="'uploades/' + item.img" alt="" srcset="" width="130"></td>
                                <td>{{ item.title }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.numpages }}</td>
                                <td>{{ item.date }}</td>
                                <td>
                                    <div class="amoutn_action d-flex align-items-center">

                                        <router-link to="/singelBook" @click="singlebooke(item.id)" data-toggle="modal"
                                            data-target="#upModal">
                                            <i class="far fa-eye text-warning"></i>
                                        </router-link>

                                        <router-link to="/editProduct" @click="edit(item.id)" data-toggle="modal"
                                            data-target="#upModal">
                                            <i class="fa-regular fa-pen-to-square fs-4 px-2 mx-2"></i>
                                        </router-link>

                                        <a href="#" @click="del(item.id)">
                                            <i class="fa-solid fa-trash-can text-danger fs-4"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import Swal from 'sweetalert2'
export default (await import('vue')).defineComponent({
    name: "Dashboard",
    created() {
        const t = this;
        if (t.$store.state.token) {
            console.log(t.$store.state.token); 
            t.aa();
        }else{
            this.$router.push({ path: '/login' });
        }
       
    },
    data() {
        return {
            // books: [],
        }
    },
    methods: {
        del(id) {
            const t = this;
            if (t.$store.state.token) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/api/delete/' + id)
                            .then(function (response) {
                                console.log(response.data.message);
                                Toast.fire({
                                    icon: 'success',
                                    title: response.data.message
                                })
                                t.aa();
                            })
                    }
                })
                    .catch(function (error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Book delete failed'
                        })
                        console.log(error);
                    });
            }else{
                t.$router.push({ path: '/login' });
            }
            

        },
        edit(id) {
            this.$store.state.editid = id;
        },
        aa() {
            const t = this;
            axios.get('/api/books')
                .then(function (response) {
                    console.log(response.data);
                    t.$store.state.search = response.data;
                    // t.books = response.data;
                })
        },
        singlebooke(id) {
            const t = this;
            t.$store.state.singelbookid = id;

        }
    }

})
</script>
