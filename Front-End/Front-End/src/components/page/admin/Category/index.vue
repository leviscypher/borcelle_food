<script lang="ts" setup>
import { computed, onMounted, reactive, ref } from 'vue'
import { useAdminStore } from '@/stores/admin'

const category = useAdminStore()

const idCategory = reactive({ id: '' })
const isLoading = ref(true)

onMounted(async () => {
  await Promise.all([category.fetchCategory()])
  isLoading.value = false
})

const getCategory = computed(() => {
  return category.getCategory
  
})

const getId = (id: any) => {
  idCategory.id = id
}

const deleteCategory = async (id: any) => {
  isLoading.value = true
  await Promise.all([category.fetchDelete(id), category.fetchCategory()])
  isLoading.value = false
}
</script>
<template>
  <base-title>Danh mục sản phẩm</base-title>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <router-link
                  to="/admin/category/add-category"
                  class="btn btn-add btn-sm btn-function"
                  title="Thêm"
                >
                  <i class="bx bx-plus"></i>
                  Tạo danh mục mới
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
                    Tên danh mục
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
                  v-for="(category, index) in getCategory"
                  :key="category.id"
                >
                  <td
                    width="10"
                    class="text-center"
                  >
                    <input
                      type="checkbox"
                      class="checbox"
                      name="check1"
                      value="1"
                    />
                  </td>
                  <td>{{ index + 1  }}</td>
                  <td>{{ category.name }}</td>
                  <td class="table-td-center flex justify-center">
                    <base-button
                      type="button"
                      class="btn btn-primary btn-sm trash mr-[4px]"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                      @click="getId(category.id)"
                    >
                      <i class="bx bxs-trash"></i>
                    </base-button>
                    <router-link
                      :to="`/admin/category/eidt-category/${category.id}`"
                      type="button"
                      class="btn btn-primary btn-sm edit"
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
              @click="deleteCategory(idCategory.id)"
              >Xoá</base-button
            >
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/admin/admin.scss';
@import '@/assets/styles/admin/Category/category.scss';
</style>
