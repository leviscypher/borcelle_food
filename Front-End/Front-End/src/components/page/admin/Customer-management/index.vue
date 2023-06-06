<script lang="ts" setup>

</script>
<template>
    <base-title>Quản lý Khách hàng</base-title>
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm pdf-file btn-function" type="button">
                                    <i class='bx bxs-trash'></i>Xoá</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm btn-function" type="button">
                                    <i class='bx bxs-trash'></i> Xóa tất cả </a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0"
                            border="0" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>ID Khách hàng</th>
                                    <th width="150">Tên tài khoản</th>
                                    <th width="150">Mật khẩu</th>
                                    <th width="150">Tên khách hàng</th>
                                    <th width="20">Ảnh</th>
                                    <th width="300">Địa chỉ</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>SĐT</th>
                                    <th width="100">Trạng thái</th>
                                    <th width="100">Tính năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>#CD12837</td>
                                    <td>Hồ Thị Thanh Ngân</td>
                                    <td>Hồ Thị Thanh Ngân</td>
                                    <td>Hồ Thị Thanh Ngân</td>
                                    <td><img class="img-card-person" src="@/assets/cardphoto/1.jfif" alt=""></td>
                                    <td>155-157 Trần Quốc Thảo, Quận 3, Hồ Chí Minh </td>
                                    <td>12/02/1999</td>
                                    <td>Nữ</td>
                                    <td>0926737168</td>
                                    <td>Hoạt động</td>
                                    <td class="table-td-center">
                                        <button type="button" class="btn btn-primary btn-sm edit"><i
                                                class='bx bxs-edit'></i>
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
</style>
