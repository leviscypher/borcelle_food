<script setup lang="ts">
import Friend from "@/components/layouts/Container/Friend/friend.vue";
import TheContent from "@/components/layouts/Container/Content/TheContent.vue";
import messageFollow from "@/components/layouts/Container/messageFollow/message-follow.vue";
</script>

<template>
  <div class="container flex max-w-screen-2xl">
    <friend class="logo flex-auto w-16 justify-center" />
    <the-content class="search flex-auto w-96 justify-center" />
    <message-follow class="option flex-auto w-16 justify-center" />
  </div>
</template>

<style scoped>
.container {
  margin: 0px 10px 0 10px;
}
</style>
