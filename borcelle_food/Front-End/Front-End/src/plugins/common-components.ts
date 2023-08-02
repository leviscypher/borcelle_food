export default {
  install(app: any) {
    const componentFiles = import.meta.glob('@/components/common/*.vue', {
      eager: true,
    })

    Object.entries(componentFiles).forEach(([path, definition]: any[]) => {
      const componentName = path
        ?.split('/')
        .pop()
        .replace(/\.\w+$/, '')
      app.component(componentName, definition.default)
    })
  },
}
