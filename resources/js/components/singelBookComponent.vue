<template>
    <div class="site-wrap">

        <div class="site-section bg-light">
            <div class="container ">

                <h2 class="text-center my-5" style="font-size: 30px;"> Our <span style="color:#44b89d;">Books</span></h2>

                <div class="row justify-content-center py-3" style="margin:auto;">
                    <div class="col-sm-5 col-lg-3 text-center item mb-4 item-v2 mx-4 bg-white py-3">
                        <a href="shop-single.html"><img :src="'uploades/' + book.img" alt="" srcset="" width="230" height="330" ></a>
                        <h4 class="my-4"><a href="#" style="color: #44b89d;">{{ book.title }}</a></h4>
                       <div class="row justify-content-around px-3">
                            <h6><a href="#" style="color: black;">{{ book.name }}</a></h6>
                            <h6 class="numpages" style="font-size: 15px; color: rgb(85, 85, 85);">{{ book.numpages }} page</h6>
                        </div>
                        <h6 class="my-3"><a href="#" style="color: rgb(155, 155, 155);">{{ book.date }}</a></h6>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>
<script>
export default (await import('vue')).defineComponent({
    name: "singelBook",
    created() {
            const t = this;
            t.id = t.$store.state.singelbookid;
            axios.post('/api/singlebooke/' + t.id)
            .then(function (response) {
              t.book = response.data.data;
                console.log(response.data.data);
                t.book = response.data.data;
            })
    },
    data() {
        return {
            book:[],
            id:''
        }
    },
    methods:{
        
    }
})
</script>
