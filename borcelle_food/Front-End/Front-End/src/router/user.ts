import HomeView from '../page/user/Home/Home.vue'

export const user = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta: { layout: 'layoutuser' },
  },
  {
    path: '/order',
    name: 'order',
    component: () => import('@/page/user/Order/index.vue'),
    meta: { layout: 'layoutuser' },
  },
  {
    path: '/blog',
    name: 'blog',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/Blog/index.vue'),
  },
  {
    path: '/contact',
    name: 'contact',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/Contact/index.vue'),
  },
  {
    path: '/cart',
    name: 'cart',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/Cart/index.vue'),
  },
  {
    path: '/payment',
    name: 'payment',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/Payment/payment.vue'),
  },
  {
    path: '/detailpage',
    name: 'detailpage',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/Detailpage/index.vue'),
  },
  {
    path: '/Test',
    name: 'Test',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/Test/index.vue'),
  },
  {
    path: '/productdetail/:id',
    name: 'productDetail',
    meta: { layout: 'layoutuser' },
    component: () => import('@/page/user/ProductDetail/index.vue'),
  },
  {
    path: '/customer/edit/:id',
    name: 'customer',
    component: () => import('@/page/user/customer/index.vue'),
    meta: { layout: 'layoutuser' },
    children: [
      {
        path: '',
        name: 'customer-edit',
        component: () => import('@/components/page/user/customer/layout/edit/edit.vue'),
        meta: { layout: 'layoutuser' },
      },

      {
        path: '/customer/order/:id',
        name: 'customer-order',
        component: () => import('@/components/page/user/customer/layout/order/order.vue'),
        meta: { layout: 'layoutuser' },
      },

      {
        path: '/customer/order/detail/:id',
        name: 'customer-order-detail',
        component: () => import('@/components/page/user/customer/layout/order/detail.vue'),
        meta: { layout: 'layoutuser' },
      },

      {
        path: '/customer/address/:id',
        name: 'customer-address',
        component: () => import('@/components/page/user/customer/layout/address/address.vue'),
        meta: { layout: 'layoutuser' },
      },
      {
        path: '/customer/address/create/:id',
        name: 'customer-address-create',
        component: () => import('@/components/page/user/customer/layout/address/create.vue'),
        meta: { layout: 'layoutuser' },
      },
      {
        path: '/customer/address/edit/:id',
        name: 'customer-address-edit',
        component: () => import('@/components/page/user/customer/layout/address/edit.vue'),
        meta: { layout: 'layoutuser' },
      },
      {
        path: '/customer/payment',
        name: 'customer-payment',
        component: () => import('@/components/page/user/customer/layout/payment/payment.vue'),
        meta: { layout: 'layoutuser' },
      },
    ],
  },
]
