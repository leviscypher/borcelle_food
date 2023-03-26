
export const auth = [
    {
        path: '/auth/forgot-password',
        name: 'forgot-password',
        component: () => import("@/components/common/auth/customer/form/forgot-password.vue"),
        meta: { layout: 'layoutuser' },
    },
    {
        path: '/auth/verification',
        name: 'verification',
        component: () => import("@/components/common/auth/customer/form/verification.vue"),
        meta: { layout: 'layoutuser' },
    },
    {
        path: '/auth/create-new-password',
        name: 'create-new-password',
        component: () => import("@/components/common/auth/customer/form/create-new-password.vue"),
        meta: { layout: 'layoutuser' },
    },

]
