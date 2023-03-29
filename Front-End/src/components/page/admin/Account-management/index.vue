<script lang="ts" setup>
import { ref, computed } from 'vue';


const isOpen = ref(false)
const isModalVisible = computed(() => {
    return isOpen.value;
})
const onToggle = () => {
    isOpen.value = !isOpen.value;
}
</script>
<template>
    <base-title>Quản lý tài khoản</base-title>
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <router-link to="/admin/category/add-category"  class="btn btn-add btn-sm btn-function" title="Thêm">
                                    <i class='bx bx-plus'></i>
                                    Tạo danh mục mới
                                </router-link>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm nhap-tu-file btn-function " type="button" title="Nhập"><i
                                        class='bx bx-cloud-upload'></i> Tải từ file</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file btn-function " type="button" title="In">
                                    <i class='bx bx-printer'></i>
                                    In dữ liệu
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file js-textareacopybtn btn-function" type="button"
                                    title="Sao chép"><i class='bx bx-copy'></i> Sao chép</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-excel btn-sm btn-function" href="" title="In">
                                    <font-awesome-icon icon="fa-solid fa-file-excel" />
                                    Xuất Excel
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm pdf-file btn-function" type="button" title="In"><i
                                        class='bx bxs-file-pdf'></i>Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm btn-function" type="button" title="Xóa">
                                    <i class='bx bxs-trash'></i> Xóa tất cả </a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0"
                            border="0" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center"><input type="checkbox" id="all"></th>
                                    <th width="100" class="text-center">ID</th>
                                    <th width="150" class="text-center">Tên tài khoản</th>
                                    <th width="150" class="text-center">Mật khẩu</th>
                                    <th width="150" class="text-center">Trạng Thái</th>
                                    <th width="100" class="text-center">Tính năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="10" class="text-center"><input type="checkbox" class="checbox" name="check1"
                                            value="1"></td>
                                    <td>#CD12837</td>
                                    <td>pizza</td>
                                    <td>Hiện</td>
                                    <td>Hiện</td>
                                    <td class="table-td-center flex justify-center">
                                        <base-button @click="onToggle" class="btn btn-primary btn-sm trash mr-[4px]" type="button" title="Xóa">
                                            <i class='bx bxs-trash'></i>
                                        </base-button>
                                        <button type="button" class="btn btn-primary btn-sm edit">
                                            <i class='bx bxs-edit'></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <transition name="fade">
            <div v-if="isModalVisible">
                <div @click="onToggle" class="absolute bg-black opacity-70 inset-0 z-0"></div>
                <div
                    class="w-full max-w-lg p-3 relative mx-auto my-auto rounded-xl shadow-lg bg-white translate-y-[-116px]">
                    <div>
                        <div class="text-center p-3 flex-auto justify-center leading-6">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-16 h-16 flex items-center text-purple-500 mx-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            <h2 class="text-2xl font-bold py-4">Are you sure?</h2>
                            <p class="text-md text-gray-500 px-8">
                                Do you really want to exit without saving your work?
                            </p>
                        </div>
                        <div class="p-3 mt-2 text-center space-x-4 md:block">
                            <button
                                class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-md hover:shadow-lg hover:bg-gray-100">
                                Save
                            </button>
                            <button @click="onToggle"
                                class="mb-2 md:mb-0 bg-purple-500 border border-purple-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-purple-600">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </main>
</template>

<style scoped>
@import "@/assets/styles/admin/admin.scss";

th {
    font-size: 14px !important;
    background-color: #eeeeee;
    color: #000;
}

td {
    vertical-align: middle !important;
}
</style>
