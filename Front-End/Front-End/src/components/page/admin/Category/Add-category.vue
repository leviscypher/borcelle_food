<script lang="ts" setup>
import { ref, reactive, watch } from 'vue'
import { useAdminStore } from '@/stores/admin'

const useAdmin = useAdminStore()

const isloading = ref(false)

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

const categorys = reactive({
  name: '',
})
const error = reactive({
  name: '',
})

const addCategory = async () => {
  if (categorys.name === '') {
    error.name = 'Chưa nhập dữ liệu'
  } else {
    isloading.value = true
    await useAdmin.fetchAdd(categorys)
    const status = useAdmin.getStatus
    
    categorys.name = ''
    isloading.value = false

    switch (status) {
      case 201: 
        showAlert.value = true
        message.value = 'thêm mới thành công'
        alertType.value = 'success'
        break;

      case 422:
        showAlert.value = true
        message.value = 'danh mục này đã tồn tại'
        alertType.value = 'danger'
        break;

      default:
        showAlert.value = true
        message.value = 'đã có lỗi xảy ra vui lòng thử lại sau'
        alertType.value = 'danger'
    }
  }
}

watch(showAlert, (val) => {
  if (val) {
    setTimeout(() => {
      showAlert.value = false
    }, 5000)
  }
})
</script>
<template>
  <main
    class="app-content mt-0 pt-0"
    v-if="!isloading"
  >
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới danh mục</h3>

          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-4">
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
              to="/admin/category/"
              >Hủy bỏ</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </main>

  <div
    class="w-100% flex justify-center py-[100px] bg-white"
    v-else
  >
    <base-load></base-load>
  </div>

  <div v-show="showAlert" class="w-full">
    <div
      class="alert text-[14px] px-[20px] w-auto fixed top-[100px] z-[9999] left-[60%] translate-x-[-50%] text-center"
      :class="alertType ? 'bg-' + alertType : ''"
      role="alert"
    >
      {{ message }}
    </div>
  </div>
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
.avatar {
  width: 150px;
  height: 150px;
  object-fit: cover;
}
</style>
