<script lang="ts" setup>
import { reactive, ref } from 'vue';
import axios from "axios"
import { useAuthStore } from '@/stores/auth';

const isSuccess = ref(false)

const useAuth = useAuthStore();
const emit = defineEmits(['changFormLogin'])
const handleClick = () => {
  emit('changFormLogin')
}

const dataAuth = reactive({
  username: '',
  password: '',
  password_confirmation: '',
})

const error = reactive({
  errorUsername: '',
  errorPassword: '',
  errorPassword_confirmation: ''
})
const showPassword = ref(false);
const register = async (e: any) => {
  e.preventDefault()
  if (dataAuth.username === '' && dataAuth.password === '' && dataAuth.password_confirmation === '') {
    error.errorUsername = "Chưa nhập tên tài khoản"
    error.errorPassword = "Chưa nhập mật khẩu"
    error.errorPassword_confirmation = "Chưa nhập mật khẩu"
  }
  try {
    useAuth.fetchRegister(dataAuth)
  }
  catch (error) {
    return;
  }

}
const togglePassword = () => {
  showPassword.value = !showPassword.value;
}
</script>

<template lang="">
  <form
    id="form-register"
    class="flex justify-center flex-col w-3/4 mx-auto"
    @submit.prevent
  >
  <el-alert title="Đăng ký thành công" type="success" class="mb-10" :class="{active:isSuccess}"  center show-icon />
    <div class="form-group">
      <input
        type="text"
        placeholder="tên tài khoản"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
        v-model="dataAuth.username"
      />
      <small class="inline-block text-[red]">{{ error.errorUsername }}</small>
    </div>

    <div class="form-group relative mt-6">
      <input
          v-bind:type="showPassword ? 'text' : 'password'"
        placeholder="mật khẩu"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
        v-model="dataAuth.password"
      />
      <span @click="togglePassword"
        class="form-show-pass absolute right-0 translate-y-2/4 text-[1.4rem] cursor-pointer text-[var(--pale-yellow)]"
        >{{ showPassword ? 'Ẩn' : 'Hiện' }}</span
      >
      <small class="inline-block text-[red]">{{ error.errorPassword }}</small>
    </div>

    <div class="form-group relative mt-6">
      <input
          v-bind:type="showPassword ? 'text' : 'password'"
        placeholder="nhập lại mật khẩu"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
        v-model="dataAuth.password_confirmation"
      />
      <small class="inline-block text-[red]">{{ error.errorPassword_confirmation }}</small>
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
.form-input {
  border: none;
  border-bottom: 1px solid #000 !important;
}

.form-login-link {
  text-decoration: none;
  cursor: pointer;
}
</style>
