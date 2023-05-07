<script lang="ts" setup>
import { onMounted, computed, reactive, ref } from 'vue'
import { useRoute } from 'vue-router'
import { useAdminStore } from '@/stores/admin'

const route = useRoute()
const useAdmin = useAdminStore()
const nameCategory = reactive({
  name: '',
})
const isloading = ref(false)
const isSuccess = ref('')
const error = reactive({
  name: '',
})

const getEditCategorys = computed(() => {
  return useAdmin.getEditCategorys
})

const getStatus = computed(() => {
  return useAdmin.getStatus
})

onMounted(async () => {
  const id = route.params.id
  if (id) {
    await useAdmin.fetchEdit(id)
    if (getEditCategorys.value) {
      nameCategory.name = getEditCategorys.value.name
    }
  }
})

const updateCategory = async (id: any) => {
  if (nameCategory.name === '') {
    error.name = 'Chưa nhập dữ liệu'
  } else {
    try {
      isloading.value = true
      await useAdmin.fetchUpdate(id, nameCategory)
      switch (getStatus.value) {
        case 200:
          isSuccess.value = '200'
          break
        case 422:
          isSuccess.value = '422'
          break
      }
    } catch (error) {
      return
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
          <h3 class="tile-title">Sửa danh mục</h3>
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
                    Sửa danh mục thành công
                  </div>
                </div>
              </div>
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
            <base-button
              class="btn btn-save"
              type="button"
              @click="updateCategory(getEditCategorys.id)"
            >
              Lưu lại
            </base-button>
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
