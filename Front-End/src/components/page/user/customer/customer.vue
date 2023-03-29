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

      <div class="navbar">
        <ul class="navbar-item list-none">
          <li>
            <router-link
              to="/customer/edit"
              class="no-underline"
              ><font-awesome-icon icon="fa-solid fa-user" />Thông Tin Tài Khoản</router-link
            >
          </li>
          <li>
            <router-link
              to="/customer/order"
              class="no-underline"
              ><font-awesome-icon icon="fa-brands fa-product-hunt" />Quản lý đơn hàng</router-link
            >
          </li>
          <li>
            <router-link
              to="/customer/address"
              class="no-underline"
              ><font-awesome-icon icon="fa-solid fa-location-dot" />Số địa chỉ</router-link
            >
          </li>
          <li>
            <router-link
              to="/customer/payment"
              class="no-underline"
              ><font-awesome-icon icon="fa-solid fa-money-bill" />Thông tin thanh toán</router-link
            >
          </li>
        </ul>
      </div>
    </div>
    <div class="col-span-4">
      <router-view />
    </div>
  </div>
</template>

<style lang="scss" scoped>
/* .active-link {
  background: #000;
} */
.navbar-item li a {
  padding: 10px;
  display: block;
  margin-bottom: 10px;
  color: var(--black);
  border-radius: 10px;
  transition: all 0.6s ease-in-out;
}

.navbar-item li a:hover {
  color: var(--white);
  background-color: var(--pale-yellow);
}

.navbar-item li a svg {
  margin-right: 16px;
}
.active-link.exact-active-link {
  color: var(--white);
  background-color: var(--pale-yellow);
}
</style>
