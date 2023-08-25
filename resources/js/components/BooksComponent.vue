<template>
    
    <div class="site-wrap">

        <div class="site-section bg-light">
            <div class="container ">

                <h2 class="text-center my-5" style="font-size: 30px;"> Our <span style="color:#44b89d;">Books</span></h2>

                <div class="row justify-content-center py-3">
                    <div v-for="item in this.$store.state.search" :key="item.id" class="bg-white col-sm-5 col-lg-3 text-center item mb-4 item-v2 mx-4 py-3">
                        <a href="shop-single.html"><img :src="'uploades/' + item.img" alt="" srcset="" width="230" height="330" ></a>
                        <h4 class="my-4"><router-link style="color: #44b89d;" to="/singelBook" @click="singlebooke(item.id)">{{ item.title }}</router-link></h4>
                       <div class="row justify-content-around px-3">
                            <h6><a href="#" style="color: black;">{{ item.name }}</a></h6>
                            <h6 class="numpages" style="font-size: 15px; color: rgb(85, 85, 85);">{{ item.numpages }} page</h6>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>
<script>
export default (await import('vue')).defineComponent({
    name: "Books",
    created() {
        const t = this;
        t.aa();
    },
    data() {
        return {
            // books:[],
        }
    },
    methods:{
        aa() {
            const t = this;
            axios.get('/api/books')
                .then(function (response) {
                    console.log(response.data);
                    t.$store.state.search = response.data;
                })
        },
        singlebooke(id){
            const t = this;
            t.$store.state.singelbookid = id;
        }
    }
})
</script>
