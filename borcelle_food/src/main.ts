import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from '@/Layout/index.vue'
import router from './router'

import './assets/style.css'


const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
