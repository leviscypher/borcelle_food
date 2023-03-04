
import { createApp } from 'vue'
import App from '@/Layout/index.vue'
import router from '@/router'
import { createPinia } from 'pinia'

import '@/assets/style.css'
import '@/assets/styles/main.scss'
import globalComponents from '@/plugins/common-components'

import { library } from '@fortawesome/fontawesome-svg-core'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(fab, fas, far)

const app = createApp(App)
app.use(globalComponents)
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router)
app.use(createPinia())


app.mount('#app')
