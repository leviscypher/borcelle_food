import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../page/Home/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  linkActiveClass: 'active-link',
  linkExactActiveClass: 'exact-active-link',
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/order',
      name: 'order',
      component: () => import('@/page/Order/index.vue'),
    },
    {
      path: '/blog',
      name: 'blog',
      component: () => import('@/page/Blog/index.vue'),
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('@/page/Contact/index.vue'),
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('@/page/Cart/index.vue'),
    },
    {
      path: '/payment',
      name: 'payment',
      component: () => import('@/page/Payment/payment.vue'),
    },
    {
      path: '/detailpage',
      name: 'detailpage',
      component: () => import('@/page/Detailpage/index.vue'),
    },
    {
      path: '/Test',
      name: 'Test',
      component: () => import('@/page/Test/index.vue'),
    },
    {
      path: '/customer/edit',
      name: 'customer',
      component: () => import('@/page/customer/index.vue'),
      children: [
        {
          path: '',
          name: 'customer-edit',
          component: () => import('@/components/page/customer/layout/edit/edit.vue'),
        },

        {
          path: '/customer/order',
          name: 'customer-order',
          component: () => import('@/components/page/customer/layout/order/order.vue'),
        },
        {
          path: '/customer/address',
          name: 'customer-address',
          component: () => import('@/components/page/customer/layout/address/address.vue'),
        },
        {
          path: '/customer/address/create',
          name: 'customer-address-create',
          component: () => import('@/components/page/customer/layout/address/create.vue'),
        },
        {
          path: '/customer/payment',
          name: 'customer-payment',
          component: () => import('@/components/page/customer/layout/payment/payment.vue'),
        },
      ],
    },
  ],
})

export default router
