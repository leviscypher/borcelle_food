<script setup lang="ts">
import LeftNav from '@/components/layouts/Container/LeftNav/LeftNav.vue'
import TheContent from '@/components/layouts/Container/Content/TheContent.vue'
import TheRightNav from '@/components/layouts/Container/RightNav/TheRightNav.vue'
</script>

<template>
  <div class="container flex max-w-screen-2xl ">
    <left-nav class="logo flex-auto w-16 justify-center" /> 
    <the-content class="search flex-auto w-96 justify-center" />
    <the-right-nav  class="option flex-auto w-16 justify-center" />
  </div>
</template>



<style scoped>
.container {
    margin:50px 10px 0 10px ;
}
</style>