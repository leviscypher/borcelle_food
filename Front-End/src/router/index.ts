import { createRouter, createWebHistory } from 'vue-router'
import { admin } from './admin2'
import { user } from './user'
import { auth } from './auth'
import { error } from './error'
import axios from 'axios'

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
  if (requiresAuth && isLoggedIn) {
    try {
      const res = await axios.get('http://127.0.0.1:8000/api/user-login', {
        headers: { Authorization: `Bearer ${isLoggedIn}` },
      })
      if (res.status === 200) {
        next()
      }
    } catch (error) {
      next('/admin/login')
    }
  }else {
    next()
  }
})

export default router
