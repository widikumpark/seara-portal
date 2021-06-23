import Vue from 'vue';

import Router from 'vue-router';

Vue.use(Router);
import DashboardComponent from './components/DashboardComponent.vue';
import FAQsComponent from './components/FAQsComponent.vue';



const routes = [
    {
        path:'/dashboard',
        component: DashboardComponent
    },
    {
        path:"/faq",
        component: FAQsComponent,
    }
]

export default new Router({
    mode: 'history',
    routes
})