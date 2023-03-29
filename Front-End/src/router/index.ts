import { createRouter, createWebHistory } from 'vue-router'
import { admin } from './admin'
import { user } from './user'
import { auth } from './auth'

const routes = [...admin, ...user,...auth]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  linkActiveClass: 'active-link',
  linkExactActiveClass: 'exact-active-link',
  routes,
})

export default router
