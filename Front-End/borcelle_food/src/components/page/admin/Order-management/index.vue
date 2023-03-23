<script lang="ts" setup>

</script>
<template>
  <base-title>Quản lý đơn hàng</base-title>
  <div class="tile">
    <div class="tile-body">
      <div class="row element-button">
        <div class="col-sm-2">
          <a class="btn btn-delete btn-sm print-file btn-function" type="button" title="In"><i
              class='bx bx-printer'></i>In dữ liệu</a>
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
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
          <tr>
            <th width="10"><input type="checkbox" id="all"></th>
            <th>ID đơn hàng</th>
            <th>Khách hàng</th>
            <th>Đơn hàng</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Tình trạng</th>
            <th>Tính năng</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td width="10"><input type="checkbox" name="check1" value="1"></td>
            <td>MD0837</td>
            <td>Triệu Thanh Phú</td>
            <td>Ghế làm việc Zuno, Bàn ăn gỗ Theresa</td>
            <td>2</td>
            <td>9.400.000 đ</td>
            <td><span class="badge bg-success">Hoàn thành</span></td>
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
