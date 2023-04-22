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

// router.beforeEach((to, from, next) => {
//   const isAuthenticated = localStorage.getItem('token-admin')
//   if (to.path === '/admin' && !isAuthenticated) {
//     next()
//   } else {
//     next('/admin')
//   }
// })
export default router
