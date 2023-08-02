<script lang="ts" setup>
import { onMounted, reactive, ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useAdminStore } from '@/stores/admin'

const route = useRoute()
const useAdmin = useAdminStore()
const nameCategory = reactive({
  name: '',
})
const isloading = ref(false)

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

const categoryId = ref(0)

const error = reactive({
  name: '',
})


onMounted(async () => {
  categoryId.value = route.params.id
  if (categoryId.value) {
    await useAdmin.fetchEdit(categoryId.value)
    nameCategory.name = useAdmin.getEditCategorys.name
  }
})

const updateCategory = async () => {
  if (nameCategory.name === '') {
    error.name = 'Chưa nhập dữ liệu'
  } else {
    isloading.value = true
    await useAdmin.fetchUpdate(categoryId.value, nameCategory)
    const status = useAdmin.getStatus
    
    nameCategory.name = ''
    isloading.value = false

    switch (status) {
      case 200:
        await useAdmin.fetchEdit(categoryId.value)
        nameCategory.name = useAdmin.getEditCategorys.name
        showAlert.value = true
        message.value = 'cập nhật thành công'
        alertType.value = 'success'
        break
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
          <h3 class="tile-title">Sửa danh mục</h3>

          <div class="tile-body">
            <form class="row">
              <div class="form-group col-md-4">
                <label class="control-label">Tên danh mục mới</label>
                <input
                  class="form-control"
                  v-model="nameCategory.name"
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
              @click="updateCategory"
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

  <div
    v-show="showAlert"
    class="w-full"
  >
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

[type='text']:focus:focus,
[type='password']:focus {
  border: 1px solid var(--black);
}
.btn-remove {
  position: absolute;
  width: 30px;
  height: 30px;
  right: 0;
}
</style>
