import type { App } from 'vue'
import constants from '@/constants'

export default {
  install: (app: App) => {
    app.config.globalProperties.$constants = constants
  },
}
