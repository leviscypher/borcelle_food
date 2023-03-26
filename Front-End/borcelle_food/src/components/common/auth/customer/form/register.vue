<script lang="ts" setup>
import { reactive, ref } from 'vue';

const emit = defineEmits(['changFormLogin'])

const handleClick = () => {
  emit('changFormLogin')
}
const username = ref("")
const password = ref("")
const newPassword = ref("")
const error = reactive({
  errorUsername: '',
  errorPassword: '',
  errorNewPassword: ''
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
  if (newPassword.value == '') {
    error.errorNewPassword = "Chưa nhập mật khẩu"
  } else {
    error.errorNewPassword = ""
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
    <div class="form-group">
      <input
        type="text"
        placeholder="tên tài khoản"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
        @keydown="error"
      />
      <small class="inline-block text-[red]">{{ error.errorUsername }}</small>
    </div>

    <div class="form-group relative mt-6">
      <input
          v-bind:type="showPassword ? 'text' : 'password'"
        placeholder="mật khẩu"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
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
      />
      <small class="inline-block text-[red]">{{ error.errorNewPassword }}</small>
    </div>

    <div class="form-group mt-6">
      <button
        class="w-full bg-[var(--pale-yellow)] border-none text-[var(--white)] font-medium text-[1.8rem] py-6 rounded mt-10 hover:opacity-[0.6]"
      @click="login"
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
