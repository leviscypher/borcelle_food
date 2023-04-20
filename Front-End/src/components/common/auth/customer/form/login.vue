<script lang="ts" setup>
import { reactive, ref, computed } from 'vue'
import { useAuthStore } from '@/stores/auth'

const useAuth = useAuthStore()
const dataAuth = reactive({
  username: '',
  password: '',
})

const error = reactive({
  errorUsername: '',
  errorPassword: '',
})

const emit = defineEmits(['changeFormRegister'])

const handleClick = () => {
  emit('changeFormRegister')
}

const showPassword = ref(false)

const minLength = 8

const passwordLength = computed(() => dataAuth.password.length >= minLength)
const getError = computed(() => useAuth.getError)

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
     await useAuth.fetchLogin(dataAuth)
      window.location.href= "/"
    } catch (error) {
      return
    }
  }
}

const togglePassword = () => {
  showPassword.value = !showPassword.value
}
</script>

<template>
  <form
    id="form-login"
    class="flex justify-center flex-col w-3/4 mx-auto"
    @submit.prevent
  >
    <div class="form-group">
      <input
        type="text"
        placeholder="Tên tài khoản"
        v-model="dataAuth.username"
        @input="error.errorUsername = ''"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2 border-none bg-transparent"
      />
      <transition name="slide-fade">
        <small
          v-if="error.errorUsername"
          class="inline-block text-[red] text-[13px]"
          >{{ error.errorUsername }}</small
        >
      </transition>
    </div>

    <div class="form-group relative mt-6">
      <input
        v-bind:type="showPassword ? 'text' : 'password'"
        placeholder="Mật khẩu"
        v-model="dataAuth.password"
        @input="error.errorPassword = ''"
        class="form-input w-full text-[1.6rem] py-3 outline-none border-none relative pl-2 pr-2"
      />
      <span
        @click="togglePassword"
        class="form-show-pass absolute right-0 translate-y-2/4 text-[1.4rem] cursor-pointer text-[var(--pale-yellow)]"
        >{{ showPassword ? 'Ẩn' : 'Hiện' }}</span
      >
      <transition name="slide-fade">
        <small
          v-if="error.errorPassword"
          class="inline-block text-[red] text-[13px]"
          >{{ error.errorPassword }}</small
        >
      </transition>
    </div>

    <div class="form-group mt-6">
      <button
        class="w-full bg-[var(--pale-yellow)] border-none text-[var(--white)] font-medium text-[1.8rem] py-6 rounded mt-10 hover:opacity-[0.6]"
        @click="login"
      >
        Đăng nhập
      </button>

      <div class="form-group mt-16">
        <router-link
          to="/auth/forgot-password"
          @click="handleCloseForm"
          class="form-fogot text-[1.4rem]"
          >Quên mật khẩu?</router-link
        >
        <p class="mt-2">
          Chưa có tài khoản?
          <a
            class="form-register-link"
            @click.prevent="handleClick"
            >Tạo tài khoản.</a
          >
        </p>
      </div>
    </div>
  </form>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/auth/auth.scss';
</style>
