<script lang="ts" setup>

</script>
<template >
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
                                <label class="control-label">ID danh mục</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="control-label">Tên danh mục mới</label>
                                <input class="form-control" type="text" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Trạng thái</label>
                                <select class="form-control" id="exampleSelect3">
                                    <option>-- Chọn trạng thái --</option>
                                    <option>Hiện</option>
                                    <option>Ẩn</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="flex gap-[15px]">
                        <button class="btn btn-save" type="button">Lưu lại</button>
                        <router-link class="btn btn-cancel" to="/admin/category/add-category">Hủy bỏ</router-link>
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