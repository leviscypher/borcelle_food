<script lang="ts" setup>
import { ref, computed, reactive } from 'vue'
import { useAdminStore } from '@/stores/admin'
const useAdmin = useAdminStore()
const isSuccess = ref('')

const categorys = reactive({
  name: '',
  image: '',
})
const error = reactive({
  name: '',
  image:''
})
const selectedImages = ref([])
const getStatus = computed(() => {
  return useAdmin.getStatus
})

const onFileChange = (e: any) => {
  if (selectedImages.value.length < 1 && e.target.files.length <= 1 - selectedImages.value.length) {
    for (let i = 0; i < e.target.files.length; i++) {
      const file = e.target.files[i]
      const reader = new FileReader()
      if (!file.type.match('image.*')) {
        error.image = 'Chỉ cho phép tải lên tập tin hình ảnh'
        return
      }
      reader.onload = (e) => {
        selectedImages.value.push(e.target.result)
      }
      reader.readAsDataURL(file)
      categorys.image = file
    }
  } else {
    alert('ảnh tối đa là 1')
  }
}
const addCategory = async () => {
  if (categorys.name === '' && selectedImages.value.length < 1) {
    error.name = 'Chưa nhập dữ liệu'
    error.image = 'Vui lòng chọn ít nhất 1 ảnh'
  } else {
    try {
      await useAdmin.fetchAdd(categorys)
      switch (getStatus.value) {
        case 201:
          isSuccess.value = '201'
          break
        case 404:
          isSuccess.value = '422'
          break
        default:
          break
      }
    } catch (error) {
      isSuccess.value = null
    }
  }
}
</script>
<template>
  <main class="app-content mt-0 pt-0">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới danh mục</h3>
          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-4">
                <div
                  v-if="isSuccess === '422'"
                  class="alert-danger p-[10px] rounded-[0.357rem] text-center text-[14px]"
                  role="alert"
                >
                  Danh mục đã tồn tại
                </div>
                <div
                  v-else-if="isSuccess === '201'"
                  class="alert alert-success text-[14px]"
                  role="alert"
                >
                  Thêm danh mục thành công
                </div>
                <label class="control-label">Tên danh mục mới</label>
                <input
                  class="form-control"
                  v-model="categorys.name"
                  type="text"
                  required
                  @input="error.name = ''"
                />
                <transition name="slide-fade">
                  <small
                    v-if="error.name"
                    class="inline-block text-[red] text-[13px]"
                    >{{ error.name }}</small
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
                    @input="error.image = ''"
                  />
                  <label
                    for="choicefile"
                    class="Choicefile"
                    >Chọn ảnh</label
                  >
                </div>
              </div>
            </form>
          </div>
          <div class="flex gap-[15px]">
            <button
              class="btn btn-save"
              type="button"
              @click="addCategory"
            >
              Lưu lại
            </button>
            <router-link
              class="btn btn-cancel"
              to="/admin/category"
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
.btn-remove {
  position: absolute;
  width: 30px;
  height: 30px;
  right: 0;
}
</style>
