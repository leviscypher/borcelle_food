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
      path: '/categories',
      name: 'categories',
      component: () => import('@/page/Categories/index.vue')
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
      path: '/detailpage',
      name: 'detailpage',
      component: () => import('@/page/Detailpage/index.vue')
    }
  ]
})

export default router
