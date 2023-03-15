<script lang="ts" setup>
import { ref } from 'vue'

const tab = ref(1)
const currentTab = (tabNumber: any) => {
  tab.value = tabNumber
}
const toLinks = ref("/productdetail")
</script>
<template>
  <div class="pb-[70px] pl-[100px] pr-[100px]">
    <div class="order">
      <base-collections class="order-top" :data="toLinks"  />
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/page/order/order.scss';
</style>