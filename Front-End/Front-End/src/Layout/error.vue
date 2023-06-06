<script setup lang="ts">
import { RouterView } from "vue-router";
</script>

<template>
  <div class="wapper bg-[#F5F5FA]">
    <div class="content">
      <RouterView />
    </div>
  </div>
</template>
<style scoped>
.content{
    height: 100vh;
}
</style>