<script lang="ts" setup>
import { ref } from "vue";
import { onMounted, computed } from 'vue'
import { useProduct } from '@/stores/user'

import Banner from "./layout/Banner.vue";
import Futured from "./layout/Futured.vue";
import Services from "./layout/services.vue";
import Restant from "./layout/restant.vue";
import Resevation from "./layout/resevation.vue";
import Blogs from "./layout/blogs.vue";
import Subcribe from "./layout/subcribe.vue";

const toLinks = ref("/productdetail");
const products = useProduct();
const isLoading = ref(true)

onMounted(async () => {
  isLoading.value = true
  await products.fetchProduct()
  isLoading.value = false
})

const getProduct = computed(() => {
  return products.getProduct
})

</script>
<template>
 <div>
    <banner />
    <futured />
    <services />
    <restant />
    <base-collections :data="toLinks" :products="getProduct"/>
    <resevation />
    <blogs />
    <subcribe />
  </div>
</template>

<style lang="scss" scoped></style>
