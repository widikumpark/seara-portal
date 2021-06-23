/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import ViewUI from 'view-design';
import common from './common';
import router from "./routes";
import 'view-design/dist/styles/iview.css';
Vue.use(ViewUI);
Vue.mixin(common);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import Orders  from './components/OrdersComponent.vue';
import Faq  from './components/FAQsComponent.vue';
import Dashboard  from './components/DashboardComponent.vue';
import HomeComponent from "./components/HomeComponent.vue";

//Vue.component('orders', require('./components/orders.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    render: h=>h(HomeComponent),

});
