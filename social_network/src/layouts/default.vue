<script setup lang="ts">
import TheHeader from "@/components/layouts/Header/TheHeader.vue";
import TheContainer from "@/components/layouts/Container/TheContainer.vue";
</script>

<template>
  <div class="bg-[#f5f6f8] h-full overflow-hidden">
    <the-header />
    <the-container />

    <RouterView />
  </div>
</template>

<style scoped></style>
