<script lang="ts" setup>
import { computed, onMounted, reactive, ref } from 'vue'
import { useProduct, useAdminStore } from '@/stores/admin'

const isLoading = ref(true)
const products = useProduct()
// const category = useAdminStore()

const productId = ref(0)
const productData = ref([])

onMounted(async () => {
  await Promise.all([products.fetchProduct()])
  productData.value = products.getProduct
  isLoading.value = false
})

const getId = (id: Number) => {
  productId.value = id
}

const deleteProduct = async (id: Number) => {
  isLoading.value = true
  await Promise.all([products.fetchDelete(id), products.fetchProduct()])
  productData.value = products.getProduct
  isLoading.value = false
}

const formatPrice = (value: number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}
</script>
<template>
  <base-title>Quản lý sản phẩm</base-title>
  <div class="tile">
    <div class="tile-body">
      <div class="row element-button">
        <div class="col-sm-2">
          <router-link
            class="btn btn-add btn-sm btn-function"
            to="/admin/product-management/add-products"
            title="Thêm"
          >
            <i class="bx bx-plus"></i>
            Tạo mới sản phẩm</router-link
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
            onclick="myApp.printTable()"
            ><i class="bx bx-printer"></i>In dữ liệu</a
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
        class="table table-hover table-bordered"
        id="sampleTable"
      >
        <thead>
          <tr>
            <th
              class="text-center"
              width="10"
            >
              <input
                type="checkbox"
                id="all"
              />
            </th>
            <th class="text-center">ID</th>
            <th class="text-center w-[20%]">Tên sản phẩm</th>
            <th class="text-center">Ảnh</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Tình trạng</th>
            <th class="text-center w-[20%]">Giá tiền</th>
            <th class="text-center">Danh mục</th>
            <th
              class="text-center"
              width="140"
            >
              Chức năng
            </th>
          </tr>
        </thead>
        <tbody v-if="!isLoading">
          <tr
            v-for="(product, index) in productData"
            :key="product.id"
            class="text-center"
          >
            <td
              class="text-center"
              width="10"
            >
              <input
                type="checkbox"
                name="check1"
                value="1"
              />
            </td>
            <td class="text-center">{{ index + 1 }}</td>
            <td class="text-center">{{ product.name }}</td>
            <td class="text-center">
              <img
                :src="product.image_path[0]"
                width="100"
                class="rounded-lg h-[80px] cover"
              />
            </td>
            <td class="text-center">{{ product.quantity }}</td>
            <td class="text-center">
              <span
                class="badge bg-success"
                v-if="product.status_id == '1'"
                >{{ product.status_name }}</span
              >
              <span
                class="badge bg-danger"
                v-else-if="product.status_id == '2'"
                >{{ product.status_name }}</span
              >
            </td>
            <td class="text-center">{{ formatPrice(product.price) }}</td>
            <td class="text-center">
              <span class="badge bg-primary px-6">{{ product.category_name }} </span>
            </td>
            <td class="text-center">
              <base-button
                type="button"
                class="btn btn-primary btn-sm trash mr-[4px]"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                @click="getId(product.id)"
              >
                <i class="bx bxs-trash"></i>
              </base-button>
              <router-link
                :to="`/admin/product-management/edit-products/${product.id}`"
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

  <!-- model -->
  <div
    class="modal modals"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content w-[380px] h-auto mx-auto">
        <div class="bg-white mx-auto rounded-lg py-[20px]">
          <div class="flex items-center">
            <font-awesome-icon
              icon="fa-sharp fa-light fa-triangle-exclamation"
              class="text-3xl text-danger"
            />
            <h4 class="mb-0 ml-4">Xóa sản phẩm</h4>
          </div>
          <p class="text-2xl mt-6 ml-10">bạn có chắc muốn xóa sản phẩm này?</p>
          <div class="flex justify-end mt-8">
            <button
              class="btn-info border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover focus:outline-none"
              data-bs-dismiss="modal"
              @click="deleteProduct(productId)"
            >
              Xác nhận
            </button>
            <button
              class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover focus:outline-none"
              data-bs-dismiss="modal"
            >
              Hủy
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
@import '@/assets/styles/admin/admin.scss';

th {
  font-size: 14px !important;
  background-color: #eeeeee;
  color: #000;
  vertical-align: middle;
}

td {
  vertical-align: middle !important;
}
</style>

