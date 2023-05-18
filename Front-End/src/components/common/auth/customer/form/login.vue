<script lang="ts" setup>
import { reactive, ref, computed, watch } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()

const useAuth = useAuthStore()
const dataAuth = reactive({
  username: '',
  password: '',
})

const error = reactive({
  errorUsername: '',
  errorPassword: '',
  checkUser: '',
})

const emit = defineEmits(['changeFormRegister'])

const handleClick = () => {
  emit('changeFormRegister')
}

const showPassword = ref(false)

const minLength = 8

const passwordLength = computed(() => dataAuth.password.length >= minLength)
const statusLogin = ref(0)
const routeUrl = ref('')

const login = async (e: any) => {
  e.preventDefault()
  if (validate()) {
    await useAuth.fetchLogin(dataAuth)
    statusLogin.value = useAuth.getStatus
    if (statusLogin.value === 200) {
      window.location.href = route.path
    }

    if (statusLogin.value === 401) {
      error.checkUser = 'Tài khoản hoặc mật khẩu chưa chính xác'
    }
  }
}

const validate = () => {
  let valid = true
  if (dataAuth.username === '') {
    error.errorUsername = 'Chưa nhập tên tài khoản'
    valid = false
  }
  if (dataAuth.password === '') {
    error.errorPassword = 'Chưa nhập mật khẩu'
    valid = false
  }

  if (!passwordLength.value) {
    error.errorPassword = `Mật khẩu tối thiểu ${minLength} kí tự`
    valid = false
  }
  return valid
}

const togglePassword = () => {
  showPassword.value = !showPassword.value
}

watch(error, (val) => {
  if (val) {
    setTimeout(() => {
      ;(error.checkUser = ''), (error.username = ''), (error.password = '')
    }, 3000)
  }
})

const forgotUrrl = () => {
  window.location.href='/auth/forgot-password'
}
</script>

<template>
  <form
    id="form-login"
    class="flex justify-center flex-col w-3/4 mx-auto"
    @submit.prevent
  >
    <transition name="slide-fade">
      <small
        v-if="error.checkUser"
        class="inline-block text-[red] text-[13px]"
        >{{ error.checkUser }}</small
      >
    </transition>
    <div class="form-group">
      <input
        type="text"
        placeholder="Tên tài khoản"
        v-model="dataAuth.username"
        @input="error.errorUsername"
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
        @input="error.errorPassword"
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
        <a class="form-fogot text-[1.4rem]" @click="forgotUrrl">Quên mật khẩu?</a>
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
