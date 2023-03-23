<script lang="ts" setup>

</script>
<template>
    <base-title>Danh mục sản phẩm</base-title>
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">

                                <a class="btn btn-add btn-sm btn-function " href="form-add-nhan-vien.html" title="Thêm">
                                    <i class='bx bx-plus'></i>
                                    Tạo mới sản phẩm</a>
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
                                    <th width="150" class="text-center">Tên danh</th>
                                    <th width="100" class="text-center">Tính năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="10" class="text-center"><input type="checkbox" class="checbox" name="check1"
                                            value="1"></td>
                                    <td>#CD12837</td>
                                    <td>Hồ Thị Thanh Ngân</td>
                                    <td class="table-td-center flex justify-center">
                                        <button class="btn btn-primary btn-sm trash mr-[4px]" type="button" title="Xóa">
                                            <i class='bx bxs-trash'></i>
                                        </button>
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

.checbox {
    border: 1px solid #ccc;
}

</style>
