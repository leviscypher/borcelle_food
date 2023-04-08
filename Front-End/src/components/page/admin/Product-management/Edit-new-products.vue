<script lang="ts" setup>
import { reactive, ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import { useProduct, useAdminStore } from '@/stores/admin'

const product = useProduct()
const category = useAdminStore()
const route = useRoute()

const products = reactive({
  name: '',
  image_path: [],
  price: '',
  quantity: '',
  description: '',
  status: '',
  categories_id: '',
})

const images = ref([])

// const getEditAccounts = computed(() => {
//   return product.getEditAccounts
// })

const getProduct = computed(() => {
  return product.getEditproducts
})

onMounted(() => {
  const id = route.params.id
  if (id) {
    product.fetchEdit(id)
    category.fetchCategory()
  }
})
const updateCategory = (id: any) => {
  product.fetchUpdate(id, products)
}
const onFileChange = (e: any) => {
  images.value = []
  products.image_path = []
  if (e.target.files.length <= 3) {
    for (let i = 0; i < e.target.files.length; i++) {
      const file = e.target.files[i]
      const reader = new FileReader()
      reader.onload = (e) => {
        images.value.push(e.target.result)
      }
      reader.readAsDataURL(file)
      products.image_path.push(file)
    }
  } else {
    alert('ảnh tối đa là 3')
  }
}

const removeImage = (index: any) => {
  products.image_path.splice(index, 1)
  images.value.splice(index, 1)
}
</script>
<template>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body pt-10">
            <div
              v-for="product in getProduct"
              :key="item.id"
            >
              {{ product }}
            </div>
            <form class="row">
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input
                  class="form-control"
                  type="text"
                  v-model="products.name"
                />
              </div>
              <div class="form-group col-md-3">
                <label
                  for="exampleSelect1"
                  class="control-label"
                >Tình trạng</label>
                <select
                  class="form-control"
                  id="exampleSelect1"
                  v-model="products.status"
                >
                  <option value="">-- Chọn tình trạng --</option>
                  <option value="1">Còn hàng</option>
                  <option value="0">Hết hàng</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label
                  for="exampleSelect1"
                  class="control-label"
                >Danh mục</label>
                <select
                  class="form-control"
                  v-model="products.categories_id"
                >
                  <option
                    disabled
                    value=""
                  >
                    Chọn vài trò
                  </option>
                  <option
                    v-for="category in getEditAccounts"
                    :key="category.id"
                    :value="category.id"
                  >
                    {{ category.name }}
                  </option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input
                  class="form-control"
                  type="number"
                  v-model="products.price"
                />
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Số lượng</label>
                <input
                  class="form-control"
                  type="number"
                  v-model="products.quantity"
                />
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="boxchoice">
                  <div
                    v-if="images.length > 0"
                    class="flex gap-5"
                  >
                    <div
                      v-for="(image, index) in images"
                      :key="index"
                      class="relative"
                    >
                      <img
                        :src="image"
                        height="100"
                      />
                      <base-button
                        class="btn-remove p-0 m-0"
                        @click.stop.prevent="removeImage(index)"
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
                    multiple
                  />
                  <label
                    for="choicefile"
                    class="Choicefile"
                  >Chọn ảnh</label>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea
                  class="form-control"
                  name="mota"
                  id="mota"
                  v-model="products.description"
                ></textarea>
              </div>
            </form>
          </div>
          <base-button
            class="btn btn-save"
            type="button"
            @click="updateCategory"
          >Lưu lại</base-button>
          <a
            class="btn btn-cancel"
            href="table-data-product.html"
          >Hủy bỏ</a>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/admin/admin.scss';
@import '@/assets/styles/admin/add/add.scss';
.btn-remove {
  position: absolute;
  width: 30px;
  height: 30px;
  right: 0;
}
</style>
