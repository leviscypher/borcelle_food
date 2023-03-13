<script lang="ts" setup></script>

<template lang="">
  <div class="address my-10 mx-8">
    <h4>Số địa chỉ</h4>
    <router-link
      to="/customer/address/create"
      class="no-underline"
    >
      <div
        class="address-create w-full h-[80px] bg-[#fff] flex items-center justify-center cursor-pointer mt-10 border-dashed border-[1px] border-[#d8d8d8]"
      >
        <font-awesome-icon
          icon="fa-solid fa-plus"
          class="text-[4rem] font-normal opacity-[0.6] mr-6"
        />
        <p class="text-[var(--pale-yellow)] text-[1.8rem]">Thêm địa chỉ mới</p>
      </div>
    </router-link>
  </div>
</template>

<style lang="scss"></style>
