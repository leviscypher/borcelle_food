<script setup lang="ts">
const props = withDefaults(
  defineProps<{
    title: string
  }>(),
  {
    title: '',
  }
)

</script>

<template>
  <div class="banner">
    <div class="banner-title-item">
      <h1 class="banner-title-item-tilte">{{ props.title }}</h1>
      <nav class="flex items-center" aria-label="Breadcrumb">
        <ul class="list-none flex items-center">
          <li class="inline-flex items-center">
            <router-link to="/" class="inline-flex items-center banner-title-item-home">
              Trang chủ
            </router-link>
          </li>
          <li class="pl-3 banner-title-item-chill-title">
            <div class="flex items-center">
              <font-awesome-icon class="pr-3 text-white" icon="fa-solid fa-angle-right" />
              {{ props.title }}
            </div>
          </li>
        </ul>
      </nav>

    </div>
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/common/base-banner.scss';
</style>
