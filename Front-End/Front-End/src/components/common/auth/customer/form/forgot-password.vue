<script lang="ts" setup>
import { reactive, ref, watch } from 'vue'
import { useAuthStore } from '@/stores/auth'

const auth = useAuthStore()

const email = ref('')
const error = reactive({
  email: '',
})

const checkEmail = async (e: any) => {
  e.preventDefault()
  if(validate()) {
    await auth.sendEmail({email: email.value});
    if(auth.getStatus === 200) {
      window.localStorage.setItem('step', '1');
      location.href='/auth/verification'
    }
  }
}

const validate = () => {
  let valid = true
  if(email.value === '') {
    error.email = 'vui lòng nhập email đã đăng kí tài khoản'
    valid = false
  }
  return valid
}

watch(error, (val) => {
  if (val) {
    setTimeout(() => {
      ;(error.email = '')
    }, 3000)
  }
})
</script>
<template>
  <form class="row w-[576px]  mx-auto my-[40px] pt-[100px] pb-[70px] pl-[50px] pr-[50px]">
    <h3 class="text-center pb-10">Tìm tài khoản của bạn</h3>
    <p class="pb-10 text-center text-[17px]">Nhập email để nhận mã xác thực tài khoản</p>
    <div class="form-group">
      <label class="control-label">Nhập email</label>
      <input
        class="form-control border-black text-[16px]"
        type="text"
        v-model="email"
        @input="error.email"
        placeholder="Nhập email"
      />
      <transition name="slide-fade">
        <small class="inline-block text-[red] text-[13px]">{{ error.email }}</small>
      </transition>
    </div>
    <div class="flex gap-[50px]">
      <router-link
        to="/"
        class="w-[50%] m-0 rounded-[5px] decoration-none text-black come-back"
        >Quay lại</router-link
      >
      <base-button
        class="w-[50%] m-0 rounded-[5px]"
        @click="checkEmail"
        >Tìm kiếm</base-button
      >
    </div>
  </form>
</template>
<style lang="scss">
[type='text']:focus:focus,
[type='password']:focus {
  border: 1px solid #ccc;
  box-shadow: none;
}

.come-back {
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: var(--light-gray-with-blue-tint);

  &:hover {
    text-decoration: none;
  }
}
</style>
