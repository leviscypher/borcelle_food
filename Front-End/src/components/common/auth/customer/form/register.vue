<script lang="ts" setup>
import { reactive, ref, computed } from 'vue'
import { useAuthStore } from '@/stores/auth'

const isSuccess = ref('')
const useAuth = useAuthStore()
const emit = defineEmits(['changFormLogin'])

const handleClick = () => {
  emit('changFormLogin')
}

const dataAuth = reactive({
  username: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const error = reactive({
  errorUsername: '',
  errorEmail: '',
  errorPassword: '',
  errorPassword_confirmation: '',
})

const getStatus = computed(() => {
  return useAuth.getStatus
})

const showPassword = ref(false)
const re =
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const register = async (e: any) => {
  e.preventDefault()
  const minLength = 8
  const isEmpty = (value: string) => !value.trim()
  const emailIsValid = (email: string) => re.test(email.trim())

  error.errorUsername = isEmpty(dataAuth.username) ? 'Chưa nhập tên tài khoản' : ''
  error.errorEmail = isEmpty(dataAuth.email)
    ? 'Chưa nhập email'
    : emailIsValid(dataAuth.email)
    ? ''
    : 'Email không đúng định dạng'
  error.errorPassword = isEmpty(dataAuth.password)
    ? 'Chưa nhập mật khẩu'
    : dataAuth.password.length >= minLength
    ? ''
    : `Mật khẩu phải có ít nhất ${minLength} kí tự`
  error.errorPassword_confirmation = isEmpty(dataAuth.password_confirmation)
    ? 'Chưa nhập xác nhận mật khẩu'
    : dataAuth.password_confirmation === dataAuth.password
    ? dataAuth.password_confirmation.length >= minLength
      ? ''
      : `Mật khẩu phải có ít nhất ${minLength} kí tự`
    : 'Mật khẩu xác nhận không trùng khớp'

  if (!error.errorUsername && !error.errorEmail && !error.errorPassword && !error.errorPassword_confirmation) {
    try {
      await useAuth.fetchRegister(dataAuth)
      switch (getStatus.value) {
        case 200:
          isSuccess.value = '200'
          break
        case 422:
          isSuccess.value = '422'
          break
        default:
          break
      }

    } catch (error) {
      isSuccess.value = null
    }
  }
}
const togglePassword = () => {
  showPassword.value = !showPassword.value
}
</script>

<template >
  <form
    id="form-register"
    class="flex justify-center flex-col w-3/4 mx-auto"
    @submit.prevent
  >
    <div
      v-if="isSuccess === '422'"
      class="alert-danger p-[10px] rounded-[0.357rem] text-center text-[14px]"
      role="alert"
    >
      Tên tài khoản và email đã được đăng ký
    </div>
    <div
      v-else-if="isSuccess === '200'"
      class="alert alert-success text-[14px]"
      role="alert"
    >
      Đăng ký thành công
    </div>

    <div class="form-group">
      <input
        type="text"
        placeholder="tên tài khoản"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2 border-none"
        v-model="dataAuth.username"
        @input="error.errorUsername = ''"
      />
      <transition name="slide-fade">
        <small
          v-if="error.errorUsername"
          class="inline-block text-[red]"
          >{{ error.errorUsername }}</small
        >
      </transition>
    </div>
    <div class="form-group">
      <input
        type="text"
        placeholder="Nhập địa chỉ email"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2 border-none"
        v-model="dataAuth.email"
        @input="error.errorEmail = ''"
      />
      <transition name="slide-fade">
        <small
          v-if="error.errorEmail"
          class="inline-block text-[red]"
          >{{ error.errorEmail }}</small
        >
      </transition>
    </div>

    <div class="form-group relative mt-6">
      <input
        v-bind:type="showPassword ? 'text' : 'password'"
        placeholder="mật khẩu"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2 border-none"
        v-model="dataAuth.password"
        @input="error.errorPassword = ''"
      />
      <span
        @click="togglePassword"
        class="form-show-pass absolute right-0 translate-y-2/4 text-[1.4rem] cursor-pointer text-[var(--pale-yellow)]"
        >{{ showPassword ? 'Ẩn' : 'Hiện' }}</span
      >
      <transition name="slide-fade">
        <small
          v-if="error.errorPassword"
          class="inline-block text-[red]"
          >{{ error.errorPassword }}</small
        >
      </transition>
    </div>
    <div class="form-group relative mt-6">
      <input
        v-bind:type="showPassword ? 'text' : 'password'"
        placeholder="nhập lại mật khẩu"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2 border-none"
        v-model="dataAuth.password_confirmation"
        @input="error.errorPassword_confirmation = ''"
      />
      <transition name="slide-fade">
        <small
          v-if="error.errorPassword_confirmation"
          class="inline-block text-[red]"
          >{{ error.errorPassword_confirmation }}</small
        >
      </transition>
    </div>
    <div class="form-group mt-6">
      <button
        class="w-full bg-[var(--pale-yellow)] border-none text-[var(--white)] font-medium text-[1.8rem] py-6 rounded mt-10 hover:opacity-[0.6]"
        @click="register"
      >
        Đăng kí
      </button>
      <div class="form-group mt-12">
        <p class="mt-2">
          Đã có tài khoản?
          <a
            href=""
            class="form-login-link"
            @click.prevent="handleClick"
            >Đăng nhập</a
          >
        </p>
      </div>
    </div>
  </form>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/auth/auth.scss';
</style>
