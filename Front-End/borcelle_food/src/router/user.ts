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
        path: '/productdetail',
        name: 'productDetail',
        meta: { layout: 'layoutuser' },
        component: () => import('@/page/user/ProductDetail/index.vue'),
    },
    {
        path: '/customer',
        name: 'customer',
        meta: { layout: 'layoutuser' },
        component: () => import('@/page/user/customer/index.vue'),
        children: [
            {
                path: '/customer',
                name: 'customer',
                meta: { layout: 'layoutuser' },
                component: () => import('@/components/page/user/customer/layout/edit.vue'),
            },

            {
                path: '/customer/order',
                name: 'customer-order',
                meta: { layout: 'layoutuser' },
                component: () => import('@/components/page/user/customer/layout/order.vue'),
            },
        ],
    },
]
