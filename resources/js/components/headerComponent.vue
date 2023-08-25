<template>
    <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand ow" href="index.html">
                        <span class="ow">
                            Bostorek
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                            <router-link class="nav-link" to="/">Home <span class="sr-only">(current)</span></router-link>
                            </li>
                            <li class="nav-item">
                            <router-link class="nav-link" to="/Books">Books</router-link>
                            </li>
                            <li class="nav-item">
                            <router-link class="nav-link" to="/about">About</router-link>
                            </li>
                            <li class="nav-item">
                            <router-link class="nav-link" to="/contact">Contact Us</router-link>
                            </li>
                            <li class="nav-item">
                            <router-link class="nav-link" to="/Dashboard">Control panal</router-link>
                            </li>
                        </ul>
                        <ul class="p">
                                <li class="nav-item" ><router-link class="nav-link ow" to="/regester">Regester</router-link></li>
                                <li class="nav-item" v-if="this.$store.state.token == null" ><router-link class="ow nav-link" to="/login">Login</router-link></li>
                                <li class="nav-item" v-else><router-link @click="logout()" class="nav-link ow" to="/">Logout</router-link></li>
                            </ul>
                        <from class="search_form">
                            <input type="text" v-model="search" class="form-control" placeholder="Search here...">
                            <button @click="searchh" type="button">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </from>
                    </div>
                </nav>
            </div>
        </header>
</template>
<script>
export default (await import('vue')).defineComponent({
    data() {
        return {
            search:''
        }
    },
    methods: {
        logout() {
    
            localStorage.setItem('token','');
            this.$store.state.token = null;
            console.log(response)
        
        },
       
    },
    computed:{
        searchh(){
            const t = this;
            var search = t.search;
            axios.get('/api/search/' + search)
            .then(function (response) {
                console.log(response);
                t.$store.state.search = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    } 

})
</script>