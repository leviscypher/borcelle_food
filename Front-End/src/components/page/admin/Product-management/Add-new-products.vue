<script lang="ts" setup>
import { reactive, ref, onMounted, computed, watch } from 'vue'
import { useProduct, useAdminStore, useProductStatus } from '@/stores/admin'
const product = useProduct()
const category = useAdminStore()
const productStatus = useProductStatus()

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

const isLoader = ref(false)

const products = reactive({
  name: '',
  image_path: [],
  price: '',
  quantity: '',
  description: '',
  product_status_id: '',
  categories_id: '',
})

const error = reactive({
  errorName: '',
  errorImage_path: '',
  errorPrice: '',
  errorQuantity: '',
  errorDescription: '',
  errorProduct_status_id: '',
  errorCategories_id: '',
})

const selectedImages = ref([])

onMounted(() => {
  category.fetchCategory()
  productStatus.fetchProductStatus()
})

const getCategory = computed(() => {
  return category.getCategory
})
const getProductStatus = computed(() => {
  return productStatus.getProductStatus
})

const onFileChange = (e: any) => {
  if (selectedImages.value.length < 3 && e.target.files.length <= 3 - selectedImages.value.length) {
    for (let i = 0; i < e.target.files.length; i++) {
      const file = e.target.files[i]
      const reader = new FileReader()
      reader.onload = (e) => {
        selectedImages.value.push(e.target.result)
      }
      reader.readAsDataURL(file)
      products.image_path.push(file)
    }
  } else {
    error.errorImage_path = 'chỉ được lưu tối đa 3 ảnh'
  }
}

const removeImage = (index: any) => {
  products.image_path.splice(index, 1)
  selectedImages.value.splice(index, 1)
}

const validate = () => {
  let valid = true

  error.errorName = ''
  error.errorImage_path = ''
  error.errorPrice = ''
  error.errorQuantity = ''
  error.errorDescription = ''
  error.errorProduct_status_id = ''
  error.errorCategories_id = ''

  if (!products.name) {
    error.errorName = 'Chưa nhập tên sản phẩm'
    valid = false
  }

  if (!products.image_path.length) {
    error.errorImage_path = 'chưa thêm ảnh mới'
    valid = false
  } else {
    for (let i = 0; i < products.image_path.length; i++) {
      const file = products.image_path[i]
      if (!file.type.startsWith('image/')) {
        error.errorImage_path += `Hình ảnh ${i + 1} không phải là tệp ảnh hợp lệ\n`
        valid = false
      }
    }
  }

  if (!products.price || isNaN(products.price)) {
    error.errorPrice = 'Chưa nhập giá trị hợp lệ'
    valid = false
  }

  if (!products.quantity || isNaN(products.quantity)) {
    error.errorQuantity = 'Chưa nhập số lượng hợp lệ'
    valid = false
  }

  if (!products.description) {
    error.errorDescription = 'Chưa nhập mô tả'
    valid = false
  }

  if (!products.product_status_id) {
    error.errorProduct_status_id = 'Chưa chọng trạng thái'
    valid = false
  }

  if (!products.categories_id) {
    error.errorCategories_id = 'Chưa chọn danh mục'
    valid = false
  }

  return valid
}

const addProducts = async () => {
  isLoader.value = true
  if (validate()) {
    await product.fetchAdd(products)
    showAlert.value = true
    message.value = 'thêm mới thành công'
    alertType.value = 'success'
    products.name = ''
    products.price = ''
    products.image_path.splice(0, products.image_path.length)
    products.description = ''
    products.product_status_id = ''
    products.categories_id = ''
    products.quantity = ''
  }
  isLoader.value = false
}

watch(error, (val) => {
  if (val) {
    setTimeout(() => {
      error.errorCategories_id = ''
      error.errorDescription = ''
      error.errorImage_path = ''
      error.errorName = ''
      error.errorPrice = ''
      error.errorProduct_status_id = ''
      error.errorQuantity = ''
    }, 4000)
  }
})

watch(showAlert, (val) => {
  if (val) {
    setTimeout(() => {
      showAlert.value = false
    }, 5000)
  }
})
</script>
<template>
  <main class="app-content" v-if="!isLoader">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body pt-10">
            <form class="row">
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input
                  class="form-control"
                  type="text"
                  v-model="products.name"
                  @input="error.errorName = ''"
                />
                <transition name="slide-fade">
                  <small
                    v-if="error.errorName"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.errorName }}</small
                  >
                </transition>
              </div>
              <div class="form-group col-md-3">
                <label
                  for="exampleSelect1"
                  class="control-label"
                  >Tình trạng</label
                >
                <select
                  class="form-control"
                  id="exampleSelect1"
                  v-model="products.product_status_id"
                  @input="error.errorProduct_status_id = ''"
                >
                  <option value="">-- Chọn tình trạng --</option>
                  <option
                    v-for="productstatus in getProductStatus"
                    :key="productstatus.id"
                    :value="productstatus.id"
                  >
                    {{ productstatus.status }}
                  </option>
                </select>
                <transition name="slide-fade">
                  <small
                    v-if="error.errorProduct_status_id"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.errorProduct_status_id }}</small
                  >
                </transition>
              </div>
              <div class="form-group col-md-3">
                <label
                  for="exampleSelect1"
                  class="control-label"
                  >Danh mục</label
                >
                <select
                  class="form-control"
                  v-model="products.categories_id"
                  @input="error.errorCategories_id = ''"
                >
                  <option
                    disabled
                    value=""
                  >
                    Chọn danh mục sản phẩm
                  </option>
                  <option
                    v-for="category in getCategory"
                    :key="category.id"
                    :value="category.id"
                  >
                    {{ category.name }}
                  </option>
                </select>
                <transition name="slide-fade">
                  <small
                    v-if="error.errorCategories_id"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.errorCategories_id }}</small
                  >
                </transition>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input
                  class="form-control"
                  type="number"
                  v-model="products.price"
                  style="-moz-appearance: textfield; -webkit-appearance: textfield; appearance: textfield"
                  @input="error.errorPrice = ''"
                />
                <transition name="slide-fade">
                  <small
                    v-if="error.errorPrice"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.errorPrice }}</small
                  >
                </transition>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Số lượng</label>
                <input
                  class="form-control"
                  type="number"
                  v-model="products.quantity"
                  @input="error.errorQuantity = ''"
                />
                <transition name="slide-fade">
                  <small
                    v-if="error.errorQuantity"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.errorQuantity }}</small
                  >
                </transition>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="boxchoice">
                  <div
                    v-if="selectedImages.length > 0"
                    class="flex gap-5"
                  >
                    <div
                      v-for="(image, index) in selectedImages"
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
                    @input="error.errorImage_path = ''"
                  />
                  <label
                    for="choicefile"
                    class="Choicefile"
                    >Chọn ảnh</label
                  >
                  <transition name="slide-fade">
                    <small
                      v-if="error.errorImage_path"
                      class="inline-block text-[red] text-[13px]"
                      >{{ error.errorImage_path }}</small
                    >
                  </transition>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea
                  class="form-control"
                  name="mota"
                  id="mota"
                  v-model="products.description"
                  @input="error.errorDescription = ''"
                ></textarea>
                <transition name="slide-fade">
                  <small
                    v-if="error.errorDescription"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.errorDescription }}</small
                  >
                </transition>
              </div>
            </form>
          </div>
          <base-button
            class="btn btn-save mr-3"
            type="button"
            @click="addProducts"
            >Lưu lại</base-button
          >
          <router-link
            class="btn btn-cancel"
            to="/admin/product-management"
            >Hủy bỏ</router-link
          >
        </div>
      </div>
    </div>

    <div v-show="showAlert">
      <div
        class="alert text-[14px] px-[20px] w-auto fixed top-[100px] z-[9999] left-[50%] translate-x-[-50%] text-center"
        :class="alertType ? 'alert-' + alertType : ''"
        role="alert"
      >
        {{ message }}
      </div>
    </div>
  </main>

  <main class="app-content flex items-center justify-center" v-else>
    <base-load />
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
