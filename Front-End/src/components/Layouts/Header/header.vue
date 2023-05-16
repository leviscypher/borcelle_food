<script lang="ts" setup>
import { ref, onMounted, computed, watch } from 'vue'
import CustomerForm from '@/components/common/auth/customer/form.vue'
import axios from 'axios'
import constants from '@/constants'
import { useCart, useUserInfo } from '@/stores/user'

const isOpen = ref(false)
const userData = ref('')
const cart = useCart()
const user = useUserInfo()
const userId = ref(0)

const changeLoginForm = () => {
  isOpen.value = !isOpen.value
}

onMounted(async () => {
  if (localStorage.getItem('token')) {
    await user.fetchUser()
    userData.value = user.getUser.username
    userId.value = user.getUser.id
  }
})

const logout = async () => {
  try {
    await axios.post('http://127.0.0.1:8000/api/logout', {}, constants.routeApis.TOKEN).then((res) => {
      localStorage.removeItem('token')
      userData.value = ''
      location.href = '/'
    })
  } catch (error) {
    alert(error)
  }
}

const getCartNumber = computed(() => {
  const cartTotal = JSON.parse(localStorage.getItem('cart'))
  let count = 0
  for (let i in cartTotal) {
    count += cartTotal[i].quantity
  }
  cart.changeCartNumber(count)
  return cart.getCartNumber
})

watch(getCartNumber, (newValue) => {
  return newValue
})
</script>

<template>
  <div class="header flex justify-between pl-[150px] pr-[150px] items-center min-h-0">
    <div class="header-logo">
      <router-link to="/">
        <img
          src="@/assets/logo/logo.png"
          class="header-photo"
          alt=""
        />
      </router-link>
    </div>
    <div class="header-navbar">
      <nav class="header-navbar-nav">
        <ul class="header-navbar-menu flex">
          <li class="header-navbar-chill">
            <router-link
              to="/"
              class="header-navbar-link decoration-none"
            >
              Trang chủ
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link
              to="/order"
              class="header-navbar-link decoration-none"
            >
              Đặt hàng
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link
              to="/blog"
              class="header-navbar-link decoration-none"
            >
              Tin tức
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link
              to="/contact"
              class="header-navbar-link decoration-none"
            >
              Liên hệ
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header-individual flex gap-[40px] items-center">
      <div class="header-cart">
        <router-link
          to="/cart"
          class="header-cart-link"
        >
          <font-awesome-icon icon="fa-solid fa-cart-shopping" />
          <span class="header-cart-number bg-[var(--pale-yellow)]">{{ getCartNumber }}</span>
        </router-link>
      </div>
      <div class="header-user">
        <div v-if="userData">
          <nav class="header-nav p-0">
            <ul class="header-nav__list list-none p-0">
              <li class="header-nav__item relative p-0">
                <div class="header-nav__link"><font-awesome-icon :icon="['far', 'user']" /> {{ userData }}</div>
                <ul class="header-nav__submenu list-none absolute p-0">
                  <li class="header-nav__chii__item">
                    <router-link
                      :to="`/customer/edit/${userId}`"
                      class="header__link"
                      >Trang cá nhân</router-link
                    >
                  </li>
                  <li class="header-nav__chii__item">
                    <router-link
                      :to="`/customer/order/${userId}`"
                      class="header__link"
                      >Thông tin đơn hàng</router-link
                    >
                  </li>
                  <li class="header-nav__chii__item">
                    <div
                      @click="logout"
                      class="header__link"
                    >
                      Đăng xuất
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
        <base-button
          v-else
          @click="changeLoginForm"
          >Đăng nhập</base-button
        >
      </div>
    </div>
  </div>
  <div v-if="isOpen">
    <customer-form @close="changeLoginForm" />
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/header/header.scss';

.example-showcase .el-dropdown + .el-dropdown {
  margin-left: 15px;
}

.example-showcase .el-dropdown-link {
  cursor: pointer;
  color: var(--el-color-primary);
  display: flex;
  align-items: center;
}
</style>
