import { createRouter, createWebHistory } from 'vue-router'
import { admin } from './admin'
import { user } from './user'
import { auth } from './auth'
import { error } from './error'
import axios from 'axios'
import constants from '@/constants'

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
  const step = localStorage.getItem('step')
  console.log(step);
  

  if (requiresAuth && !isLoggedIn) {
    next('/admin/login')
  }

  if (requiresAuth && isLoggedIn) {
    const data = await axios.get('http://127.0.0.1:8000/api/user-login', constants.routeApis.TOKENADMIN)
    if (data.status === 200) {
      if (data.data.role_id === 1) {
        next()
      } else {
        next('/admin/login')
      }
    } else {
      next('/admin/login')
    }
  }

  if (!step && to.path === '/auth/verification') {
    next('/')
  } else {
    next()
  }

  if (!step && step === '2' && to.path === '/auth/create-new-password') {
    next('/')
  } else {
    next()
  }
})

export default router
