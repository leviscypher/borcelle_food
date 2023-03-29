<script lang="ts" setup>
import { ref } from 'vue'
import FormName from './form/name.vue'
import FormDate from './form/date.vue'

const fullname = ref('')
const nickname = ref('')
const day = ref(0)
const month = ref(0)
const year = ref(0)
const gender = ref(null)
</script>

<template>
  <div class="grid grid-cols-2 bg-[#fff]">
    <div class="left">
      <h4 class="ml-8 my-10">Thông tin cá nhân</h4>
      <form @submit.prevent>
        <form-name
          v-model:fullname="fullname"
          v-model:nickname="nickname"
        />
        <form-date
          v-model:day="day"
          v-model:month="month"
          v-model:year="year"
        />
        <div class="form-group flex items-center my-10">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >Giới tính</label
          >
          <div class="flex-1">
            <div class="flex items-center">
              <div class="mr-6">
                <input
                  type="radio"
                  value="male"
                  id="male"
                  v-model="gender"
                />
                <label
                  for="male"
                  class="ml-4 text-[1.4rem] font-normal"
                  >nam</label
                >
              </div>
              <div class="mr-6">
                <input
                  type="radio"
                  value="female"
                  id="female"
                  v-model="gender"
                />
                <label
                  for="female"
                  class="ml-4 text-[1.4rem] font-normal"
                  >nữ</label
                >
              </div>
              <div class="">
                <input
                  type="radio"
                  value="other"
                  id="other"
                  v-model="gender"
                />
                <label
                  for="other"
                  class="ml-4 text-[1.4rem] font-normal"
                  >khác</label
                >
              </div>
            </div>
          </div>
        </div>

        <button class="btn outline-none mx-60 bg-[var(--pale-yellow)] text-[#fff]">Lưu thay đổi</button>
      </form>
    </div>

    <div class="right ml-[20px]">
      <div>
        <h4 class="my-10">Số điện thoại và email</h4>
        <div class="phone flex items-center justify-between">
          <div class="phone-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-solid fa-phone" />
            </nav>
            <div>
              <ul>
                <li class="list-none">Số điện thoại</li>
                <li class="list-none">0382584001</li>
              </ul>
            </div>
          </div>
          <div class="phone-status mr-[20px]">
            <button class="btn-edit p-[10px] bg-[#fff] font-light text-[1.4rem]">cập nhật</button>
          </div>
        </div>
        <div class="email flex items-center justify-between my-10">
          <div class="email-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-solid fa-envelope" />
            </nav>
            <div>
              <ul>
                <li class="list-none">Email</li>
                <li class="list-none">hoangtu1512002@gmail.com</li>
              </ul>
            </div>
          </div>
          <div class="email-status mr-[20px]">
            <button class="btn-edit p-[10px] bg-[#fff] font-light text-[1.4rem]">cập nhật</button>
          </div>
        </div>
      </div>

      <div>
        <h4 class="mt-16 mb-10">Bảo mật</h4>
        <div class="phone flex items-center justify-between">
          <div class="phone-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-solid fa-lock" />
            </nav>
            <nav>đổi mật khẩu</nav>
          </div>
          <div class="phone-status mr-[20px]">
            <button class="btn-edit p-[10px] bg-[#fff] font-light text-[1.4rem]">cập nhật</button>
          </div>
        </div>
        <div class="email flex items-center justify-between my-10">
          <div class="email-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-solid fa-square-check" />
            </nav>
            <nav>thiết lập mã pin</nav>
          </div>
          <div class="email-status mr-[20px]">
            <button class="btn-edit p-[10px] bg-[#fff] font-light text-[1.4rem]">cập nhật</button>
          </div>
        </div>
      </div>

      <div>
        <h4 class="mt-16 mb-10">Liên kết mạng xã hộ</h4>
        <div class="phone flex items-center justify-between">
          <div class="phone-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-brands fa-facebook" />
            </nav>
            <nav>Facebook</nav>
          </div>
          <div class="phone-status mr-[20px]">
            <button class="btn-edit p-[10px] bg-[#fff] font-light text-[1.4rem]">cập nhật</button>
          </div>
        </div>
        <div class="email flex items-center justify-between my-10">
          <div class="email-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-brands fa-google" />
            </nav>
            <nav>Google</nav>
          </div>
          <div class="email-status mr-[20px]">
            <button class="btn-edit p-[10px] bg-[#fff] font-light text-[1.4rem]">cập nhật</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.left {
  border-right: 1px solid rgb(235, 235, 240);
  padding-right: 20px;
}

.btn-edit {
  border: 1px solid var(--pale-yellow);
  background-color: rgb(255, 255, 255);
  color: var(--black);
  border-radius: 10px;
}
</style>
