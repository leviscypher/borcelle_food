<script lang="ts" setup>
import { computed, reactive, onMounted, ref } from 'vue'
import { useAccountManagement, usePosition, useRole } from '@/stores/admin'

const useAccount = useAccountManagement()
const usePositions = usePosition()
const useRoles = useRole()
const isSuccess = ref('')
const isLoading = ref(true)
const accounts = reactive({
  username: '',
  email: '',
  password: '',
  password_confirmation: '',
  role_id: '',
  position_id: '',
})
const error = reactive({
  errorUsername: '',
  errorEmail: '',
  errorPassword: '',
  errorPassword_confirmation: '',
  errorRole_id: '',
  errorPosition_id: '',
})
onMounted(async () => {
  isLoading.value = true
  await Promise.all([usePositions.fetchPosition(), useRoles.fetchRoles()])
  isLoading.value = false
})
const getPosition = computed(() => {
  return usePositions.getPosition
})

const getRole = computed(() => {
  return useRoles.getRole
})

const getStatus = computed(() => {
  return useAccount.getStatus
})

const re =
  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

const addAccount = async () => {
  const minLength = 8
  const isEmpty = (value: string) => !value.trim()
  const emailIsValid = (email: string) => re.test(email.trim())

  error.errorUsername = isEmpty(accounts.username) ? 'Chưa nhập tên tài khoản' : ''

  error.errorEmail = isEmpty(accounts.email)
    ? 'Chưa nhập email'
    : emailIsValid(accounts.email)
    ? ''
    : 'Email không đúng định dạng'

  error.errorPassword = isEmpty(accounts.password)
    ? 'Chưa nhập mật khẩu'
    : accounts.password.length >= minLength
    ? ''
    : `Mật khẩu phải có ít nhất ${minLength} kí tự`
  error.errorPassword_confirmation = isEmpty(accounts.password_confirmation)
    ? 'Chưa nhập xác nhận mật khẩu'
    : accounts.password_confirmation === accounts.password
    ? accounts.password_confirmation.length >= minLength
      ? ''
      : `Mật khẩu phải có ít nhất ${minLength} kí tự`
    : 'Mật khẩu xác nhận không trùng khớp'

  error.errorRole_id = !accounts.role_id ? 'Chưa chọn vai trò' : ''

  error.errorPosition_id = !accounts.position_id ? 'Chưa chọn chức vụ' : ''

  if (
    !error.errorUsername &&
    !error.errorEmail &&
    !error.errorPassword &&
    !error.errorPassword_confirmation &&
    !error.errorRole_id &&
    !error.errorPosition_id
  ) {
    try {
      isLoading.value = true
      await useAccount.fetchAdd(accounts)
      switch (getStatus.value) {
        case 201:
          isSuccess.value = '201'
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
          <h3 class="tile-title">Tạo mới tài khoản</h3>
          <div class="tile-body">
            <form class="row">
              <div v-if="isloading">
                <base-load></base-load>
              </div>
              <div v-else>
                <div
                  v-if="isSuccess === '422'"
                  class="alert-danger p-[10px] rounded-[0.357rem] text-center text-[14px]"
                  role="alert"
                >
                  Tài khoản đã tồn tại
                </div>
                <div
                  v-else-if="isSuccess === '201'"
                  class="alert alert-success text-[14px]"
                  role="alert"
                >
                  Đăng ký thành công
                </div>
  
                <div class="form-group col-md-4">
                  <label class="control-label">Tên tài khoản</label>
                  <input
                    class="form-control"
                    v-model="accounts.username"
                    type="text"
                    required
                    @input="error.errorUsername = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorUsername"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorUsername }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Email</label>
                  <input
                    class="form-control"
                    v-model="accounts.email"
                    type="text"
                    required
                    @input="error.errorEmail = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorEmail"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorEmail }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Mật khẩu</label>
                  <input
                    class="form-control"
                    v-model="accounts.password"
                    type="password"
                    required
                    @input="error.errorPassword = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorPassword"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorPassword }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Nhập lại mật khẩu</label>
                  <input
                    class="form-control"
                    v-model="accounts.password_confirmation"
                    type="password"
                    required
                    @input="error.errorPassword_confirmation = ''"
                  />
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorPassword_confirmation"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorPassword_confirmation }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Vài trò</label> <br />
                  <select
                    class="form-control"
                    v-model="accounts.role_id"
                    @input="error.errorRole_id = ''"
                  >
                    <option
                      disabled
                      value=""
                    >
                      Chọn vài trò
                    </option>
                    <option
                      v-for="role in getRole"
                      :key="role.id"
                      :value="role.id"
                    >
                      {{ role.name }}
                    </option>
                  </select>
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorRole_id"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorRole_id }}</small
                    >
                  </transition>
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Chức vụ</label> <br />
                  <select
                    class="form-control"
                    v-model="accounts.position_id"
                    @input="error.errorPosition_id = ''"
                  >
                    <option
                      disabled
                      value=""
                    >
                      Chọn chức vụ
                    </option>
                    <option
                      v-for="position in getPosition"
                      :value="position.id"
                      :key="position.id"
                    >
                      {{ position.name }}
                    </option>
                  </select>
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorPosition_id"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorPosition_id }}</small
                    >
                  </transition>
                </div>
              </div>
            </form>
          </div>
          <div class="flex gap-[15px]">
            <button
              class="btn btn-save"
              type="button"
              @click="addAccount"
            >
              Lưu lại
            </button>
            <router-link
              class="btn btn-cancel"
              to="/admin/account-management"
              >Hủy bỏ</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/admin/admin.scss';
@import '@/assets/styles/admin/add/add.scss';
</style>
