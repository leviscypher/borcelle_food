import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../page/Home/borcelle_home.vue'

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
      component: () => import('../page/Categories/index.vue')
    },
    {
      path: '/blog',
      name: 'blog',
      component: () => import('../page/Blog/index.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../page/Contact/index.vue')
    }
  ]
})

export default router
