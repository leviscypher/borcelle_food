import login from "@/page/admin/Auth/index.vue"
export const admin = [
  {
    path: '/admin',
    name: 'admin',
    component: login,
    meta: { layout: 'layoutadmin' },
  },
  {
    path: '/admin/home',
    name: 'home-admin',
    component: () => import("@/page/admin/Home/index.vue"),
    meta: { layout: 'layoutadmin' },
    children: [
      {
        path: '',
        name: 'dashboard',
        component: () => import("@/page/admin/Dashboard/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/category',
        name: 'category',
        component: () => import("@/page/admin/Category/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/employee-management',
        name: 'employee-manager',
        component: () => import("@/page/admin/Employee-manager/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/account-management',
        name: 'account-management',
        component: () => import("@/page/admin/Account-management/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/customer-management',
        name: 'customer-management',
        component: () => import("@/page/admin/Customer-management/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/product-management',
        name: 'product-management',
        component: () => import("@/page/admin/Product-management/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/order-management',
        name: 'order-management',
        component: () => import("@/page/admin/Order-management/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/internal-management',
        name: 'internal-management',
        component: () => import("@/page/admin/Internal-management/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/salary-statement',
        name: 'salary-statement',
        component: () => import("@/page/admin/Salary-statement/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/sales-report',
        name: 'sales-report',
        component: () => import("@/page/admin/Sales-report/index.vue"),
        meta: { layout: 'layoutadmin' },
      },
      //add
      {
        path: '/admin/employee-management/add-staff',
        name: 'add-staff',
        component: () => import("@/page/admin/Employee-manager/Add-new-staff.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/employee-management/add-products',
        name: 'add-products',
        component: () => import("@/page/admin/Product-management/Add-new-products.vue"),
        meta: { layout: 'layoutadmin' },
      },
      // category
      {
        path: '/admin/category/add-category',
        name: 'add-category',
        component: () => import("@/page/admin/Category/Add-category.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/category/eidt-category/:id',
        name: 'edit-category',
        component: () => import("@/page/admin/Category/Edit-category.vue"),
        meta: { layout: 'layoutadmin' },
      },

      // user
      {
        path: '/admin/account-management/add-account',
        name: 'add-account',
        component: () => import("@/page/admin/Account-management/Add-account.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/account-management/edit-account/:id',
        name: 'edit-account',
        component: () => import("@/page/admin/Account-management/Edit-account.vue"),
        meta: { layout: 'layoutadmin' },
      },
      // product
      {
        path: '/admin/product-management/add-products',
        name: 'add-product',
        component: () => import("@/page/admin/Product-management/Add-new-products.vue"),
        meta: { layout: 'layoutadmin' },
      },
      {
        path: '/admin/product-management/edit-products/:id',
        name: 'edit-products',
        component: () => import("@/page/admin/Product-management/Edit-new-products"),
        meta: { layout: 'layoutadmin' },
      },
    ]
  },
]
