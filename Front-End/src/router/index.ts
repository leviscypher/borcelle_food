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
router.beforeEach((to, from) => {
  // instead of having to check every route record with
  // to.matched.some(record => record.meta.requiresAuth)
  console.log(to.meta );
  
  // if (to.meta.requiresAuth && !auth.isLoggedIn()) {
  //   // this route requires auth, check if logged in
  //   // if not, redirect to login page.
  //   return {
  //     path: '/login',
  //     // save the location we were at to come back later
  //     query: { redirect: to.fullPath },
  //   }
  // }
})
export default router
