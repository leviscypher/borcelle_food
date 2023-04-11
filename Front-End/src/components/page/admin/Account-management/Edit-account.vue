<script src="../../../../router/admin.ts"></script>
<script lang="ts" setup>
import { reactive, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import { useAccountManagement, usePosition, useRole } from '@/stores/admin'

const accounts = reactive({
  username: '',
  password: '',
  password_confirmation: '',
  role_id: '',
  position_id: '',
})

const useAccounts = useAccountManagement()
const usePositions = usePosition()
const useRoles = useRole()

const route = useRoute()

const getEditAccounts = computed(() => {
  return useAccounts.getEditAccounts
})

const getPosition = computed(() => {
  return usePositions.getPosition
})

const getRole = computed(() => {
  return useRoles.getRole
})

onMounted(async () => {
  const id = route.params.id
  if (id) {
    await useAccounts.fetchEdit(id)
    await usePositions.fetchPosition()
    await useRoles.fetchRoles()
    if (getEditAccounts.value) {
      accounts.username = getEditAccounts.value.username
      accounts.position_id = getEditAccounts.value.position_id
      accounts.role_id = getEditAccounts.value.role_id
    }
  }
})
const updateCategory = (id: any) => {
  useAccounts.fetchUpdate(id, accounts)
}
</script>
<template>
  <main class="app-content mt-0 pt-0">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách danh tài khoản</li>
        <li class="breadcrumb-item"><a href="#">Thêm tài khoản</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới tài khoản</h3>
          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-4">
                <label class="control-label">Tên tài khoản</label>
                <input
                  class="form-control"
                  v-model="accounts.username"
                  type="text"
                  required
                />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Vài trò</label> <br />
                <select
                  class="form-control"
                  v-model="accounts.role_id"
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
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Chức vụ</label> <br />
                <select
                  class="form-control"
                  v-model="accounts.position_id"
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
              </div>
            </form>
          </div>
          <div class="flex gap-[15px]">
            <button
              class="btn btn-save"
              type="button"
              @click="updateCategory(getEditAccounts.id)"
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
