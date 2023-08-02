<script lang="ts" setup>
import sidebar from "@/components/page/admin/layout/sidebar.vue"
</script>
<template>
  <div class="flex">
    <div class="w-[20%]">
      <div class="dashboard-sidebar">
        <sidebar />
      </div>
    </div>
    <div class=" h-full w-[80%] pl-10 pt-10 pr-10 bg-[#f5f5f5] relative">
      <div class="dashboard-content">
        <RouterView />
      </div>
    </div>
  </div>
</template>