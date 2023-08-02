<script setup lang="ts">
import { useRoute } from 'vue-router'
import LayoutAdmin from './admin.vue'
import LayoutUser from './user.vue'
import LayoutError from './error.vue'

const route = useRoute()

</script>

<template>
  <div v-if="route.meta?.layout == 'layoutadmin'">
    <layout-admin />
  </div>
  <div v-else-if="route.meta?.layout == 'layoutuser'">
    <layout-user />
  </div>
  <div v-else-if="route.meta?.layout == 'layouterror'">
    <layout-error />
  </div>
</template>
<style lang="scss" scoped>
.header {
  background: var(--white);
  box-shadow: 0px 0px 20px 0px #dddddd8c;
}
</style>
