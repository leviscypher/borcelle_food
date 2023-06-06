export const error = [
  {
    path: '/:pathMatch(.*)*',
    component: () => import('@/page/pagenotfound/pagenotfound.vue'),
    meta: { layout: 'layouterror' },
  },

  {
    path: '/404',
    component: () => import('@/page/pagenotfound/pagenotfound.vue'),
    meta: { layout: 'layouterror' },
  }
]
