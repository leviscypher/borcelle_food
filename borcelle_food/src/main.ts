import type { LoDashStatic } from 'lodash'

import { createApp } from 'vue'
import '@/assets/styles/common/theme.scss'
import App from '@/Layout/index.vue'
import ElementPlus from 'element-plus'
import router from '@/router'
import { createPinia } from 'pinia'

import 'element-plus/dist/index.css'
import '@/assets/styles/common/main.scss'

const app = createApp(App)

app.use(router)
app.use(ElementPlus)
app.use(createPinia())


app.mount('#app')

declare module '@vue/runtime-core' {
  export interface ComponentCustomProperties {
    $constants: ConstantsProps
    $_: LoDashStatic
  }
}
