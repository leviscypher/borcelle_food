
import { createApp } from 'vue'
import App from '@/Layout/index.vue'
import router from '@/router'
import { createPinia } from 'pinia'
// scss
import '@/assets/style.css'
import '@/assets/styles/main.scss'
//plugins
import globalComponents from '@/plugins/common-components'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
//icon
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
app.use(ElementPlus)

app.mount('#app')
