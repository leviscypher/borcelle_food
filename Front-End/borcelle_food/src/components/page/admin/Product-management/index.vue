<script lang="ts" setup>

</script>
<template>
  <base-title>Quản lý sản phẩm</base-title>
  <div class="tile">
    <div class="tile-body">
      <div class="row element-button">
        <div class="col-sm-2">

          <a class="btn btn-add btn-sm btn-function" href="form-add-nhan-vien.html" title="Thêm">
            <i class='bx bx-plus'></i>
            Tạo mới sản phẩm</a>
        </div>
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm nhap-tu-file btn-function" type="button" title="Nhập"><i class='bx bx-cloud-upload'></i> Tải
            từ file</a>
        </div>

        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm print-file btn-function" type="button" title="In" onclick="myApp.printTable()"><i
              class='bx bx-printer'></i>In dữ liệu</a>
        </div>
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm print-file js-textareacopybtn btn-function" type="button" title="Sao chép"><i
              class='bx bx-copy'></i> Sao chép</a>
        </div>

        <div class="col-sm-2">
          <a class="btn btn-excel btn-sm btn-function" href="" title="In">
            <font-awesome-icon icon="fa-solid fa-file-excel" />
            Xuất Excel
          </a>
        </div>
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm pdf-file btn-function" type="button" title="In"><i class='bx bxs-file-pdf'></i>Xuất PDF</a>
        </div>
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm btn-function" type="button" title="Xóa">
            <i class='bx bxs-trash'></i> Xóa tất cả </a>
        </div>
      </div>
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
          <tr>
            <th width="10"><input type="checkbox" id="all"></th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Tình trạng</th>
            <th>Giá tiền</th>
            <th>Danh mục</th>
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="10"><input type="checkbox" name="check1" value="1"></td>
            <td>71309005</td>
            <td>Humberger</td>
            <td><img src="https://www.drhaile.vn/uploads/images/hoanganh/HA/VFADAV.jpg" alt="" width="100px;"></td>
            <td>40</td>
            <td><span class="badge bg-success">Còn hàng</span></td>
            <td>5.600.000 đ</td>
            <td>Bàn ăn</td>
            <td>
              <button class="btn btn-primary btn-sm trash mr-[3px]" type="button" title="Xóa">
                <i class='bx bxs-trash'></i>
              </button>
              <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"> <i class='bx bxs-edit'></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
@import "@/assets/styles/admin/admin.scss";

th {
  font-size: 14px !important;
  background-color: #eeeeee;
  color: #000;
  vertical-align: middle;
}

td {
  vertical-align: middle !important;
}
</style>
