<script lang="ts" setup>
import { reactive, ref, onMounted, watch } from 'vue'
import { useAuthStore } from '@/stores/auth'

const auth = useAuthStore()


const token = ref(null)
const countdown = ref(60)
const id = ref(null)


const error = reactive({
  token: '',
})

const checkToken = async (e: any) => {
  e.preventDefault()
  if(validate()) {
    await auth.checkToken({token: token.value});
    if(auth.getStatus === 200) {
      window.localStorage.setItem('step', '2');
      location.href='/auth/create-new-password/'  + auth.getId
    }

    if(auth.getStatus === 401) {
      error.token = 'mã xác thực không chính xác.'
    }
  }
}

const validate = () => {
  let valid = true
  if(token.value === null) {
    error.token = 'nhập mã xác thực'
    valid = false
  }
  return valid
}

watch(error, (val) => {
  if (val) {
    setTimeout(() => {
      ;(error.token = '')
    }, 3000)
  }
})

const startCountdown = () => {
    setInterval(() => {
        countdown.value--;
    if (countdown.value === 0) {
      clearInterval
      location.href = '/auth/forgot-password'
    }
  }, 1000);
};

onMounted(() => {
  startCountdown();
});

</script>
<template>
  <form class="row w-[576px] mx-auto my-[40px] pt-[100px] pb-[70px] pl-[50px] pr-[50px] mt-[15px] mb-[15px] bg-white">
    <h3 class="text-center pb-10">Nhập mã xác thực tài khoản</h3>
    <p class="pb-10 text-center text-[17px] flex items-center">Mã xác nhận đã được gửi tới email của bạn
       <h4 class="mb-0 text-[30px] ml-[10px] text-[red]">{{ countdown }}s</h4>
    </p>
    <div class="form-group">
      <label class="control-label">Nhập mã</label>
      <input
        class="form-control border-black text-[16px]"
        type="number"
        placeholder="Nhập mã xác thưc"
        v-model="token"
        @input="error.token"
      />
      <transition name="slide-fade">
        <small class="inline-block text-[red] text-[13px]">{{ error.token }}</small>
      </transition>
    </div>
    <div class="flex gap-[50px]">
      <router-link
        to="/"
        class="w-[50%] m-0 rounded-[5px] decoration-none text-black come-back"
        >Quay lại</router-link
      >
      <base-button class="w-[50%] m-0 rounded-[5px]" @click="checkToken">Xác nhận</base-button>
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
