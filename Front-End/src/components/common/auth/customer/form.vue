<script lang="ts" setup>
import { ref } from 'vue'

import FormLogin from './form/login.vue'
import FormRegister from './form/register.vue'

const form = ref('login')

const emit = defineEmits(['close'])

const handleActiveFormLogin = () => {
  form.value = 'login'
}

const handleActiveFormRegister = () => {
  form.value = 'register'
}

const handleCloseForm = () => {
  emit('close')
}
</script>

<template>
  <div class="flex w-full fixed h-full left-0 bottom-0 top-0 right-0 z-[101] items-center">
    <div class="wrapper w-[800px] z-[9999] mx-auto opacity-1 rounded-[30px] grid grid-cols-3 relative">
      <div class="col-span-2 rounded-l-[30px] bg-[#fff]">
        <h1 class="w-3/4 mx-auto mb-10 mt-10">{{ form === 'login' ? 'Đăng nhập' : 'Đăng kí' }}</h1>
        
        <div v-if="form === 'login'">
          <form-login @changeFormRegister="handleActiveFormRegister" />
        </div>
        <div v-else-if="form === 'register'">
          <form-register @changFormLogin="handleActiveFormLogin" />
        </div>
      </div>
      
      <!-- ----------------------------------- -->
      
      <div class="col-span-1 rounded-r-[30px] bg-[var(--pale-yellow)] flex items-center justify-center flex-col">
        <img class="w-[200px]" src="@/assets/logo/logo.png" alt="" />
        <div class="text-center mb-10">
          <h4 class="text-[var(--white)] text-[1.6rem] font-bold">Mua đồ ăn tại borcelle food</h4>
          <span class="text-[1.4rem] text-[var(--white)]">Phục vụ nhanh chóng</span>
        </div>
      </div>
      
      <div
        class="absolute w-[40px] h-[40px] rounded-[50px] bg-[#fff] top-[-14px] right-[-14px] flex items-center justify-center">
        <span class="text-[2.8rem] cursor-pointer opacity-[0.6]" @click="handleCloseForm">
          <font-awesome-icon icon="fa-solid fa-xmark" />
        </span>
      </div>
    </div>
    <div class="overlay w-full h-full fixed left-0 bottom-0 top-0 right-0 z-[100]" @click="handleCloseForm"></div>
  </div>
</template>
<style lang="scss" scoped>
.overlay {
  background: rgba(0, 0, 0, 0.53);
}
</style>
