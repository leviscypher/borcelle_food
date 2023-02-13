<script lang="ts" setup>
import { ref } from "vue";
const search = ref();
</script>
<template>
  <div
    class="containers grid grid-cols-3 gap-[20px] leading-[50px] text-center max-w-screen-2xl bg-white pt-[10px] pb-[10px] pl-[90px] pr-[90px]"
  >
    <div class="header-logo">
      <!-- <img src="@/assets/logo/logo.svg" alt="logo" /> -->
      logo
    </div>
    <div class="header-search">
      <form action="#">
        <div class="flex">
          <input
            type="text"
            v-model="search"
            id="search"
            class="header-form-controll"
          />
          <label for="search" class="icon-search">
            <font-awesome-icon :icon="['fa', 'search']" />
          </label>
        </div>
      </form>
    </div>
    <div class="header-option">
      <nav class="header-menu pl-[65px] pr-[65px] gap-[35px]">
        <ul class="header-menu-option grid grid-cols-4 gap-[35px]">
          <li
            class="header-menu-item cursor-pointer bg-[#f4f5f7] rounded-[50%]"
            title="Đăng tin"
          >
            <font-awesome-icon
              class="header-icon"
              :icon="['fa', 'square-plus']"
            />
          </li>
          <li
            class="header-menu-item cursor-pointer bg-[#f4f5f7] rounded-[50%]"
            title="Nhắn tin"
          >
            <font-awesome-icon class="header-icon" :icon="['fa', 'comments']" />
          </li>
          <li
            class="header-menu-item cursor-pointer bg-[#f4f5f7] rounded-[50%]"
            title="Thông báo"
          >
            <font-awesome-icon class="header-icon" :icon="['fa', 'bell']" />
          </li>
          <li
            class="header-menu-item cursor-pointer bg-[#f4f5f7] rounded-[50%]"
          >
            <img
              src="@/assets/img/47f49bef70034c156f0f19cb052fb5a3.jpg"
              alt="avatar"
              class="header-avatar"
            />
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "@/assets/header/header.scss";
.container {
  padding: 20px 10px;
  width: 100%;
  background: #ccc;
}
</style>
