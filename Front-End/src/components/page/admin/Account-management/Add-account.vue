<script lang="ts" setup>
import { computed, reactive, onMounted } from "vue";
import { useAccountManagement, usePosition, useRole } from "@/stores/admin";

const useAccount = useAccountManagement();
const usePositions = usePosition();
const useRoles = useRole();

const accounts = reactive({
  username: "",
  password: "",
  password_confirmation: "",
  role_id: "",
  position_id: "",
});

onMounted(() => {
  usePositions.fetchPosition();
  useRoles.fetchRoles();
});
const getPosition = computed(() => {
  return usePositions.getPosition;
});

const getRole = computed(() => {
  return useRoles.getRole;
});

const addAccount = () => {
  useAccount.fetchAdd(accounts);
};
</script>
<template>
  <main class="app-content mt-0 pt-0">
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
                <label class="control-label">Mật khẩu</label>
                <input
                  class="form-control"
                  v-model="accounts.password"
                  type="password"
                  required
                />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Nhập lại mật khẩu</label>
                <input
                  class="form-control"
                  v-model="accounts.password_confirmation"
                  type="password"
                  required
                />
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Vài trò</label> <br />
                <select class="form-control" v-model="accounts.role_id">
                  <option disabled value="">Chọn vài trò</option>
                  <option v-for="role in getRole" :key="role.id" :value="role.id">
                    {{ role.name }}
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Chức vụ</label> <br />
                <select class="form-control" v-model="accounts.position_id">
                  <option disabled value="">Chọn chức vụ</option>
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
            <button class="btn btn-save" type="button" @click="addAccount">
              Lưu lại
            </button>
            <router-link class="btn btn-cancel" to="/admin/category">Hủy bỏ</router-link>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
@import "@/assets/styles/admin/admin.scss";
@import "@/assets/styles/admin/add/add.scss";
</style>
