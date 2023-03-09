import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../page/Home/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/order',
      name: 'order',
      component: () => import('@/page/Order/index.vue')
    },
    {
      path: '/blog',
      name: 'blog',
      component: () => import('@/page/Blog/index.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('@/page/Contact/index.vue')
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('@/page/Cart/index.vue')
    },
    {
      path: '/payment',
      name: 'payment',
      component: () => import('@/page/Payment/payment.vue')
    },
    {
      path: '/detailpage',
      name: 'detailpage',
      component: () => import('@/page/Detailpage/index.vue')
    },
    {
      path: '/Test',
      name: 'Test',
      component: () => import('@/page/Test/index.vue')
    },
  ]
})

export default router
