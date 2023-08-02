<script lang="ts" setup>
import { ref, reactive, computed, onMounted } from 'vue'
import { useAccountManagement } from '@/stores/admin'
const account = useAccountManagement()

const idAccount = reactive({ id: '' })
const isLoading = ref(true)
const isTonggle = ref(true)
onMounted(async () => {
  await Promise.all([account.fetchAccounts()])
  isLoading.value = false
})
const getAccount = computed(() => {
  return account.getAccounts
})
const getId = (id: any) => {
  idAccount.id = id
}
const deleteCategory = async (id: any) => {
  isLoading.value = true
  await Promise.all([account.fetchDelete(id), account.fetchAccounts()])
  isLoading.value = false
}
const Tonggle = (e: any) => {
  isTonggle.value = e
}
</script>
<template>
  <base-title>Quản lý tài khoản</base-title>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <router-link
                  to="/admin/account-management/add-account"
                  class="btn btn-add btn-sm btn-function"
                  title="Thêm"
                >
                  <i class="bx bx-plus"></i>
                  Tạo tài khoản mới
                </router-link>
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
                  <i class="bx bx-printer"></i>
                  In dữ liệu
                </a>
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

            <base-button
              @click="Tonggle(true)"
              :class="['btn-tongle', { 'btn-tongle-active': isTonggle }]"
              >admin</base-button
            >
            <base-button
              @click="Tonggle(false)"
              :class="['btn-tongle', { 'btn-tongle-active': !isTonggle }]"
              >user</base-button
            >
            <div
              class="admin"
              v-if="isTonggle"
            >
              <table
                class="table table-hover table-bordered js-copytextarea"
                cellpadding="0"
                cellspacing="0"
                border="0"
                id="sampleTable"
              >
                <thead>
                  <tr>
                    <th
                      width="10"
                      class="text-center"
                    >
                      <input
                        type="checkbox"
                        id="all"
                      />
                    </th>
                    <th
                      width="100"
                      class="text-center"
                    >
                      ID
                    </th>
                    <th
                      width="150"
                      class="text-center"
                    >
                      Tên tài khoản
                    </th>
                    <th
                      width="150"
                      class="text-center"
                    >
                      Email
                    </th>
                    <th
                      width="150"
                      class="text-center"
                    >
                      Trạng thái
                    </th>
                    <th
                      width="100"
                      class="text-center"
                    >
                      Tính năng
                    </th>
                  </tr>
                </thead>
                <tbody v-if="!isLoading">
                  <tr
                    v-for="(account, index) in getAccount"
                    :key="account.id"
                  >
                    <td
                      width="10"
                      class="text-center"
                      v-if="account.role_id == 1"
                    >
                      <input
                        type="checkbox"
                        class="checbox"
                        name="check1"
                        value="1"
                      />
                    </td>
                    <td v-if="account.role_id == 1">{{ index + 1 }}</td>
                    <td v-if="account.role_id == 1">{{ account.username }}</td>
                    <td v-if="account.role_id == 1">{{ account.email }}</td>
                    <td v-if="account.role_id == 1">
                      <template v-if="account.isActive == 1">Kích hoạt</template>
                      <template v-if="account.isActive == 0">chưa kích hoạt</template>
                    </td>
                    <td
                      v-if="account.role_id == 1"
                      class="table-td-center flex justify-center"
                    >
                      <base-button
                        type="button"
                        class="btn btn-primary btn-sm trash mr-[4px]"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        @click="getId(account.id)"
                      >
                        <i class="bx bxs-trash"></i>
                      </base-button>

                      <router-link
                        :to="`/admin/account-management/edit-account/${account.id}`"
                        type="button"
                        class="btn btn-primary btn-sm edit"
                      >
                        <i class="bx bxs-edit"></i>
                      </router-link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              class="user"
              v-else-if="!isTonggle"
            >
              <table
                class="table table-hover table-bordered js-copytextarea"
                cellpadding="0"
                cellspacing="0"
                border="0"
                id="sampleTable"
              >
                <thead>
                  <tr>
                    <th
                      width="10"
                      class="text-center"
                    >
                      <input
                        type="checkbox"
                        id="all"
                      />
                    </th>
                    <th
                      width="100"
                      class="text-center"
                    >
                      ID
                    </th>
                    <th
                      width="150"
                      class="text-center"
                    >
                      Tên tài khoản
                    </th>
                    <th
                      width="150"
                      class="text-center"
                    >
                      Email
                    </th>
                    <th
                      width="150"
                      class="text-center"
                    >
                      Trạng thái
                    </th>
                    <th
                      width="100"
                      class="text-center"
                    >
                      Tính năng
                    </th>
                  </tr>
                </thead>
                <tbody v-if="!isLoading">
                  <tr
                    v-for="(account, index) in getAccount"
                    :key="account.id"
                  >
                    <td
                      width="10"
                      class="text-center"
                      v-if="account.role_id == 2"
                    >
                      <input
                        type="checkbox"
                        class="checbox"
                        name="check1"
                        value="1"
                      />
                    </td>
                    <td v-if="account.role_id == 2">{{ index++  }}</td>
                    <td v-if="account.role_id == 2">{{ account.username }}</td>
                    <td v-if="account.role_id == 2">{{ account.email }}</td>
                    <td v-if="account.role_id == 2">
                      <template v-if="account.isActive == 1">Kích hoạt</template>
                      <template v-if="account.isActive == 0">chưa kích hoạt</template>
                    </td>
                    <td
                      v-if="account.role_id == 2"
                      class="table-td-center flex justify-center"
                    >
                      <base-button
                        type="button"
                        class="btn btn-primary btn-sm trash mr-[4px]"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        @click="getId(account.id)"
                      >
                        <i class="bx bxs-trash"></i>
                      </base-button>

                      <router-link
                        :to="`/admin/account-management/edit-account/${account.id}`"
                        type="button"
                        class="btn btn-primary btn-sm edit"
                      >
                        <i class="bx bxs-edit"></i>
                      </router-link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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
              Bạn có muốn xoá không
            </h2>
            <button
              type="button"
              class="btn-close p-0 m-0"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <i class="bx bxs-trash"></i>
            </div>
            <p class="text-center body">Bạn có chắn chắn muốn xoá danh mục này không không ?</p>
          </div>
          <div class="modal-footer gap-[10px]">
            <base-button
              type="button"
              class="btn-footer m-0 bg-[#0b0320] text-white"
              data-bs-dismiss="modal"
              >Huỷ</base-button
            >

            <base-button
              type="button"
              class="btn-footer bg-red-600 text-white"
              data-bs-dismiss="modal"
              @click="deleteCategory(idAccount.id)"
              >Xoá</base-button
            >
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
.btn-tongle {
  border: none;
  outline: none;
  border-radius: 10px !important;
}
.btn-tongle-active {
  color: var(--white);
  background-color: var(--dark);
}
</style>
