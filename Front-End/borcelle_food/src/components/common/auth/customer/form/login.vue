<script lang="ts" setup>
import { reactive, ref } from 'vue';

const emit = defineEmits(['changeFormRegister', "close"])

const handleClick = () => {
  emit('changeFormRegister')
}

const username = ref("")
const password = ref("")
const error = reactive({
  errorUsername: '',
  errorPassword: ''
})
const showPassword = ref(false);

const login = (e: any) => {
  e.preventDefault()
  if (username.value == '') {
    error.errorUsername = "Chưa nhập tên tài khoản"
  } else {
    error.errorUsername = ""
  }
  if (password.value == '') {
    error.errorPassword = "Chưa nhập mật khẩu"
  } else {
    error.errorPassword = ""
  }
}
const togglePassword = () => {
  showPassword.value = !showPassword.value;
}
const handleCloseForm = () => {
  emit('close')
}
</script>

<template>
  <form id="form-login" class="flex justify-center flex-col w-3/4 mx-auto" @submit.prevent>
    <div class="form-group">
      <input type="text" placeholder="tên tài khoản" v-model="username"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2 border-none" />
      <small class="inline-block text-[red]">{{ error.errorUsername }}</small>
    </div>

    <div class="form-group relative mt-6">
      <input v-bind:type="showPassword ? 'text' : 'password'" placeholder="mật khẩu" v-model="password"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2" />
      <span @click="togglePassword"
        class="form-show-pass absolute right-0 translate-y-2/4 text-[1.4rem] cursor-pointer text-[var(--pale-yellow)]">
        {{ showPassword ? 'Ẩn' : 'Hiện' }} </span>
      <small class="inline-block text-[red]">{{ error.errorPassword }}</small>
    </div>

    <div class="form-group mt-6">
      <button
        class="w-full bg-[var(--pale-yellow)] border-none text-[var(--white)] font-medium text-[1.8rem] py-6 rounded mt-10 hover:opacity-[0.6]"
        @click="login">
        Đăng nhập
      </button>

      <div class="form-group mt-16">
        <router-link to="/auth/forgot-password" @click="handleCloseForm" class="form-fogot text-[1.4rem]">Quên mật
          khẩu?</router-link>
        <p class="mt-2">
          Chưa có tài khoản?
          <a class="form-register-link" @click.prevent="handleClick">Tạo tài khoản.</a>
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

.form-fogot,
.form-register-link {
  text-decoration: none;
  cursor: pointer;
}
</style>
