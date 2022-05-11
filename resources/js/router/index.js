import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const Home = () => import('../components/Home.vue' /* webpackChunkName: "resource/js/components/home" */)

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});


export default router;
