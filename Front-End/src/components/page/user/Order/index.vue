<script lang="ts" setup>
import { ref } from 'vue'
import { onMounted, computed } from 'vue'
import { useProduct } from '@/stores/user'

import Pagination from '@/components/common/Pagination.vue'

const products = useProduct()
const isLoading = ref(true)



onMounted(async () => {
  isLoading.value = true
  await products.fetchProduct()
  isLoading.value = false
})

const getProduct = computed(() => {
  return products.getProduct
})

const changePage = async(number: number) => {
  isLoading.value = true
  await products.fetchProduct(number)
  isLoading.value = false
}

const toLinks = ref('/productdetail')
</script>
<template>
  <div v-if="!isLoading">
    <div class="pb-[70px] pl-[100px] pr-[100px]">
      <div class="order">
        <base-collections
          class="order-top"
          :data="toLinks"
          :products="getProduct"
        />
      </div>
    </div>
    <pagination :data="getProduct" @paginate="changePage"/>
  </div>
  <div
    class="mt-[200px] mb-[220px] text-center"
    v-if="isLoading"
  >
    <base-load></base-load>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/page/order/order.scss';
</style>
