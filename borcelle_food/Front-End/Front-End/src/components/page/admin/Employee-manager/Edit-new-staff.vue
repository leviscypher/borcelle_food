<script lang="ts" setup>
import { ref, reactive, computed, onMounted } from 'vue'
import validator from 'validator'
import { usePosition, useAccountManagement, useUserInfo, useGender } from '@/stores/admin'
import { useRoute } from 'vue-router'
const route = useRoute()
const positionAdd = reactive({
  name: '',
})
const userInfo = reactive({
  fullname: '',
  phone: '',
  birthday: '',
  gender_id: '',
  avatar: '',
  permanent_address: '',
  user_id: '',
})
const errorPositiond = reactive({
  errorPositiondName: '',
})
const errorUserInfo = reactive({
  errorUserInfoFullname: '',
  errorUserInfoPhone: '',
  errorUserInfoBirthday: '',
  errorUserInfoGender_id: '',
  errorUserInfoAvatar: '',
  errorUserInfoPermanent_address: '',
  errorUserInfoUser_id: '',
})
const isloading = ref(true)
const selectedImage = ref(null)
const isSuccess = ref('')

const position = usePosition()
const userInfos = useUserInfo()
const gender = useGender()
const account = useAccountManagement()



const getPosition = computed(() => {
  return position.getPosition
})
const getAccounts = computed(() => {
  return account.getAccounts
})
const getGender = computed(() => {
  return gender.getGender
})
const getStatus = computed(() => {
  return userInfos.getStatus
})
const getEditUserInfo = computed(() => {
  return userInfos.getEditUserInfo
})
onMounted(async () => {
  const id = route.params.id
  if (id) {
    isloading.value = true
    await Promise.all([
      userInfos.fetchEdit(id),
      position.fetchPosition(),
      account.fetchAccounts(),
      gender.fetchGender(),
    ])
    isloading.value = false
    if (getEditUserInfo.value) {
      userInfo.fullname = getEditUserInfo.value.fullname
      userInfo.phone = getEditUserInfo.value.phone
      userInfo.birthday = getEditUserInfo.value.birthday
      userInfo.gender_id = getEditUserInfo.value.gender_id
      userInfo.avatar = getEditUserInfo.value.avatar
      selectedImage.value = getEditUserInfo.value.avatar
      userInfo.permanent_address = getEditUserInfo.value.permanent_address
      userInfo.user_id = getEditUserInfo.value.user_id
    }
  }
})


const valids = () => {
  let valid = true
  errorPositiond.errorPositiondName = ''
  if (!userInfo.fullname.trim()) {
    errorPositiond.errorPositiondName = 'Họ tên không được để trống'
    valid = false
  }
}

const validate = () => {
  let valid = true
  errorUserInfo.errorUserInfoFullname = ''
  errorUserInfo.errorUserInfoPhone = ''
  errorUserInfo.errorUserInfoBirthday = ''
  errorUserInfo.errorUserInfoGender_id = ''
  errorUserInfo.errorUserInfoAvatar = ''
  errorUserInfo.errorUserInfoPermanent_address = ''
  errorUserInfo.errorUserInfoUser_id = ''

  if (!userInfo.fullname.trim()) {
    errorUserInfo.errorUserInfoFullname = 'Họ tên không được để trống'
    valid = false
  }

  if (!userInfo.phone.trim()) {
    errorUserInfo.errorUserInfoPhone = 'Số điện thoại không được để trống'
    valid = false
  } else if (!validator.isMobilePhone(userInfo.phone, 'vi-VN')) {
    errorUserInfo.errorUserInfoPhone = 'Số điện thoại không hợp lệ'
    valid = false
  }

  if (!userInfo.birthday.trim()) {
    errorUserInfo.errorUserInfoBirthday = 'Ngày sinh không được để trống'
    valid = false
  }

  if (!userInfo.gender_id) {
    errorUserInfo.errorUserInfoGender_id = 'Giới tính không được để trống'
    valid = false
  }

  if (!userInfo.avatar) {
    errorUserInfo.errorUserInfoAvatar = 'Ảnh đại diện không được để trống'
    valid = false
  }

  if (!userInfo.permanent_address.trim()) {
    errorUserInfo.errorUserInfoPermanent_address = 'Địa chỉ không được để trống'
    valid = false
  }

  if (!userInfo.user_id) {
    errorUserInfo.errorUserInfoUser_id = 'ID người dùng không được để trống'
    valid = false
  }

  return valid
}

const addPosition = () => {
  if (valids()) {
    position.fetchAdd(positionAdd)
    position.fetchPosition()
  }
}

const deletePosition = (id: any) => {
  position.fetchDelete(id)
  position.fetchPosition()
}

const onFileChange = (e: any) => {
  if (e.target.files.length === 1) {
    const file = e.target.files[0]
    const reader = new FileReader()
    reader.onload = (e) => {
      selectedImage.value = e.target.result
    }
    reader.readAsDataURL(file)
    userInfo.avatar = file
  } else {
    alert('Chỉ được tải lên 1 ảnh')
  }
}

const removeImage = () => {
  userInfo.avatar = ''
  selectedImage.value = null
}

const addUserinfo = async () => {
  if (validate()) {
    isloading.value = true
    await userInfos.fetchAdd(userInfo.user_id, userInfo)
    try {
      switch (getStatus.value) {
        case 200:
          isSuccess.value = '200'
          break
        case 422:
          isSuccess.value = '422'
          break
        default:
          break
      }
    } catch (error) {
      isSuccess.value = null
    } finally {
      isloading.value = false
    }
  }
}
</script>
<template>
  <main class="app-content mt-0 pt-0">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới nhân viên</h3>
          <div class="tile-body">
            <form class="row">
              <div v-if="isloading">
                <base-load></base-load>
              </div>
              <div v-else>
                <div class="form-group col-md-12">
                  <div
                    class="form-group col-md-4"
                    v-if="isSuccess === '422'"
                  >
                    <div
                      class="alert-danger p-[10px] rounded-[0.357rem] text-center text-[14px]"
                      role="alert"
                    >
                      Sửa lại thông tin nhân không thành công
                    </div>
                  </div>
                  <div
                    class="form-group col-md-4"
                    v-else-if="isSuccess === '200'"
                  >
                    <div
                      class="alert alert-success text-[14px]"
                      role="alert"
                    >
                      Sửa lại thông tin nhân viên thành công
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Tài khoản nhân viên</label>
                  <select
                    class="form-control"
                    v-model="userInfo.user_id"
                    @input="errorUserInfo.errorUserInfoUser_id = ''"
                  >
                    <option value="">Chọn tài khoản</option>
                    <template
                      v-for="account in getAccounts"
                      :key="account.id"
                    >
                      <option
                        v-if="account.role_id === 1 && account.isActive === 1"
                        :value="account.id"
                      >
                        {{ account.username }}
                      </option>
                    </template>
                  </select>
                  <transition name="slide-fade">
                    <small
                      v-if="errorUserInfo.errorUserInfoUser_id"
                      class="inline-block text-[red] text-[13px]"
                      >{{ errorUserInfo.errorUserInfoUser_id }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Họ và tên</label>
                  <input
                    class="form-control"
                    type="text"
                    v-model="userInfo.fullname"
                    required
                    @input="errorUserInfo.errorUserInfoFullname = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="errorUserInfo.errorUserInfoFullname"
                      class="inline-block text-[red] text-[13px]"
                      >{{ errorUserInfo.errorUserInfoFullname }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Địa chỉ thường trú</label>
                  <input
                    class="form-control"
                    type="text"
                    required
                    v-model="userInfo.permanent_address"
                    @input="errorUserInfo.errorUserInfoPermanent_address = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="errorUserInfo.errorUserInfoPermanent_address"
                      class="inline-block text-[red] text-[13px]"
                      >{{ errorUserInfo.errorUserInfoPermanent_address }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Số điện thoại</label>
                  <input
                    class="form-control"
                    type="text"
                    required
                    v-model="userInfo.phone"
                    @input="errorUserInfo.errorUserInfoPhone = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="errorUserInfo.errorUserInfoPhone"
                      class="inline-block text-[red] text-[13px]"
                      >{{ errorUserInfo.errorUserInfoPhone }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Ngày sinh</label>
                  <input
                    class="form-control"
                    type="date"
                    v-model="userInfo.birthday"
                    @input="errorUserInfo.errorUserInfoBirthday = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="errorUserInfo.errorUserInfoBirthday"
                      class="inline-block text-[red] text-[13px]"
                      >{{ errorUserInfo.errorUserInfoBirthday }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-3">
                  <label class="control-label">Giới tính</label>
                  <select
                    class="form-control"
                    id="exampleSelect2"
                    required
                    v-model="userInfo.gender_id"
                    @input="errorUserInfo.errorUserInfoGender_id = ''"
                  >
                    <option value="">chọn giới tính</option>
                    <template
                      v-for="gender in getGender"
                      :key="gender.id"
                    >
                      <option :value="gender.id">
                        {{ gender.gender }}
                      </option>
                    </template>
                  </select>
                  <transition name="slide-fade">
                    <small
                      v-if="errorUserInfo.errorUserInfoGender_id"
                      class="inline-block text-[red] text-[13px]"
                      >{{ errorUserInfo.errorUserInfoGender_id }}</small
                    >
                  </transition>
                </div>

                <div class="form-group col-md-12">
                  <label class="control-label">Ảnh 3x4 nhân viên</label>
                  <div id="boxchoice">
                    <div
                      v-if="selectedImage !== null"
                      class="flex gap-5"
                    >
                      <div class="relative">
                        <img
                          :src="selectedImage"
                          class="avatar"
                        />
                        <base-button
                          class="btn-remove p-0 m-0"
                          @click.stop.prevent="removeImage"
                        >
                          <font-awesome-icon icon="fa-solid fa-xmark" />
                        </base-button>
                      </div>
                    </div>
                    <input
                      type="file"
                      ref="fileInput"
                      id="choicefile"
                      class="d-none"
                      @change="onFileChange"
                      accept="image/*"
                      @input="errorUserInfo.errorUserInfoAvatar = ''"
                    />
                    <label
                      for="choicefile"
                      class="Choicefile"
                    >
                      <i class="bx bx-upload"></i>
                    </label>
                    <transition name="slide-fade">
                      <small
                        v-if="errorUserInfo.errorUserInfoAvatar"
                        class="inline-block text-[red] text-[13px]"
                        >{{ errorUserInfo.errorUserInfoAvatar }}</small
                      >
                    </transition>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="flex gap-[15px]">
            <button
              class="btn btn-save"
              type="button"
              @click="addUserinfo"
            >
              Lưu lại
            </button>
            <router-link
              class="btn btn-cancel"
              to="/admin/employee-management"
              >Hủy bỏ</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </main>
  <div
    class="modal modals"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2
            class="modal-title text-black"
            id="exampleModalLabel"
          >
            Thêm chức vụ mới
          </h2>
          <button
            type="button"
            class="btn-close p-0 m-0"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="form-group col-md-12 mt-5 mb-5">
            <input
              class="form-control"
              v-model="positionAdd.name"
              placeholder="Thêm chức vụ"
              type="text"
              required
              @input="errorPositiond.errorPositiondName = ''"
            />
            <transition name="slide-fade">
              <small
                v-if="errorPositiond.errorPositiondName"
                class="inline-block text-[red] text-[13px]"
                >{{ errorPositiond.errorPositiondName }}</small
              >
            </transition>
          </div>
          <ul>
            <li
              class="list-none text-[16px] pt-2 pb-2"
              v-for="position in getPosition"
              :key="position.id"
            >
              <span class="col-md-10"> {{ position.name }} </span>
              <span
                class="cursor-pointer"
                @click="deletePosition(position.id)"
              >
                <i class="bx bx-x-circle"></i>
              </span>
            </li>
          </ul>
        </div>
        <div class="modal-footer gap-[10px]">
          <base-button
            type="button"
            class="btn-footer bg-red-600 text-white"
            @click="addPosition"
            >Thêm</base-button
          >
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/admin/admin.scss';
@import '@/assets/styles/admin/add/add.scss';
.avatar {
  width: 105px;
  height: 143px;
  object-fit: cover;
}
.btn-remove {
  position: absolute;
  width: 30px;
  height: 30px;
  right: 0;
}
</style>
