<script lang="ts" setup></script>
<template>
  <base-title>Quản lý đơn hàng</base-title>
  <div class="tile">
    <div class="tile-body">
      <div class="row element-button">
        <div class="col-sm-2">
          <router-link to="/admin/order-management" class="btn btn-add btn-sm btn-function">Tất cả đơn</router-link>
        </div>
        <div class="col-sm-2">
          <router-link to="/admin/order-management/payment" class="btn btn-delete btn-sm nhap-tu-file btn-function">Chờ thanh toán</router-link>
        </div>

        <div class="col-sm-2">
          <router-link to="/admin/order-management/progressing" class="btn btn-delete btn-sm print-file btn-function">Chờ xử lý</router-link>
        </div>
        <div class="col-sm-2">
          <router-link to="/admin/order-management/shipping" class="btn btn-delete btn-sm print-file js-textareacopybtn btn-function">Đang vận chuyển</router-link>
        </div>

        <div class="col-sm-2">
          <router-link to="/admin/order-management/delivered" class="btn btn-excel btn-sm btn-function">Đã giao</router-link>
        </div>
        <div class="col-sm-2">
          <router-link to="/admin/order-management/cancelled" class="btn btn-delete btn-sm btn-function bg-[#e8e8e8]">Đã hủy</router-link>
        </div>
      </div>
      <router-view></router-view>
    </div>
  </div>
</template>

<style scoped>
@import '@/assets/styles/admin/admin.scss';

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
