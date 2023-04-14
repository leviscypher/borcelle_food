<script lang="ts" setup>
import { ref, reactive, onMounted } from "vue";
import { useAdminStore } from '@/stores/admin'
const useAdmin = useAdminStore()

const categorys = reactive({
    name: '',
})

const addCategory = () => {
    useAdmin.fetchAdd(categorys)
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
                                <label class="control-label">Tên danh mục mới</label>
                                <input class="form-control" v-model="categorys.name" type="text" required>
                            </div>
                        </form>
                    </div>
                    <div class="flex gap-[15px]">
                        <button class="btn btn-save" type="button" @click="addCategory">Lưu lại</button>
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
</style>