
import { createApp } from 'vue'
import App from '@/Layout/index.vue'
import router from '@/router'
import { createPinia } from 'pinia'
// scss
import '@/assets/style.css'
import '@/assets/styles/main.scss'
//plugins
import globalComponents from '@/plugins/common-components'
import constants from '@/plugins/constants'
// import BootstrapVueNext from 'bootstrap-vue-next'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue-next/dist/bootstrap-vue-next.css'
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
app.use(constants)
app.use(createPinia())
// app.use(BootstrapVueNext)
app.mount('#app')
