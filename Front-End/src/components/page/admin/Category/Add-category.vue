<script lang="ts" setup>
import { ref, computed, reactive } from 'vue'
import { useAdminStore } from '@/stores/admin'
const useAdmin = useAdminStore()
const isSuccess = ref('')

const categorys = reactive({
  name: '',
})
const error = reactive({
  name: '',
})
const getStatus = computed(() => {
  return useAdmin.getStatus
})
const addCategory = async () => {
  if (categorys.name === '') {
    error.name = 'Chưa nhập dữ liệu'
  } else {
    try {
      await useAdmin.fetchAdd(categorys)
      switch (getStatus.value) {
        case 201:
          isSuccess.value = '201'
          break
        case 422:
          isSuccess.value = '422'
          break
        default:
          break
      }
    } catch (error) {
      return
    }
  }
}
</script>
<template >
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
</style>