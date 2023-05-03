<script lang="ts" setup>
import { ref, computed, reactive } from 'vue'
import { useAdminStore } from '@/stores/admin'
const useAdmin = useAdminStore()
const isSuccess = ref('')
const isloading = ref(false)
const categorys = reactive({
  name: '',
  // image: '',
})
const error = reactive({
  name: '',
})

const addCategory = async () => {
  if (categorys.name === '') {
    error.name = 'Chưa nhập dữ liệu'
  } else {
    try {
      isloading.value = true
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
    } finally {
      isloading.value = false
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
              <div v-if="isloading">
                <base-load></base-load>
              </div>
              <div v-else>
                <div
                  class="form-group col-md-4"
                  v-if="isSuccess === '422'"
                >
                  <div
                    class="alert-danger p-[10px] rounded-[0.357rem] text-center text-[14px]"
                    role="alert"
                  >
                    Danh mục đã tồn tại
                  </div>
                </div>
                <div
                  class="form-group col-md-4"
                  v-else-if="isSuccess === '201'"
                >
                  <div
                    class="alert alert-success text-[14px]"
                    role="alert"
                  >
                    Thêm danh mục thành công
                  </div>
                </div>
              </div>
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
