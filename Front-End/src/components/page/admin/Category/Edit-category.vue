<script lang="ts" setup>
import { ref, onMounted, onUpdated, computed, reactive } from "vue";
import { useRoute } from "vue-router";
import { useAdminStore } from "@/stores/admin";

const route = useRoute();
const useAdmin = useAdminStore();
const nameCategory = reactive({
  name: "",
});
const dataUpdate = ref("");
const id = route.params.id;

onMounted(() => {
  if (id) {
    useAdmin.fetchEdit(id);
    nameCategory.name = useAdmin.getEditCategorys.name;
  }
});
const updateCategory = (id: any) => {
  useAdmin.fetchUpdate(id, nameCategory);
  dataUpdate.value = useAdmin.getUpdateCategorys;
};
</script>
<template>
  <main class="app-content mt-0 pt-0">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách danh mục</li>
        <li class="breadcrumb-item"><a href="#">Thêm danh mục</a></li>
      </ul>
    </div>
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
                  v-model="nameCategory.name"
                  type="text"
                  required
                />
              </div>
            </form>
          </div>
          <div class="flex gap-[15px]">
            <base-button
              class="btn btn-save"
              type="button"
              @click="updateCategory(getEditCategorys.id)"
              >Lưu lại</base-button
            >
            <router-link class="btn btn-cancel" to="/admin/category">Hủy bỏ</router-link>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<style lang="scss" scoped>
@import "@/assets/styles/admin/admin.scss";
@import "@/assets/styles/admin/add/add.scss";

[type="text"]:focus:focus,
[type="password"]:focus {
  border: 1px solid var(--black);
}
</style>
