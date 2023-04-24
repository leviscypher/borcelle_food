<script lang="ts" setup>
import { ref, computed, onMounted } from 'vue'

import { useUserInfo } from '@/stores/admin'

const userInfos = useUserInfo()
const isLoading = ref(true)

onMounted(async () => {
  await Promise.all([userInfos.fetchUserInfo()])
  isLoading.value = false
})
const getUserInfo = computed(() => {
  return userInfos.getUserInfo
})

</script>
<template>
  <base-title>Quản lý nhân viên</base-title>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <router-link
                  class="btn btn-add btn-sm btn-function"
                  to="/admin/employee-management/add-staff"
                  title="Thêm"
                >
                  <i class="bx bx-plus"></i>
                  Tạo mới nhân viên</router-link
                >
              </div>
              <div class="col-sm-2">
                <a
                  class="btn btn-delete btn-sm nhap-tu-file btn-function"
                  type="button"
                  title="Nhập"
                  ><i class="bx bx-cloud-upload"></i> Tải từ file</a
                >
              </div>

              <div class="col-sm-2">
                <a
                  class="btn btn-delete btn-sm print-file btn-function"
                  type="button"
                  title="In"
                >
                  <i class="bx bx-printer"></i>In dữ liệu</a
                >
              </div>
              <div class="col-sm-2">
                <a
                  class="btn btn-delete btn-sm print-file js-textareacopybtn btn-function"
                  type="button"
                  title="Sao chép"
                  ><i class="bx bx-copy"></i> Sao chép</a
                >
              </div>

              <div class="col-sm-2">
                <a
                  class="btn btn-excel btn-sm btn-function"
                  href=""
                  title="In"
                >
                  <font-awesome-icon icon="fa-solid fa-file-excel" />
                  Xuất Excel
                </a>
              </div>
              <div class="col-sm-2">
                <a
                  class="btn btn-delete btn-sm pdf-file btn-function"
                  type="button"
                  title="In"
                  ><i class="bx bxs-file-pdf"></i>Xuất PDF</a
                >
              </div>
              <div class="col-sm-2">
                <a
                  class="btn btn-delete btn-sm btn-function"
                  type="button"
                  title="Xóa"
                >
                  <i class="bx bxs-trash"></i> Xóa tất cả
                </a>
              </div>
            </div>
            <table
              class="table table-hover table-bordered js-copytextarea"
              cellpadding="0"
              cellspacing="0"
              border="0"
              id="sampleTable"
            >
              <thead>
                <tr>
                  <th width="10">
                    <input
                      type="checkbox"
                      id="all"
                    />
                  </th>
                  <th>ID nhân viên</th>
                  <th width="150">Họ và tên</th>
                  <th width="20">Ảnh thẻ</th>
                  <th width="300">Địa chỉ</th>
                  <th>Ngày sinh</th>
                  <th>Giới tính</th>
                  <th>SĐT</th>
                  <th>Chức vụ</th>
                  <th width="100">Tính năng</th>
                </tr>
              </thead>
              <tbody v-if="!isLoading">
                <tr
                  v-for="(userinfo, index) in getUserInfo"
                  :key="userinfo.id"
                >
                  <td width="10">
                    <input
                      type="checkbox"
                      name="check1"
                      value="1"
                    />
                  </td>
                  <td>{{ index++ }}</td>
                  <td>{{ userinfo.fullname }}</td>
                  <td>
                    <img
                      :src="userinfo.avatar"
                      width="100"
                    />
                  </td>
                  <td>{{ userinfo.permanent_address }}</td>
                  <td>{{ userinfo.birthday }}</td>
                  <td>{{ userinfo.gender }}</td>
                  <td>{{ userinfo.phone }}</td>
                  <td>{{ userinfo.position_name }}</td>
                  <td class="table-td-center">
                    <button
                      class="btn btn-primary btn-sm trash mr-[4px]"
                      type="button"
                      title="Xóa"
                    >
                      <i class="bx bxs-trash"></i>
                    </button>
                    <router-link
                      :to="`/admin/employee-management/edit-staff/${userinfo.id}`"
                      class="btn btn-primary btn-sm edit"
                      type="button"
                      title="Sửa"
                    >
                      <i class="bx bxs-edit"></i>
                    </router-link>
                  </td>
                </tr>
              </tbody>
            </table>
            <div
              class="text-center"
              v-if="isLoading"
            >
              <base-load></base-load>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>
@import '@/assets/styles/admin/admin.scss';

th {
  font-size: 14px !important;
  background-color: #eeeeee;
  color: #000;
}

td {
  vertical-align: middle !important;
}
</style>
