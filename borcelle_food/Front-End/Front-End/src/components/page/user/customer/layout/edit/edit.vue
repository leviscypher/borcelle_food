<script lang="ts" setup>
import { ref, onMounted, reactive, computed, watch } from 'vue'
import { useUserInfo } from '@/stores/user'
import { useRoute } from 'vue-router'
const route = useRoute()

const isLoading = ref(false)
const userInfoData = reactive({
  fullname: '',
  nickname: '',
  phone: '',
  birthday: '',
  gender_id: 3,
})

const error = reactive({
  nickname: '',
  phone: '',
  birthday: ''
})

const userInfo = useUserInfo()

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

const user_id = ref(route.params.id)

onMounted(async () => {
  isLoading.value = true
  await userInfo.fetchUserInfo(user_id.value)
  if (getUserInfo.value) {
    userInfoData.fullname = getUserInfo.value.fullname
    userInfoData.nickname = getUserInfo.value.nickname
    userInfoData.phone = getUserInfo.value.phone
    userInfoData.birthday = getUserInfo.value.birthday
    userInfoData.gender_id = getUserInfo.value.gender_id
    userInfoData.permanent_address = getUserInfo.value.permanent_address
  }
  isLoading.value = false
})
const getUserInfo = computed(() => {
  return userInfo.getUserInfo
})

const addUserInfo = async () => {
  if (validate()) {
    const formData = new FormData()
    formData.append('fullname', userInfoData.fullname)
    formData.append('nickname', userInfoData.nickname ? userInfoData.nickname : '')
    formData.append('phone', userInfoData.phone)
    formData.append('birthday', userInfoData.birthday)
    formData.append('gender_id', userInfoData.gender_id ?userInfoData.gender_id:3)
    await userInfo.fetchAdd(user_id.value, formData)
    showAlert.value = true
    message.value = 'cập nhật thành công'
    alertType.value = 'success'
  }
}

const validate = () => {
  let valid = true
  if (!userInfoData.fullname) {
    error.fullname = 'Họ và tên không được để trông'
    valid = false
  }

  if (!userInfoData.phone) {
    error.phone = 'Số điện thoại không được để trống'
    valid = false
  } else if (!phoneVn(userInfoData.phone)) {
    error.phone = 'Số điện thoại không hợp lệ'
    valid = false
  }

  if (!userInfoData.birthday) {
    error.birthday = 'Ngày sinh không để trống'
    valid = false
  }

  return valid
}

const phoneVn = (phone: number) => {
  const vietnamesePhoneNumberRegex = /^(0|\+84)\d{9,10}$/
  return vietnamesePhoneNumberRegex.test(phone.toString())
}

watch(error, (val) => {
  if (val) {
    setTimeout(() => {
      ;(error.fullname = ''), (error.phone = '')
    }, 3000)
  }
})
</script>

<template>
  <div
    class="grid grid-cols-2 bg-[#fff]"
    v-if="!isLoading"
  >
    <div class="left">
      <h4 class="ml-8 my-10">Thông tin cá nhân</h4>
      <form @submit.prevent>
        <!-- fullname -->
        <div class="form-group flex items-center">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >Họ & Tên</label
          >
          <div class="flex-1">
            <input
              type="search"
              class="form-control"
              v-model="userInfoData.fullname"
              @input="error.fullname"
            />
            <transition name="slide-fade">
              <small
                v-if="error.fullname"
                class="inline-block text-[red] text-[13px]"
                >{{ error.fullname }}</small
              >
            </transition>
          </div>
        </div>

        <!-- nickname -->
        <div class="form-group flex items-center my-10">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >Nickname</label
          >
          <div class="flex-1">
            <input
              type="search"
              class="form-control"
              v-model="userInfoData.nickname"
            />
          </div>
        </div>

        <!-- birthday -->
        <div class="form-group flex items-center my-10">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >birthday</label
          >
          <div class="flex-1">
            <input
              type="date"
              class="form-control"
              v-model="userInfoData.birthday"
              @input="error.birthday"
            />
            <transition name="slide-fade">
              <small
                v-if="error.fullname"
                class="inline-block text-[red] text-[13px]"
                >{{ error.fullname }}</small
              >
            </transition>
          </div>
        </div>

        <!-- phone -->
        <div class="form-group flex items-center">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >Số điện thoại</label
          >
          <div class="flex-1">
            <input
              type="search"
              class="form-control"
              v-model="userInfoData.phone"
              @input="error.phone"
            />
            <transition name="slide-fade">
              <small
                v-if="error.phone"
                class="inline-block text-[red] text-[13px]"
                >{{ error.phone }}</small
              >
            </transition>
          </div>
        </div>

        <!-- gender -->
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
                  :value="1"
                  id="male"
                  v-model="userInfoData.gender_id"
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
                  :value="2"
                  id="female"
                  v-model="userInfoData.gender_id"
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
                  :value="3"
                  id="other"
                  v-model="userInfoData.gender_id"
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

        <button
          class="btn outline-none mx-60 bg-[var(--pale-yellow)] text-[#fff]"
          @click="addUserInfo"
        >
          Lưu thay đổi
        </button>
      </form>
    </div>

    <div class="right ml-[20px]">
      <div>
        <h4 class="my-10">email</h4>
        <div class="email flex items-center justify-between my-10">
          <div class="email-info flex items-center font-light text-[1.4rem]">
            <nav class="mr-4">
              <font-awesome-icon icon="fa-solid fa-envelope" />
            </nav>
            <div>
              <ul>
                <li class="list-none">Email</li>
                <li class="list-none">{{ getUserInfo.email }}</li>
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

  <div
    v-else
    class="w-full bg-white h-[400px] flex items-center justify-center"
  >
    <base-load />
  </div>

  <div v-show="showAlert">
    <div
      class="alert text-[14px] px-[20px] w-auto fixed top-[100px] z-[9999] left-[50%] translate-x-[-50%] text-center"
      :class="alertType ? 'alert-' + alertType : ''"
      role="alert"
    >
      {{ message }}
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

.form-upload {
  background-color: #fff;
  border: 1px solid rgb(159, 159, 160);
  border-radius: 20px;
  padding: 2rem 0.7rem 0.7rem 0.7rem;
  text-align: center;
  font-size: 1.125rem;
  max-width: 320px;
}

.form-title {
  color: #000000;
  font-size: 1.8rem;
  font-weight: 500;
}

.form-paragraph {
  margin-top: 10px;
  font-size: 0.9375rem;
  color: rgb(105, 105, 105);
}

.drop-container {
  background-color: #fff;
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
  margin-top: 2.1875rem;
  border-radius: 10px;
  border: 2px dashed rgb(171, 202, 255);
  color: #444;
  cursor: pointer;
  transition: background 0.2s ease-in-out, border 0.2s ease-in-out;
}

.drop-container:hover {
  background: rgba(0, 140, 255, 0.164);
  border-color: rgba(17, 17, 17, 0.616);
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color 0.2s ease-in-out;
}

#file-input {
  width: 350px;
  max-width: 100%;
  color: #444;
  padding: 2px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid rgba(8, 8, 8, 0.288);
}

#file-input::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background 0.2s ease-in-out;
}

#file-input::file-selector-button:hover {
  background: #0d45a5;
}
</style>
