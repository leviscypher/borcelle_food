<script lang="ts" setup>
import { ref } from 'vue'
</script>

<template lang="">
  <div class="order my-10 mx-8">
    <h4 class="order-heading mb-5">Đơn hàng của tôi</h4>
    <div clas="order-navbar">
      <ul class="order-navbar-item w-full flex justify-between items-center bg-[#fff]">
        <li class="order-navbar-list active cursor-pointer py-6 px-14">Tất cả đơn</li>
        <li class="order-navbar-list cursor-pointer py-6 px-14">Chờ thanh toán</li>
        <li class="order-navbar-list cursor-pointer py-6 px-14">Đang xử lý</li>
        <li class="order-navbar-list cursor-pointer py-6 px-14">Đang vận chuyển</li>
        <li class="order-navbar-list cursor-pointer py-6 px-14">Đã giao</li>
        <li class="order-navbar-list cursor-pointer py-6 px-14">Đã hủy</li>
      </ul>
    </div>
    <div class="order-search mt-10 form-control flex justify-between items-center px-0">
      <font-awesome-icon
        icon="fa-solid fa-magnifying-glass"
        class="px-10"
      />
      <input
        type="search"
        class="flex-1 h-full outline-none mr-6 border-none"
        maxlength="400"
      />
      <button class="btn-search bg-[#fff] text-[var(--pale-yellow)] pr-[6px] pl-[16px]">Tìm đơn hàng</button>
    </div>
    <div class="order-content w-full bg-[#fff] my-10">
      <div class="text-center py-24">
        <img
          class="w-[180px]"
          src="@/assets/image/empty-order.png"
          alt=""
        />
        <nav>chưa có đơn hàng</nav>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
.order-navbar-list {
  color: #808089;
}

.order-navbar-list.active {
  color: var(--pale-yellow) !important;
  border-bottom: 2px solid var(--pale-yellow);
}

.btn-search {
  border-top: none;
  border-right: none;
  border-bottom: none;
  border-left: 2px solid rgb(221, 221, 227);
}
</style>
