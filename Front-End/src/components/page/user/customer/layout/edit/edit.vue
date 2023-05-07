<script lang="ts" setup>
import { ref, onMounted, reactive, computed } from 'vue'
import { useUserInfo } from '@/stores/user'
import { useRoute } from 'vue-router'
const route = useRoute()

const fileInput = ref(null)
const isLoading = ref(false)
const userInfoData = reactive({
  fullname: '',
  nickname: '',
  phone: '',
  birthday: '',
  avatar: null,
  permanent_address: '',
  gender_id: 3,
})

const userInfo = useUserInfo()

onMounted(async () => {
  isLoading.value = true
  const id = route.params.id
  await Promise.all([userInfo.fetchUserInfo(id)])
  if (getUserInfo.value) {
    userInfoData.fullname = getUserInfo.value.fullname
    userInfoData.nickname = getUserInfo.value.nickname
    userInfoData.phone = getUserInfo.value.phone
    userInfoData.birthday = getUserInfo.value.birthday
    userInfoData.gender_id = getUserInfo.value.gender_id
    // userInfoData.avatar = getUserInfo.value.avatar
    userInfoData.permanent_address = getUserInfo.value.permanent_address
    userInfoData.user_id = getUserInfo.value.user_id
  }
  isLoading.value = false
})
const getUserInfo = computed(() => {
  return userInfo.getUserInfo
})

const file = (e: any) => {
  const file = e.target.files[0]
  const reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onload = () => {
    const binaryString = atob(reader.result.split(',')[1])
    const binaryData = new Uint8Array(binaryString.length)
    for (let i = 0; i < binaryString.length; i++) {
      binaryData[i] = binaryString.charCodeAt(i)
    }
    const blob = new Blob([binaryData], { type: 'image/png' })
    userInfoData.avatar = blob
  }
}

const addUserInfo = async () => {
  const formData = new FormData()
  formData.append('fullname', userInfoData.fullname)
  formData.append('nickname', userInfoData.nickname)
  formData.append('phone', userInfoData.phone)
  formData.append('birthday', userInfoData.birthday)
  formData.append('avatar', userInfoData.avatar)
  formData.append('permanent_address', userInfoData.permanent_address)
  formData.append('gender_id', userInfoData.gender_id)
  await userInfo.fetchAdd(getUserInfo.value.user_id, formData)
}
</script>

<template>
  <div class="grid grid-cols-2 bg-[#fff]" v-if="!isLoading">
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
            />
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
            />
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
            />
          </div>
        </div>

        <!-- address -->
        <div class="form-group flex items-center">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >địa chỉ</label
          >
          <div class="flex-1">
            <input
              type="search"
              class="form-control"
              v-model="userInfoData.permanent_address"
            />
          </div>
        </div>

        <!-- avatar -->
        <div class="form-group flex items-center">
          <label
            for=""
            class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
            >avatar</label
          >
          <div class="form-upload">
            <span class="form-title">avatar</span>
            <p class="form-paragraph">Tệp phải là hình ảnh</p>
            <label
              for="file-input"
              class="drop-container"
            >
              <span class="drop-title">Thả tập tin ở đây</span>
              hoặc
              <input
                type="file"
                ref="fileInput"
                accept="image/*"
                id="file-input"
                @change="file"
              />
            </label>
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

  <div v-else class="w-full bg-white h-[400px] flex items-center justify-center">
    <base-load/>
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
