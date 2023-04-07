<script lang="ts" setup>
import { computed, onMounted, reactive } from "vue";
import { useProduct } from "@/stores/admin";

const products = useProduct();

const idCategory = reactive({ id: "" });
onMounted(() => {
  products.fetchProduct();
});

const getProduct = computed(() => {
  return products.getProduct;
});

const getId = (id: any) => {
  idCategory.id = id;
};

const deleteProduct = (id: any) => {
  products.fetchDelete(id);
  products.fetchProduct();
};
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
          <a class="btn btn-excel btn-sm btn-function" href="" title="In">
            <font-awesome-icon icon="fa-solid fa-file-excel" />
            Xuất Excel
          </a>
        </div>
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm pdf-file btn-function" type="button" title="In"
            ><i class="bx bxs-file-pdf"></i>Xuất PDF</a
          >
        </div>
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm btn-function" type="button" title="Xóa">
            <i class="bx bxs-trash"></i> Xóa tất cả
          </a>
        </div>
      </div>
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
          <tr>
            <th width="10"><input type="checkbox" id="all" /></th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Tình trạng</th>
            <th>Giá tiền</th>
            <th>Danh mục</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in getProduct" :key="product.id">
            <td width="10"><input type="checkbox" name="check1" value="1" /></td>
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>
              <img
                :src="product.image_path[0]"
                width="100"
              />
             
            </td>
            <td>{{ product.quantity }}</td>
            <td><span class="badge bg-success">Còn hàng</span></td>
            <td>{{ product.price }}</td>
            <td>{{ product.categories_id }}</td>
            <td>
              <base-button
                type="button"
                class="btn btn-primary btn-sm trash mr-[4px]"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                @click="getId(product.id)"
              >
                <i class="bx bxs-trash"></i>
              </base-button>
              <router-link :to="`/admin/product-management/edit-products/${product.id}`" class="btn btn-primary btn-sm edit" type="button" title="Sửa">
                <i class="bx bxs-edit"></i>
              </router-link>
            </td>
          </tr>
        </tbody>
      </table>
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
          <h2 class="modal-title text-black" id="exampleModalLabel">
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
          <p class="text-center body">
            Bạn có chắn chắn muốn xoá danh mục này không không ?
          </p>
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
            @click="deleteProduct(idCategory.id)"
            >Xoá</base-button
          >
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
@import "@/assets/styles/admin/admin.scss";

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
