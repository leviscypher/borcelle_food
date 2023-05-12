import login from '@/page/admin/Auth/index.vue'
export const admin = [
  {
    path: '/admin/login',
    name: 'admin-login',
    component: login,
    meta: { layout: 'layoutadmin' },
  },
  {
    path: '/admin/home',
    name: 'home-admin',
    component: () => import('@/page/admin/Home/index.vue'),
    meta: { layout: 'layoutadmin', requiresAuth: true },
    children: [
      {
        path: '',
        name: 'dashboard',
        component: () => import('@/page/admin/Dashboard/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/category',
        name: 'category',
        component: () => import('@/page/admin/Category/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/employee-management',
        name: 'employee-manager',
        component: () => import('@/page/admin/Employee-manager/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/account-management',
        name: 'account-management',
        component: () => import('@/page/admin/Account-management/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/customer-management',
        name: 'customer-management',
        component: () => import('@/page/admin/Customer-management/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/product-management',
        name: 'product-management',
        component: () => import('@/page/admin/Product-management/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/order-management',
        name: 'order-management',
        component: () => import('@/page/admin/Order-management/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
        children: 
        [
          {
            path: '',
            name: 'order-management-all',
            component: () => import('@/components/page/admin/Order-management/status/all.vue'),
            meta: { layout: 'layoutadmin', requiresAuth: true },
          },
          {
            path: '/admin/order-management/payment',
            name: 'order-management-payment',
            component: () =>  import('@/components/page/admin/Order-management/status/payment.vue'),
            meta: { layout: 'layoutadmin', requiresAuth: true },
          },
          {
            path: '/admin/order-management/progressing',
            name: 'order-management-progressing',
            component: () =>  import('@/components/page/admin/Order-management/status/progressing.vue'),
            meta: { layout: 'layoutadmin', requiresAuth: true },
          },
          {
            path: '/admin/order-management/shipping',
            name: 'order-management-shipping',
            component: () =>  import('@/components/page/admin/Order-management/status/shipping.vue'),
            meta: { layout: 'layoutadmin', requiresAuth: true },
          },
          {
            path: '/admin/order-management/delivered',
            name: 'order-management-delivered',
            component: () =>  import('@/components/page/admin/Order-management/status/delivered.vue'),
            meta: { layout: 'layoutadmin', requiresAuth: true },
          },
          {
            path: '/admin/order-management/cancelled',
            name: 'order-management-cancelled',
            component: () =>  import('@/components/page/admin/Order-management/status/cancelled.vue'),
            meta: { layout: 'layoutadmin', requiresAuth: true },
          },
        ]
      },
      {
        path: '/admin/internal-management',
        name: 'internal-management',
        component: () => import('@/page/admin/Internal-management/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/salary-statement',
        name: 'salary-statement',
        component: () => import('@/page/admin/Salary-statement/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/sales-report',
        name: 'sales-report',
        component: () => import('@/page/admin/Sales-report/index.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      //add
      {
        path: '/admin/employee-management/add-staff',
        name: 'add-staff',
        component: () => import('@/page/admin/Employee-manager/Add-new-staff.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/employee-management/edit-staff/:id',
        name: 'edit-staff',
        component: () => import('@/page/admin/Employee-manager/Edit-staff.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      // category
      {
        path: '/admin/category/add-category',
        name: 'add-category',
        component: () => import('@/page/admin/Category/Add-category.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/category/eidt-category/:id',
        name: 'edit-category',
        component: () => import('@/page/admin/Category/Edit-category.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },

      // user
      {
        path: '/admin/account-management/add-account',
        name: 'add-account',
        component: () => import('@/page/admin/Account-management/Add-account.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/account-management/edit-account/:id',
        name: 'edit-account',
        component: () => import('@/page/admin/Account-management/Edit-account.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      // product
      {
        path: '/admin/product-management/add-products',
        name: 'add-product',
        component: () => import('@/page/admin/Product-management/Add-new-products.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
      {
        path: '/admin/product-management/edit-products/:id',
        name: 'edit-products',
        component: () => import('@/page/admin/Product-management/Edit-new-products.vue'),
        meta: { layout: 'layoutadmin', requiresAuth: true },
      },
    ],
  },
]
