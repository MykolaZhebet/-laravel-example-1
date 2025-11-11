import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/vue',
        component: () => import('./Pages/HomeRoute.vue'),
    },
    {
        path: '/vue/test',
        component: () => import('./Pages/TestRoute.vue'),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});