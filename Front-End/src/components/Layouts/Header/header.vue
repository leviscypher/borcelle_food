<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import CustomerForm from '@/components/common/auth/customer/form.vue'
import axios from "axios"
import constants from '@/constants'
import { ArrowDown } from '@element-plus/icons-vue'

const isOpen = ref(false)
const userData = ref('')

const changeLoginForm = () => {
  isOpen.value = !isOpen.value
}

onMounted(async () => {
  if (localStorage.getItem("token")) {
    const data = await axios.get('http://127.0.0.1:8000/api/user-login', constants.routeApis.TOKEN)
    userData.value = data.data.username
  }
})

const logout = async () => {
  try {
    await axios.get('http://127.0.0.1:8000/api/logout', constants.routeApis.TOKEN_LOGOUT).then((res) => {
      localStorage.removeItem('token')
    });
  }
  catch (error) {
    alert(error)
  }
}

</script>

<template>
  <div class="header flex justify-between pl-[150px] pr-[150px] items-center min-h-0">
    <div class="header-logo">
      <router-link to="/">
        <img src="@/assets/logo/logo.png" class="header-photo" alt="" />
      </router-link>
    </div>
    <div class="header-navbar">
      <nav class="header-navbar-nav">
        <ul class="header-navbar-menu flex">
          <li class="header-navbar-chill">
            <router-link to="/" class="header-navbar-link decoration-none">
              Trang chủ
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link to="/order" class="header-navbar-link decoration-none">
              Đặt hàng
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link to="/blog" class="header-navbar-link decoration-none">
              TIn tức
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link to="/contact" class="header-navbar-link decoration-none">
              Liên hệ
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header-individual flex gap-[40px] items-center">
      <div class="header-cart">
        <router-link to="/cart" class="header-cart-link">
          <font-awesome-icon icon="fa-solid fa-cart-shopping" />
          <span class="header-cart-number">1</span>
        </router-link>
      </div>
      <div class="header-user">
        <div v-if="userData">
          <el-dropdown>
            <span class="el-dropdown-link">
              {{ userData }}
              <el-icon class="el-icon--right">
                <arrow-down />
              </el-icon>
            </span>
            <template #dropdown>
              <el-dropdown-menu>
                <el-dropdown-item>Thông tin tài khoản</el-dropdown-item>
                <el-dropdown-item>Đơn hàng</el-dropdown-item>
                <el-dropdown-item>
                  <div @click="logout">Đăng xuất</div>
                </el-dropdown-item>
              </el-dropdown-menu>
            </template>
          </el-dropdown>
        </div>
        <base-button v-else @click="changeLoginForm">Đăng nhập</base-button>
      </div>
    </div>
  </div>
  <div v-if="isOpen">
    <customer-form @close="changeLoginForm" />
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/header/header.scss';

.example-showcase .el-dropdown+.el-dropdown {
  margin-left: 15px;
}

.example-showcase .el-dropdown-link {
  cursor: pointer;
  color: var(--el-color-primary);
  display: flex;
  align-items: center;
}
</style>
