<script setup lang="ts">
withDefaults(
  defineProps<{
    type: String
  }>(),
  {
    type: () => 'primary',
  }
)
</script>

<template>
  <button class="btnContent">
    <slot></slot>
  </button>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/common/base-bottom.scss';
</style>
