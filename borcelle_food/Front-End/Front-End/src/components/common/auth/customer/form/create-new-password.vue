<script lang="ts" setup>
import { reactive, ref, watch } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { useRoute } from 'vue-router'

const route = useRoute()

const auth = useAuthStore()

const newPassword = ref('')
const password_confirmation = ref('')
const user_id = ref(null)


const error = reactive({
  errorNewPassword: '',
  errorPasswordConfirmation: ''
})

const changePassword = async(e: any) => {
  e.preventDefault()
  if(validate()) {
    user_id.value = route.params.id
    await auth.changePassword(user_id.value, {password: newPassword.value, password_confirmation: password_confirmation.value})
    if(auth.getStatus === 200) {
      location.href = '/'
    }
  }
}

const validate = () => {
  let valid = true
  if(newPassword.value === '') {
    error.errorNewPassword = 'nhập mật khẩu mới'
    valid = false
  }
  if(password_confirmation.value == '') {
    error.errorPasswordConfirmation = 'nhập lại mật khẩu'
    valid = false
  }

  if(password_confirmation.value !== newPassword.value) {
    error.errorPasswordConfirmation = 'nhập lại mật khẩu không chính xác'
    valid = false
  }

  return valid
}

watch(error, (val) => {
  if (val) {
    setTimeout(() => {
      ;(error.errorNewPassword = ''),
      (error.errorPasswordConfirmation = '')
    }, 3000)
  }
})
</script>
<template>
  <form class="row w-[576px] mx-auto pt-[100px] pb-[70px] pl-[50px] pr-[50px] mt-[15px] mb-[15px] bg-white">
    <h3 class="text-center pb-10">Tạo mật khẩu mới</h3>
    <p class="pb-10 text-center text-[17px]">Vui lòng tạo mật khẩu mới</p>
    <div class="form-group">
      <label class="control-label">Tạo mật khẩu mới mới</label>
      <input
        class="form-control border-black text-[16px]"
        type="text"
        placeholder="Mật khẩu mới"
        v-model="newPassword"
        @input="error.errorNewPassword"
      />
      <transition name="slide-fade">
        <small class="inline-block text-[red] text-[13px]">{{ error.errorNewPassword }}</small>
      </transition>
    </div>

    <div class="form-group">
      <label class="control-label">Nhập lại mật khẩu</label>
      <input
        class="form-control border-black text-[16px]"
        type="text"
        placeholder="Nhập lại mật khẩu"
        v-model="password_confirmation"
        @input="error.errorPasswordConfirmation"
      />
      <transition name="slide-fade">
        <small class="inline-block text-[red] text-[13px]">{{ error.errorPasswordConfirmation }}</small>
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
        @click="changePassword"
        >xác nhấn</base-button
      >
    </div>
  </form>
</template>
<style lang="scss">
[type='text']:focus:focus,
[type='password']:focus {
  border: 1px solid #ccc !important;
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
