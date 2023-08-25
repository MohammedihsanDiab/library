import Home from '@/components/homeComponent.vue';
import about from '@/components/aboutComponent.vue';
import contact from '@/components/contactComponent.vue';
import Books from '@/components/BooksComponent.vue';
import Dashboard from '@/components/DashboardComponent.vue';
import regester from '@/components/regesterComponent.vue';
import login from '@/components/loginComponent.vue';
import addProduct from '@/components/addProductComponent.vue';
import editProduct from '@/components/editProductComponent.vue';
import singelBook from '@/components/singelBookComponent.vue';
import { createRouter, createWebHistory } from 'vue-router';

// app.component('example-component', ExampleComponent);

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: about },
    { path: '/contact', component: contact },
    { path: '/Books', component: Books },
    { path: '/Dashboard', component: Dashboard },
    { path: '/regester', component: regester },
    { path: '/login', component: login },
    { path: '/addProduct', component: addProduct },
    { path: '/editProduct', component: editProduct },
    { path: '/singelBook', component: singelBook },
]

const router = createRouter({
        history: createWebHistory(),
        routes,
    })
    /**
     * The following block of code may be used to automatically register your
     * Vue components. It will recursively scan this directory for the Vue
     * components and automatically register them with their "basename".
     *
     * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
     */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

export default router