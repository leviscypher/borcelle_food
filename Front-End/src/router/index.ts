import { createRouter, createWebHistory } from 'vue-router'
import { admin } from './admin'
import { user } from './user'
import { auth } from './auth'
import { error } from './error'

const routes = [...admin, ...user, ...auth, ...error]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  linkActiveClass: 'active-link',
  linkExactActiveClass: 'exact-active-link',
  routes,
})

router.beforeEach(async (to, from, next) => {
  const isLoggedIn = localStorage.getItem('token-admin')
  const requiresAuth = to.matched.some((record) => record.meta.requiresAuth)
  if (requiresAuth && !isLoggedIn) {
    next('/admin/login')
  } else {
    next()
  }
})

export default router
