<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import constants from '@/constants'
import { useRouter } from 'vue-router'
const router = useRouter()

const userData = ref('')

onMounted(async () => {
  if (localStorage.getItem('token-admin')) {
    const data = await axios.get('http://127.0.0.1:8000/api/user-login', constants.routeApis.TOKENADMIN)
    userData.value = data.data.username
  }
})

const logout = async () => {
  try {
    await axios
      .post('http://127.0.0.1:8000/api/logout', {}, constants.routeApis.TOKEN_LOGOUT_ADMIN)
      .then((res) => {
        userData.value = ''
        localStorage.removeItem('token-admin')
        router.push('/admin/login')
      })
  } catch (error) {
    alert(error)
  }
}
</script>
<template>
  <div class="sidebar close">
    <div class="logo-details">
      <img
        src="@/assets/logo/logo.png"
        class="logo-details-photo"
        alt=""
      />
      <span class="logo_name">Borcelle Food</span>
    </div>
    <ul class="nav-links">
      <li>
        <router-link to="/admin/home">
          <i class="bx bx-tachometer"></i>
          <span class="link_name">Bản điều khiển</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/category">
          <i class="bx bx-collection"></i>
          <span class="link_name">Danh mục sản phẩm</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/account-management">
          <i class="bx bx-collection"></i>
          <span class="link_name">Quản lý tài khoản</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/employee-management">
          <i class="app-menu__icon bx bx-id-card"></i>
          <span class="link_name"> Quản lý nhân viên</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/customer-management">
          <i class="app-menu__icon bx bx-user-voice"> </i>
          <span class="link_name">Quản lý khách hàng</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/product-management">
          <i class="app-menu__icon bx bx-purchase-tag-alt"></i>
          <span class="link_name">Quản lý sản phẩm</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/order-management">
          <i class="app-menu__icon bx bx-task"></i>
          <span class="link_name">Quản lý đơn hàng</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/internal-management">
          <i class="app-menu__icon bx bx-run"></i>
          <span class="link_name">Quản lý nội bộ</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/salary-statement">
          <i class="app-menu__icon bx bx-dollar"></i>
          <span class="link_name">Bảng kê lương</span>
        </router-link>
      </li>
      <li>
        <router-link to="/admin/sales-report">
          <i class="app-menu__icon bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Báo cáo doanh thu</span>
        </router-link>
      </li>

      <li>
        <div class="profile-details">
          <div class="profile-content">
            <img
              src="@/assets/image/profile.jpg"
              alt="profileImg"
            />
          </div>
          <div class="name-job">
            <div class="profile_name">{{ userData }}</div>
            <div class="job">Web Desginer</div>
          </div>
          <i
            class="bx bx-log-out"
            @click="logout"
          ></i>
        </div>
      </li>
    </ul>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/admin/sidebar.scss';
</style>
