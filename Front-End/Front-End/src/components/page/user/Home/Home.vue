<script lang="ts" setup>
import { ref } from 'vue'
import { onMounted, computed } from 'vue'
import { useProduct } from '@/stores/user'

import Banner from './layout/Banner.vue'
import Futured from './layout/Futured.vue'
import Services from './layout/services.vue'
import Restant from './layout/restant.vue'
import Resevation from './layout/resevation.vue'
import Blogs from './layout/blogs.vue'
import Subcribe from './layout/subcribe.vue'

const toLinks = ref('/productdetail')
const products = useProduct()
const isLoading = ref(true)

onMounted(async () => {
  isLoading.value = true
  await products.fetchProducts()
  isLoading.value = false
})

const getProduct = computed(() => {
  return products.getProducts
})
</script>
<template>
  <div>
    <banner />
    <futured />
    <services />
    <restant />
    <div v-if="!isLoading">
      <base-collections
        :link="toLinks"
        :products="getProduct.data"
      />
      <div class="flex justify-center">
        <router-link
          to="/order"
          class="text-[20px] font-normal decoration-none text-[#000] hover:text-[var(--pale-yellow)] duration-300"
          >xem thêm</router-link
        >
      </div>
    </div>
    <div v-else class="w-full h-[200px] flex items-center justify-center">
      <base-load/>
    </div>
    <resevation />
    <blogs />
    <subcribe />
  </div>
</template>

<style lang="scss" scoped></style>
