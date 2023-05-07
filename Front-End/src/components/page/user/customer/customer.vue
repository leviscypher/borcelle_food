<script lang="ts" setup>
import { ref, onMounted, computed } from 'vue'
import { RouterView } from 'vue-router'
import { useUserInfo } from '@/stores/user'
const title = ref('Thông tin tài khoản')

const userInfo = useUserInfo()

onMounted(async () => {
  await userInfo.fetchUser()
})

const getUserLogin = computed(() => {
  return userInfo.getUser
})
</script>

<template>
  <base-banner :title="title" />

  <div class="customer w-[1380px] h-auto mx-auto my-8 grid grid-cols-5 gap-4 bg-[#f5f5fa] rounded-lg">
    <div class="col-span-1">
      <div class="flex items-center ml-8 my-8">
        <div
          class="text-[3rem] w-[60px] h-[60px] bg-[var(--pale-yellow)] rounded-[50%] text-[#fff] flex items-center justify-center"
        >
          <font-awesome-icon icon="fa-solid fa-user" />
        </div>
        <div class="ml-4">
          <p>tài khoản của</p>
          <h4>{{ getUserLogin.username }}</h4>
        </div>
      </div>

      <div class="navbar">
        <ul class="navbar-item list-none">
          <li>
            <router-link
              :to="`/customer/edit/${getUserLogin.id}`"
              class="no-underline"
              ><font-awesome-icon icon="fa-solid fa-user" />Thông Tin Tài Khoản</router-link
            >
          </li>
          <li>
            <router-link
              :to="`/customer/order/${getUserLogin.id}`"
              class="no-underline"
              ><font-awesome-icon icon="fa-brands fa-product-hunt" />Quản lý đơn hàng</router-link
            >
          </li>
          <li>
            <router-link
              :to="`/customer/address/${getUserLogin.id}`"
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

  <!-- hủy đơn -->
  <!-- <div class="fixed w-full h-[100vh] top-0 left-0 bottom-0 right-0 bg-gray-500 bg-opacity-50 z-[99] flex items-center">
    <div class="z-[999] w-[400px] bg-white mx-auto rounded-lg">
      <div class="p-[20px]">
        <div class="flex items-center">
          <font-awesome-icon
            icon="fa-sharp fa-light fa-triangle-exclamation"
            class="text-3xl text-danger"
          />
          <h4 class="mb-0 ml-4">yêu cầu hủy đơn hàng</h4>
        </div>
        <div class="form-group mt-10">
          <label for="">lý do hủy:</label>
          <input type="text" class="form-control text-xl">
        </div>
        <div class="flex justify-end mt-8">
          <button class="btn-info border-none px-[8px] py-[10px] mr-[10px] rounded-xl text-[14px] hover">Yêu cầu hủy đơn</button>
          <button class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-[14px] hover">Hủy</button>
        </div>
      </div>
    </div>
  </div> -->
</template>

<style lang="scss" scoped>
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
