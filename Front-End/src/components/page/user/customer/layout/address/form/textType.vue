<script lang="ts" setup></script>
<template>
  <div class="form-group flex item-center mb-8">
    <label
      for=""
      class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
      >Họ và Tên:</label
    >
    <div class="flex-1">
      <input
        type="text"
        class="form-control"
        placeholder="nhập tên"
        maxlength="255"
      />
    </div>
  </div>

  <div class="form-group flex item-center mb-8">
    <label
      for=""
      class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
      >Tên công ty:</label
    >
    <div class="flex-1">
      <input
        type="text"
        class="form-control"
        placeholder="nhập tên công ty"
        maxlength="255"
      />
    </div>
  </div>

  <div class="form-group flex item-center mb-8">
    <label
      for=""
      class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
      >Số điện thoai:</label
    >
    <div class="flex-1">
      <input
        type="text"
        class="form-control"
        placeholder="nhập số điện thoại"
        maxlength="10"
      />
    </div>
  </div>
</template>
<style lang="scss" scoped></style>
