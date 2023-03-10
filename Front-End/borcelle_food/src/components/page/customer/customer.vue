<script lang="ts" setup>
import { ref } from 'vue'
import { RouterView } from 'vue-router'

const title = ref('Thông tin tài khoản')
</script>

<template>
  <base-banner :title="title" />

  <div class="customer w-[1380px] h-auto mx-auto my-8 grid grid-cols-5 gap-4">
    <div class="col-span-1">
      <div class="flex items-center ml-8 my-8">
        <div
          class="text-[3rem] w-[60px] h-[60px] bg-[var(--pale-yellow)] rounded-[50%] text-[#fff] flex items-center justify-center"
        >
          <font-awesome-icon icon="fa-solid fa-user" />
        </div>
        <div class="ml-4">
          <p>tài khoản của</p>
          <h4>Hoàng tú</h4>
        </div>
      </div>

      <div class=""></div>
    </div>
    <div class="col-span-4 bg-[#fff]">
      <router-view />
    </div>
  </div>
</template>

<style lang=""></style>
