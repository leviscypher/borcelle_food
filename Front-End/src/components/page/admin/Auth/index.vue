<script lang="ts" setup>
import { ref, reactive, computed } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const useAuth = useAuthStore()
const showPassword = ref(false)
const router = useRouter()

const dataAuth = reactive({
  username: '',
  password: '',
})

const error = reactive({
  errorUsername: '',
  errorPassword: '',
})

const minLength = 8

const passwordLength = computed(() => dataAuth.password.length >= minLength)
const getError = computed(() => useAuth.getError)

const togglePassword = () => {
  showPassword.value = !showPassword.value
}
const login = async (e: any) => {
  e.preventDefault()
  if (dataAuth.username == '' && dataAuth.password == '') {
    error.errorUsername = 'Chưa nhập tên tài khoản'
    error.errorPassword = 'Chưa nhập mật khẩu'
  } else if (!passwordLength.value) {
    error.errorPassword = `Mật khẩu tối thiểu ${minLength} kí tự`
  } else if (getError.value === 401) {
    error.errorUsername = 'Tài khoản hoặc mật khẩu chưa chính xác'
    error.errorPassword = 'Tài khoản hoặc mật khẩu chưa chính xác'
  } else {
    try {
      await useAuth.fetchLoginAdmin(dataAuth)
      window.location.href = '/admin/home'
    } catch (error) {
      return
    }
  }
}
</script>

<template>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div
          class="login100-pic js-tilt"
          data-tilt
        >
          <img
            src="@/assets/auth/team.jpg"
            alt="IMG"
          />
        </div>
        <form
          class="login100-form validate-form"
          @submit.prevent
        >
          <span class="login100-form-title">
            <b>Đăng nhập hệ thông Borcelle Food</b>
          </span>
          <div class="wrap-input100 validate-input">
            <input
              class="input100 outline-none"
              v-model="dataAuth.username"
              type="text"
              placeholder="Tài khoản quản trị"
              name="username"
              id="username"
              @input="error.errorUsername = ''"
            />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="bx bx-user"></i>
            </span>
            <transition name="slide-fade">
              <small
                v-if="error.errorUsername"
                class="inline-block text-[red] text-[13px]"
                >{{ error.errorUsername }}</small
              >
            </transition>
          </div>
          <div class="wrap-input100 validate-input">
            <input
              autocomplete="off"
              class="input100 outline-none"
              v-bind:type="showPassword ? 'text' : 'password'"
              v-model="dataAuth.password"
              placeholder="Mật khẩu"
              name="current-password"
              id="password-field"
              @input="error.errorPassword = ''"
            />
            <span
              toggle="#password-field"
              class="field-icon click-eye"
              @click="togglePassword"
              >{{ showPassword ? 'Ẩn' : 'Hiện' }}</span
            >
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="bx bx-key"></i>
            </span>
            <transition name="slide-fade">
              <small
                v-if="error.errorPassword"
                class="inline-block text-[red] text-[13px]"
                >{{ error.errorPassword }}</small
              >
            </transition>
          </div>

          <div class="container-login100-form-btn">
            <base-button
              class="btn"
              @click="login"
              >Đăng nhập</base-button
            >
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/admin/auth/login.scss';
</style>
